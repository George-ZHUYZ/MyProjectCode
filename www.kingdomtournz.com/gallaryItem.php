<?php



require_once dirname(__FILE__) . '/interface/productDetailInterface.php';
?>



<link href="/clients/www.kingdomtournz.com/css/journey/nz_tab_style.css" rel="stylesheet" type="text/css"/>
<link href="/clients/www.kingdomtournz.com/css/productList.css" rel="stylesheet" type="text/css"/>
<link href="/clients/www.kingdomtournz.com/css/gallaryItem.css" rel="stylesheet" type="text/css"/>


<div class="journey_showPic">
	<img src="/clients/www.kingdomtournz.com/image/homePage/Banner<?php echo $title[1]?>.png">
</div>

<div id="gallaryDes">
	<?php echo getHomeGallaryItemContent($title[1])?>
</div>

<div id="journeyList">

	<div class="tab">

		<ul class="tabs">

			<li><a href="#">特别推荐</a></li>

		</ul> <!-- / tabs -->

		<div class="tab_content">



			<div class="tabs_item">

				<?php
				getHomeGallaryItem($title[1]);
				?>

			</div> <!-- / tabs_item -->

		</div> <!-- / tab_content -->

	</div> <!-- / tab -->
	
</div>

















