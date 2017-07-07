


<?php
require_once dirname(__FILE__) . '/_sys/EmailOperation.php';

$successHeader = '';
$unsuccessMessage = '';


if (isset($_POST["email"])) {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $message = $_POST["message"];

        $smtpserver = "ssl://smtp.gmail.com"; //您的smtp服务器的地址
//$smtpserver = "ssl://smtp.webhost.co.nz"; //您的smtp服务器的地址
        $port = 465; //smtp服务器的端口，一般是 25
        $smtpuser = "clyde@shenlongzhen.com"; //您登录smtp服务器的用户名
        $smtppwd = "wd575859"; //您登录smtp服务器的密码
        $mailtype = "HTML"; //邮件的类型，可选值是 TXT 或 HTML ,TXT 表示是纯文本的邮件,HTML 表示是 html格式的邮件
        $sender = "clyde@shenlongzhen.com"; //发件人,一般要与您登录smtp服务器的用户名($smtpuser)相同,否则可能会因为smtp服务器的设置导致发送失败
        $smtp = new smtp($smtpserver, $port, true, $smtpuser, $smtppwd, $sender);
//$smtp->debug = FALSE; //是否开启调试,只在测试程序时使用，正式使用时请将此行注释
        $to = $email; //收件人
        $subject = "Visitor Message ";

        $body = 'Visitor : ' . $fname . '  ' . $lname . ''
                . '<br> Email address : ' . $email . ''
                . '<br>Phone : ' . $phone . ' '
                . '<br>Message : ' . $message;


//        $send = 1;
        $send = $smtp->sendmail($to, $sender, $subject, $body, $mailtype);
        if ($send == 1) {
                $_POST = array();
                $successHeader = 'window.location = "?SendSuccessful.php&t=c";';
        } else {
                $unsuccessMessage = '<h3 style="color: #1280cf;">邮件发送失败<h3><br>';
        }
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
        <div class="fullpage vcenter">
                <div class="centering" style="text-align: center; ">
                        <?php echo $unsuccessMessage; ?>
                        <div class="progress progress-success" id="processbar">
                                <div class="bar" style="float: left; width: 0%; background-color: #1280cf; color: white;" data-percentage="100"></div>
                        </div>
                </div>
        </div>
</div>


