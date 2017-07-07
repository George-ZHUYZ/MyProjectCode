<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

require_once './sys/tableOperation.php';
if (!isset($_COOKIE['login_ID']) || !isset($_COOKIE['login_name']) || !isset($_COOKIE['login_sit'])) {
    header('Location: loginPage.php');
    exit();
} else {
    $loginSituation = getAFieldValue("member", $_COOKIE['login_ID'], "login_situ");
    if($_COOKIE['login_sit'] != $loginSituation) {
        header('Location: loginPage.php');
        exit();
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css"/> 
        <script src="js/jquery-1.11.0.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="mainPage.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="logout" style="text-align: right; padding: 1%;">
            <button type="button" class="btn btn-primary" onclick="logout()">Log Out</button>
        </div>
        <hr>
        <p>Hello World</p>
    </body>
</html>
<?php
var_dump($_COOKIE);
