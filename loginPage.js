/*
 * This file list the functions which are used in Login Page!!!
 */
function checkEmpty() {
    var userName = document.forms["loginForm"]["userName"].value;
    var password = document.forms["loginForm"]["password"].value;
    var errorMessage = "";
    if (userName == "" && password != "") {
        errorMessage = "*Please enter your user name*";
    } else if (userName != "" && password == "") {
        errorMessage = "*Please enter your password*";
    } else if (userName == "" && password == "") {
        errorMessage = "*Please enter your user name & password*";
    }

    if (errorMessage != "") {
        document.getElementById('errorMessage').innerHTML = errorMessage;
        return false;
    } else {
        document.getElementById('errorMessage').innerHTML = "";
        return true;
    }
}

function checkFormat() {
    if (checkEmpty()) {
        var uname = document.getElementById('userName').value;
        var psw = document.getElementById('password').value;
        $.post("validation.php", {
            userName: uname,
            password: psw
        },
        function (data) {
            if (data === "CorrectUserName&Password") {
                window.location = 'mainPage.php';
            } else if (data === "*Your account has not logged out last time*") {
                forceLogout(uname);
            } else if (data === "*Your password is incorrect*") {
                document.forms["loginForm"]["password"].value = "";
                document.getElementById('errorMessage').innerHTML = data;
            } else {
                document.forms["loginForm"]["userName"].value = "";
                document.forms["loginForm"]["password"].value = "";
                document.getElementById('errorMessage').innerHTML = data;
            }
        });
    }
}

function forceLogout(uname) {
    if (confirm("Do you want to force login?") == true) {
        $.post("forceLogout.php", {
            userName: uname
        },
        function (data) {
            window.location = data;
        });
    } else {
        document.forms["loginForm"]["userName"].value = "";
        document.forms["loginForm"]["password"].value = "";
    }
}