let url = window.location.href;

let serverUrl = window.location.protocol + "//" + window.location.hostname + ":" + window.location.port;

if (url.indexOf("login") != -1) {
    function checkLogin() {

        let logUsername = document.getElementById("logUsername").value;
        let logPassword = document.getElementById("logPassword").value;

        if (logUsername == "") {
            document.getElementById("logUsernameError").textContent = "Must fill username";
            return false;
        } else {
            document.getElementById("logUsernameError").textContent = "";
        }

        if (logPassword == "") {
            document.getElementById("logPasswordError").textContent = "Must fill password";
            return false;
        } else {
            document.getElementById("logPasswordError").textContent = "";
        }
    }
}
