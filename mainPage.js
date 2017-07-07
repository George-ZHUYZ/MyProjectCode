/*
 * This file contains the functions that are used in mainPage.php
 */

function logout() {
    $.post("logout.php",
            function (data) {
                window.location = data;
            });
}