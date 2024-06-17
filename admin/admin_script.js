$(document).ready(function() {
    const chatBox = $('.chatbot__box');

    const fetchMessages = () => {
        $.ajax({
            url: 'admin_chat.php',
            method: 'GET',
            success: function(data) {
                const messages = JSON.parse(data);
                chatBox.empty();
                messages.forEach(msg => {
                    const className = msg.is_admin ? 'outgoing' : 'incoming';
                    chatBox.append(createChatLi(msg.message, className, msg.username));
                });
                chatBox.scrollTop(chatBox[0].scrollHeight);
            }
        });
    };

    const sendMessage = (message) => {
        $.ajax({
            url: 'admin_chat.php',
            method: 'POST',
            data: { message },
            success: function(response) {
                if (JSON.parse(response).status === 'success') {
                    fetchMessages();
                }
            }
        });
    };

    const createChatLi = (message, className, username) => {
        const chatLi = $('<li>').addClass(`chatbot__chat ${className}`);
        chatLi.html(`<span class="username">${username}</span><p>${message}</p>`);
        return chatLi;
    };

    $('#send-btn').click(() => {
        const message = $('.chatbot__textarea').val().trim();
        if (message) {
            sendMessage(message);
            $('.chatbot__textarea').val('');
        }
    });

    $('.chatbot__textarea').keydown(function(e) {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            $('#send-btn').click();
        }
    });

    setInterval(fetchMessages, 3000); // Polling every 3 seconds
    fetchMessages();
});
