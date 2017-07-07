<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once dirname(__FILE__) . '/interface/productDetailInterface.php';
require_once dirname(__FILE__) . '/interface/cityDescription.php';
$cityChineseName = getCityChineseName($title[1]);
$cityEnglishTitle = getCityEnglishTitle($title[1]);
$cityDescription = getCityDescription($title[1]);
?>

<link href="/clients/www.kingdomtournz.com/css/journey/nz_tab_style.css" rel="stylesheet" type="text/css"/>
<link href="/clients/www.kingdomtournz.com/css/productList.css" rel="stylesheet" type="text/css"/>


<div class="journey_showPic">
	<?php
	require_once dirname(__FILE__) . '/firsrInnerPageGallery.php';
	getCountryDescription($cityEnglishTitle);
	?>
</div>

<div id="journeyList">
	<div class="tab">

		<ul class="tabs">
			<li><a href="#">澳洲之旅</a></li>
		</ul> <!-- / tabs -->


		<div class="tab_content">

			<div class="tabs_item">
				<?php
				require_once dirname(__FILE__) . '/interface/productDetailInterface.php';
				$temp = lookFor($cityEnglishTitle, "aussie_tour");
				for ($a = 0; $a < count($temp); $a++) {
					displayList($temp[$a]);
				}
				?>
			</div> <!-- / tabs_item -->
		</div> <!-- / tab_content -->
	</div> <!-- / tab -->

</div>



