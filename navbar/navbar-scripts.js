// [1] // ----- DROPDOWN MENU FOR NAVBAR ----- ////

// [1.1] - this eventListener will check whether the dropdown menu is opened by detecting clicks on headers //
const headerContainer = document.getElementById('header-theme');

headerContainer.addEventListener('click', e => {
    const isDropdownButton = e.target.matches("[data-dropdown-button]")
    if (!isDropdownButton && e.target.closest('[data-dropdown]') != null) return

    let currentDropdown
    if (isDropdownButton) {
        currentDropdown = e.target.closest('[data-dropdown]')
        currentDropdown.classList.toggle('active')
    }

    document.querySelectorAll("[data-dropdown].active").forEach(dropdown => {
        if (dropdown === currentDropdown) return
        dropdown.classList.remove('active')
    })
    console.log("click once!");
})


// [2] - Toggle Light Theme and Dark Theme (instant)
function isChecked() {
    if (document.getElementById("header-toggle-theme-checkbox-id").checked) {
        console.log("dark-theme");
        document.getElementById("themeF").setAttribute('href', '../../../Learnifly/navbar/navbar-dark.css')
    } else {
        console.log("light-theme");
        document.getElementById("themeF").setAttribute('href', '../../../Learnifly/navbar/navbar-light.css')
    }
}


// [3] - LOCALSTORAGE to remember theme preference (reload then apply)

// [3.1] - get the storage value (theme) from localStorage, if it exists //
const checkbox = document.getElementById('header-toggle-theme-checkbox-id');
const storedValue = localStorage.getItem('header-toggle-theme-checkbox-id'); //get the localstorage value

// [3.2] - If a stored value exists, use it to set the checkbox to true (dark-theme) //
if (storedValue === "true") {
    checkbox.checked = true;
    document.getElementById("theme").setAttribute('href', '../../../Learnifly/navbar/navbar-dark.css')
    document.getElementById("themeF").setAttribute('href', '../../../Learnifly/navbar/navbar-dark.css')
}

// [3.3] - this eventListener will check whether the checkbox is toggled //
checkbox.addEventListener('change', function() {
    localStorage.setItem("header-toggle-theme-checkbox-id", checkbox.checked); //set the localstorage value
    console.log(localStorage.getItem("header-toggle-theme-checkbox-id"));
});
