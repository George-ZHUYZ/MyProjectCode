<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once dirname(__FILE__) . '/interface/productDetailInterface.php';
require_once dirname(__FILE__) . '/interface/getSearchProducts.php';


if(isset($_POST['keyword'])){
$keyword = $_POST['keyword'];}else{$keyword = $title[1];}
$belong_site = "www.kingdomtour.co.nz"

?>
<link href="/clients/www.kingdomtournz.com/css/journey/nz_tab_style.css" rel="stylesheet" type="text/css"/>
<link href="/clients/www.kingdomtournz.com/css/productList.css" rel="stylesheet" type="text/css"/>
<div id="journeyList">
	<div class="tab">

		<ul class="tabs">
			<li><a href="#">"<?php echo $keyword;?>"的搜索结果</a></li>
		</ul> <!-- / tabs -->

		<div class="tab_content">

			<div class="tabs_item">
				<?php

					if(!getSearchProducts($keyword,$belong_site)){echo '<div style="font-size:13px;margin-left:20px;">暂无结果。</div>';}
				?>
			</div> <!-- / tabs_item -->
		</div> <!-- / tab_content -->
	</div> <!-- / tab -->


</div>
