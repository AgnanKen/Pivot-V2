document.getElementById('sendMessage').addEventListener('click', function() {
    const messageInput = document.getElementById('messageInput');
    const chatBox = document.getElementById('chatBox');

    if (messageInput.value.trim() !== '') {
        const newMessage = document.createElement('div');
        newMessage.classList.add('message');
        newMessage.innerHTML = `
            <div class="message-content user">
                ${messageInput.value}
            </div>
        `;
        chatBox.appendChild(newMessage);
        messageInput.value = '';

        // Auto-scroll to the bottom
        chatBox.scrollTop = chatBox.scrollHeight;
    }
});

// Example to add a message from another user
function addOtherUserMessage(content) {
    const chatBox = document.getElementById('chatBox');
    const newMessage = document.createElement('div');
    newMessage.classList.add('message');
    newMessage.innerHTML = `
        <div class="message-content other">
            ${content}
        </div>
    `;
    chatBox.appendChild(newMessage);
    chatBox.scrollTop = chatBox.scrollHeight;
}

// Example usage
// setTimeout(() => addOtherUserMessage('Hello! How can I help you?'), 1000);
