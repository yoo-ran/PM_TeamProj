const checkout = () => {
    document.querySelector(".checkout").style.display = "block"
    window.scrollTo(0,0);
    document.querySelector(".bg").style.height = `${document.documentElement.scrollHeight}px`
}

const disappear = () => {
    document.querySelector(".checkout").style.display = "none"
    document.querySelector(".bg").style.display = "none"

}


// Function to check session storage and update welcome message
function updateWelcomeMessage() {
    const welcomeMessageElement = document.getElementById('welcome-message');
    const username = sessionStorage.getItem('username');

    sessionStorage.setItem('username', 'TestUser');
console.log(sessionStorage.getItem('username')); // Should output 'TestUser'
    
    if (username) {
        welcomeMessageElement.textContent = `Welcome, ${username}!`;
    }
}

// Call the function on page load
window.onload = updateWelcomeMessage;