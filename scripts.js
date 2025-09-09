document.addEventListener('DOMContentLoaded', () => {
    const signupForm = document.getElementById('signupForm');
    const loginForm = document.getElementById('loginForm');
    const logoutButton = document.getElementById('logoutButton');
    const userProfile = document.getElementById('userProfile');

    if (signupForm) {
        signupForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const formData = new FormData(signupForm);
            fetch('php/signup.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
                if (data === "Signup successful") {
                    window.location.href = 'indextwo.html';
                }
            })
            .catch(error => console.error('Error:', error));
        });
    }

    if (loginForm) {
        loginForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const formData = new FormData(loginForm);
            fetch('php/login.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = 'profile.html';
                } else {
                    alert('Invalid email or password');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    }

    if (logoutButton) {
        logoutButton.addEventListener('click', () => {
            fetch('php/authenticate.php?action=logout')
            .then(() => {
                window.location.href = 'index.html';
            })
            .catch(error => console.error('Error:', error));
        });
    }

    if (userProfile) {
        fetch('php/profile.php')
        .then(response => response.json())
        .then(data => {
            if (data.loggedIn) {
                userProfile.innerHTML = `<p>Welcome, ${data.username}!</p><p>Email: ${data.email}</p>`;
            } else {
                window.location.href = 'index.html';
            }
        })
        .catch(error => console.error('Error:', error));
    }
});
