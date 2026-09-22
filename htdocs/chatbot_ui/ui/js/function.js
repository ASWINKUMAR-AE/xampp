const apiUrl = 'data_fetch/fetch_questions.php'; // Backend URL
const userDetailsUrl = 'data_proccessing/store_user_details.php'; // URL to store user details
const CHAT_HISTORY_KEY = 'chat_history'; // Local storage key for chat history
let chatInitialized = false; // To avoid repeated greetings
let userDetailsCollected = false; // To check if user details are collected

// Initialize chat
function initChat() {
    const chatBody = document.getElementById("chatBody");

    if (userDetailsCollected) {
        chatBody.innerHTML = localStorage.getItem(CHAT_HISTORY_KEY) || ''; // Restore chat history if available
        fetchQuestions(); // Fetch initial questions
    } else {
        chatBody.innerHTML = ''; // Clear previous content

        // Display a greeting message only once
        if (!chatInitialized) {
            const greetingDiv = document.createElement("div");
            greetingDiv.className = "chat-msg bot";

            const img = document.createElement('img');
            img.src = 'img/dp.jpg'; // Specify the path to your image
            img.className = 'answer-image';
            img.style.width = '30px'; // Make image small
            img.style.height = 'auto'; // Maintain aspect ratio
            img.style.float = 'left'; // Ensure image is on the left side
            img.style.margin = '15px';
            img.style.borderRadius = '50%'; // Make image rounded corner

            const text = document.createElement("span");
            text.textContent = "Hello! Please provide your details to get started.";

            greetingDiv.appendChild(img);
            greetingDiv.appendChild(text);
            chatBody.appendChild(greetingDiv);
            chatInitialized = true;

            // Show user details form
            document.getElementById('userDetailsForm').style.display = 'block';
        }

        chatBody.scrollTop = chatBody.scrollHeight;
    }
}

// Handle user details submission
document.getElementById('chatForm').addEventListener('submit', function (e) {
    e.preventDefault();
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const mobile = document.getElementById('mobile').value.trim();

    if (name && email && mobile) {
        // Store user details in the database
        fetch(userDetailsUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ name, email, mobile })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                userDetailsCollected = true;
                document.getElementById('userDetailsForm').style.display = 'none'; // Hide the form
                
                // Save user details in local storage
                localStorage.setItem('userDetails', JSON.stringify({ name, email, mobile }));

                fetchQuestions(); // Fetch initial questions

                // Display a welcome message
                displayMessage('bot', `Thank you, ${name}! How can I assist you today?`);
            } else {
                displayMessage('bot', 'Failed to collect user details. Please try again.');
            }
        })
        .catch(error => {
            displayMessage('bot', `Failed to collect user details: ${error.message}`);
        });
    } else {
        displayMessage('bot', 'Please fill in all the fields.');
    }
});

// Check if user details are already saved in local storage
document.addEventListener('DOMContentLoaded', function () {
    const userDetails = JSON.parse(localStorage.getItem('userDetails'));
    if (userDetails) {
        userDetailsCollected = true;
        displayMessage('bot', `Welcome back, ${userDetails.name}! How can I assist you today?`);
        initChat(); // Initialize chat without asking for details
    } else {
        // Initialize chat and ask for details if not found
        initChat();
    }
});


// Fetch questions based on the parent question ID
function fetchQuestions(parentQuestionId = null) {
    fetch(apiUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ parent_question_id: parentQuestionId })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            displayQuestions(data.questions);
        } else {
            displayMessage('bot', data.message || 'No questions available.');
        }
    })
    .catch(error => {
        displayMessage('bot', `Failed to fetch questions: ${error.message}`);
    });
}

// Fetch answer and related questions for a selected question
function fetchAnswer(questionId) {
    const chatBody = document.getElementById("chatBody");

    // Show loading animation
    const loadingDiv = document.createElement("div");
    loadingDiv.className = "chat-msg bot";
    loadingDiv.innerHTML = '<div class="loader"></div>Loading...';
    chatBody.appendChild(loadingDiv);
    chatBody.scrollTop = chatBody.scrollHeight;

    fetch(apiUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ question_id: questionId })
    })
    .then(response => response.json())
    .then(data => {
        // Remove loading animation
        chatBody.removeChild(loadingDiv);

        if (data.success) {
            displayAnswer(data.questions[0].answer_text, data.related_questions || []);
        } else {
            displayMessage('bot', data.message || 'No answer found.');
        }
    })
    .catch(error => {
        // Remove loading animation
        chatBody.removeChild(loadingDiv);
        displayMessage('bot', `An error occurred: ${error.message}`);
    });
}

