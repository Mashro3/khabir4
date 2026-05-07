// التنقل بين الأقسام
document.querySelectorAll('[data-section]').forEach(btn => {
  btn.addEventListener('click', e => {
    e.preventDefault();
    const target = btn.getAttribute('data-section');

    document.querySelectorAll('.page-section').forEach(sec => {
      sec.classList.remove('active');
    });

    document.getElementById(target).classList.add('active');
  });
});

// إرسال رسالة في الشات (لاحقاً نربطه بالـ API)
document.getElementById('chat-form').addEventListener('submit', e => {
  e.preventDefault();
  const input = document.getElementById('chat-input');
  const msg = input.value.trim();
  if (!msg) return;

  const messages = document.getElementById('messages');
  const bubble = document.createElement('div');
  bubble.className = 'msg user';
  bubble.textContent = msg;
  messages.appendChild(bubble);

  input.value = "";
});
