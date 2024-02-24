var messageDiv = document.getElementById('message');

setTimeout(function() {
    if (messageDiv) {
        messageDiv.style.opacity = '0'; 
        messageDiv.style.transition = 'opacity 1s ease';
        setTimeout(function() {
            messageDiv.remove();
        }, 1000);
    }
}, 1500);