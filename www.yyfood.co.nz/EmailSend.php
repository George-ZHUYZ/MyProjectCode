<?php
require_once dirname(__FILE__) . '/_sys/EmailOperation.php';

$orderCollection = array();
$subtotal = 0;
$gst = 0;
$name = "";
$email = "";
$phone = "";
$address = "";
$message = "";
$today = date('Y-m-d H:i:s');
$orderID = "";
$successHeader = '';
$unsuccessMessage = '';

//var_dump($_POST);
if (isset($_POST)) {

        if (key_exists('Product', $_POST)) {
                $productArray = isset($_POST['Product']) ? $_POST['Product'] : array();
                foreach ($productArray as $value)
                {
                        $pro = new Product();
                        $pro->ProductWithArray($value);
                        $orderCollection[] = $pro;
                }
                $subtotal = isset($_POST['subtotal']) ? number_format($_POST['subtotal'], 2) : 0;
                $gst = isset($_POST['gst']) ? number_format($_POST['gst'], 2) : 0;
                $name = isset($_POST['name']) ? $_POST['name'] : "";
                $email = isset($_POST['email']) ? $_POST['email'] : "";
                $phone = isset($_POST['phone']) ? $_POST['phone'] : "";
                $address = isset($_POST['address']) ? $_POST['address'] : "";
                $message = isset($_POST['message']) ? $_POST['message'] : "";
                
                $orderID = $orderID . date('mdhis');
        }


        $body = '<table width="800" border="0" style="border-spacing: 0; ">';
        $body = $body . '<tr>
    <td width="100" style="background-color: #1280cf;"><img name="" src="http://i3.minus.com/ibv5zjxZyFDTxR.png" width="108" height="98" alt="" /></td>
    <td width="186" style="background-color: #1280cf;">&nbsp;</td>
    <td width="300" style="background-color: #1280cf; color: white; font-size: large;"><div align="center">Order No: ' . $orderID . '</div></td>
  </tr>';
        $body = $body . '<tr>
    <td height="122" colspan="3" style="padding: 20px; text-align: left;"><p>Dear ' . $name . ',</p>
     <br>
    <p>Thank you for ordering from Y&Y Internaitional Limited.</p>
    <p>This is an automatically generated message to confirm receipt of your order via the Internet.</p>
    <p>Our customer service will contact you soon for the detail of payment and delivery.</p>
    <p>Please do not reply to this e-mail, but you may wish to save it for your records.</p>
    <br>
    <p>Thank you</p>
    </td>
  </tr>';
        $body = $body . '<tr>
    <td  colspan="3">';
        $body = $body . '<table class="orderTable" style="border-spacing: 0; width: 100%;"> ';
        $body = $body . '<thead>
                                <tr class="table-tr" >
                                        <th style="text-align: center; border: solid 1px rgba(178, 178, 178, 0.5); background: #1280cf;color: white;">Title</th>
                                        
                                        <th style="text-align: center; border: solid 1px rgba(178, 178, 178, 0.5); background: #1280cf;color: white;">Size</th>
                                        <th style="text-align: center; border: solid 1px rgba(178, 178, 178, 0.5); background: #1280cf;color: white;">Package Size</th>
                                        <th style="text-align: center; border: solid 1px rgba(178, 178, 178, 0.5); background: #1280cf;color: white;">Price</th>
                                        <th style="text-align: center; border: solid 1px rgba(178, 178, 178, 0.5); background: #1280cf;color: white;">Quantity</th>
                                        <th style="text-align: center; border: solid 1px rgba(178, 178, 178, 0.5); background: #1280cf;color: white;">Total</th>
                                </tr>
                        </thead>';
        $body = $body . ' <tbody>';
        for ($i = 0; $i < count($orderCollection); $i++)
        {
                $body = $body . '
                                        <tr style="border-bottom-color: rgba(0, 0, 0, 0.05);border-bottom-style: solid;border-bottom-width: 1px;">
                                                <td style="padding: 10px 10px;" ><span>' . $orderCollection[$i]->getShortName() . ' </span></td>
                                                
                                                <td style="padding: 10px 10px;" ><span>' . $orderCollection[$i]->getSize() . ' </span></td>
                                                <td style="padding: 10px 10px;" ><span>' . $orderCollection[$i]->getPackageSize() . '</span></td>
                                                <td style="padding: 10px 10px;" ><span>$' . $orderCollection[$i]->getPrice() . '</span></td>
                                                <td style="padding: 10px 10px;" ><span>' . $orderCollection[$i]->getQuanity() . '</span></td>
                                                <td style="padding: 10px 10px;" ><span>$' . $orderCollection[$i]->getTotal() . '</span></td>
                                        </tr>';
        }
        $body = $body . '<tfoot>
                <tr style="line-height: 35px;">
                <td colspan="2" style="border-bottom-color: transparent !important;border-left-color: transparent !important;"></td>
<td style="font-size: large; width: 70px; text-align: left;" >
                <td  colspan="2" style="text-align: left;">Price ex. GST: </td>
<td colspan="2" style="text-align: left;" >
        <span>$</span><span>' . $subtotal . '</span>
</td>
</tr>
<tr style="line-height: 35px;">
<td colspan="2" style="border-bottom-color: transparent !important;border-left-color: transparent !important;"></td>
<td style="font-size: large; text-align: left;" >
                <td  colspan="2" style="text-align: left;">GST: </td>
<td colspan="2" style=" text-align: left;" >
        <span>$</span><span>' . $gst . '</span>
</td>
</tr>
<tr style="line-height: 35px;">
<td colspan="2" style="border-bottom-color: transparent !important;border-left-color: transparent !important;"></td>
<td style="font-size: large;  text-align: left;" >
                <td  colspan="2" style="text-align: left;">Price incl. GST: </td>
<td colspan="2" style="text-align: left;" >
        <span>$</span><span>' . ($subtotal + $gst) . '</span>
</td>
</tr>

</tfoot>';

        $body = $body . ' </tbody>';
        $body = $body . '</table>';

        $body = $body . '</td>
  </tr>';
        $body = $body . ' <tr>
    <td  colspan="3"><table width="650" style="border-spacing: 0; margin-bottom: 50px;">
      <tr>
        <td style="text-align: left; padding-left: 30px; width: 170px; font-size: small;">Customer Name: </td>
        <td style="text-align: left; line-height: 30px; font-size: small;">' . $name . '</td>
      </tr>
      <tr>
        <td style="text-align: left; padding-left: 30px; width: 170px; font-size: small;;">Customer Email: </td>
        <td style="text-align: left; line-height: 30px; font-size: small;">' . $email . '</td>
      </tr>
      <tr>
        <td style="text-align: left; padding-left: 30px; width: 170px; font-size: small;">Customer Name: </td>
        <td style="text-align: left; line-height: 30px; font-size: small;">' . $phone . '</td>
      </tr>
      <tr>
        <td style="text-align: left; padding-left: 30px; width: 170px; font-size: small;">Customer Name: </td>
        <td style="text-align: left; line-height: 30px; font-size: small;">' . $address . '</td>
      </tr>
      <tr>
        <td style="text-align: left; line-height: 30px; padding-left: 30px; vertical-align: top; width: 170px; font-size: small;" >Customer Message: </td>
        <td style="text-align: left; line-height: 30px; vertical-align: top; font-size: small;">' . $message . '</td>
      </tr>
    </table>
    </td>
  </tr>';

        $body = $body . ' <tr style="border-top-color: rgba(18, 128, 207, 0.1);  border-top-width: 1px; border-top-style: solid;">
    <td height="78" colspan="2" style="padding: 20px; text-align: left;">';
        $body = $body . '<table width="550" border="0">
  <tr style="line-height: 20px;">
    <td width="65">Phone</td>
    <td width="316">+64 9 276 2268 or +64 9 270 3038</td>
  </tr>
  <tr style="line-height: 20px;">
    <td>Email</td>
    <td><a href="mailto:yyltd@hotmail.com">yyltd@hotmail.com</a></td>
  </tr>
  <tr style="line-height: 20px;">
    <td >Address</td>
    <td>10 Hotunui Drive, Mt Wellington, Auckland, New Zealand</td>
  </tr>
  <tr style="line-height: 20px;">
    <td >Website</td>
    <td><a href="http://www.yyfood.co.nz">www.yyfood.co.nz</a></td>
  </tr>
</table>';
        $body = $body . '</td>
    <td><p align="center"><p style="margin-top: 75px; font-size: small;">' . $today . '</p></p>
  </tr>
</table>';



//        $smtpserver = "ssl://smtp.gmail.com"; //您的smtp服务器的地址
        $smtpserver = "ssl://smtp.webhost.co.nz"; //您的smtp服务器的地址
        $port = 465; //smtp服务器的端口，一般是 25
        $smtpuser = "orders@yyfood.co.nz"; //您登录smtp服务器的用户名
        $smtppwd = "tangren2012"; //您登录smtp服务器的密码
        $mailtype = "HTML"; //邮件的类型，可选值是 TXT 或 HTML ,TXT 表示是纯文本的邮件,HTML 表示是 html格式的邮件
        $sender = "orders@yyfood.co.nz"; //发件人,一般要与您登录smtp服务器的用户名($smtpuser)相同,否则可能会因为smtp服务器的设置导致发送失败
        $smtp = new smtp($smtpserver, $port, true, $smtpuser, $smtppwd, $sender);
//$smtp->debug = FALSE; //是否开启调试,只在测试程序时使用，正式使用时请将此行注释
        $to = $email; //收件人
        $subject = "Y&Y Order ID: " . $orderID;
//        $send = 1;
        $send = $smtp->sendmail($to, $sender, $subject, $body, $mailtype);
        if ($send == 1) {
                $_POST = array();
//                emailToCompany($orderID,$body);
                $successHeader = 'window.location = "?SendSuccessful.php&t=o"; ';
        } else {
                $unsuccessMessage = '<h3 style="color: #1280cf;">邮件发送失败<h3><br>';
        }
}

