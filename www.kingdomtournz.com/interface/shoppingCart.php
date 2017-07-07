<?php

if (isset($_POST['addToCart'])) {
	addToCart(filter_input(INPUT_POST, 'product_id'),
			filter_input(INPUT_POST, 'product_name'),
			filter_input(INPUT_POST, 'product_actualPrice'),
			filter_input(INPUT_POST, 'product_wholePrice'),
			filter_input(INPUT_POST, 'product_stateDate'));
}

if (isset($_POST['CH_AddToCart'])) {
	addToCart_CH(filter_input(INPUT_POST, 'ch_id'),
			filter_input(INPUT_POST, 'ch_name'),
			filter_input(INPUT_POST, 'ch_actualPrice'),
			filter_input(INPUT_POST, 'ch_type'));
}



if (isset($_POST['clearCart'])) {
	clearCart();
}

if (isset($_POST['delect_id'])) {
	$product_ID = $_POST['delect_id'];
	removeFromCart($product_ID);
}

if (isset($_POST['delect_ch_id'])) {
	$ch_ID = $_POST['delect_ch_id'];
	removeCHFromCart($ch_ID);
}

function addToCart($product_ID, $productName, $actualPrice, $wholePrice,
		$stateDate) {
	if (isset($_SESSION['cart'])) {
		if (productExists($product_ID)) {
			return;
		} else {
			$max = count($_SESSION['cart']);

			$_SESSION['cart'][$max][0] = $product_ID;
			$_SESSION['cart'][$max][1] = $productName;
			$_SESSION['cart'][$max][2] = $actualPrice;
			$_SESSION['cart'][$max][3] = $wholePrice;
			$_SESSION['cart'][$max][4] = $stateDate;
		}
	} else {
		$_SESSION['cart'] = array();
		$_SESSION['cart'][0][0] = $product_ID;
		$_SESSION['cart'][0][1] = $productName;
		$_SESSION['cart'][0][2] = $actualPrice;
		$_SESSION['cart'][0][3] = $wholePrice;
		$_SESSION['cart'][0][4] = $stateDate;
	}
}

function addToCart_CH($ch_ID, $chName, $chActualPrice, $chType) {
	if (isset($_SESSION['chCart'])) {
		if (carHotelExists($ch_ID)) {
			return;
		} else {
			$max = count($_SESSION['chCart']);

			$_SESSION['chCart'][$max][0] = $ch_ID;
			$_SESSION['chCart'][$max][1] = $chName;
			$_SESSION['chCart'][$max][2] = $chActualPrice;
			$_SESSION['chCart'][$max][3] = $chType;
		}
	} else {
		$_SESSION['chCart'] = array();
		$_SESSION['chCart'][0][0] = $ch_ID;
		$_SESSION['chCart'][0][1] = $chName;
		$_SESSION['chCart'][0][2] = $chActualPrice;
		$_SESSION['chCart'][0][3] = $chType;
	}
}

function productExists($product_ID) {
	$max = count($_SESSION['cart']);
	$flag = 0;
	for ($i = 0; $i < $max; $i++) {
		if ($product_ID == $_SESSION['cart'][$i][0]) {
			$flag = 1;
			break;
		}
	}
	return $flag;
}

function carHotelExists($ch_ID) {
	$max = count($_SESSION['chCart']);
	$flag = 0;
	for ($i = 0; $i < $max; $i++) {
		if ($ch_ID == $_SESSION['chCart'][$i][0]) {
			$flag = 1;
			break;
		}
	}
	return $flag;
}

function removeFromCart($product_ID) {
	$max = count($_SESSION['cart']);
	for ($i = 0; $i < $max; $i++) {
		if ($product_ID == $_SESSION['cart'][$i][0]) {
			unset($_SESSION['cart'][$i]);
			break;
		}
	}
	$_SESSION['cart'] = array_values($_SESSION['cart']);
}

function removeCHFromCart($ch_ID) {
	$max = count($_SESSION['chCart']);
	for ($i = 0; $i < $max; $i++) {
		if ($ch_ID == $_SESSION['chCart'][$i][0]) {
			unset($_SESSION['chCart'][$i]);
			break;
		}
	}
	$_SESSION['chCart'] = array_values($_SESSION['chCart']);
}

function clearCart() {
	$_SESSION['cart'] = array();
	$_SESSION['chCart'] = array();
}

