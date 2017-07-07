<?php
//function productListString($productNameList){
//    $str = '';
//    foreach ($productNameList as $productNameItem){
//                    $str=$str.$productNameItem.'<br/>';
//                }
//    return $str;
//}
?>
<html>
    <head>
        <meta charset="utf-8">
		
		<link rel="stylesheet" media="screen" href="/clients/www.kingdomtournz.com/css/orderform/order_form_style.css" >
    </head>
    <body>



		<?php
		require_once dirname(__FILE__) . '/../_sys/EmailOperation.php';

		if (isset($_POST)) {

			$IDArray = array();
			if (key_exists('product_id', $_POST)) {
				$IDArray = $_POST['product_id'];
				$nameArray = $_POST['product_name'];
				$actualPriceArray = $_POST['product_actualPrice'];
				$wholePriceArray = $_POST['product_wholePrice'];
				$stateDateArray = $_POST['product_stateDate'];
				$peopleNumInput = $_POST['peopleNumInput'];
				$childNumInput = $_POST['childNumInput'];
			}
			$chIDArray = array();

			if (key_exists('h_name', $_POST)) {
//				$chIDArray = $_POST['ch_id'];
				$h_name = $_POST['h_name'];
				$h_actualPrice = $_POST['h_actualPrice'];
				$dateFrom = $_POST['dateFrom'];
				$dateTo = $_POST['dateTo'];
				$hotelroom=$_POST['hotelroomnum'];
			}

			if (key_exists('c_name', $_POST)) {
				$c_name = $_POST['c_name'];
				$c_actualPrice = $_POST['c_actualPrice'];
				$carDateFrom = $_POST['c_dateFrom'];
				$carDateTo = $_POST['c_dateTo'];
				$c_num=$_POST['c_num'];
			}
			$totalPrice = $_POST['orderform_total'];

			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$message = $_POST['message'];
			$accept = $_POST['accpet'];
			$today = date('Y-m-d H:i:s');
			$orderID="";
			for ($i = 0; $i < 3; $i++) {
				$int = rand(0, 25);
				$A_Z = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
				$orderID = $orderID.$A_Z[$int];
			}
			$orderID = $orderID.date('YmdHis');
		}
		$body = "<tr>"
				. "<th>名称</th>"
				. "<th>成人价</th>"
				. "<th>成人人数</th>"
				. "<th>儿童价</th>"
				. "<th>儿童人数</th>"
				. "<th>发团日期</th>"
				. "</tr>";
		for ($i = 0; $i < count($IDArray); $i++) {
			$body = $body . "<tr>"
					. "<td>" . $nameArray[$i] . "</td>"
					. "<td>" . $actualPriceArray[$i] . "</td>"
					. "<td>" . $peopleNumInput[$i] . "</td>"
					. "<td>" . $wholePriceArray[$i] . "</td>"
					. "<td>" . $childNumInput[$i] . "</td>"
					. "<td>" . $stateDateArray[$i] . "</td>"
					. "</tr>";
		}
		$body = $body . "<tr>"
				. "<th>名称</th>"
				. "<th>价格</th>"
                . "<th>房间</th>"
				. "<th>入住日期</th>"
				. "<th>离开日期</th>"
				
				. "<th>&nbsp;</th>"
				. "</tr>";
		for ($i = 0; $i < count($c_name); $i++) {
			$body = $body . "<tr>"
					. "<td>" . $h_name[$i] . "</td>"
					. "<td>" . $c_actualPrice[$i] . "</td>"
					. "<td>" . $hotelroom[$i]. "</td>"
					. "<td>" . $dateFrom[$i] . "</td>"
					. "<td>" . $dateTo[$i] . "</td>"
					. "<td>&nbsp;</td>"
					. "<td>&nbsp;</td>"
					. "</tr>";
		}
		$body = $body . "<tr>"
				. "<th>名称</th>"
				. "<th>价格</th>"
	         	. "<th>数量</th>"
				. "<th>租车日期</th>"
				. "<th>还车日期</th>"
				
				. "<th>&nbsp;</th>"
				. "</tr>";
		for ($i = 0; $i < count($c_name); $i++) {

			$body = $body . "<tr>"
					. "<td>" . $c_name[$i] . "</td>"
					. "<td>" . $c_actualPrice[$i] . "</td>"
          			. "<td>" . $c_num[$i] . "</td>"
					. "<td>" . $carDateFrom[$i] . "</td>"
					. "<td>" . $carDateTo[$i] . "</td>"
					. "<td>&nbsp;</td>"
					. "</tr>";
		}
		$body = $body . "<tr>"
				. "<th>&nbsp;</th>"
				. "<th>&nbsp;</th>"
				. "<th>&nbsp;</th>"
				. "<th>&nbsp;</th>"
				. "<th>&nbsp;</th>"
				. "<th>总价：NZD " . $totalPrice . "</th>"
				. "</tr>";
		$body = $body . "<tr>"
				. "<td>姓名：</td>"
				. "<td>$name</td>"
				. "<td>&nbsp;</td>"
				. "<td>&nbsp;</td>"
				. "<td>&nbsp;</td>"
				. "<td>&nbsp;</td>"
				. "</tr>";
		$body = $body . "<tr>"
				. "<td>邮箱：</td>"
				. "<td>$email</td>"
				. "<td>&nbsp;</td>"
				. "<td>&nbsp;</td>"
				. "<td>&nbsp;</td>"
				. "<td>&nbsp;</td>"
				. "</tr>";
		$body = $body . "<tr>"
				. "<td>电话：</td>"
				. "<td>$phone</td>"
				. "<td>&nbsp;</td>"
				. "<td>&nbsp;</td>"
				. "<td>&nbsp;</td>"
				. "<td>&nbsp;</td>"
				. "</tr>";
		$smtpserver = "ssl://smtp.webhost.co.nz"; //您的smtp服务器的地址
		$port = 465; //smtp服务器的端口，一般是 25
		$smtpuser = "booking@kingdomtournz.com"; //您登录smtp服务器的用户名
		$smtppwd = "tangren2012"; //您登录smtp服务器的密码
		$mailtype = "HTML"; //邮件的类型，可选值是 TXT 或 HTML ,TXT 表示是纯文本的邮件,HTML 表示是 html格式的邮件
		$sender = "booking@kingdomtournz.com"; //发件人,一般要与您登录smtp服务器的用户名($smtpuser)相同,否则可能会因为smtp服务器的设置导致发送失败
		$smtp = new smtp($smtpserver, $port, true, $smtpuser, $smtppwd, $sender);
