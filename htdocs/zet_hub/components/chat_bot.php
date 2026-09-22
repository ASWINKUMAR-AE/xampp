<?php
$agent_name = "ZET HUB"; // Dynamic agent name
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>ZET HUB</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300;400;500&display=swap" rel="stylesheet">
  <link href="https://zavoloklom.github.io/material-design-iconic-font/css/docs.md-iconic-font.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <style>
    :root {
      --black-1: #0a0a0a;
      --black-2: #1a1a1a;
      --black-3: #2a2a2a;
      --white-1: #f0f0f0;
      --white-2: #e0e0e0;
      --white-3: #d0d0d0;
      --accent: #808080;
    }
    
    body {
      font-family: 'Roboto Mono', monospace;
      background-color: var(--black-1);
      color: var(--white-2);
    }
    
    /* CRT Scanline Effect */
    body::before {
      content: "";
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: 
        linear-gradient(
          rgba(18, 18, 18, 0) 50%, 
          rgba(0, 0, 0, 0.25) 50%
        ),
        linear-gradient(
          90deg,
          rgba(255, 0, 0, 0.06),
          rgba(0, 255, 0, 0.02),
          rgba(0, 0, 255, 0.06)
        );
      background-size: 100% 4px, 3px 100%;
      pointer-events: none;
      z-index: 1000;
      mix-blend-mode: overlay;
    }
    
    .fabs { 
      position: fixed; 
      bottom: 1em; 
      right: 1em; 
      z-index: 998; 
    }
    
    .fab {
      width: 56px; 
      height: 56px; 
      border-radius: 50%;
      text-align: center; 
      color: var(--white-1); 
      cursor: pointer;
      display: flex; 
      justify-content: center; 
      align-items: center;
      background: var(--black-3);
      box-shadow: 
        0 0 0 1px rgba(255,255,255,0.1),
        0 4px 20px rgba(0, 0, 0, 0.5);
      transition: all 0.3s ease;
    }
    
    .fab:hover {
      background: var(--black-2);
      box-shadow: 
        0 0 0 1px rgba(255,255,255,0.2),
        0 6px 25px rgba(0, 0, 0, 0.6);
    }
    
    .fab i { 
      font-size: 24px; 
      filter: drop-shadow(0 0 2px rgba(0,0,0,0.5));
    }
    
    .chat {
      position: fixed; 
      bottom: 80px; 
      right: 1em; 
      width: 90%; 
      max-width: 400px;
      border-radius: 12px; 
      overflow: hidden; 
      display: none;
      background-color: rgba(15, 15, 15, 0.95); 
      border: 1px solid rgba(255, 255, 255, 0.08);
      box-shadow: 
        0 10px 30px rgba(0, 0, 0, 0.5),
        inset 0 0 0 1px rgba(255,255,255,0.05);
      animation: slideIn 0.4s cubic-bezier(0.22, 1, 0.36, 1);
    }
    
    .chat_header {
      background: linear-gradient(to right, var(--black-1), var(--black-2));
      color: var(--white-1);
      padding: 12px 16px; 
      display: flex; 
      align-items: center; 
      gap: 12px;
      border-bottom: 1px solid rgba(255,255,255,0.05);
    }
    
    .chat-logo { 
      width: 32px; 
      height: 32px; 
      border-radius: 50%; 
      filter: grayscale(100%) contrast(120%);
      border: 1px solid rgba(255,255,255,0.1);
    }
    
    .chat_body {
      padding: 12px; 
      max-height: 300px; 
      overflow-y: auto;
      background: repeating-linear-gradient(
        var(--black-1),
        var(--black-1) 20px,
        var(--black-2) 1px,
        var(--black-2) 21px
      );
      scrollbar-width: thin;
      scrollbar-color: var(--accent) transparent;
    }
    
    .chat_body::-webkit-scrollbar {
      width: 4px;
    }
    
    .chat_body::-webkit-scrollbar-thumb {
      background-color: var(--accent);
      border-radius: 2px;
    }
    
    .chat_msg_item {
      margin-bottom: 12px; 
      padding: 12px 16px;
      border-radius: 18px;
      display: flex; 
      align-items: center; 
      gap: 12px;
      max-width: 80%;
      position: relative;
      animation: messageAppear 0.3s ease-out;
    }
    
    .chat_msg_item_admin {
      background: var(--black-3);
      border: 1px solid rgba(255,255,255,0.05);
      border-bottom-left-radius: 4px;
      margin-right: auto;
    }
    
    .chat_msg_item_user {
      background: var(--black-2);
      border: 1px solid rgba(255,255,255,0.1);
      border-bottom-right-radius: 4px;
      margin-left: auto;
      flex-direction: row-reverse;
    }
    
    .fab_field {
      display: flex; 
      padding: 12px; 
      gap: 12px;
      background: var(--black-1);
      border-top: 1px solid rgba(255,255,255,0.05);
    }
    
    .fab_field textarea {
      flex-grow: 1; 
      padding: 12px; 
      border-radius: 6px;
      border: 1px solid var(--black-3); 
      resize: none;
      background: var(--black-2);
      color: var(--white-2);
      font-family: 'Roboto Mono', monospace;
      font-size: 14px;
      transition: all 0.3s ease;
    }
    
    .fab_field textarea:focus {
      outline: none;
      border-color: var(--accent);
      box-shadow: 0 0 0 1px var(--accent);
    }
    
    @keyframes slideIn {
      from { 
        transform: translateY(20px); 
        opacity: 0; 
      }
      to { 
        transform: translateY(0); 
        opacity: 1; 
      }
    }
    
    @keyframes messageAppear {
      from { 
        transform: translateY(10px); 
        opacity: 0; 
      }
      to { 
        transform: translateY(0); 
        opacity: 1; 
      }
    }
    
    /* Terminal-like blinking cursor effect */
    .chat_header span:last-child::after {
      content: "|";
      animation: blink 1s step-end infinite;
      color: var(--accent);
      margin-left: 2px;
    }
    
    @keyframes blink {
      from, to { opacity: 1; }
      50% { opacity: 0; }
    }
    
    @media (max-width: 576px) {
      .chat { 
        width: 95%; 
        bottom: 70px; 
      }
    }
  </style>
