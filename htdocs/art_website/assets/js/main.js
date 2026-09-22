/**
 * Main JS for Art Marketplace Enhancements
 * Handlers for Instagram-style Likes and Real-time Chat
 */

document.addEventListener('DOMContentLoaded', () => {
    // 1. LIKE SYSTEM: Instagram Style
    initLikeSystem();

    // 2. CHAT SYSTEM: Real-time Polling
    if (document.getElementById('chatMessages')) {
        initChatSystem();
    }
});

function initLikeSystem() {
    const artworkCards = document.querySelectorAll('.artwork-card');

    artworkCards.forEach(card => {
        const img = card.querySelector('.artwork-img');
        const heartBtn = card.querySelector('.like-btn');
        const heartIcon = heartBtn.querySelector('i');
        const likeCountElem = card.querySelector('.like-count');
        const artworkId = card.dataset.artworkId;

        // Double Click to Like
        img.addEventListener('dblclick', () => {
            toggleLike(artworkId, card);
            showLikeAnimation(card);
        });

        // Click Heart Icon to Like/Unlike
        heartBtn.addEventListener('click', () => {
            toggleLike(artworkId, card);
        });
    });
}

function toggleLike(artworkId, card) {
    fetch('../api/like.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ artwork_id: artworkId })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const heartIcon = card.querySelector('.like-btn i');
            const likeCountElem = card.querySelector('.like-count');
            
            if (data.action === 'liked') {
                heartIcon.classList.remove('fa-regular', 'fa-heart');
                heartIcon.classList.add('fa-solid', 'fa-heart', 'text-danger', 'animate-pulse');
            } else {
                heartIcon.classList.remove('fa-solid', 'fa-heart', 'text-danger');
                heartIcon.classList.add('fa-regular', 'fa-heart');
            }
            
            // Smoothly update count
            likeCountElem.textContent = data.new_count;
        } else {
            console.error(data.message);
            // Optional: Show toast or alert if not logged in
            if (data.message.includes('login')) {
                window.location.href = '../auth/login.php';
            }
        }
    })
    .catch(error => console.error('Error:', error));
}

function showLikeAnimation(card) {
    const overlay = document.createElement('div');
    overlay.className = 'like-animation-heart';
    overlay.innerHTML = '<i class="fa-solid fa-heart"></i>';
    card.querySelector('.artwork-img-container').appendChild(overlay);
    
    setTimeout(() => {
        overlay.remove();
    }, 1000);
}

/**
 * Chat System Implementation
 */
function initChatSystem() {
    const chatForm = document.getElementById('chatForm');
    const messageInput = document.getElementById('messageInput');
    const chatMessages = document.getElementById('chatMessages');
    const convId = chatForm.dataset.convId;

    // Polling every 3 seconds
    setInterval(() => {
        fetchMessages(convId);
    }, 3000);

    chatForm.addEventListener('submit', (e) => {
        e.preventDefault();
        sendMessage(convId, messageInput.value);
        messageInput.value = '';
    });

    // Auto-scroll to bottom
    scrollToBottom();
}

function fetchMessages(convId) {
    // Implementation in api/fetch_messages.php
}

function sendMessage(convId, message) {
    // Implementation in api/send_message.php
}

function scrollToBottom() {
    const chatMessages = document.getElementById('chatMessages');
    if (chatMessages) {
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
}
