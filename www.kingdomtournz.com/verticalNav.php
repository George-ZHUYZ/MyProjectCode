<?php

function loadProduct($web) {

	$con = getConditions(array("belong_site"), array("string"), array($web));

	$all = getOneRecord("Destinations", $con);
	$conutries = array();
	for ($i = 0; $i < count($all); $i++) {

		$LocationString = $all[$i][2];

		$teml = explode(", ", $LocationString);

		$teml = array_reverse($teml);
		$con = count($teml);
		if ($con == 1) {
			if (!key_exists($teml[0], $conutries)) {
				$conutries[$teml[0]] = array();
			}
//			else {
//				if (!key_exists($teml[1], $conutries[$teml[0]])) {
//					$conutries[$teml[0]][$teml[1]] = array('id' => $all[$i][0]);
//				}
//			}
		}
		if ($con == 2) {
			if (!key_exists($teml[0], $conutries)) {
				$conutries[$teml[0]][$teml[1]] = array('id' => $all[$i][0]);
			} else {
				if (!key_exists($teml[1], $conutries[$teml[0]])) {
					$conutries[$teml[0]][$teml[1]] = array('id' => $all[$i][0]);
				}
			}
		}
		if ($con > 2) {
			$index = 2;
			while ($index < $con) {
				if (!key_exists($teml[$index - 1], $conutries[$teml[$index - 2]])) {
					$conutries[$teml[$index - 2]][$teml[$index - 1]][$teml[$index]] = array('id' => $all[$i][0]);
				} else {
					$conutries[$teml[$index - 2]][$teml[$index - 1]][$teml[$index]] = array('id' => $all[$i][0]);
				}
				$index++;
			}
		}
	}

	return $conutries;
}

//$countryName = "New Zealand"  "Australia"  "Others"
function showVerticalNav($conutries, $countryName = "New Zealand") {
	if ($countryName == "New Zealand") {
		echo '	<ul class="expmenu">';
	foreach ($conutries[$countryName] as $parts => $value) {
		echo '  <li>';
		if (count($value) <= 1) {
			if (key_exists("id", $value)) {
				echo '<div class="vertical_title">
									<a href="?city&' . ($value['id']) . '"><span class="label" >' . $parts . '</span></a>
									
								</div>';
			} else {
				echo '<div class="vertical_title">
									<span class="label" >' . $parts . '</span>
										<span class="arrow down"></span>	
								</div>';
				echo '<span class="">';
				echo '<ul class="verticalNav" style="display:none;">';
				foreach ($value as $city => $town) {
					if ($city != "id") {
						echo'<li><a href="?city&' . ($value[$city]['id']) . '"> ' . $city . '</a></li>';
					}
				}
				echo '</ul>';
				echo '</span>';
			}
		} else {
			echo '<div class="vertical_title">
									<span class="label" >' . $parts . '</span>
										<span class="arrow down"></span>	
							</div>';
			echo '<span class="">';
			echo '<ul class="verticalNav" style="display:none;">';
			foreach ($value as $city => $town) {
				if ($city != "id") {
					echo'<li><a href="?city&' . ($value[$city]['id']) . '"> ' . $city . '</a></li>';
				}
			}
			echo '</ul>';
			echo '</span>';
		}

		echo '</li>';
	}
	} else {
		echo '	<ul class="expmenu">';
		foreach ($conutries[$countryName] as $parts => $value) {
			echo '  <li>';
			if (count($value) <= 1) {
				if (key_exists("id", $value)) {
					echo '<div class="vertical_title">
									<a href="?city&' . ($value['id']) . '&' . $countryName . '"><span class="label" >' . $parts . '</span></a>
									
								</div>';
				} else {
					echo '<div class="vertical_title">
									<span class="label" >' . $parts . '</span>
										<span class="arrow down"></span>	
								</div>';
					echo '<span class="">';
					echo '<ul class="verticalNav" style="display:none;">';
					foreach ($value as $city => $town) {
						if ($city != "id") {
							echo'<li><a href="?city&' . ($value[$city]['id']) . '&' . $countryName . '"> ' . $city . '</a></li>';
						}
					}
					echo '</ul>';
					echo '</span>';
				}
			} else {
				echo '<div class="vertical_title">
									<span class="label" >' . $parts . '</span>
										<span class="arrow down"></span>	
							</div>';
				echo '<span class="">';
				echo '<ul class="verticalNav" style="display:none;">';
				foreach ($value as $city => $town) {
					if ($city != "id") {
						echo'<li><a href="?city&' . ($value[$city]['id']) . '&' . $countryName . '"> ' . $city . '</a></li>';
					}
				}
				echo '</ul>';
				echo '</span>';
			}

			echo '</li>';
		}
	}
}
?>

