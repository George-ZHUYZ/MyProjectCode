
<?php

function getNorthDestination() {
	$condition = getConditions(array("belong_site"), array("string"), array("www.kingdomtour.co.nz"));
	$allResult = getOneRecord("Destinations", $condition);
	$northIsland = array(array());
	$northNum = 0;
	echo'<div class="islandName">北岛</div>';
	echo ' <ul id="gridDetails" class="group">';
	for ($i = 0; $i < count($allResult); $i++) {
		$temp = explode(", ", $allResult[$i][2]);
		if (count($temp) > 1) {
			if ($allResult[$i][3] == "north_island") {
				$northIsland[$northNum][0] = $allResult[$i][0];
				$northIsland[$northNum][1] = $temp[0];
				$northIsland[$northNum][2] = $allResult[$i][7];
				$northIsland[$northNum][3] = $allResult[$i][4];

				$northNum++;
			}
		}
	}

	for ($j = 0; $j < count($northIsland); $j++) {

		echo'  
            <li style="width:30%;height:216px;">
                <div class="countryd">
                	<p id="cityName" style="font-size: 20px; color:white;">' . $northIsland[$j][2] . '</p>
                    <a class="morecountry" href="?city&'.$northIsland[$j][0].'" ><p class="viewMore" style="font-size:12px;color:#ccc;">查看详情</p></a> 
                </div>
               <a class="morecountry" href="?city&'.$northIsland[$j][0].'"><img src="'.$northIsland[$j][3].'" /></a>
            </li>
			';
	}

	echo '</ul>';
}

function getSouthDestination() {
	$condition = getConditions(array("belong_site"), array("string"), array("www.kingdomtour.co.nz"));
	$allResult = getOneRecord("Destinations", $condition);
	$southIsland = array(array());
	$southNum = 0;
	
	echo'<div class="islandName">南岛</div>';
	echo ' <ul id="gridDetails" class="group">';
	for ($i = 0; $i < count($allResult); $i++) {
		$temp = explode(", ", $allResult[$i][2]);
		if (count($temp) > 1) {
			if ($allResult[$i][3] == "south_island") {
				$southIsland[$southNum][0] = $allResult[$i][0];
				$southIsland[$southNum][1] = $temp[0];
				$southIsland[$southNum][2] = $allResult[$i][7];
				$southNum++;
			}
		}
	}

	for ($j = 0; $j < count($southIsland); $j++) {

		echo'  
            <li style="width:30%;height:216px;">
                <div class="countryd">
                	<p id="cityName" style="font-size: 20px; color:white;">' . $southIsland[$j][2] . '</p>
                    <a class="morecountry" href="?city&'.$southIsland[$j][0].'"><p class="viewMore" style="font-size:12px;color:#ccc;">查看详情</p></a> 
                </div>
               <a class="morecountry" href="?city&'.$southIsland[$j][0].'"><img src="HTTP://image0.tangren.co.nz/goto/www.kingdomtournz.com/Destinations/'.$southIsland[$j][0].'/img_1.jpg"/></a>
            </li>
			';
	}

	echo '</ul>';
	
}

function getAUDestination() {
	$condition = getConditions(array("belong_site"), array("string"), array("www.kingdomtour.co.nz"));
	$allResult = getOneRecord("Destinations", $condition);
	$AUcity = array(array());
	$auNum = 0;
	echo'<div class="islandName">澳洲</div>';
	echo ' <ul id="gridDetails" class="group">';
	for ($i = 0; $i < count($allResult); $i++) {
		$temp = explode(", ", $allResult[$i][2]);
		if (count($temp) > 1) {
			if ($allResult[$i][3] == "australia") {
				$AUcity[$auNum][0] = $allResult[$i][0];
				$AUcity[$auNum][1] = $temp[0];
				$AUcity[$auNum][2] = $allResult[$i][7];

				$auNum++;
			}
		}
	}

	for ($j = 0; $j < count($AUcity); $j++) {

		echo'  
            <li style="width:30%; height:216px;">
                <div class="countryd">
                	<p id="cityName" style="font-size: 20px; color:white;">' . $AUcity[$j][2] . '</p>
                    <a class="morecountry" href="?city&'.$AUcity[$j][0].'&Australia" ><p class="viewMore" style="font-size:12px;color:#ccc;">查看详情</p></a> 
                </div>
               <a class="morecountry" href="?city&'.$AUcity[$j][0].'&Australia"><img src="HTTP://image0.tangren.co.nz/goto/www.kingdomtournz.com/Destinations/'.$AUcity[$j][0].'/img_1.jpg" /></a>
            </li>
			';
	}

	echo '</ul>';
}

?>

