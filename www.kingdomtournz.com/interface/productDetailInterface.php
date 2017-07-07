
<?php

function search($location) {
	$condition = getConditions(array("RcTypeKey"), array("string"), array($location));
	$allResult = getOneRecord("products", $condition);
	$productList = array(array());
	for ($i = 0; $i < count($allResult); $i++) {
//		listDetail($allResult[$i][0]);
		for ($j = 0; $j < count($allResult[$i]); $j++) {
			if ($j == 4) {
				$introductions = explode("<p>#introduction#</p>", $allResult[$i][4]);
				$briefs = explode("<p>#title#</p>", $introductions[0]);
				$productList[$i][4] = $briefs[1];
			} else {
				$productList[$i][$j] = $allResult[$i][$j];
			}
		}
	}
	for ($a = 0; $a < count($productList); $a++) {
		if ($productList[$a][13] == "on") {
			displayList($productList[$a]);
		}
	}
}

function getHomeGallaryID() {
	$condition = getConditions(array("belong_site", "edit_type"), array("string", "string"), array("www.kingdomtour.co.nz", "on"));
	$allResult = getOneRecord("PackageDeal", $condition);
	$productList = array();
	if (count($allResult) >= 4) {
//		id
		$productList[0][0] = $allResult[0][0];
		$productList[1][0] = $allResult[1][0];
		$productList[2][0] = $allResult[2][0];
		$productList[3][0] = $allResult[3][0];
//		image
		$productList[0][1] = $allResult[0][5];
		$productList[1][1] = $allResult[1][5];
		$productList[2][1] = $allResult[2][5];
		$productList[3][1] = $allResult[3][5];
	} else {
		for($i = 0; $i < count($allResult); $i++){
			$productList[$i][0] = $allResult[$i][0];
			$productList[$i][1] = $allResult[$i][5];
		}
	}
	return $productList;
}


function getHomeGallaryItemContent($packageDealID){
	$homeGallaryItem = getValue("PackageDeal", $packageDealID);
	return $homeGallaryItem[3];
}


function getHomeGallaryItem($packageDealID){
	$homeGallaryItem = getValue("PackageDeal", $packageDealID);
	$temp = explode(",", $homeGallaryItem[4]);
	for($i = 0; $i < count($temp); $i++){
		$oneProduct = getValue("products",$temp[$i]);
		$output = array();
		for($j = 0; $j < count($oneProduct); $j++){
			if($j == 4){
				$introductions = explode("<p>#introduction#</p>", $oneProduct[4]);
				$briefs = explode("<p>#title#</p>", $introductions[0]);
				$output[4] = $briefs[1];
			}else{
				$output[$j] = $oneProduct[$j];
			}
		}
		displayList($output);
	}
}

