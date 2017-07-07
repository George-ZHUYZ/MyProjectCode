
<?php

function relevantProducts($ID) {
	$sample = getValue("products", $ID);
	$keyWord = $sample[3];
	$condition = getConditions(array("RcTypeKey"), array("string"), array($keyWord));
	$allResult = getOneRecord("products", $condition);
	$productList = array(array());
	
	if (strstr($keyWord, "tours")) {
		$toursNum=0;
		for ($i = 0; $i < count($allResult); $i++) {
			if ($allResult[$i][13] == "on") {
				for ($j = 0; $j < count($allResult[$i]); $j++) {
					if ($j == 4) {
						$introductions = explode("<p>#introduction#</p>", $allResult[$i][4]);
						$briefs = explode("<p>#title#</p>", $introductions[0]);
						$productList[$toursNum][4] = $briefs[1];
					} else {
						$productList[$toursNum][$j] = $allResult[$i][$j];
					}
				}
				$toursNum++;
			}
		}
	} else if (strstr($keyWord, "attractions")) {
		$temp = explode("_", $sample[2]);
		$newKeyWord = $temp[0];
		$num = 0;
		for ($i = 0; $i < count($allResult); $i++) {
			if ((strstr($allResult[$i][2], $newKeyWord) && ($allResult[$i][13] == "on"))) {
				for ($j = 0; $j < count($allResult[$i]); $j++) {
					if ($j == 4) {
						$introductions = explode("<p>#introduction#</p>", $allResult[$i][4]);
						$briefs = explode("<p>#title#</p>", $introductions[0]);
						$productList[$num][4] = $briefs[1];
					} else {
						$productList[$num][$j] = $allResult[$i][$j];
					}
				}
				$num++;
			}
		}
	}

	return $productList;
}

function showRelevantProducts($productList) {

	for ($i = 0; $i < count($productList); $i++) {
		echo '<div class="relevantItem">';
		echo '<a href="?product&' . $productList[$i][0] . '">' . $productList[$i][1] . '</a>';
		echo '</div>';
	}
}

?>
