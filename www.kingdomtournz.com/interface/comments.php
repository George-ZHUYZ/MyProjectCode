
<?php

$moreThanTen = 0;

function getComment($ID) {
	$time = $date = date("Y", time());
	$site = $_COOKIE['thisdomain'];
	$cond = getConditions(array("belong_site", "IssueID", "Period"),
			array("string", "string", "String"), array($site, $ID, $time));
	$items = getOneRecord("Comment", $cond);
	$comments = "";
	if (!empty($items)) {
		$comments = $items[0][4];
	}

	return $comments;
}

function echoComment($comments) {
	if (empty($comments)) {
		echo '暂无评论';
	} else if (!empty($comments)) {

		$pingluns = explode("<CoMmEnT>", $comments);
		$num = count($pingluns);
		$min = 10;
		$max = 50;
		$counter = 0;

		if ($num > $min) {
			$moreThanTen = 1;
		}


		for ($i = $num - 1; $i >= 0; $i--) {
			$oneComment = explode("<PiNgLuN>", $pingluns[$i]);
			echo '<div class="pinglunList">';
			echo '<div class="pinglun_people"><div class="pinglun_people_name">' . $oneComment[0] . '</div>';
			echo '<div class="pinglun_star">';
			for ($j = 0; $j < $oneComment[3]; $j++) {
				echo '<div class="pinglun_people_star"></div>';
			}
			echo '</div></div>';
			echo '<div class="pinglun_content"><span>' . $oneComment[2] . '</span></div>';

			echo '</div>';
			$counter++;
			if ($counter == $max) {
				break;
			}
		}
	}
}
?>

