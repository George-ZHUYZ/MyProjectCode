
<link rel="stylesheet" type="text/css" href="/clients/www.kingdomtournz.com/css/productDetail/review.css" />
<script type="text/javascript" src="/clients/www.kingdomtournz.com/js/productdetail/jquery.raty.min.js"></script>
<script type="text/javascript">
	$(function() {
		$('#rating1').raty({
			number: 5, //多少个星星设置
			score: 0, //初始值是设置
			targetType: 'number', //类型选择，number是数字值，hint，是设置的数组值
			path: '/clients/www.kingdomtournz.com/image/rating',
			// cancelOff : 'cancel-off-big.png',
			// cancelOn  : 'cancel-on-big.png',
			size: 24,
			// starHalf  : 'star-half-big.png',
			starOff: 'star-off.png',
			starOn: 'star-on.png',
			target: '#rating-hint1',
			cancel: false,
			targetKeep: true,
			precision: false, //是否包含小数
			click: function(score, evt) {
				document.getElementById("inputrating1").value = score;
			}
		});
		$('#rating2').raty({
			number: 5, //多少个星星设置
			score: 0, //初始值是设置
			targetType: 'number', //类型选择，number是数字值，hint，是设置的数组值
			path: '/clients/www.kingdomtournz.com/image/rating',
			// cancelOff : 'cancel-off-big.png',
			// cancelOn  : 'cancel-on-big.png',
			size: 24,
			// starHalf  : 'star-half-big.png',
			starOff: 'star-off.png',
			starOn: 'star-on.png',
			target: '#rating-hint2',
			cancel: false,
			targetKeep: true,
			precision: false, //是否包含小数
			click: function(score, evt) {
				document.getElementById("inputrating2").value = score;
			}
		});
		$('#rating3').raty({
			number: 5, //多少个星星设置
			score: 0, //初始值是设置
			targetType: 'number', //类型选择，number是数字值，hint，是设置的数组值
			path: '/clients/www.kingdomtournz.com/image/rating',
			// cancelOff : 'cancel-off-big.png',
			// cancelOn  : 'cancel-on-big.png',
			size: 24,
			// starHalf  : 'star-half-big.png',
			starOff: 'star-off.png',
			starOn: 'star-on.png',
			target: '#rating-hint3',
			cancel: false,
			targetKeep: true,
			precision: false, //是否包含小数
			click: function(score, evt) {
				document.getElementById("inputrating3").value = score;
			}
		});
	});
</script>

<form action="/clients/www.kingdomtournz.com/rate.php" method="post" name="review" style="
	  width: 100%;
	  ">
	<p>
		<input name="username" type="text"  placeholder="姓名"  pattern="[A-Za-z0-9](([_\-\s]?[a-zA-Z0-9]+)*)" required> 
		<input name="email" type="text" placeholder="example@something.com"  pattern="[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" required>
	</p>
	<textarea id="message" name="commend" cols="60" rows="7"  placeholder="在这留言" required></textarea>
	<input type="hidden" name="rate1" value="" id="inputrating1">
	<input type="hidden" name="rate2" value="" id="inputrating2">
	<input type="hidden" name="rate3" value="" id="inputrating3">
	<?php echo '<input type="hidden" name="ID" value="' . ($ID = $title[1]) . '" id="productid">'; ?>
	<table style="width: 100%;">
		<tr>
			<td>
				<div class="rating" id="rate1">性价比
					<div id="rating-hint1" class="rating-hint"></div>
					<div id="rating1" class="rating-target"></div>
				</div>
			</td>
			<td>
				<div class="rating" id="rate2">娱乐性
					<div id="rating-hint2" class="rating-hint"></div>
					<div id="rating2" class="rating-target"></div>

				</div>
			</td>
			<td>
				<div class="rating" id="rate3">服务
					<div id="rating-hint3" class="rating-hint"></div>
					<div id="rating3" class="rating-target"></div>
				</div>
			</td>
		</tr>
	</table>

	<input name="submit" id="submit" type="submit" tabindex="5" value="点我发布" >
</form>
