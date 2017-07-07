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
	showVerticalNav($country,"New Zealand");
	?></div>

<div id="cityDes"><p><?php echo $cityDescription;?></p></div>

<div id="cityList">
	<div class="tab" id="cityTab">

		<ul class="tabs" id="cityTabUL">
			<li><a href="#">观光路线</a></li>
			<li><a href="#">住宿</a></li>
			<li><a href="#">租车</a></li>
		</ul> <!-- / tabs -->


		<div class="tab_content" id="cityTabContent">

			<div class="tabs_item">
				<?php	

				$temp = lookFor($cityEnglishTitle);
				if(count($temp[0])!=0){
						for ($a = 0; $a < count($temp); $a++) {
				displayList($temp[$a]);}}
	?>
			</div> <!-- / tabs_item -->

			<div class="tabs_item">
				<?php
				require_once dirname(__FILE__) .'/interface/Hotel_CarDetail.php';
				find($cityEnglishTitle, "accommodation_booking");
//				?>
				
			</div> <!-- / tabs_item -->
			
			<div class="tabs_item">
				<?php
				find($cityEnglishTitle, "car_rental");
				?>
			</div> <!-- / tabs_item -->

		</div> <!-- / tab_content -->
	</div> <!-- / tab -->


	<script src="/clients/www.kingdomtournz.com/js/productdetail/index.js"></script>

</div>







