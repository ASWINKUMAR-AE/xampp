<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$artist_id = isset($_GET['artist_id']) ? intval($_GET['artist_id']) : 0;

// Get current conversation if artist_id is set
$current_conv_id = 0;
if ($artist_id > 0) {
    $stmt = $conn->prepare("SELECT id FROM conversations WHERE (user1_id = ? AND user2_id = ?) OR (user1_id = ? AND user2_id = ?)");
    $stmt->bind_param("iiii", $user_id, $artist_id, $artist_id, $user_id);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($row = $res->fetch_assoc()) {
        $current_conv_id = $row['id'];
    } else {
        // Create new conversation
        $stmt = $conn->prepare("INSERT INTO conversations (user1_id, user2_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $user_id, $artist_id);
        $stmt->execute();
        $current_conv_id = $stmt->insert_id;
    }
}

// Fetch all conversations for the sidebar
$sql = "SELECT c.id, u.username, u.id as other_user_id 
        FROM conversations c 
        JOIN users u ON (c.user1_id = u.id OR c.user2_id = u.id) 
        WHERE (c.user1_id = ? OR c.user2_id = ?) AND u.id != ?
        ORDER BY c.created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iii", $user_id, $user_id, $user_id);
$stmt->execute();
$conversations = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat - Art Marketplace</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body {
            background-color: #0a0a0a;
            color: #eee;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .chat-layout {
            display: grid;
            grid-template-columns: 300px 1fr;
            height: calc(100vh - 60px);
            background: #111;
        }

        @media (max-width: 768px) {
            .chat-layout {
                grid-template-columns: 1fr;
            }
            .chat-sidebar {
                display: none; /* Mobile logic: toggle sidebar */
            }
        }

        .chat-sidebar {
            background: #080808;
            border-right: 1px solid rgba(255, 255, 255, 0.05);
            overflow-y: auto;
        }

        .conv-item {
            padding: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.03);
            cursor: pointer;
            transition: background 0.2s;
            display: flex;
            align-items: center;
            text-decoration: none;
            color: inherit;
        }

        .conv-item:hover, .conv-item.active {
            background: rgba(107, 70, 193, 0.1);
            color: white;
            text-decoration: none;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: #6b46c1;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            font-weight: bold;
        }

        .chat-main {
            display: flex;
            flex-direction: column;
            background: #0e0e0e;
        }

        .chat-header {
            padding: 1rem;
            background: #151515;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            display: flex;
            align-items: center;
        }

        .message-area {
            flex-grow: 1;
            overflow-y: auto;
            padding: 2rem;
            display: flex;
            flex-direction: column;
        }

        .chat-input-area {
            padding: 1.5rem;
            background: #151515;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        .input-group {
            background: #252525;
            border-radius: 50px;
            padding: 5px 15px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        #messageInput {
            background: transparent;
            border: none;
            color: white;
            box-shadow: none;
        }

        .btn-send {
            background: #6b46c1;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: transform 0.2s;
        }

        .btn-send:hover {
            transform: scale(1.1);
            background: #553c9a;
        }

        .message {
            max-width: 60%;
            margin-bottom: 1.5rem;
            padding: 0.8rem 1.2rem;
            position: relative;
            font-size: 0.95rem;
            line-height: 1.4;
        }

        .message.sent {
            align-self: flex-end;
            background: #6b46c1;
            color: white;
            border-radius: 18px 18px 4px 18px;
        }

        .message.received {
            align-self: flex-start;
            background: #2a2a2a;
            color: #ddd;
            border-radius: 18px 18px 18px 4px;
        }

        .message-time {
            font-size: 0.7rem;
            opacity: 0.6;
            margin-top: 4px;
            display: block;
            text-align: right;
        }

        .empty-state {
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #555;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-dark bg-dark px-3" style="height: 60px;">
        <a class="navbar-brand fw-bold" href="../index.php">
            <i class="fa-solid fa-arrow-left me-2"></i> Messages
        </a>
    </nav>

    <div class="chat-layout">
        <!-- Sidebar -->
        <div class="chat-sidebar">
            <?php foreach ($conversations as $conv): ?>
                <a href="?artist_id=<?php echo $conv['other_user_id']; ?>" 
                   class="conv-item <?php echo ($artist_id == $conv['other_user_id']) ? 'active' : ''; ?>">
                    <div class="user-avatar"><?php echo strtoupper(substr($conv['username'], 0, 1)); ?></div>
                    <div>
                        <div class="fw-bold"><?php echo htmlspecialchars($conv['username']); ?></div>
                        <div class="small text-muted text-truncate" style="max-width: 150px;">Click to chat...</div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>

        <!-- Main Chat -->
        <main class="chat-main">
            <?php if ($current_conv_id > 0): ?>
                <div class="chat-header">
                    <div class="user-avatar"><?php 
                        // Fetch other user's name
                        $stmt = $conn->prepare("SELECT username FROM users WHERE id = ?");
                        $stmt->bind_param("i", $artist_id);
                        $stmt->execute();
                        $other_name = $stmt->get_result()->fetch_assoc()['username'];
                        echo strtoupper(substr($other_name, 0, 1)); 
                    ?></div>
                    <h5 class="mb-0 fw-bold"><?php echo htmlspecialchars($other_name); ?></h5>
                </div>

                <div class="message-area" id="chatMessages" data-conv-id="<?php echo $current_conv_id; ?>">
                    <!-- Messages will be loaded here by AJAX -->
                </div>

                <div class="chat-input-area">
                    <form id="chatForm">
                        <div class="input-group">
                            <input type="text" id="messageInput" class="form-control" placeholder="Type a message..." autocomplete="off">
                            <button type="submit" class="btn-send">
                                <i class="fa-solid fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>
                </div>
            <?php else: ?>
                <div class="empty-state">
                    <i class="fa-solid fa-message fa-4x mb-3 opacity-20"></i>
                    <h4>Select a conversation to start chatting</h4>
                </div>
            <?php endif; ?>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <script>
        // High-frequency polling for chat page specifically
        if (document.getElementById('chatMessages')) {
            const convId = document.getElementById('chatMessages').dataset.convId;
            
            // Override the default polling or just let it run
            const fetchMessagesAction = () => {
                fetch(`../api/fetch_messages.php?conv_id=${convId}`)
                    .then(r => r.json())
                    .then(data => {
                        if (data.success) {
                            const chatContainer = document.getElementById('chatMessages');
                            let html = '';
                            data.messages.forEach(msg => {
                                html += `<div class="message ${msg.is_me ? 'sent' : 'received'}">
                                    ${msg.message}
                                    <span class="message-time">${msg.time}</span>
                                </div>`;
                            });
                            
                            // Only update if content changed or first load
                            if (chatContainer.innerHTML !== html) {
                                chatContainer.innerHTML = html;
                                scrollToBottom();
                            }
                        }
                    });
            };

            const sendMessageAction = (msg) => {
                fetch('../api/send_message.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ conv_id: convId, message: msg })
                }).then(r => r.json()).then(data => {
                    if (data.success) fetchMessagesAction();
                });
            };

            document.getElementById('chatForm').addEventListener('submit', (e) => {
                e.preventDefault();
                const input = document.getElementById('messageInput');
                if (input.value.trim()) {
                    sendMessageAction(input.value.trim());
                    input.value = '';
                }
            });

            // Initial load and interval
            fetchMessagesAction();
            setInterval(fetchMessagesAction, 2000); // 2 sec polling
        }

        function scrollToBottom() {
            const chatMessages = document.getElementById('chatMessages');
            if (chatMessages) {
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }
        }
    </script>
</body>
</html>
