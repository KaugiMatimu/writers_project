const chatbotToggle = document.querySelector('.chatbot__button');
const sendChatBtn = document.querySelector('.chatbot__input-box span');
const chatInput = document.querySelector('.chatbot__textarea');
const chatBox = document.querySelector('.chatbot__box');
const chatbotCloseBtn = document.querySelector('.chatbot__header span');

let userMessage;
const inputInitHeight = chatInput.scrollHeight;

const createChatLi = (message, className) => {
  const chatLi = document.createElement('li');
  chatLi.classList.add('chatbot__chat', className);
  let chatContent = className === 'outgoing'
      ? `<p></p>`
      : `<span class="material-symbols-outlined">smart_toy</span> <p></p>`;
  chatLi.innerHTML = chatContent;
  chatLi.querySelector('p').textContent = message;
  return chatLi;
};

const handleChat = () => {
  userMessage = chatInput.value.trim();
  if (!userMessage) return;
  chatInput.value = '';
  chatInput.style.height = `${inputInitHeight}px`;

  chatBox.appendChild(createChatLi(userMessage, 'outgoing'));
  chatBox.scrollTo(0, chatBox.scrollHeight);

  $.post('send_message.php', { message: userMessage }, function() {
    fetchMessages();
  });
};

const fetchMessages = () => {
  $.get('fetch_messages.php', function(data) {
    chatBox.innerHTML = '';
    const messages = JSON.parse(data);
    messages.forEach(msg => {
      const className = msg.is_admin ? 'incoming' : 'outgoing';
      const message = msg.is_admin ? msg.admin_name + ': ' + msg.message : msg.user_name + ': ' + msg.message;
      chatBox.appendChild(createChatLi(message, className));
    });
    chatBox.scrollTo(0, chatBox.scrollHeight);
  });
};

chatInput.addEventListener('input', () => {
  chatInput.style.height = `${inputInitHeight}px`;
  chatInput.style.height = `${chatInput.scrollHeight}px`;
});

chatInput.addEventListener('keydown', (e) => {
  if (e.key === 'Enter' && !e.shiftKey && window.innerWidth > 800) {
    e.preventDefault();
    handleChat();
  }
});

chatbotToggle.addEventListener('click', () => 
  document.body.classList.toggle('show-chatbot')
);

chatbotCloseBtn.addEventListener('click', () => 
  document.body.classList.remove('show-chatbot')
);

sendChatBtn.addEventListener('click', handleChat);

setInterval(fetchMessages, 10000); // Fetch messages every 3 seconds
