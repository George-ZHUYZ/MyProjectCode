
<div class="tab">
	<?php

	productDetail($title[1]);

	function productDetail($ID) {
		$field = getFieldsByIndex($GLOBALS['server_databasename'], "products",
				array(4));
		$introductionList = getOneFieldValue("products", $ID, $field[0]);
		$introductionLists = array();
		$introductionLists = explode("<p>#introduction#</p>", $introductionList);
		for ($i = 0; $i < count($introductionLists); $i++) {
			$introductionLists[$i] = explode("<p>#title#</p>", $introductionLists[$i]);
		}
		tabfunction($introductionLists);
	}

	function tabfunction($tabs) {
		echo '<ul class="tabs">';
		for ($i = 0; $i < count($tabs); $i++) {
			echo '<li><a href="#">' . $tabs[$i][0] . '</a></li>';
		}
		echo '</ul>';
		echo '<div class="tab_content">';
		for ($i = 0; $i < count($tabs); $i++) {
			echo '<div class="tabs_item">';
			echo $tabs[$i][1];
			echo '</div>';
		}
		echo '</div>';
	}
	?>
</div> <!-- / tab -->
<script src="/clients/www.kingdomtournz.com/js/productdetail/index.js"></script>
