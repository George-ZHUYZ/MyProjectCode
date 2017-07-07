	

<?php
require_once dirname(__FILE__) . '/interface/productDetailInterface.php';
require_once dirname(__FILE__) . '/_sys/URLprocess.php';
require_once dirname(__FILE__) . '/_sys/databaseOperation.php';
require_once dirname(__FILE__) . '/_sys/tableOperation.php';
require_once dirname(__FILE__) . '/_sys/globalVariables.php';
require_once dirname(__FILE__) . '/_sys/dataProcess.php';






if (isset($_POST)) {




	$IDArray = array();
	if (key_exists('product_id', $_POST)) {
		$IDArray = $_POST['product_id'];
		$nameArray = $_POST['product_name'];
		$actualPriceArray = $_POST['product_actualPrice'];
		$wholePriceArray = $_POST['product_wholePrice'];
		$stateDateArray = $_POST['product_stateDate'];
	}

//	if (key_exists('peoplenum', $_POST)) {
//	$adultNumArray = $_POST['peoplenum'];
//	}
//	
//	if (key_exists('childnum', $_POST)) {
//        $childNumArray = $_POST['childnum'];
//	}
	$chIDArray = array();
	if (key_exists('ch_id', $_POST)) {
		$chIDArray = $_POST['ch_id'];
		$chNameArray = $_POST['ch_name'];
		$chActualPriceArray = $_POST['ch_actualPrice'];
		$chTypeArray = $_POST['ch_type'];

		$carNum = 0;
		$hotelNum = 0;
		for ($i = 0; $i < count($chTypeArray); $i++) {
			if ($chTypeArray[$i] == "car_rental") {
				$carIDArray[$carNum] = $chIDArray[$i];
				$carNameArray[$carNum] = $chNameArray[$i];
				$carPriceArray[$carNum] = $chActualPriceArray[$i];
				$carNum++;
			} else {
				$hotelIDArray[$hotelNum] = $chIDArray[$i];
				$hotelNameArray[$hotelNum] = $chNameArray[$i];
				$hotelPriceArray[$hotelNum] = $chActualPriceArray[$i];
				$hotelNum++;
			}
		}
	}
}
?>







