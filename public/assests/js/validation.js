document.addEventListener("DOMContentLoaded", function() {
    
    // --- 1. LOGIN VALIDATION ---
    const loginForm = document.getElementById("loginForm");
    if (loginForm) {
        loginForm.addEventListener("submit", function(e) {
            let isValid = true;
            const email = document.getElementById("email");
            const password = document.getElementById("password");
            const errorDiv = document.getElementById("loginError");

            errorDiv.innerHTML = ""; // Clear previous errors

            // Simple Email Regex
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailPattern.test(email.value)) {
                showError(email, "Please enter a valid email address.");
                isValid = false;
            }

            if (password.value.trim() === "") {
                showError(password, "Password cannot be empty.");
                isValid = false;
            }

            if (!isValid) {
                e.preventDefault(); // Stop form submission
                errorDiv.innerText = "Please fix the errors above.";
            }
        });
    }

    // --- 2. REGISTER VALIDATION ---
    const registerForm = document.getElementById("registerForm");
    if (registerForm) {
        registerForm.addEventListener("submit", function(e) {
            let isValid = true;
            const username = document.getElementById("username");
            const email = document.getElementById("email");
            const password = document.getElementById("password");
            const confirmPass = document.getElementById("confirm_password");
            const errorDiv = document.getElementById("registerError");

            errorDiv.innerHTML = ""; // Clear errors

            // Username check (min 3 chars)
            if (username.value.length < 3) {
                showError(username, "Username must be at least 3 characters.");
                isValid = false;
            }

            // Email check
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email.value)) {
                showError(email, "Invalid email format.");
                isValid = false;
            }

            // Password check (min 6 chars, 1 number)
            if (password.value.length < 6 || !/\d/.test(password.value)) {
                showError(password, "Password must be 6+ chars and include a number.");
                isValid = false;
            }

            // Confirm Password check
            if (password.value !== confirmPass.value) {
                showError(confirmPass, "Passwords do not match.");
                isValid = false;
            }

            if (!isValid) {
                e.preventDefault();
                errorDiv.innerText = "Please correct the form errors.";
            }
        });
    }

    // Helper to show red border and message
    function showError(input, message) {
        input.style.borderColor = "red";
        // Create a small error message below the input
        let small = document.createElement("small");
        small.innerText = message;
        small.style.color = "red";
        input.parentNode.insertBefore(small, input.nextSibling);
        
        // Remove error when user types again
        input.addEventListener('input', function() {
            input.style.borderColor = "";
            small.remove();
        }, {once: true});
    }
});