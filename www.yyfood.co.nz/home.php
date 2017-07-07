<?php
require_once dirname(__FILE__) . '/_sys/tableOperation.php';

function displayNewProduct($newProduct) {
        $size = count($newProduct);
        echo '<div class="portfolioFilter">';
        echo '<div class="spTitle">New Product</div>';
        echo '</div>';
        echo '<div class="carousel slide" id="newproduct">';
        echo ' <ol class="carousel-indicators">';
        for ($i = 0; $i < $size; $i++)
        {
                if ($i == 0) {
                        echo '<li class="active" data-slide-to="' . $i . '" data-target="#newproduct"></li>';
                } else {
                        echo '<li data-slide-to="' . $i . '" data-target="#newproduct"></li>';
                }
        }

        echo '</ol>';
        echo '<div class="carousel-inner">';
        for ($i = 0; $i < $size; $i++)
        {
                $link = $newProduct[$i][0];
                $link = urlencode($link);
//                $name = explode("/", $newProduct[$i][0]);
                $name = $newProduct[$i][0];

                $condition = getConditions(array("content_name", "belong_site", "edit_type"), array("string", "string", "string"), array($name, "www.yyfood.co.nz", "on"));
                $allResult = getOneRecord("pages", $condition);
                if (count($allResult) > 0) {
                        $pageID = $allResult[0][0];
                        $shortDetail = $allResult[0][6];
                } else {
                        $pageID = "330";
                        $shortDetail = "";
                }

                $image = getTypeImage($newProduct[$i][0]);
                if ($i == 0) {
                        echo '<div class="item active ">';
                } else {
                        echo '<div class="item">';
                }
                echo '<div class="row sp">
                                                        <div class="hidden-xs hidden-sm col-md-6 detailPart">
                                                                <div class="spContent">
                                                                        <h5>' . $name . '</h5>
                                                                        <div class="spContentText">' . $shortDetail . '</div>
                                                                        <hr>
                                                                        <div class="spview"> 
                                                                                <a  class="btn btn-default" data-toggle="modal" data-target="#mySpecialModal" href="clients/www.yyfood.co.nz/specialDetail.php?specialDetail=' . $pageID . '" >Learn More</a>
                                                                                <a  class="btn btn-default" data-toggle="modal" data-target="#myModal" href="clients/www.yyfood.co.nz/productDetail.php?product=' . $link . '">Add to Cart</a>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                       
                                                      <div class="col-xs-12 col-md-6 imagePart" >
                                                                 <div class="spImage" style="background-image:url(' . $image . ');">
                                                                        <a  class="" data-toggle="modal" data-target="#mySpecialModal" href="clients/www.yyfood.co.nz/specialDetail.php?specialDetail=' . $pageID . '">
                                                                                <div class="col-xs-12 hidden-xs hidden-sm viewImage"></div>
                                                                        </a>
                                                                        <div class="col-xs-12 hidden-md hidden-lg smallhover"> 
                                                                                     <div class="spContent">
                                                                                           <h5>' . $name . '</h5>
                                                                                            <div class="spContentText">' . $shortDetail . '</div>
                                                                                                   <hr>
                                                                                             <div class="spview"> 
                                                                                                   <a  class="btn btn-default" data-toggle="modal" data-target="#mySpecialModal" href="clients/www.yyfood.co.nz/specialDetail.php?specialDetail=' . $pageID . '">Learn More</a>
                                                                                                    
                                                                                             </div>
                                                                                     </div>
                                                                               </div>
                                                                         </div>
                                                                   </div>
                                                                   
                                                       </div>';
                echo'</div>';
        }

        echo '</div> ';


        echo '<a class="left carousel-control" href="#newproduct" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>';
        echo '<a class="right carousel-control" href="#newproduct" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>';
        echo '</div>';
}

