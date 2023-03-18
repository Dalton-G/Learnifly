const errorMsg = document.querySelector(".error-msg");
const assignmentForm = document.querySelector(".form");
const roleSelection = document.querySelector("#role");
const classSelection = document.querySelector("#className");
const submitBtn = document.querySelector(".create-btn");


assignmentForm.addEventListener("submit", (e) => {
    e.preventDefault();
});

// Process login inputs on submission
submitBtn.addEventListener("click", () => {
    let xhr = new XMLHttpRequest();

    xhr.open("POST", "./ajax/createAssignmentAjax.php", true);

    xhr.addEventListener("load", () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                console.log(data);
                if (data === "<p>Assignment Uploaded Successfully! <i class='fa-solid fa-square-check'></i></p>") {
                    errorMsg.innerHTML = data;
                    errorMsg.style.backgroundColor = "#8bfc8744";
                    errorMsg.style.color = "#4c7448";

                    setTimeout(() => {
                        location.href = "./createAssignment.php";
                    }, 2000);
                } else {
                    // Output appropriate error message
                    errorMsg.innerHTML = data;
                }
                errorMsg.style.display = "block";
            }
        }
    });

    let formData = new FormData(assignmentForm);
    xhr.send(formData);
});
