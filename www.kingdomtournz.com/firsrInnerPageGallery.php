
<?php
function getCountryDescription($title) {
	$condition = getConditions(array("Title"), array("string"), array($title));
	$countryRecord = getOneRecord("Destinations", $condition);
	displayCountryDescription($countryRecord[0][2],$countryRecord[0][4], $countryRecord[0][6]);
}

function displayCountryDescription($countryName,$countryImage, $countryDescription) {
	if (strcasecmp($countryName, "others")==0) {
		$countryName = "PACIFIC ISLAND";
	}
	$correctURL=  str_replace("\\", "/",$countryImage );
	echo '<div class="grid">
					<figure class="effect-sarah">
						<img src="'.$correctURL.'" alt="' . (strtolower($countryName)) . '" width="950" height="460">
					<figcaption>';

	echo '<h2>' . $countryName . '</h2>';
	echo '<p>' . $countryDescription . '</p>';
	echo '	</figcaption>			
				</figure>
			</div>';
}
?>
