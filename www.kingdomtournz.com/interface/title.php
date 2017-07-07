<?php
function getProductTitle($ID) {
	$field = getFieldsByIndex($GLOBALS['server_databasename'], "products", array(1));
	$currentTitle = getOneFieldValue("products", $ID, $field[0]);
	return $currentTitle;
	}
	
function getCityTitle($ID) {
	$field = getFieldsByIndex($GLOBALS['server_databasename'], "Destinations", array(7));
	$currentTitle = getOneFieldValue("Destinations", $ID, $field[0]);
	return $currentTitle;
	}

function echoPageTitle($title){
	switch ($title[0]) {
		
	case "city":


				if (count($title) > 2) {

					echo '<title>'.getCityTitle($title[1]).' - 肯定旅游</title>';	
					
					
				} else {

					echo '<title>'.getCityTitle($title[1]).' - 肯定旅游</title>';	
				}

				echo '</div>';

				break;



			case "NZcountry":



				if (count($title) > 1) {
					
				} else {

					echo '<title>新西兰景点 - 肯定旅游</title>';
				}

				echo '</div>';

				break;


			case "AUcountry":



				if (count($title) > 1) {
					
				} else {

					echo '<title>畅游澳洲 - 肯定旅游</title>';	
				}


				break;	
		
		
		
		
		
		
	case "journey":
        		if (count($title) > 1) {

					if ($title[1] == "nz") {

						echo '<title>新西兰纯净之旅 - 肯定旅游</title>';
					} else if ($title[1] == "au") {

						echo '<title>畅游澳洲 - 肯定旅游</title>';
					} else if ($title[1] == "pacific") {

						echo '<title>海岛浪漫游 - 肯定旅游</title>';
					}
				} else {

				}


				break;

	case "product":
            		if (count($title) > 1) {
                			echo '<title>'.getProductTitle($title[1]).' - 肯定旅游</title>';	
            		} else {
                			echo '<title>旅游产品 - 肯定旅游</title>';
            		}
            		break;
	case "specail":

                echo '<title>特卖行程 - 肯定旅游</title>';

            		break;

	case "CONTACTUS":

                echo '<title>联系我们 - 肯定旅游</title>';
            		break;

	case "ABOUTUS":
            		echo '<title>关于我们 - 肯定旅游</title>';
            		break;
				
	case "search":

                echo '<title>搜索结果 - 肯定旅游</title>';

            		break;
		
	default:
 			echo '<title>肯定旅游</title>';
            		break;
    	}
}
?>