//
//function echoExists() {
//	$max = count($_SESSION['cart']);
//	if ($max != 0) {
//		for ($i = 0; $i < $max; $i++) {
//			echo $_SESSION['cart'][$i];
//		}
//	}
//}
function displayShopppingcart() {
	if (isset($_SESSION['cart'])) {
		$tourMax = count($_SESSION['cart']);
	} else {
		$_SESSION['cart'] = array();
		$tourMax = count($_SESSION['cart']);
	}

	if (isset($_SESSION['chCart'])) {
		$chMax = count($_SESSION['chCart']);
	} else {
		$_SESSION['chCart'] = array();
		$chMax = count($_SESSION['chCart']);
	}

	$totalMax = $tourMax + $chMax;

	for ($i = 0; $i < $tourMax; $i++) {
		$productArray[$i] = $_SESSION['cart'][$i];
	}

	for ($j = 0; $j < $chMax; $j++) {
		$chArray[$j] = $_SESSION['chCart'][$j];
	}

	echo '<div id="shoppingcarframe">
	<section class="shoppingcar_button">
		<ul class="shoppingcar_clearfix">
			<li>
				<a href="#" class="shoppingcar_cart">购物车<em>' . $totalMax . '</em></a>
				<div class="shoppingcar_item">
					<ul>
						<li>
							已选择的产品
							
							<form  method="post" action=""  id="clearCartForm">
								<input type="submit"  name="clearCart" id="clearCartButton" value="清空购物车" >
							</form>
							
							<form  method="post" action="/clients/www.kingdomtournz.com/orderForm.php" id="orderNowForm" target="formwin" onsubmit="window.open(';
	echo "'about:blank','formwin')";

	echo'">
								<input type="submit"  name="orderNow" id="orderNowButton" value="立即购买" >';
	if (isset($productArray)) {
		foreach ($productArray as $product) {
			echo' <input type="hidden"  name="product_id[]" id="" value="' . $product[0] . '" >';
			echo' <input type="hidden"  name="product_name[]" id="" value="' . $product[1] . '" >';
			echo' <input type="hidden"  name="product_actualPrice[]" id="" value="' . $product[2] . '" >';
			echo' <input type="hidden"  name="product_wholePrice[]" id="" value="' . $product[3] . '" >';
			echo' <input type="hidden"  name="product_stateDate[]" id="" value="' . $product[4] . '" >';
		}
	}
	if(isset($chArray)){
		foreach ($chArray as $ch) {
			echo' <input type="hidden"  name="ch_id[]" id="" value="' . $ch[0] . '" >';
			echo' <input type="hidden"  name="ch_name[]" id="" value="' . $ch[1] . '" >';
			echo' <input type="hidden"  name="ch_actualPrice[]" id="" value="' . $ch[2] . '" >';
			echo' <input type="hidden"  name="ch_type[]" id="" value="' . $ch[3] . '" >';
		}
	}

	echo'</form>

						</li>
						';
	if ($totalMax == 0) {
		echo '<li>
			<a class="shoppingcar_items">
			<div class="shoppingcar_items_text"><span>您的购物车为空</span></div>
			</a>
		</li>';
	} else {
		for ($i = 0; $i < $tourMax; $i++) {
			echo '<li>
			<a class="shoppingcar_items">
			<div class="shoppingcar_items_img"><img src="' . $GLOBALS['imageURLroot'] . $_SESSION['cart'][$i][0] . "/1.jpg" . '"></div>
			<div class="shoppingcar_items_text"><span>' . $_SESSION['cart'][$i][1] . '</span><br/><em>NZD  ' . $_SESSION['cart'][$i][2] . '</em></div>
			</a>
			

<form id = "ShoppingCartDeleteForm" method="post" action="">
					<input type="image" id = "ShoppingCartDeleteInput" name="delectCart" src="/clients/www.kingdomtournz.com/image/productList/shoppingCartDelete.png" value="Delect" >
					<input type="hidden" value="' . $_SESSION['cart'][$i][0] . '" name="delect_id">
</form>

		</li>';
		}

		for ($j = 0; $j < $chMax; $j++) {
			echo '<li>
			<a class="shoppingcar_items">
			<div class="shoppingcar_items_img"><img src="' . $GLOBALS['bizURLroot'] . $_SESSION['chCart'][$j][0] . "/1.jpg" . '"></div>
			<div class="shoppingcar_items_text"><span>' . $_SESSION['chCart'][$j][1] . '</span><br/><em>NZD  ' . $_SESSION['chCart'][$j][2] . '</em></div>
			</a>
			

<form id = "ShoppingCartDeleteForm" method="post" action="">
					<input type="image" id = "ShoppingCartDeleteInput" name="delectCart" src="/clients/www.kingdomtournz.com/image/productList/shoppingCartDelete.png" value="Delect" >
					<input type="hidden" value="' . $_SESSION['chCart'][$j][0] . '" name="delect_ch_id">
</form>

		</li>';
		}
	}
	echo'
			</ul>
			</div>
			</li>
			</ul>
			</section>

			</div>';
}
?>


