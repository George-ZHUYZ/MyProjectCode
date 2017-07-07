<meta charset="UTF-8">
<meta http-equiv="refresh" content="1;url=<?php echo $_SERVER['HTTP_REFERER']?>">
<?php

require_once dirname(__FILE__) .'/_sys/URLprocess.php';
require_once dirname(__FILE__) .'/_sys/tableOperation.php';

$name = $_POST['username'];
$email = $_POST['email'];
$comment = $_POST['commend'];
$rate1 = $_POST['rate1'];
$rate2 = $_POST['rate2'];
$rate3 = $_POST['rate3'];
$ID = $_POST['ID'];
$ip = getIP();
$date = date("Y", time());
$total=0;
if ($rate1 < 3 || $rate2 < 3 || $rate3 < 3) {
	$total = round((($rate1 + $rate2 + $rate3) / 3) - (1 / 3));
} else {
	$total = round(($rate1 + $rate2 + $rate3) / 3);
}
if(empty($name))
{
	$name="匿名网友";
}
if(empty($email))
{
	$email="null";
}
$comment=array($name,$email,$comment,$total); 

$domain=$_COOKIE['thisdomain'];
if(!empty($ID))
{
	if(strlen($comment[2])>3)
	{
		
		if(updateComment($ID, $comment, $domain, $date))
		{
			echo '<a href="javascript:history.back(-1)">评论成功，点此返回上一页</a>';
		}else
		{
			echo '<a href="javascript:history.back(-1)">评论失败，点此返回上一页</a>';
		}
	}
	
	if($total!=0)
	{
		if(updateRating($ID, $total, $domain ,$date))
		{
//			echo '<a href="javascript:history.back(-1)">评论成功，点此返回上一页</a>';
		}else
		{
//			echo '<a href="javascript:history.back(-1)">评论失败，点此返回上一页</a>';
		}
	}
}
?>
