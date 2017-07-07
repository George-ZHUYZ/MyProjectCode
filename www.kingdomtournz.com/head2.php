<?php ?>

<head>
	
	<?php 
	include_once dirname(__FILE__) . '/interface/title.php';
	/*dynamic title*/
	echoPageTitle($title); 
	?>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<meta name="viewport" content="width=device-width, initial-scale=0, maximum-scale=1, user-scalable=yes"/> 

<link type="image/png" href="/clients/www.kingdomtournz.com/image/logo.png" rel="shortcut icon">

<!--	<link href="/clients/www.kingdomtournz.com/css/staticPages/contact.css" rel="stylesheet" type="text/css"/>-->

	<!--<link href="/clients/www.kingdomtournz.com/css/staticPages/style_about.css" rel="stylesheet" type="text/css"/>-->



	<link href="/clients/www.kingdomtournz.com/css/staticPages/contact_styles.css" rel="stylesheet" type="text/css"/>

	<link href="/clients/www.kingdomtournz.com/css/template.css" rel="stylesheet" type="text/css" />

	<link href="/clients/www.kingdomtournz.com/css/layout.css" rel="stylesheet" type="text/css" />

	<link href="/clients/www.kingdomtournz.com/css/component.css" rel="stylesheet" type="text/css"  />

	<link href="/clients/www.kingdomtournz.com/css/header.css" rel="stylesheet" type="text/css"  />

	<link href="/clients/www.kingdomtournz.com/css/homePage.css" rel="stylesheet" type="text/css"  />

	<link href='/clients/www.kingdomtournz.com/css/journey/style.min.css' rel='stylesheet' type='text/css' />

	<link href="/clients/www.kingdomtournz.com/css/verticalNav_style.css" rel="stylesheet"  type="text/css" />

	<link href="/clients/www.kingdomtournz.com/css/basic.css" rel="stylesheet" type="text/css"  />

	<link href="/clients/www.kingdomtournz.com/css/footer.css" rel="stylesheet" type="text/css"  />

	<link href="/clients/www.kingdomtournz.com/css/zzsc.css" rel="stylesheet" type="text/css" />

	<!--购物车新添加的css-->
	<link href="/clients/www.kingdomtournz.com/css/orderform/shoppingcar_style.css" rel="stylesheet" type="text/css"/>
	
	<!--所有评论的css-->
	<link href="/clients/www.kingdomtournz.com/css/productDetail/pinglun.css" rel="stylesheet" type="text/css"/>

	<script src="/clients/www.kingdomtournz.com/js/journey/jquery-1.8.2.min.js" type="text/javascript"></script>

	<script type="text/javascript">
		$(document).ready(function() {

			/* 滑动/展开 */
			$("ul.expmenu li > div.vertical_title").click(function() {

				var arrow = $(this).find("span.arrow");

				if (arrow.hasClass("up")) {
					arrow.removeClass("up");
					arrow.addClass("down");
				} else if (arrow.hasClass("down")) {
					arrow.removeClass("down");
					arrow.addClass("up");
				}

				$(this).parent().find("ul.verticalNav").slideToggle();

			});

		});
	</script>
	<script language="JavaScript">
<!--//
function ShowMenu(obj,n){
 var Nav = obj.parentNode;
 if(!Nav.id){
  var BName = Nav.getElementsByTagName("ol");
  var HName = Nav.getElementsByTagName("h2");
  var t = 2;
 }else{
  var BName = document.getElementById(Nav.id).getElementsByTagName("span");
  var HName = document.getElementById(Nav.id).getElementsByTagName(".header");
  var t = 1;
 }
 for(var i=0; i<HName.length;i++){
  HName[i].innerHTML = HName[i].innerHTML.replace("-","+");
  HName[i].className = "";
 }
 obj.className = "h" + t;
 for(var i=0; i<BName.length; i++){if(i!=n){BName[i].className = "no";}}
 if(BName[n].className == "no"){
  BName[n].className = "";
  obj.innerHTML = obj.innerHTML.replace("+","-");
 }else{
  BName[n].className = "no";
  obj.className = "";
  obj.innerHTML = obj.innerHTML.replace("-","+");
 }
}
//-->
</script>


	<script type="text/javascript" src="/clients/www.kingdomtournz.com/js/jquery.hhService.js"></script>

	<script type="text/javascript">$(function() {
			$("#hhService").fix({float: 'left', minStatue: true, skin: 'green', durationTime: 0})
		});</script>

	<script type="text/javascript" src="/clients/www.kingdomtournz.com/js/jquery.stellar.min.js"></script>

	<script type="text/javascript" src="/clients/www.kingdomtournz.com/js/waypoints.min.js"></script>

	<script type="text/javascript" src="/clients/www.kingdomtournz.com/js/jquery.easing.1.3.js"></script>







<!--	<script type="text/javascript">



		.script("http://farm1.nzstatic.com/visit/alacrity/js/compiled/global_21a857d873718926_37587.js")

				.script("http://farm3.nzstatic.com/visit/alacrity/js/compiled/header_a3fdf74be59a2752_37587.js").wait(function() {

			jQuery.holdReady(false);

			$(function() {

				TNZ.init();

			});

		});



	</script> 


	<script type="text/javascript" src="/clients/www.kingdomtournz.com/js/hotelCarList/hotelCarList.js"></script>-->



</head>