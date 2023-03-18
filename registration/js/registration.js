const errorMsg = document.querySelector(".error-msg");
const loginForm = document.querySelector(".form");
const passwordInput = document.querySelector("#password");
const passwordGenerateIcon = document.querySelector(".pass-generate-icon");
const roleSelection = document.querySelector("#role");
const classSelection = document.querySelector("#className");
const submitBtn = document.querySelector(".create-btn");

// Generate random password
passwordGenerateIcon.addEventListener("click", () => {
    // Generate 10 random character string
    const charset =
        "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    let result = "";
    for (let i = 0; i < 15; i++) {
        result += charset.charAt(Math.floor(Math.random() * charset.length));
    }
    // Set password value with random string
    passwordInput.value = result;
});

// Disable class option for lecturers
roleSelection.addEventListener("change", function () {
    if (roleSelection.value === "lecturer") {
        classSelection.disabled = true;
    } else {
        classSelection.disabled = false;
    }
});

loginForm.addEventListener("submit", (e) => {
    e.preventDefault();
});

// Process login inputs on submission
submitBtn.addEventListener("click", () => {
    let xhr = new XMLHttpRequest();

    xhr.open("POST", "./includes/ajax/registrationAjax.php", true);

    xhr.addEventListener("load", () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                console.log(data);

                if (
                    data ==
                    "<p>Registration Success! <i class='fa-solid fa-square-check'></i></p>"
                ) {
                    errorMsg.innerHTML = data;
                    errorMsg.style.backgroundColor = "#8bfc8744";
                    errorMsg.style.color = "#4c7448";

                    setTimeout(() => {
                        location.href = "./registration.php";
                    }, 2000);
                } else {
                    // Output appropriate error message
                    errorMsg.innerHTML = data;
                }
                errorMsg.style.display = "block";
            }
        }
    });

    let formData = new FormData(loginForm);
    xhr.send(formData);
});