<html style="background:transparent url('image/orderform/orderformhtmlbackground.jpg');">

    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <link rel="stylesheet" media="screen" href="/clients/www.kingdomtournz.com/css/orderform/order_form_style.css" >

        <link rel="stylesheet" media="screen" href="/clients/www.kingdomtournz.com/css/orderform/pikaday.css" >
		<script src="/clients/www.kingdomtournz.com/js/journey/jquery-1.8.2.min.js" type="text/javascript"></script>
		<script src="/clients/www.kingdomtournz.com/js/orderform/order.js" type="text/javascript"></script>
		<link href="/clients/www.kingdomtournz.com/css/orderform/datepicker.css" rel="stylesheet" type="text/css"/>
		<script src="/clients/www.kingdomtournz.com/js/orderform/bootstrap-datepicker.js" type="text/javascript"></script>
    </head>

    <body>
		<div id="orderform">
			<div id="orderhead"> <div id="orderhead_title">预订</div></div>
			<!--			<form class="order_contact_form" action="/clients/www.kingdomtournz.com/interface/getinfo.php" method="post" name="contact_form">-->
			<form class="order_contact_form" action="/clients/www.kingdomtournz.com/interface/getinfo.php" method="post" name="contact_form"> 
				<div id="orderbody">

					<div class="product_detail_price_orderdetail">

						<div class="orderProducts">

							<div class="orderProductsTitle">
								<div class="orderProductsTitleName">景<br>点</div>
							</div>

							<div class="orderTable">
								<div class="orderTableTitle">
									<table id="orderTableProductsTitle" cellspacing="0px">
										<tr class="trTitle">
											<td class="tdName">名称</td>
											<td >成人价(NZD)</td>
											<td >成人数量</td>
											<td >儿童价(NZD)</td>
											<td >儿童数量</td>
											<td class="tdDate">发团日期</td>
											<td >总价</td>
										</tr>
									</table>
								</div>
								<div class="orderTableContent">
									<table id="orderTableProductsContent" cellspacing="0px">
										<?php
										if (!empty($IDArray)) {
											for ($i = 0; $i < count($IDArray); $i++) {
												echo '<tr class="trContent">';
												echo' <input type="hidden"  name="product_id[]" id="" value="' . $IDArray[$i] . '" >';
												echo' <input type="hidden"  name="product_name[]" id="" value="' . $nameArray[$i] . '" >';

												echo' <input type="hidden"  name="product_actualPrice[]" id="" value="' . $actualPriceArray[$i] . '" >';
												echo' <input type="hidden"  name="product_wholePrice[]" id="" value="' . $wholePriceArray[$i] . '" >';
												echo' <input type="hidden"  name="product_stateDate[]" id="" value="' . $stateDateArray[$i] . '" >';
												echo '<td class="tdName">' . $nameArray[$i] . '</td>';
												$p1 = str_replace(",", "", $actualPriceArray[$i]);
												echo '<td class="peoplenumprice"><span>' . $p1 . '</span></td>';
												echo '<td class="peoplenumpallets"><input  class="peoplenuminput" id="peoplenum" type="number"  placeholder="0" value="0" name="peopleNumInput[]"></input></td>';
												echo '<td class="people-row-total"><input type="hidden" class="people-row-total-input" value="0"></input></td>';
												$p2 = str_replace(",", "", $wholePriceArray[$i]);
												echo '<td class="childnumprice"><span>' . $p2 . '</span></td>';
												echo '<td class="childnumpallets"><input  class="childnuminput" id="childnum" type="number"  placeholder="0" value="0" name="childNumInput[]"></input></td>';
												echo '<td class="child-row-total"><input type="hidden" class="child-row-total-input" value="0"></input></td>';
												echo '<td class="tdDate">' . $stateDateArray[$i] . '</td>';
												echo '<td class="row-total"><input style="width:75px;"type="text" name="" class="row-total-input" id="turface-pro-league-row-total" placeholder="NZD" disabled="disabled"></input></td>';
												echo '</tr>';
											}
										}
										?>

									</table>
								</div>
							</div>
						</div>

						<div class="orderHotel">

							<div class="orderHotelTitle">
								<div class="orderHotelTitleName">住<br>宿</div>
							</div>

							<div class="orderTable">
								<div class="orderTableTitle">
									<table id="orderTableHotelTitle" cellspacing="0px">
										<tr class="trTitle">
											<td class="tdName">名称</td>
											<td >价格(NZD)</td>
											<td >房间</td>
											<td class="tdDate">入住日期</td>
											<td class="tdDate">退房日期</td>
											<td >总价</td>
										</tr>
									</table>
								</div>

								<div class="orderTableHotelContent">
									<table id="orderTableHotelContent" cellspacing="0px">
										<?php
										if (!empty($hotelIDArray)) {
											for ($i = 0; $i < count($hotelIDArray); $i++) {
												echo '<tr class="trContent">';

												echo' <input type="hidden"  name="h_name[]" id="" value="' . $hotelNameArray[$i] . '" >';
												echo' <input type="hidden"  name="h_actualPrice[]" id="" value="' . $hotelPriceArray[$i] . '" >';


												echo '<td class="tdName">' . $hotelNameArray[$i] . '</td>';
												$p3 = str_replace(",", "", $hotelPriceArray[$i]);
												echo '<td class="hotelroomnumprice"><span>' . $p3 . '</span></td>';
												echo '<td class="hotelroomnumpallets"><input  class="hotelroominput" id="hotelroomnum" type="number"  placeholder="0" name="hotelroomnum[]" value="0"></input></td>';
												echo'<td class="tdDateF"><input name="dateFrom[]" id="datepickerFrom" class="form-control"  type="text"  placeholder="" required pattern="(([0-9]+)*)(\\)(([0-9]+)*)(\\)(([0-9]+)*)" /></td>';
												echo '<td class="tdDateT"><input name="dateTo[]" id="datepickerTo" class="form-control"  type="text"  placeholder="" required pattern="(([0-9]+)*)(\\)(([0-9]+)*)(\\)(([0-9]+)*)" /></td>';
												echo '<td class="h_day"><input  class="h_dayinput" name= "h_daynum[]" id="h_daynum" type="hidden"  placeholder="1" value="0"></input></td>';
												echo '<td class="row-total"><input style="width:75px;" type="text" class="row-total-input" id="turface-pro-league-row-total" placeholder="NZD" disabled="disabled"></input></td>';
												echo '</tr>';
											}
										}
										?>
									</table>
								</div>
							</div>
						</div>
						<div class="orderCars">

							<div class="orderCarsTitle">
								<div class="orderCarsTitleName">租<br>车</div>
							</div>

							<div class="orderTable">
								<div class="orderTableTitle">
									<table id="orderTableCarsTitle" cellspacing="0px">
										<tr class="trTitle">
											<td class="tdName">名称</td>
											<td >价格(NZD)</td>
											<td >数量</td>
											<td class="tdDate">租车日期</td>
											<td class="tdDate">还车日期</td>
											<td >总价</td>
										</tr>
									</table>
								</div>
								<div class="orderTableCarsContent">
									<table id="orderTableCarsContent" cellspacing="0px">
										<?php
										if (!empty($carIDArray)) {
											for ($i = 0; $i < count($carIDArray); $i++) {
												echo '<tr class="trContent">';

												echo' <input type="hidden"  name="c_name[]" id="" value="' . $carNameArray[$i] . '" >';
												echo' <input type="hidden"  name="c_actualPrice[]" id="" value="' . $carPriceArray[$i] . '" >';

												echo '<td class="tdName">' . $carNameArray[$i] . '</td>';
												$p3 = str_replace(",", "", $carPriceArray[$i]);
												echo '<td class="carsnumprice"><span>' . $p3 . '</span></td>';
												echo '<td class="carnumpallets"><input  class="carinput" name="c_num[]" id="carnum" type="number"  placeholder="1" value="1"></input></td>';
												echo'<td class="c_tdDateF"><input name="c_dateFrom[]" id="datepickerFrom" class="form-control"  type="text"  placeholder="" required pattern="(([0-9]+)*)(\\)(([0-9]+)*)(\\)(([0-9]+)*)" /></td>';
												echo '<td class="c_tdDateT"><input name="c_dateTo[]" id="datepickerTo" class="form-control"  type="text"  placeholder="" required pattern="(([0-9]+)*)(\\)(([0-9]+)*)(\\)(([0-9]+)*)" /></td>';
												echo '<td class="c_day"><input  class="c_dayinput" name= "c_daynum[]" id="c_daynum" type="hidden"  placeholder="1" value="0"></input></td>';
												echo '<td class="row-total"><input style="width:75px;" type="text" class="row-total-input" id="turface-pro-league-row-total" placeholder="NZD" disabled="disabled"></input></td>';
												echo '</tr>';
											}
										}
										?>
									</table>
								</div>
							</div>
						</div>



						<div class="totalPriceButton">
							<div class="totalPrice">总价：NZD <input style="width:160px; height: 40px;" type="text" class="total-box" name="product-subtotal" id="product-subtotal" placeholder="0" disabled="disabled"></div></div>
						<input type="hidden" id="orderform_total" name="orderform_total"/>
					</div>
					<!--</form>-->


				</div>
				<div id="ordercenter">

					<table class="submitFormTable" border="1" width="35%"  style="border-width: 0px;">
						<tr>

							<td style="border-style: none; border-width: medium">　


								<ul>

									<li class="messageli">

										<label for="name">姓名:</label>

										<input name ="name" type="text"  placeholder="your name" required />

									</li>

									<li class="messageli">

										<label for="email">电子邮件:</label>

										<input type="email" name="email" placeholder="example@something.com" required pattern="[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$"/>

										<span class="form_hint">正确格式为：example@something.com</span>

									</li>

									<li class="messageli">

										<label for="phone">电话:</label>

										<input name="phone" type="text"  placeholder="0123456789" required pattern="(([0-9])+)*"/>

									</li>


									<li class="messageli">

										<label for="message">留言:</label>

										<textarea name="message" cols="40" rows="6" placeholder="" ></textarea>

									</li>
									<li class="accpet"> 
										<input name="accpet" type="checkbox" id="formAccpet" value="1" checked="checked"/><a>我同意接收肯定旅游发来的打折信息邮件</a>
									</li>
									<li class="buttonli">

										<button class="order_submit" type="submit">提交</button>

									</li>

								</ul>

								<?php
