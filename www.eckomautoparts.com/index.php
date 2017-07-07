<?php

	require_once dirname(__FILE__) . '/../../_sys/_class/database/tableOperation.php';
	require_once dirname(__FILE__) . '/../../_interface/html/header.php';
	require_once dirname(__FILE__) . '/interface/category.php';

	function loadContent() {
    		$query = url_code();
    		$title = explode("&", $query);
    		switch ($title[0]) {

        		case "SUPPORT":
	    			echo getpage(297);
            		break;
			
			case "ABOUTUS":
				echo getpage(293);
			break;

        		case "PRODUCTS":
            			if (count($title) > 1) {
					require_once dirname(__FILE__) . '/interface/productDetail.php';
					echoProductDescriptionTable($title);
            		} else {
				require_once 'products.php';
            		}
            		break;

			case "SOLUTIONS":
				require_once 'solutions.php';
			break;


			case "SOFTWARETOOLS":
				require_once 'softwaretools.php';
			break;

			default:
				if ($_COOKIE['lang'] <> 'ch') {
					echo getpage(292);
				} else {
					echo getpage(299);
				}
			break;
		}
	}

?>


<?php require_once 'header.php'; ?>
<?php require_once 'body.php'; ?>
<?php require_once 'footer.php'; ?>