function displayPromProduct($param) {
        $size = count($param);
        echo '<div class="portfolioFilter">';
        echo '<div class="spTitle">Great Bargains</div>';
//        echo '<a href="#" data-filter="*" class="btn btn-default  current">All Categories</a>';
//        echo '<a href="#" data-filter=".a" class="btn btn-default ">aaa</a>';
//        echo '<a href="#" data-filter=".b" class="btn btn-default ">bbb</a>';
//        echo '<a href="#" data-filter=".c" class="btn btn-default ">ccc</a>';
        echo '</div>';
        echo '<div class="portfolioContainer">';

        for ($i = 0; $i < $size; $i++)
        {
                $image = getTypeImage($param[$i][0]);
//                if ($i % 3 == 0) {
                        echo '<div class="col-sm-6 col-md-3 items homeSpecial a" style="height:360px;min-width: 220px;max-width: 300px;">';
//                } else if ($i % 3 == 1) {
//                        echo '<div class="col-sm-6 col-md-3 items homeSpecial b" style="height:360px;min-width: 220px;max-width: 300px;">';
//                } else {
//                        echo '<div class="col-sm-6 col-md-3 items homeSpecial c" style="height:360px;min-width: 220px;max-width: 300px;">';
//                }

                $link = $param[$i][0];
                $link = urlencode($link);
                $name = $param[$i][0];
                $allProducts = getOneTypeData($name);
                $saleArray = array();
                $dis = 100000;
                $index = 0;
                for ($j = 0; $j < count($allProducts); $j++)
                {
                        $pro = $allProducts[$j];
                        $discount = $pro[7] / 100;
                        if ($discount < 1) {
                                if ($discount <= $dis) {
                                        $dis = $discount;
                                        $index = $j;
                                        $saleArray[$i][0] = $pro[6] / 100;
                                        $saleArray[$i][1] = $saleArray[$i][0] * $dis;
                                        $saleArray[$i][2] = $pro[2];
                                }
                        }
//                        $pro = $allProducts[$i];
//                        $price = $pro[6] / 100;
//                        
//                        $packageSize = $pro[10];
//                        $size = $pro[2];
//                        $packageDetail = explode("/", $packageSize);
//                        $packageSize = $packageDetail[0];
//                        $unit = $packageDetail[1];
//                        $saleArray[$i][0] = $price;
//                        $saleArray[$i][1] = $price*$discount;
//                        $saleArray[$i][2] = $size;
                }
//                $saleArray[0] = $pro[6] / 100;
//                $saleArray[1]
//                for ($i = 0; $i < count($saleArray); $i++)
//                {
//                        if ($pri <= $saleArray[$i][1]) {
//                                $pri = $saleArray[$i][1];
//                                $index = $i;
//                        }
//                }

                echo '<div class="proLogo templatespecialLogo"><img alt="" width="100%" height="100%" src="clients/www.yyfood.co.nz/images/homepage/1.png" class="img-responsive"/></div>';
                echo '<a  class="btn ViewDetailBtn" data-toggle="modal" data-target="#myModal" href="clients/www.yyfood.co.nz/productDetail.php?product=' . $link . '" style="background: url(' . $image . ') no-repeat; background-size: cover; background-position: center; height: 208px;">';
                echo '</a>';
                echo '<div class="homeSpecailDescription">';
                echo '<h5>' . $name . '</h5>';
                echo '<p>Size: ' . $saleArray[$i][2] . '</p>';
                echo '<p>was $<strike>' . $saleArray[$i][0] . '</strike><strong>Now $' . $saleArray[$i][1] . '</strong></p>';
                echo '</div>';
                echo '<a  class="btn btn-default description" data-toggle="modal" data-target="#myModal" href="clients/www.yyfood.co.nz/productDetail.php?product=' . $link . '">';
                echo '<div class="buttonWarp" style="line-height: 30px;font-size: initial;">';
                echo 'Add to Cart';
                echo '</div>';
                echo '</a>';
                echo '</div>';
        }
        echo '</div>';
//        echo '<div class="carousel slide" id="promproduct">';
//        echo ' <ol class="carousel-indicators">';
//        for ($i = 0; $i < $size; $i++)
//        {
//                if ($i == 0) {
//                        echo '<li class="active" data-slide-to="' . $i . '" data-target="#promproduct"></li>';
//                } else {
//                        echo '<li data-slide-to="' . $i . '" data-target="#promproduct"></li>';
//                }
//        }
//
//        echo '</ol>';
//        echo '<div class="carousel-inner">';
//        for ($i = 0; $i < $size; $i++)
//        {
//                $link = $param[$i][0];
//                $link = urlencode($link);
//                $name = $param[$i][0];
//
//                $condition = getConditions(array("content_name", "belong_site", "edit_type"), array("string", "string", "string"), array($name, "www.yyfood.co.nz", "on"));
//                $allResult = getOneRecord("pages", $condition);
//                if (count($allResult) > 0) {
//                        $pageID = $allResult[0][0];
//                        $shortDetail = $allResult[0][6];
//                } else {
//                        $pageID = "330";
//                        $shortDetail = "";
//                }
//
//                $image = getTypeImage($param[$i][0]);
//                if ($i == 0) {
//                        echo '<div class="item active ">';
//                } else {
//                        echo '<div class="item">';
//                }
//
//                echo '<div class="row sp">
//                                                        <div class="col-xs-12 col-md-6 imagePart" >
//                                                                <div class="spImage" style="background-image:url(' . $image . ');">
//                                                                 <div class="col-xs-12 hidden-md hidden-lg smallhover"> 
//                                                                 <div class="spTitle">Special</div>
//                                                                <div class="spContent">
//                                                                        <h5>' . $name . '</h5>
//                                                                        <div class="spContentText">' . $shortDetail . '</div>
//                                                                        <hr>
//                                                                        <div class="spview"> 
//                                                                                <a  class="btn btn-default" data-toggle="modal" data-target="#mySpecialModal" href="clients/www.yyfood.co.nz/specialDetail.php?specialDetail=' . $pageID . '">Learn More</a>
//                                                                        </div>
//                                                                </div>
//                                                                 
//                                                        </div>
//                                                        </div>
//                                                         </div>
//                                                        <div class="hidden-xs hidden-sm col-md-6 detailPart">
//                                                                <div class="spTitle">Special</div>
//                                                                <div class="spContent">
//                                                                        <h5>' . $name . '</h5>
//                                                                        <div class="spContentText">' . $shortDetail . '</div>
//                                                                        <hr>
//                                                                        <div class="spview"> 
//                                                                                <a  class="btn btn-default" data-toggle="modal" data-target="#mySpecialModal" href="clients/www.yyfood.co.nz/specialDetail.php?specialDetail=' . $pageID . '">Learn More</a>
//                                                                        </div>
//                                                                </div>
//                                                        </div>
//                                                </div>';
//                echo'</div>';
//        }
//
//        echo '</div> ';
//
//
//        echo '<a class="left carousel-control" href="#promproduct" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>';
//        echo '<a class="right carousel-control" href="#promproduct" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>';
//        echo '</div>';
}
?>

