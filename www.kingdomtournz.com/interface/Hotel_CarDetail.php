		

<?php

function find($location, $findType) {
	$conditions = getConditions(array("RcTypeKey"),
			array("string"), array($findType));
	$allResults = getValuesLike("biz_list", "location", $location, $conditions);
	for ($i = 0; $i < count($allResults); $i++) {
		if($allResults[$i][18] == "on"){
			$oneRecord = getValue("biz_list", $allResults[$i][0]);
			displayCarHotelList($oneRecord);
		}	
	}
}

function displayCarHotelList($oneRecord) {
	$ID = $oneRecord[0];
	$carHotelName = $oneRecord[1];
	$type = $oneRecord[3];
	$carHotelAddress = $oneRecord[5];
	$carHotelWebsite = $oneRecord[8];
	$carHotelPrice= formatePrice($oneRecord[10]*100);
	$brief = $oneRecord[11];

	$brief = str_replace("<p>", "", $brief);
	$brief = str_replace("</p>", "", $brief);
	if (strlen($brief) > 600) {
		//$temp = substr($brief, 0, 599) . "...";
		$temp = mb_substr($brief, 0, 100, "HTML-ENTITIES") . "...";
	} else {
		$temp = $brief;
	}
	echo '<div class="productList" id="productList">
           <div class="productListDescription" >
			<div class="productListPicture">
              <img border="0" src="' . $GLOBALS['bizURLroot'] . $ID . "/1.jpg" . '" alt="Product Picture" width="200px" height="180px"> 
           </div>
             '
			. '<div class="productListContent">';

	echo '<h5>' . $carHotelName . '</h5>';
	echo '<p>' . $temp . '</p>';
	
	echo '<p>地址：<br>' .$carHotelAddress.'</p>';
	

	echo '</div>
			<div class="productListBooking">
			<p id="normalPrice">' . "NZD " . $carHotelPrice . '</p>
			<a class="viewWebsit_buttom" href="//'. $carHotelWebsite .'" target="_blank">浏览官网</a>
				

			<div id="carHotelListShoppingCartButton">
					<form  method="post" action="">
					<input type="image" id = "productListShoppingCartButtonInput"  src="/clients/www.kingdomtournz.com/image/productList/shopingCart.png"  width="55" height="55">
					<input type="hidden" name="CH_AddToCart" value="22">
                    <input type="hidden" value="' . $ID . '" name="ch_id">
					<input type="hidden" value="' . $carHotelName . '" name="ch_name">
					<input type="hidden" value="' . $carHotelPrice . '" name="ch_actualPrice">
					<input type="hidden" value="' . $type . '" name="ch_type">
</form>
			</div>


			</div>
          </div>
        </div>';
}
?>
</body>
</html>


	<!--<a href="'. $website .'" style="float:right;font-size:20px;"target="_blank">View Website</a>-->