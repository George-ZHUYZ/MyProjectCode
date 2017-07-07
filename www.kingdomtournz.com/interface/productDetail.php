

<link rel="stylesheet" type="text/css" href="/clients/www.kingdomtournz.com/css/productDetail/productDetail.css" />
<link rel="stylesheet" type="text/css" href="/clients/www.kingdomtournz.com/css/productDetail/scroll.css" />
<link rel="stylesheet" href="/clients/www.kingdomtournz.com/css/productDetail/tab.css" media="screen" type="text/css" />
<link href="/clients/www.kingdomtournz.com/css/productDetail/order.css" rel="stylesheet" type="text/css"/>



<div id="showPics">
	<?php require_once dirname(__FILE__) . '/showImage.php'; ?>
</div>

<div id="productDescription">
	<?php require_once dirname(__FILE__) . '/tabfunction.php'; ?>


</div>

<div id="productSumit">
	<?php listDetail($title[1]) ?>
</div>

<div id="comment">
	<h2>游客点评</h2>
	<div class="pinglun">
		<?php
		require_once 'comments.php';
		echoComment(getComment($title[1]));
		?>
	</div>
	<div class="writereview">
		<?php require_once 'review.php'; ?>
	</div>
</div>	

<div class="relevantProduct">
	<p> 相关产品 </p>
	<?php
	require_once dirname(__FILE__) . '/relevantProducts.php';
	showRelevantProducts(relevantProducts($title[1]));
	?>
</div>





<?php

function listDetail($ID) {
	$rating = getProductRating($ID);
	$name = getProductName($ID);
	$retailPrice = getActualPrice($ID);
	$wholeSalePrice = getChildPrice($ID);
	$actualPrice = getActualPrice($ID);
	$volume = getStartDay($ID);
//
//	echo '<form action="/clients/www.kingdomtournz.com/orderForm.php" method="post" target="formwin" onsubmit="window.open(';
//        echo "'about:blank','formwin','height=800,width=800,top=50,left=50,toolbar=no,menubar=no,scrollbars=,resizable=no,location=no,status=no')";
//        echo'">	
	echo'	<div class="product_detail_price_orderdetail">
					<div class="product_detail_price_form" id="product_detail_price_title">' . $name . '</div>';
	echo '<div  class="ratestar"><table>';
	for ($i = 0; $i < 5; $i++) {
		if ($i < $rating) {
			echo '<td><img src="/clients/www.kingdomtournz.com/image/productDetail/star.png" ></td>';
		} else {
			echo '<td><img src="/clients/www.kingdomtournz.com/image/productDetail/no_star.png" ></td>';
		}
	}
	echo'</table></div>';

	echo'			<div class="product_detail_price_form" id="product_detail_price_price_name1">成人价</div>
					<div class="product_detail_price_form" id="product_detail_price_price_price1">NZD ' . $retailPrice . '</div>
					   
					<div class="product_detail_price_form" id="product_detail_price_price_name2">儿童价</div>
					<div class="product_detail_price_form" id="product_detail_price_price_price2">NZD ' . $wholeSalePrice . '</div>
						
					<div class="product_detail_price_form" id="product_detail_price_price_datename">发团日期 </div>
					<div class="product_detail_price_form" id="product_detail_price_price_date">' . $volume . '</div>
						
					<div class="product_detail_price_form" id="product_detail_price_price_buy">';

//	echo '<form method="post" action="/clients/www.kingdomtournz.com/orderForm.php" target="formwin" onsubmit="window.open( about:blank formwin height=800,width=800,top=50,left=50,toolbar=no,menubar=no,scrollbars=yes,resizable=no,location=no,status=no)">';
//	echo '<input id = "productDetail_order" type="submit" value=" " name="button" style="border: 0px;background: url(/clients/www.kingdomtournz.com/image/productDetail/productDetail_order.png) no-repeat center;" />
//			<input type="hidden" value="' . $ID . '" name="product_id[]"></form>';
	echo '<form  method="post" action="">';
	echo '<input id = "productDetail_shoppingcar" type="submit" value=" " name="button" style="border: 0px;background: url(/clients/www.kingdomtournz.com/image/productDetail/productDetail_shoppingcar.png) no-repeat center;background-size: 100%; background-color: #5997D3;" />';
	echo '<input type="hidden" value="add to cart" name="addToCart">
                    <input type="hidden" value="' . $ID . '" name="product_id">
					<input type="hidden" value="' . $name . '" name="product_name">
					<input type="hidden" value="' . $retailPrice . '" name="product_actualPrice">
					<input type="hidden" value="' . $wholeSalePrice . '" name="product_wholePrice">
					<input type="hidden" value="' . $volume . '" name="product_stateDate">
				</form>';
//	echo ' <input id = "productDetail_email" type="submit" value=" " name="button" style="border: 0px;background: url(/clients/www.kingdomtournz.com/image/productDetail/productDetail_email.png) no-repeat center;" />
//					<input id = "productDetail_phone" type="submit" value=" " name="button" style="border: 0px;background: url(/clients/www.kingdomtournz.com/image/productDetail/productDetail_phone.png) no-repeat center;" />';
	echo '<div id="productDetail_mailButton"><div class="productDetail_mailDetail">电邮: <a href="mailto:booking@kingdomtours.co.nz">booking@kingdomtours.co.nz</a></div></div>';
	echo '<div id="productDetail_PhoneButton" ><div class="productDetail_phoneDetail">
		电话(新西兰): 0064-9-2158669<br/>
		0064-9-3585093<br/>
		电话(中国): 0064-21-51219440<br/>
		电话(澳洲): 0061-2-8599248</div>
</div>';
	echo'				
					</div>
				</div>
			';
}
?>

