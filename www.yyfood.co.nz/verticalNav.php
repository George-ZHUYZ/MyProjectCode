
<?php
require_once dirname(__FILE__) . '/model/yyDataController.php';
$manuType = getAllSeafoodTypes();

function getAllSeafoodTypes() {
        $first_category = get_1st_category();
        $allFoodType;
        for ($i = 0; $i < count($first_category); $i++)
        {
                $temp = $first_category[$i][1];
//                $temp_category = get_2nd_category($temp);

                $allFoodType[$i][0] = $temp;
//                $allFoodType[$i][1] = $temp_category;
//                $temp = str_replace(" ", "-", $temp);
                $temp = urlencode($temp);
//                $temp_category = str_replace(" ", "-", $temp_category);
//                for ($j = 0; $j < count($temp_category); $j++)
//                {
//                        $temp_category[$j] = urlencode($temp_category[$j]);
//                }
//                $temp_category = urlencode($temp_category);
                $allFoodType[$i]["link1"] = $temp;
//                $allFoodType[$i]["link2"] = $temp_category;
        }
        return $allFoodType;
}
?>
<!-- Sidebar starts -->
<div class="sidebar">
        <div id="sidebar">
                <div class="nav-background"></div>
                <!-- Logo -->
                <div class="logo">
                        <?php require_once dirname(__FILE__) . '/header.php'; ?>
                </div>


                <div class="sidebar-dropdown"><a href="#" class="br-red"><i class="fa fa-bars"></i>  MENU</a></div>
                <div class="side-nav">
                        <div class="side-nav-block">

                                <ul class="nav navbar-nav sidebar-nav list-unstyled" id="navgation">

                                        <li><div class="process"></div><a href="?">Home 首页</a></li>
                                        <?php for ($i = 0; $i < count($manuType); $i++): ?>
                                                <li><div class="process"></div><a href="?product&<?php echo $manuType[$i]["link1"]; ?>"> <?php echo $manuType[$i][0]; ?></a></li>
                                        <?php endfor; ?>
                                        <li><div class="process"></div><a href="?aboutus">About us 关于我们</a></li>
                                        <li><div class="process"></div><a href="?contactus">Contact us 联系我们</a></li>
                                </ul>

                        </div>
                </div>
        </div>
</div>
<script>

        window.onscroll = function (ev) {
                ev.preventDefault();
                var width = $(window).width();
                var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
                if (width > 767)
                {
                        if (scrollTop < 50)
                        {
                                $('.sidebar').css({
                                        'position': 'absolute',
                                        'top':'auto'
                                });
                        } else {
                                $('.sidebar').css({
                                        'position': 'fixed',
                                        'top': '0'
                                });
                        }

                }
        }

</script>





