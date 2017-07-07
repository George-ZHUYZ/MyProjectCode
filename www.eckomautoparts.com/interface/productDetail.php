<?php

	function getItemDescriptions($ID) {
		$field = getFieldsByIndex($GLOBALS['server_databasename'],"products", array(4));
		$introductionList = getOneFieldValue("products", $ID, $field[0]);
		$introductionLists = array();
		$introductionLists = explode("<p>#introduction#</p>", $introductionList);
		$titleLists = array();
		echo '  <div id="accordion3" class="accordionWrapper" >';

			for ($r = 0; $r < count($introductionLists); $r++) {
				$titleLists = explode("<p>#title#</p>", $introductionLists[$r]);
				$fieldName = $titleLists[0];
				$fieldName = strip_tags($fieldName);
				$description = $titleLists[1];
				echo '<div class="set">
					<div class="title">' . $fieldName . '</div>
					<div class="cont">' . $description . '</div>
					</div>';
			}

		echo '  </div>';

	

        }


	function echoProductDescriptionTable($title){
		echo'	<table id="productDetailTable">
			<tr>
				<td id="productDetailTableInfoTd">
					<div class="small_pic">
						<a href="#zoom_in_pic">
							<img src="http://www.eckomautoparts.com/clients/www.eckomautoparts.com/image/productImg/'.$title[1].'.jpg" alt="No Available Image" width="150px" height="150px" />
						</a>
					</div>

				<h4>'.getProductTitle($title[1]).'</h4>
				<a href="mailto:info@eckomautoparts.com"><div id=mailToUs>Ask for Questions</div></a>
				</td>

				<td id="productDetailTableDetailTd">';
					getItemDescriptions($title[1]);
		echo'		</td>
			</tr>
			</table>';

		echo'	<div id="zoom_in_pic" style="display:none;">
				<img src="http://www.eckomautoparts.com/clients/www.eckomautoparts.com/image/productImg/'.$title[1].'.jpg" />
			</div>';
	}

?>


