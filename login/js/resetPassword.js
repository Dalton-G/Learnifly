const errorMsg = document.querySelector(".error-msg");
const passwordInput = document.querySelector("input[name = 'password']");
const cPasswordInput = document.querySelector("input[name = 'cPassword']");
const passwordIcon = document.querySelector(".icon");
const cPasswordIcon = document.querySelector(".cpassword-icon");
const coverImage = document.querySelector(".left-side.cover-img img");
const testimonyMsg = document.querySelector(".left-side .testimony-div p")
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


window.addEventListener("load", () => {
    const randNum = Math.floor(Math.random() * 5) + 1;
    const imageFile = `images/loginCover-${randNum}.avif`;
    coverImage.src = imageFile;
    testimonyMsg.innerHTML = testimonials[randNum - 1];
})

passwordIcon.addEventListener("click", () => {
    passwordIcon.classList.toggle("active");
    if (passwordInput.type == "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
});

cPasswordIcon.addEventListener("click", () => {
    cPasswordIcon.classList.toggle("active");
    if (cPasswordInput.type == "password") {
        cPasswordInput.type = "text";
    } else {
        cPasswordInput.type = "password";
    }
});


submitBtn.addEventListener("click", ()=>{
    let xhr = new XMLHttpRequest();

    xhr.open("POST", "./includes/ajax/resetPasswordAjax.php", true);

    xhr.addEventListener("load", ()=> {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                if (data ==  "<p>Password Reset Success! <i class='fas fa-check'></i></p>") {
                    errorMsg.innerHTML = data;
                    errorMsg.style.backgroundColor = "#8bfc8744"
                    errorMsg.style.color = "#4c7448"
                    setTimeout(()=> {
                        location.href = "./login.php"
                    }, 700)
                } else {
                    errorMsg.innerHTML = data;
                }
                errorMsg.style.display = "block"; // Set message to visible
            }
        }
    })

    let formData = new FormData(loginForm);
    xhr.send(formData);
})
