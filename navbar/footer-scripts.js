// [3] - LIGHT/DARK THEME ACTIVATOR //

// toggle light/dark theme (footer)
function isChecked() {
    if (document.getElementById("header-toggle-theme-checkbox-id").checked) {
        console.log("dark-theme");
        document.getElementById("themeF").setAttribute('href', '../../../Learnifly/navbar/navbar-dark.css')
    } else {
        console.log("light-theme");
        document.getElementById("themeF").setAttribute('href', '../../../Learnifly/navbar/navbar-light.css')
    }
}

// the context: I separate this .js from the "navbar-scripts.js" because it conflicted with the eventListener() inside THAT .js file
// the conflict: when I click ONCE on homepage.php, it registers as TWO clicks due to <footer> and <header> both logging "click!" into console each
// the problem: this DOUBLE-CLICK resulted in my downdrop menu malfunctioning cuz it would open, and immediately closeback (click once to open, once more to close)
// the solution: separate "footer-scripts.js" and "navbar-scripts.js" into two seperate files (FIXED!)