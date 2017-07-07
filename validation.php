<?php

/*
 * This file get the functions which are used to validate information
 */
require_once './sys/tableOperation.php';

$userName = $_POST['userName'];
$password = $_POST['password'];
$securityCode = "";
$loginTime = "";
$loginIP = "";
$randomStream = "";
if (filter_var($userName, FILTER_VALIDATE_EMAIL)) {
    $condition = getConditions(array("email"), array("string"), array($userName));
} else {
    $condition = getConditions(array("login_name"), array("string"), array($userName));
}
$allResult = getOneRecord("member", $condition);
if (empty($allResult)) {
    echo "*Your user name is incorrect*";
} else {
    if ($password == $allResult[0][2]) {
        if($allResult[0][10] == "none") {
            date_default_timezone_set("Pacific/Auckland");
            $loginTime = date("Y-m-d G:i:s", time());
            $loginIP = get_client_ip();
            $randomStream = generateRandomString();
            $securityCode = $allResult[0][1] . "<#>" . $loginTime . "<#>" . $loginIP . "<#>" . $randomStream . "<#>" . $allResult[0][0];
            updateData("member", $allResult[0][0], array("login_situ"), array("string"), array($securityCode));

            $newCondition = getConditions(array("LoginName", "LoginMonth"), array("string", "string"), array($userName, date("Y-m", time())));
            $newResult = getOneRecord("LoginHistory", $newCondition);
            if (empty($newResult)) {
                $fieldValues = array($allResult[0][1], $allResult[0][0], date("Y-m", time()), $loginTime . " " . $loginIP . "<#>Login<*>");
                insertData("LoginHistory", $fieldValues);
            } else {
                updateData("LoginHistory", $newResult[0][0], array("LoginRc"), array("string"), array($newResult[0][4] . $loginTime . " " . $loginIP . "<#>Login<*>"));
            }

            setcookie("login_ID", $allResult[0][0]);
            setcookie("login_name", $allResult[0][1]);
            setcookie("login_sit", $securityCode);
            setcookie("adminType", $allResult[0][9]);
            echo "CorrectUserName&Password";
        } else {
            echo "*Your account has not logged out last time*";
        }
    } else {
        echo "*Your password is incorrect*";
    }
}

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

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
