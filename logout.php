<?php

/*
 * This file get the functions which are used to delete the login record database
 */
require_once './sys/tableOperation.php';

$userID = $_COOKIE['login_ID'];
date_default_timezone_set("Pacific/Auckland");
$loginIP = get_client_ip();
updateData("member", $userID, array("login_situ"), array("string"), array("none"));
$condition = getConditions(array("UserID"), array("string"), array($userID));
$result = getOneRecord("LoginHistory", $condition);
if (!empty($result)) {
    updateData("LoginHistory", $result[0][0], array("LoginRc"), array("string"), array($result[0][4] . date("Y-m-d G:i:s", time()) . " " . $loginIP . "<#>Logout<*>"));
}
setcookie("login_ID", "", time() - 3600);
setcookie("login_name", "", time() - 3600);
setcookie("login_sit", "", time() - 3600);
echo "loginPage.php";

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP')) {
        $ipaddress = getenv('HTTP_CLIENT_IP');
    } else if (getenv('HTTP_X_FORWARDED_FOR')) {
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    } else if (getenv('HTTP_X_FORWARDED')) {
        $ipaddress = getenv('HTTP_X_FORWARDED');
    } else if (getenv('HTTP_FORWARDED_FOR')) {
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    } else if (getenv('HTTP_FORWARDED')) {
        $ipaddress = getenv('HTTP_FORWARDED');
    } else if (getenv('REMOTE_ADDR')) {
        $ipaddress = getenv('REMOTE_ADDR');
    } else {
        $ipaddress = 'UNKNOWN';
    }
    return $ipaddress;
}