function displayList($productDetail) {

	$ID = $productDetail[0];
	$productName = $productDetail[1];
	$retailPrice = formatePrice($productDetail[6]);
	$brief = $productDetail[4];
	$productImgArray=$productDetail[5];
	$dicountRate = $productDetail[7];
	$actualPrice = formatePrice($productDetail[6] * $dicountRate / 100);
	$wholePrice = formatePrice($productDetail[8]);
	$stateDate = $productDetail[10];
	$special = FALSE;

	$productImgArray=  explode("#pic#",$productImgArray );
	for ($i = 0; $i < count($productImgArray); $i++) {
		$productImgArray[$i]=  str_replace("\\", "/", $productImgArray[$i]);
	}
	if ($dicountRate != 100) {
		$special = TRUE;
	}


	$brief = str_replace("<p>", "", $brief);
	$brief = str_replace("</p>", "", $brief);
	if (strlen($brief) > 600) {
//		$temp = substr($brief, 0, 599) . "...";
				$temp = mb_substr($brief, 0, 100, "HTML-ENTITIES") . "...";
	} else {
		$temp = $brief;
	}
	echo '<div class="productList" id="productList">
           <div class="productListDescription" >
			<div class="productListPicture">
              <img border="0" onerror="javascript:this.src=\'http://image0.tangren.co.nz/goto/www.kingdomtour.co.nz/pages/pages_338_1.png\'" src="'.$productImgArray[0].'" alt="Product Picture" width="200px" height="180px"> 
           </div>
             <a href="?product&' . $ID . '"  class="more"><div class="productListContent">';
	if ($special) {
		echo '<div id = "specialPic"></div>';
	}
	echo '<h5>' . $productName . '</h5>';

	if ($special) {
		echo '<span id="originalPrice">' . "NZD " . $retailPrice . '</span>&nbsp;';
		echo '<span id="actualPrice">' . "NZD " . $actualPrice . '</span>';
	} else {
		echo '<span id="normalPrice">' . "NZD " . $retailPrice . '</span>';
	}


	echo '<p>' . $temp . '</p>';

	echo '</div></a>
		<div class="productListBooking">

			<div id="productListPhoneButton" class="productListButton"><div class="productListButtonPhone">
电话(新西兰): 0064-9-2158669<br/>
	0064-9-3585093<br/>
电话(中国): 0064-21-51219440<br/>
电话(澳洲): 0061-2-8599248</div>
</div>
			<div id="productListMailButton" class="productListButton"><div class="productListButtonMail">电邮: <a href="mailto:booking@kingdomtours.co.nz">booking@kingdomtours.co.nz</a></div></div>
		
                        
			<div id="productListShoppingCartButton">
					<form  method="post" action="">
					<input type="image" id = "productListShoppingCartButtonInput" name="addToCart" src="/clients/www.kingdomtournz.com/image/productList/shopingCart.png" value="22" width="55" height="55">
					
                    <input type="hidden" value="' . $ID . '" name="product_id">
					<input type="hidden" value="' . $productName . '" name="product_name">
					<input type="hidden" value="' . $actualPrice . '" name="product_actualPrice">
					<input type="hidden" value="' . $wholePrice . '" name="product_wholePrice">
					<input type="hidden" value="' . $stateDate . '" name="product_stateDate">	
</form>
			</div>
			                     
	</div>
            </div>
        </div>';
}

//aussie_tour
function lookFor($cityName, $tourType = "nz_attractions_booking") {

	//$cityName=  strtolower($cityName);
	$condition = getConditions(array("RcTypeKey", "belong_site"), array("string", "string"), array($tourType, "www.kingdomtour.co.nz"));
	$allResult = getValuesLike("products", "Product_Code", $cityName, $condition);
	$productList = array(array());
	for ($i = 0; $i < count($allResult); $i++) {
		if ($allResult[$i][13] == "on") {
			for ($j = 0; $j < count($allResult[$i]); $j++) {
				if ($j == 4) {
					$introductions = explode("<p>#introduction#</p>", $allResult[$i][4]);
					$briefs = explode("<p>#title#</p>", $introductions[0]);
					$productList[$i][4] = $briefs[1];
				} else {
					$productList[$i][$j] = $allResult[$i][$j];
				}
			}
		}
	}

for ($i = 0; $i < count($productList); $i++) {
		if(empty($productList[$i]))
		{
			unset($productList[$i]);
		}
	}
	$productList=  array_values($productList);

	return $productList;
}

function getProduct($ID) {
	//$cityName=  strtolower($cityName);
	$condition = getConditions(array("id", "belong_site"), array("int", "string"), array($ID, "www.kingdomtour.co.nz"));
	$result = getOneRecord("products", $condition);
	return $result[0];
}

function getProductRating($ID) {
	$domain = $_COOKIE['thisdomain'];
	$condition = getConditions(array("ProductID", "belong_site"), array("string", "string"), array($ID, $domain));
	$result = getOneRecord("ProductRating", $condition);
	if (count($result) > 0) {
		$rate = explode("<rate>", $result[0][4]);
		return $rate[0];
	} else {
		return 0;
	}
}

function getProductName($ID) {
	$result = getProduct($ID);
	$result = $result[1];
	return $result;
}

function getOriginalPrice($ID) {
	$result = getProduct($ID);
	$result = $result[6];
	$result = formatePrice($result);
	return $result;
}

function getActualPrice($ID) {
	$result = getProduct($ID);
	$result = $result[6] * $result[7] / 100;
	$result = formatePrice($result);
	return $result;
}

function getChildPrice($ID) {
	$result = getProduct($ID);
	$result = $result[8];
	$result = formatePrice($result);
	return $result;
}

function getStartDay($ID) {
	$result = getProduct($ID);
	$result = $result[10];
	return $result;
}

?>