//								for ($i = 0; $i < count($IDArray); $i++) {
//									echo' <input type="hidden"  name="product_id[]" id="" value="' . $IDArray[$i] . '" >';
//									echo' <input type="hidden"  name="product_name[]" id="" value="' . $nameArray[$i] . '" >';
//									echo' <input type="hidden"  name="product_actualPrice[]" id="" value="' . $actualPriceArray[$i] . '" >';
//									echo' <input type="hidden"  name="product_wholePrice[]" id="" value="' . $wholePriceArray[$i] . '" >';
//									echo' <input type="hidden"  name="product_stateDate[]" id="" value="' . $stateDateArray[$i] . '" >';
//								}
//								for ($i = 0; $i < count($chIDArray); $i++) {
//									echo' <input type="hidden"  name="ch_id[]" id="" value="' . $chIDArray[$i] . '" >';
//									echo' <input type="hidden"  name="ch_name[]" id="" value="' . $chNameArray[$i] . '" >';
//									echo' <input type="hidden"  name="ch_actualPrice[]" id="" value="' . $chActualPriceArray[$i] . '" >';
//									echo' <input type="hidden"  name="ch_type[]" id="" value="' . $chTypeArray[$i] . '" >';
//								}
								?>



							</td>

						</tr>

					</table>

				</div>
			</form>
<script>
$('.tdDateF input').datepicker({
	format: "yyyy/mm/dd",
    startDate: "today",
    language: "zh-CN",
    calendarWeeks: true,
    todayHighlight: true
});
$('.tdDateT input').datepicker({
	format: "yyyy/mm/dd",
    startDate: "today",
    language: "zh-CN",
    calendarWeeks: true,
    todayHighlight: true
});
$('.c_tdDateF input').datepicker({
	format: "yyyy/mm/dd",
    startDate: "today",
    language: "zh-CN",
    calendarWeeks: true,
    todayHighlight: true
});
$('.c_tdDateT input').datepicker({
	format: "yyyy/mm/dd",
    startDate: "today",
    language: "zh-CN",
    calendarWeeks: true,
    todayHighlight: true
});
</script>
			<script>
				function setPrice($i, $adultPrice, $childPrice, $adultNum, $childNum) {
					$adultNum = document.getElementById(<?php echo '"' . "peoplenum'.$i.'" . '"' ?>).value;
					$childNum = document.getElementById(<?php echo '"' . "childnum'.$i.'" . '"' ?>).value;
					document.getElementById(<?php echo '"' . "tripPrice'.$i.'" . '"' ?>).value = $adultPrice * $adultNum + $childPrice * $childNum;
				}</script>
    </body>

</html>