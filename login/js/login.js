const errorMsg = document.querySelector(".error-msg");
const passwordInput = document.querySelector("input[type = 'password']");
const passwordIcon = document.querySelector(".icon");
const coverImage = document.querySelector(".right-side.cover-img img");
const testimonyMsg = document.querySelector(".right-side .testimony-div p")
const loginForm = document.querySelector("form")
const submitBtn = document.querySelector(".credentials button[name='loginBtn']");

const testimonials = [
    "Learnifly has revolutionized my teaching. It's easy to use and helps me focus on my students. </br> - Sarah Johnson, Lecturer",

    "I can now track my students' progress and give personalized feedback, all thanks to Learnifly. </br> - David Brown, Lecturer",

    "I never thought online learning could be this engaging, but Learnifly has proven me wrong! </br> - Rachel Lee, Student",

    "Thanks to Learnifly, I'm able to continue my education whenever and wherever I want. </br> - Emily Sue, Student",

    "With Learnifly, I can now easily communicate with my students and keep them informed about class updates. </br> - Maria Gonzalez, Lecturer"
];

loginForm.addEventListener("submit", (e)=> {
    e.preventDefault();
})

// Generate random image on load
window.addEventListener("load", () => {
    const randNum = Math.floor(Math.random() * 5) + 1;
    const imageFile = `images/loginCover-${randNum}.avif`;
    coverImage.src = imageFile;
    testimonyMsg.innerHTML = testimonials[randNum - 1];
})

// Toggle password icon on click
passwordIcon.addEventListener("click", () => {
    passwordIcon.classList.toggle("active");
    if (passwordInput.type == "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
});

// Process login inputs on submission
submitBtn.addEventListener("click", ()=>{
    let xhr = new XMLHttpRequest();

    xhr.open("POST", "./includes/ajax/loginAjax.php", true);

    xhr.addEventListener("load", ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;

                // Convert to response to array
                const responseArray = data.split("||");
                // Identify status message and user role
                const statusMessage = responseArray[0]; 
                const userRole = responseArray[1]; 

                if (statusMessage ==  "<p>Login Success! <i class='fas fa-check'></i></p>") {
                    errorMsg.innerHTML = responseArray[0];
                    errorMsg.style.backgroundColor = "#8bfc8744"
                    errorMsg.style.color = "#4c7448"
                    // Redirect user to homepage if login success
                    setTimeout(()=> {
                        // Admin homepage if user is admin
                        if (userRole === "admin") {
                            location.href = "../homepage/homepage_admin.php";
                        } else {
                            // Otherwise to normal homepage
                            location.href = "../homepage/homepage.php"
                        }
                    }, 700)

                } else {
                    // Output appropriate error message 
                    errorMsg.innerHTML = data;
                }
                errorMsg.style.display = "block";
            }
        }
    })

    let formData = new FormData(loginForm);
    xhr.send(formData);
})
