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


<link href="/clients/www.kingdomtournz.com/css/city.css" rel="stylesheet" type="text/css"/>

<div class="journey_showPic">
	<img src="HTTP://image0.tangren.co.nz/goto/www.kingdomtournz.com/Destinations/<?php echo $title[1]?>/img_1.jpg">
	<div id='cityTitleImgBanner'><div id='cityTitleImgBannerTitle'><?php echo $cityChineseName;?></div></div>
</div>


<div id="verticalNav"><?php
	require_once dirname(__FILE__) .'/verticalNav.php';
	$country = loadProduct("www.kingdomtour.co.nz");
	showVerticalNav($country,"Australia");
	?></div>



<div id="cityList">
	<div class="tab" id="cityTab">

		<ul class="tabs" id="cityTabUL">
			<li><a href="#">观光路线</a></li>

		</ul> <!-- / tabs -->


		<div class="tab_content" id="cityTabContent">

			<div class="tabs_item">
				<?php	
				$temp = lookFor($cityEnglishTitle,"aussie_tours");
						for ($a = 0; $a < count($temp); $a++) {
		displayList($temp[$a]);
	}?>
			</div> <!-- / tabs_item -->



		</div> <!-- / tab_content -->
	</div> <!-- / tab -->


	<!--<script src="/clients/www.kingdomtournz.com/js/productdetail/index.js"></script>-->

</div>







