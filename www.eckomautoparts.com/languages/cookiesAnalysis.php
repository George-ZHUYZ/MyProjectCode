
<?php
session_start();
header('Cache-control: private'); // IE 6 FIX

if (isSet($_GET['lang'])) {
    $lang = $_GET['lang'];

// register the session and set the cookie
    $_SESSION['lang'] = $lang;
   
    setcookie('lang', $lang, time() + (3600 * 24 * 30));
    $_COOKIE['lang']=$lang;
} else if (isSet($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
} else if (isSet($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang'];
} else {
    $lang = 'en';
}

switch ($lang) {
    case 'en':
        $lang_file = 'lang.en.php';
        break;

    case 'ch':
        $lang_file = 'lang.ch.php';
        break;

    default:
        $lang_file = 'lang.en.php';
}
include_once dirname(__FILE__).'/'.$lang_file;
//include_once 'languages/' . $lang_file;
//include_once '../languages/'.$lang_file;
//include_once '../../../client/eckomautoparts.com/languages/'.$lang_file;
?>