//$smtp->debug = FALSE; //是否开启调试,只在测试程序时使用，正式使用时请将此行注释
		$to = $email; //收件人
		$subject = $orderID;
		$body = '<style>#letterBorder table td{text-align: center;}</style>'
				. '<p>亲爱的 ' . $name . ':</p>
<p>
您在肯定旅游网站上提交的旅游产品订单已确认预定成功。我们的客服人员会尽快与您联系处理付款细节。
</p>
<p>
订单号：'.$orderID.'
</p>
<div id="letterBorder" style="width:auto; border:solid 1px gray">
<table width=800>
' . $body . '
</table>
<p>留言：</p>
<div>' . $message . '</div>
<p>' . $today . '</p>'
				. '</div>';
		echo '<div id="success">';
		echo '<div id="successtext">';
		$send = $smtp->sendmail($to, $sender, $subject, $body, $mailtype);
		if ($send == 1) {
			echo '<h2>购买产品成功，您的订单号：'.$orderID.'</h2>';
			echo '<a href="javascript:self.close()">点此关闭</a>';
			sendtocompany($orderID,$name, $email, $phone, $message, $accept, $today, $body);
		} else {
			echo "邮件发送失败<br>";
			echo "原因：" . $smtp->logs;
		}
		echo '</div>';
		echo '</div>';
		function sendtocompany($orderID,$name, $email, $phone, $message, $accept, $today, $body) {
//			$smtpserver = "ssl://smtp.gmail.com"; //您的smtp服务器的地址
//			$smtpserver = "ssl://smtp.gmail.com"; //您的smtp服务器的地址
//			$port = 465; //smtp服务器的端口，一般是 25
//			$smtpuser = "clyde1229@gmail.com"; //您登录smtp服务器的用户名
//			$smtppwd = "wd575859"; //您登录smtp服务器的密码
//			$mailtype = "HTML"; //邮件的类型，可选值是 TXT 或 HTML ,TXT 表示是纯文本的邮件,HTML 表示是 html格式的邮件
//			$sender = "clyde1229@gmail.com"; //发件人,一般要与您登录smtp服务器的用户名($smtpuser)相同,否则可能会因为smtp服务器的设置导致发送失败
			$smtpserver = "ssl://smtp.webhost.co.nz"; //您的smtp服务器的地址
			$port = 465; //smtp服务器的端口，一般是 25
			$smtpuser = "booking@kingdomtournz.com"; //您登录smtp服务器的用户名
			$smtppwd = "tangren2012"; //您登录smtp服务器的密码
			$mailtype = "HTML"; //邮件的类型，可选值是 TXT 或 HTML ,TXT 表示是纯文本的邮件,HTML 表示是 html格式的邮件
			$sender = "booking@kingdomtournz.com"; //发件人,一般要与您登录smtp服务器的用户名($smtpuser)相同,否则可能会因为smtp服务器的设置导致发送失败
			$smtp = new smtp($smtpserver, $port, true, $smtpuser, $smtppwd, $sender);
//$smtp->debug = FALSE; //是否开启调试,只在测试程序时使用，正式使用时请将此行注释
			$to = "admin@kingdomtournz.com"; //收件人
			$subject = $orderID;
			$body = '<p>游客 ' . $name . '在肯定旅游网站上提交的旅游产品订单已确认预定成功。
</p>
<p>
订单号：'.$orderID.'
</p>
<div id="letterBorder" style="width:auto; border:solid 1px gray">
<table width=800>
' . $body . '
</table>
<p>留言：</p>
<div>' . $message . '</div>
<p>' . $today . '</p>'
					. '</div>';

			$send = $smtp->sendmail($to, $sender, $subject, $body, $mailtype);
		}
		?>
    </body>

</html>