
<?php

getDiscountProducts("www.kingdomtour.co.nz");

function getDiscountProducts($belong_site) {
	$condition = getConditions(array("belong_site"), array("string"),
			array($belong_site));
	$allResult = getOneRecord("products", $condition);
	$discountProductList = array(array());
	$num = 0;
	for ($i = 0; $i < count($allResult); $i++) {
		if (($allResult[$i][7] != 100) && ($allResult[$i][13] == "on")) {
			for ($j = 0; $j < count($allResult[$i]); $j++) {
				if ($j == 4) {
					$introductions = explode("<p>#introduction#</p>", $allResult[$i][4]);
					$briefs = explode("<p>#title#</p>", $introductions[0]);
					$discountProductList[$num][4] = $briefs[1];
				} else {
					$discountProductList[$num][$j] = $allResult[$i][$j];
				}
			}
			$num++;
		}
	}
	for ($a = 0; $a < count($discountProductList); $a++) {
		if (count($discountProductList[$a]) != 0) {
			displayList($discountProductList[$a]);
		}
	}
//			return $discountProductList;
}
?>