</head>
<body>
<!-- Rest of your HTML remains exactly the same -->
<div class="fabs">
  <div class="chat">
    <div class="chat_header d-flex align-items-center" data-aos="fade-down">
      <img src="assets/img/logo1.png" alt="Logo" class="chat-logo">
      <div>
        <span id="chat_head"><?php echo $agent_name; ?></span><br>
        <span class="agent">Where <span style="color:var(--accent);">Innovation</span> Meets </span>
        <span class="online" style="color:var(--accent);">Excellence</span><span style="color:var(--white-1);">!</span>
      </div>
    </div>
    <div class="chat_body" id="chat_body">
      <div class="chat_msg_item chat_msg_item_admin">
        <img src="assets/img/logo1.png" alt="Logo" class="chat-logo" data-aos="fade-right">
        Hey there! How can I assist you today?
      </div>
    </div>
    <div class="fab_field">
      <textarea id="user_input" placeholder="Send a message" class="form-control"></textarea>
      <button class="fab" id="send_button"><i class="zmdi zmdi-mail-send"></i></button>
    </div>
  </div>
  <button id="prime" class="fab"><i class="zmdi zmdi-comment-outline"></i></button>
</div>

<!-- JavaScript remains exactly the same -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
// Your existing JavaScript code remains unchanged
AOS.init();

const chatBox = document.querySelector('.chat');
const fabBtn = document.querySelector('#prime');
const sendButton = document.querySelector('#send_button');
const userInput = document.querySelector('#user_input');
const chatBody = document.querySelector('#chat_body');

// Show/Hide chat box
fabBtn.addEventListener('click', () => {
  chatBox.style.display = chatBox.style.display === 'block' ? 'none' : 'block';
  const currentIcon = fabBtn.querySelector('i');
  currentIcon.classList.toggle('zmdi-comment-outline');
  currentIcon.classList.toggle('zmdi-close');
});

// Send message
sendButton.addEventListener('click', async () => {
  const userMessage = userInput.value.trim();
  if (!userMessage) return;
  displayMessage(userMessage, 'user');
  userInput.value = '';

  // Check for specific keyword about the company
  const lowerCaseMessage = userMessage.toLowerCase();

  // Respond about ZET HUB information
  if (lowerCaseMessage.includes("zet hub") || lowerCaseMessage.includes("zethub")) {
    const customReply = `ZET HUB is a leading provider of web and app development services. We specialize in creating modern, responsive websites and mobile applications tailored to client needs. With a focus on innovation and excellence, ZET HUB transforms ideas into digital solutions. 🚀`;
    displayMessage(customReply, 'admin');
    return;
  }

  // Check for CEO
  if (lowerCaseMessage.includes("ceo") || lowerCaseMessage.includes("who is the ceo")) {
    const ceoReply = "The CEO of ZET HUB is Loknaath.";
    displayMessage(ceoReply, 'admin');
    return;
  }

  // Check for Project Manager
  if (lowerCaseMessage.includes("project manager") || lowerCaseMessage.includes("who is the project manager")) {
    const pmReply = "The Project Managers at ZET HUB are Rathish and Venkatesan.";
    displayMessage(pmReply, 'admin');
    return;
  }

  // Check for Marketing Manager
  if (lowerCaseMessage.includes("marketing manager") || lowerCaseMessage.includes("who is the marketing manager")) {
    const marketingManagerReply = "The Marketing Manager at ZET HUB is Aswin.";
    displayMessage(marketingManagerReply, 'admin');
    return;
  }

  // Check for COO
  if (lowerCaseMessage.includes("coo") || lowerCaseMessage.includes("who is the cco")) {
    const cooReply = "The COO of ZET HUB is Prithi.";
    displayMessage(cooReply, 'admin');
    return;
  }

  try {
    const response = await fetch('https://openrouter.ai/api/v1/chat/completions', {
      method: 'POST',
      headers: {
        'Authorization': 'Bearer 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',
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
        model: 'gpt-3.5-turbo',
        messages: [{ role: 'user', content: userMessage }],
        max_tokens: 100
      })
    });

    const data = await response.json();
    const botReply = data.choices?.[0]?.message?.content || "Sorry, something went wrong.";
    displayMessage(botReply, 'admin');
  } catch (error) {
    displayMessage("Error contacting AI server.", 'admin');
    console.error(error);
  }
});

function displayMessage(message, sender) {
  const messageDiv = document.createElement('div');
  messageDiv.classList.add('chat_msg_item', sender === 'admin' ? 'chat_msg_item_admin' : 'chat_msg_item_user');

  if (sender === 'admin') {
    const logoImg = document.createElement('img');
    logoImg.src = 'assets/img/logo1.png';
    logoImg.alt = 'Logo';
    logoImg.classList.add('chat-logo');
    messageDiv.appendChild(logoImg);
  }

  const messageText = document.createElement('span');
  messageText.textContent = message;
  messageDiv.appendChild(messageText);

  chatBody.appendChild(messageDiv);
  chatBody.scrollTop = chatBody.scrollHeight;
}
</script>
</body>
</html>