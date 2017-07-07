<?php

	include_once dirname(__FILE__) . '/interface/pageTitle.php';
	include_once dirname(__FILE__) . '/languages/cookiesAnalysis.php';
	require_once dirname(__FILE__) . '/../../_sys/_class/url/URLprocess.php';
	require_once dirname(__FILE__) . '/../../_sys/_class/database/tableOperation.php';
	session_set_cookie_params(0, '/', "$suchdomain");
	session_start();


	$query = url_code();
	$title = explode("&", $query);
	/*dynamic title*/
	echoPageTitle($title);
?>

<!--icon-->
<link rel="shortcut icon" type="image/ico" href="clients/www.eckomautoparts.com/image/eckom.ico" />

<!--scalable setting-->
<meta name="viewport" content="width=device-width, initial-scale=0, maximum-scale=1, user-scalable=yes"/> 



<!--css for basic pages-->
<link href="clients/www.eckomautoparts.com/css/basic.css" rel="stylesheet" type="text/css" />
<link href="clients/www.eckomautoparts.com/css/header.css" rel="stylesheet" type="text/css" />
<link href="clients/www.eckomautoparts.com/css/body.css" rel="stylesheet" type="text/css" />
<link href="clients/www.eckomautoparts.com/css/footer.css" rel="stylesheet" type="text/css" />

<!--css for static pages-->
<link href="clients/www.eckomautoparts.com/css/staticPages/aboutus.css"rel="stylesheet" type="text/css" />
<link href="clients/www.eckomautoparts.com/css/staticPages/support.css"rel="stylesheet" type="text/css" />

<!--css for dynamic pages-->
<link href="clients/www.eckomautoparts.com/css/dynamicPages/parts.css" rel="stylesheet" type="text/css" />
<link href="clients/www.eckomautoparts.com/css/dynamicPages/description.css"rel="stylesheet" type="text/css" />

<!--css for effects-->
<link href="clients/www.eckomautoparts.com/css/effect/round_shade.css"rel="stylesheet" type="text/css" />



<!--scripts-->
<script type="text/javascript" src="clients/www.eckomautoparts.com/js/jquery-1.8.3.js"></script>
<script src="clients/www.eckomautoparts.com/js/jquery.msAccordion.js"></script>
<script src="clients/www.eckomautoparts.com/js/content_zoom.js"></script>



<script language = "javascript" type = "text/javascript">
    $(document).ready(function() {
        $("#accordion3").msAccordion({vertical: true});
    })
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$('div.small_pic a').fancyZoom({scaleImg: true, closeOnClick: true});
		$('#zoom_word_1').fancyZoom({width:400, height:200});
		$('#zoom_word_2').fancyZoom();
		$('#zoom_flash').fancyZoom();
	});
</script>

<script type="text/javascript">
var Swiftype = window.Swiftype || {};
  (function() {
    Swiftype.key = 'xj6zNyS6Zxudo4yMuPs2';
    Swiftype.renderStyle = 'inline';

    /** DO NOT EDIT BELOW THIS LINE **/
    var script = document.createElement('script'); script.type = 'text/javascript'; script.async = true;
    script.src = "//s.swiftypecdn.com/embed.js";
    var entry = document.getElementsByTagName('script')[0];
    entry.parentNode.insertBefore(script, entry);
  }());
</script>

<script language = "javascript" type = "text/javascript">
	function changeTitleToSearch(){
		window.document.title="SEARCH RESULTS - ECKOM AUTO PARTS"
	}
</script>