// Display the answer and related questions in the chat
function displayAnswer(answer, relatedQuestions) {
    const chatBody = document.getElementById('chatBody');

    // Display the answer on the left side
    const answerDiv = document.createElement('div');
    answerDiv.className = 'chat-msg bot';

    const img = document.createElement('img');
    img.src = 'img/dp.jpg'; // Specify the path to your image
    img.className = 'answer-image';
    img.style.width = '30px'; // Make image small
    img.style.height = 'auto'; // Maintain aspect ratio
    img.style.float = 'left'; // Ensure image is on the left side
    img.style.margin = '15px';
    img.style.borderRadius = '50%'; // Make image rounded corner

    answerDiv.appendChild(img);

    const text = document.createElement('span');
    
    // Create typing animation effect
    let index = 0;
    function typeEffect() {
        if (index < answer.length) {
            text.textContent += answer.charAt(index);
            index++;
            setTimeout(typeEffect, 20); // Adjust typing speed as needed
        }
    }
    typeEffect();

    answerDiv.appendChild(text);
    chatBody.appendChild(answerDiv);

    // Display related questions as buttons
    if (relatedQuestions && relatedQuestions.length > 0) {
        const relatedQuestionsDiv = document.createElement('div');
        relatedQuestionsDiv.style.display = 'flex';
        relatedQuestionsDiv.style.flexWrap = 'wrap';
        relatedQuestionsDiv.style.justifyContent = 'space-between';

        relatedQuestions.forEach(question => {
            const questionBtn = document.createElement('button');
            questionBtn.className = 'btn btn-outline-secondary chat-question btn-block';
            questionBtn.style.float = 'left';

            const questionText = document.createElement('span');
            const text = question.question_text;
            if (text.length > 20) {
                const words = text.split(' ');
                let line = '';
                words.forEach(word => {
                    if ((line + word).length < 20) {
                        line += word + ' ';
                    } else {
                        questionText.textContent += line + '\n';
                        line = word + ' ';
                    }
                });
                questionText.textContent += line;
            } else {
                questionText.textContent = text;
            }
            questionBtn.appendChild(questionText);
            questionBtn.onclick = () => {
                displayMessage('self', question.question_text); // Display the clicked question on the right
                fetchAnswer(question.id);
            };
            relatedQuestionsDiv.appendChild(questionBtn);
        });

        chatBody.appendChild(relatedQuestionsDiv);
    }

    chatBody.scrollTop = chatBody.scrollHeight;
}

// Display a message in the chat
function displayMessage(type, message) {
    const chatBody = document.getElementById("chatBody");
    const msgDiv = document.createElement("div");
    msgDiv.className = `chat-msg ${type}`;
    msgDiv.textContent = message;
    chatBody.appendChild(msgDiv);
    chatBody.scrollTop = chatBody.scrollHeight;
    saveChatHistory(); // Save chat history after each message
}

// Display questions as buttons in the chat
function displayQuestions(questions) {
    const chatBody = document.getElementById('chatBody');

    const questionDiv = document.createElement('div');
    questionDiv.className = 'qnsdiv'; // Add margin-top 100% class

    questions.forEach(question => {
        const questionBtn = document.createElement('button');
        questionBtn.className = 'btn btn-success btn-block chat-question';
        questionBtn.style.borderRadius = '20px';
        questionBtn.style.textAlign = 'center';
        questionBtn.style.background = 'rgb(2,0,36)';
        questionBtn.textContent = question.question_text;
        questionBtn.onclick = () => {
            displayMessage('self', question.question_text); // Display the clicked question on the right
            fetchAnswer(question.id);
        };
        questionDiv.appendChild(questionBtn);
    });

    chatBody.appendChild(questionDiv);
    chatBody.scrollTop = chatBody.scrollHeight;
}

// Save chat history to local storage
function saveChatHistory() {
    const chatBody = document.getElementById('chatBody');
    localStorage.setItem(CHAT_HISTORY_KEY, chatBody.innerHTML);
}

// Handle user message submission
document.getElementById('chatForm').addEventListener('submit', function (e) {
    e.preventDefault();
    const chatInput = document.getElementById('chat-input');
    const userMessage = chatInput.value.trim();

    if (userMessage) {
        displayMessage('self', userMessage);
        chatInput.value = '';

        // Fetch dynamic bot response based on user input
        fetchAnswer(null, userMessage);
    }
});

// Toggle the chatbox
document.getElementById("chat-circle").addEventListener("click", function () {
    toggleChatBox();
});

document.querySelector(".chat-box-toggle").addEventListener("click", function () {
    toggleChatBox();
});

function toggleChatBox() {
    const chatCircle = document.getElementById("chat-circle");
    const chatBox = document.querySelector(".chat-box");

    if (chatBox.classList.contains("scale")) {
        chatBox.classList.remove("scale");
        chatCircle.style.display = "block";
    } else {
        chatBox.classList.add("scale");
        chatCircle.style.display = "none";
        if (!chatInitialized) {
            questionDiv.remove();
            initChat(); // Initialize chat when opening
        } else {
            // Clear any existing question buttons
            const questionDiv = document.querySelector(".qnsdiv");
            if (questionDiv) {
                questionDiv.remove();
            }
            questionDiv.remove();
            initChat(); // Initialize chat again
        }
    }
}


// // Clear chat history on page reload
// window.addEventListener('beforeunload', function () {
//     localStorage.removeItem(CHAT_HISTORY_KEY);
// });
