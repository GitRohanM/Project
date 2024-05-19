document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const confirmationMessage = document.getElementById('confirmationMessage');
    confirmationMessage.textContent = 'Your message has been sent!';
    confirmationMessage.style.display = 'block';

    // Reset the form after displaying the confirmation message
    document.getElementById('contactForm').reset();
});