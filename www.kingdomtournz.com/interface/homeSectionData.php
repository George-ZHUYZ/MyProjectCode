
<?php

function homeSectionData($countryName) {
	$condition = getConditions(array("PromoType", "belong_site","edit_type"),
			array("string", "string","string"), array("hot", "www.kingdomtour.co.nz","on"));
	$allResult = getValuesLike("products", "RcTypeKey", $countryName, $condition);
	$homeSectionData = array(array());
	for ($i = 0; $i < count($allResult); $i++) {
			$homeSectionData[$i][0] = $allResult[$i][0];
			$homeSectionData[$i][1] = $allResult[$i][1];
			$temp_1 = explode("<p>#introduction#</p>", $allResult[$i][4]);
			$temp_2 = explode("<p>#title#</p>", $temp_1[0]);
			$homeSectionData[$i][2] = $temp_2[1];
			$homeSectionData[$i][3] = formatePrice($allResult[$i][6]);
			$homeimg = $allResult[$i][5];
			$homeimg=  explode("#pic#",$homeimg );
			$homeimg[0]=  str_replace("\\", "/", $homeimg[0]);
			$homeSectionData[$i][4] = $homeimg[0];
	}
	
	
	return $homeSectionData;
}

?>
