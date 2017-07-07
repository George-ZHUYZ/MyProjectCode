 <?php
require_once dirname(__FILE__) . '/tableOperation.php';
session_start();
header('Cache-control: private'); // IE 6 FIX
global $lang;
global $defaltLang;

if (isSet($_GET['lang'])) {
    $lang = $_GET['lang'];
	// register the session and set the cookie
    $_SESSION['lang'] = $lang;
    setcookie('lang', $lang, time() + (3600 * 24 * 30));
} else if (isSet($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
} else if (isSet($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang'];
} else { 
    $lang = 'en';
}

function formateLanguage($belong_site,$LangType,$tableName,$rcID,$colName,$internalNo){
        $condition = getConditions(array("belong_site","LangType","TableName","RcID","ColName","InternalNo"), array("string","string","string","string","string","string"), array($belong_site,$LangType,$tableName,$rcID,$colName,$internalNo));
        $result = getOneRecord("dictionary", $condition);
        $sentence = "";
        if(!empty($result)){
            $sentence = $result[0][7];
        }
        return $sentence;
//	if($GLOBALS['lang'] != $defaultLang){
//		$originalLang = "";
//		$newLang = "";
//		if($GLOBALS['lang'] == "en"){
//			$originalLang = "Chinese";
//			$newLang = "English";
//		}else{
//			$originalLang = "English";
//			$newLang = "Chinese";
//		}
//		$condition = getConditions(array("belong_site",$originalLang), array("string","string"), array($belong_site,$sentence));
//		$temp = getOneValueByCondition("dictionary", $newLang, $condition);
//		if($temp[0] == "null"){
//			if($originalLang == "English"){
//				$values = "'".$belong_site."','','".$sentence."','on'";
////				$sentence = "请搜索英文关键字";
//			}else{
//				$values = "'".$belong_site."','".$sentence."','','on'";
////				$sentence = "No reslut, Please try other keywords";
//			}
//			insertData("dictionary", $values);
//		}else{
//			$sentence = $temp[0];
//		}
//	}
//	return $sentence;
}

formateLanguage("www.kingdomtournz.com", "en", "products", "29", "Product_Name", "0");
