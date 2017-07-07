<!DOCTYPE HTML>

<html>



	<?php
	setcookie('thisdomain', "www.kingdomtournz.com");
	$_COOKIE['thisdomain']="www.kingdomtournz.com";
	$GLOBALS['imageURLroot'] = "http://image0.tangren.co.nz/goto/www.kingdomtournz.com/products/";
	$GLOBALS['bizURLroot'] = "http://image0.tangren.co.nz/goto/www.kingdomtournz.com/booking/";
	?>

	<?php loadContent(); ?>


<?php require_once 'footer.php'; ?>

	<?php

	function loadContent() {
		session_start();
		
//		require_once dirname(__FILE__) . '/_sys/URLprocess.php'; 

		require_once dirname(__FILE__) . '/_sys/databaseOperation.php';

		require_once dirname(__FILE__) . '/_sys/tableOperation.php';

		require_once dirname(__FILE__) . '/_sys/globalVariables.php';

		require_once dirname(__FILE__) . '/_sys/dataProcess.php';

		require_once dirname(__FILE__) . '/interface/productDetailInterface.php';
		
		require_once dirname(__FILE__) . '/interface/shoppingCart.php';


		
		
		$query = url_code();
		$title = explode("&", $query);
		

		switch ($title[0]) {
			
		

			case "journey":

				require_once 'head2.php';

				require_once 'header2.php';

				echo '<div id=body>';
				echo '<div id="st-results-container">';

				if (count($title) > 1) {

					if ($title[1] == "nz") {

						require_once 'journey_nz.php';
					} else if ($title[1] == "au") {

						require_once 'AUcountry.php';
					} else if ($title[1] == "pacific") {

						require_once 'journey_pacific.php';
					}
				} else {

					//require_once 'products.php';
				}

				echo '</div>';
				echo '</div>';

				break;

			case "city":

				require_once 'head2.php';

				require_once 'header2.php';

				echo '<div id=body>';
				echo '<div id="st-results-container">';

				if (count($title) > 2) {

					require_once 'city_au.php';
				} else {

					require_once 'city.php';
				}

				echo '</div>';
				echo '</div>';

				break;



			case "NZcountry":

				require_once 'head2.php';

				require_once 'header2.php';

				echo '<div id=body>';
				echo '<div id="st-results-container">';

				if (count($title) > 1) {
					
				} else {

					require_once 'NZcountry.php';
				}

				echo '</div>';
				echo '</div>';

				break;


			case "AUcountry":

				require_once 'head2.php';

				require_once 'header2.php';

				echo '<div id=body>';
				echo '<div id="st-results-container">';

				if (count($title) > 1) {
					
				} else {

					require_once 'AUcountry.php';
				}

				echo '</div>';
				echo '</div>';

				break;

			case "gallary":

				require_once 'head2.php';

				require_once 'header2.php';

				echo '<div id=body>';

				if (count($title) > 1) {
					require_once 'gallaryItem.php';
				} 

				echo '</div>';

				break;

			case "product":

				require_once 'head2.php';

				require_once 'header2.php';

				echo '<div id=body>';
				echo '<div id="st-results-container">';

				if (count($title) > 1) {

					require_once dirname(__FILE__) . '/interface/productDetail.php';
				} else {
					
				}
				echo '</div>';

				echo '</div>';

				break;
				
			case "search":

				require_once 'head2.php';

				require_once 'header2.php';

				echo '<div id=body>';

//				if (count($title) > 1) {
//					
//				} else {

					require_once 'search.php';
//				}

				echo '</div>';

				break;	

			case "specail":

				require_once 'head2.php';

				require_once 'header2.php';

				echo '<div id=body>';
				echo '<div id="st-results-container">';

				if (count($title) > 1) {
					
				} else {

					require_once 'special.php';
				}

				echo '</div>';
				echo '</div>';

				break;



			case "ABOUTUS":

				require_once 'head2.php';

				require_once 'header2.php';

				echo '<div id=body>';
				echo '<div id="st-results-container">';
				 {

					require_once 'aboutUs.php';
				}

				echo '</div>';
				echo '</div>';

				break;



			case "CONTACTUS":

				require_once 'head2.php';

				require_once 'header2.php';

				echo '<div id=body>';
				echo '<div id="st-results-container">';
				 {

					require_once 'contactUs.php';
				}

				echo '</div>';
				echo '</div>';

				break;





			default:

				require_once 'head.php';

				require_once 'header.php';
				echo '<div id="st-results-container">';

				require_once 'home.php';
				echo '</div>';

				break;
		}
	}
	?>