<div class="row clearfix homeGalllery2">
        <div class=" col-lg-12 col-md-12 col-sm-12  homeNewPro">
                <!--<div class="topLogo"><img alt="" width="100%" height="100%" src="clients/www.yyfood.co.nz/images/homepage/blue.png" class="img-responsive"/></div>-->
<?php
$newProduct = getSpecialProducts("TOP");
displayNewProduct($newProduct);
?>
        </div>
        <div class="col-lg-12  col-md-12 col-sm-12 homePromotion">
                <!--<div class="proLogo"><img alt="" width="100%" height="100%" src="clients/www.yyfood.co.nz/images/homepage/red.png" class="img-responsive"/></div>-->
<?php
$Promo = getSpecialProducts("PROMO");
//                var_dump($Promo);
displayPromProduct($Promo);
?>

        </div>
</div>
<div id="mySpecialModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg modal-lg-sp">
                <div class="modal-content mode-content-bg min-height-modal-content">
                        <div class="modal-body">
                                <!--modal load remote file-->
                                <div class="container-fluid fill">
                                        <div class="loadingPart">
                                                <div class="loadingPage">
                                                        <span class="glyphicon glyphicon-refresh glyphicon-refresh-animate loadingrefresh"></span>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>
<div id="myModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg modal-lg-biger">
                <div class="modal-content mode-content-bg min-height-modal-content">
                        <div class="modal-body">
                                <!--modal load remote file-->
                                <div class="container-fluid">

                                </div>
                        </div>
                </div>
        </div>
</div>
<div id="popupEmpty" class="alert alert-danger"></div>
<script type="text/javascript">

        $(function () {
                $('#newproduct').carousel();
                $('#promproduct').carousel();
        });
        $("a[data-target=#mySpecialModal]").click(function (ev) {
                ev.preventDefault();
                var target = $(this).attr("href");
//                console.log("load : " + target);
                setTimeout(function () {

                        $("#myModal .modal-body").load(target, function () {
//                        console.log("show");
//                        $('mySpecialModal').modal();
//                        $("#mySpecialModal").modal("show");
                        });
                }, 5000);
//                console.log("done");
        });

        $("a[data-target=#myModal]").click(function (ev) {
                ev.preventDefault();
                var target = $(this).attr("href");
                //                        console.log("temp load "+target);
                // load the url and show modal on success
                $("#myModal .modal-body").load(target, function () {
                        //                                console.log("temp show ");
                        //                                $("#myModal").modal("show");
                });
        });
        $('body').on('hide.bs.modal', '.modal', function () {
                $(this).removeData('bs.modal');
                //                        console.log("temp clear");
        });
        $('body').on('hide.bs.modal', '.modal', function () {
                $(this).removeData('bs.modal');
//                console.log("clear");
        });
        $(window).load(function () {
                var $container = $('.portfolioContainer');
                $container.isotope({
                        filter: '*',
                        animationOptions: {
                                duration: 750,
                                easing: 'linear',
                                queue: false
                        }
                });

                $('.portfolioFilter a').click(function () {
                        $('.portfolioFilter .current').removeClass('current');
                        $(this).addClass('current');

                        var selector = $(this).attr('data-filter');
                        $container.isotope({
                                filter: selector,
                                animationOptions: {
                                        duration: 750,
                                        easing: 'linear',
                                        queue: false
                                }
                        });
                        return false;
                });
        });
</script>

<!--<a  class="" data-toggle="modal" data-target="#mySpecialModal" href="clients/www.yyfood.co.nz/specialDetail.php?specialDetail=' . $pageID . '">
                                                                                <div class="col-xs-12 hidden-xs hidden-sm viewImage"></div>
                                                                        </a>-->