function emailToCompany($orderID, $body) {
        $smtpserver = "ssl://smtp.webhost.co.nz"; //您的smtp服务器的地址
        $port = 465; //smtp服务器的端口，一般是 25
        $smtpuser = "orders@yyfood.co.nz"; //您登录smtp服务器的用户名
        $smtppwd = "tangren2012"; //您登录smtp服务器的密码
        $mailtype = "HTML"; //邮件的类型，可选值是 TXT 或 HTML ,TXT 表示是纯文本的邮件,HTML 表示是 html格式的邮件
        $sender = "orders@yyfood.co.nz"; //发件人,一般要与您登录smtp服务器的用户名($smtpuser)相同,否则可能会因为smtp服务器的设置导致发送失败
        $smtp = new smtp($smtpserver, $port, true, $smtpuser, $smtppwd, $sender);
//$smtp->debug = FALSE; //是否开启调试,只在测试程序时使用，正式使用时请将此行注释
        $to = "sales@yyfood.co.nz"; //收件人
        $subject = "Y&Y Order No. " . $orderID;
//        $send = 1;
        $send = $smtp->sendmail($to, $sender, $subject, $body, $mailtype);
}
?>

<style>

        .fullpage{
                width: 100% !important;
                height: 100%!important;
                text-align: center;
                vertical-align: middle;
                margin-left: auto;
                margin-right: auto;
        }
        #processbar{
                width: 95%;
                margin: auto;
        }
</style>
<script>
//        window.location = "?SendSuccessful.php";
<?php echo $successHeader; ?>

        setTimeout(function () {
                $('.progress .bar').each(function () {
                        var me = $(this);
                        var perc = me.attr("data-percentage");

                        //TODO: left and right text handling

                        var current_perc = 0;

                        var progress = setInterval(function () {
                                if (current_perc >= perc) {
                                        clearInterval(progress);
                                } else {
                                        current_perc += 1;
                                        me.css('width', (current_perc) + '%');
                                }
                                me.text((current_perc) + '%');
                        }, 1);
                });
        }, 100);
</script>
<div class="container-fluid fullpage">
        <?php // echo $body; ?>
        <div class="fullpage vcenter">
                <div class="centering" style="text-align: center; ">
                        <?php echo $unsuccessMessage; ?>
                        <div class="progress progress-success" id="processbar">
                                <div class="bar" style="float: left; width: 0%; background-color: #1280cf; color: white;" data-percentage="100"></div>
                        </div>
                </div>
        </div>
</div>
