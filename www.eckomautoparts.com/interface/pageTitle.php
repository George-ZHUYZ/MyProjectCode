<?php
function getProductTitle($ID) {
	$field = getFieldsByIndex($GLOBALS['server_databasename'], "products", array(1));
	$currentTitle = getOneFieldValue("products", $ID, $field[0]);
	return $currentTitle;
	}

function echoPageTitle($title){
	switch ($title[0]) {
	case "ABOUTUS":
        		if (count($title) > 1) {
                		echo '<title>'.getProductTitle($title[1]).' - ECKOM AUTO PARTS</title>';	
            			} else {
                				echo '<title>ABOUT US - ECKOM AUTO PARTS</title>';
            			}
            		break;

	case "PRODUCTS":
            		if (count($title) > 1) {
                			echo '<title>'.getProductTitle($title[1]).' - ECKOM AUTO PARTS</title>';	
            		} else {
                			echo '<title>PRODUCTS - ECKOM AUTO PARTS</title>';
            		}
            		break;
	case "SOLUTIONS":
            		if (count($title) > 1) {
                			echo '<title>'.getProductTitle($title[1]).' - ECKOM AUTO PARTS</title>';	
            		} else {
                			echo '<title>SOLUTIONS - ECKOM AUTO PARTS</title>';
            		}
            		break;

	case "SOFTWARETOOLS":
            		if (count($title) > 1) {
                			echo '<title>'.getProductTitle($title[1]).' - ECKOM AUTO PARTS</title>';	
            		} else {
                			echo '<title>SOFTWARETOOLS - ECKOM AUTO PARTS</title>';
            		}
            		break;

	case "SUPPORT":
            		if (count($title) > 1) {
                			echo '<title>'.getProductTitle($title[1]).' - ECKOM AUTO PARTS</title>';	
            		} else {
                			echo '<title>SUPPORT - ECKOM AUTO PARTS</title>';
            		}
            		break;
		
	default:
 			echo '<title>ECKOM AUTO PARTS</title>';
            		break;
    	}
}
?>