<?php
require_once dirname(__FILE__) . '/interface/Hotel_CarDetail.php';
?>

<link href="/clients/www.kingdomtournz.com/css/css3_3d.css" rel="stylesheet" type="text/css"/>

<link href="/clients/www.kingdomtournz.com/css/country.css" rel="stylesheet" type="text/css"/>
<div class="journey_showPic">
	<?php
	require_once dirname(__FILE__) . '/firsrInnerPageGallery.php';
	getCountryDescription("nz");
	?>
</div>


<div id="northIslandPic">

	<?php
	require_once dirname(__FILE__) . '/interface/countries.php';
	getNorthDestination();
	?>

</div>
<div id="blackblock"> </div>
<div id="southIslandPic">



	<?php
	require_once dirname(__FILE__) . '/interface/countries.php';

	getSouthDestination();
	?>

</div>

