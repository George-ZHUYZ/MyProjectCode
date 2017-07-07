
<?php
require_once dirname(__FILE__) . '/RCtypeKey.php';
$RCtypekeyArray = showProductByFilter($title[1]);
global $RCType;

function showProductByFilter($filter) {
        $filter = urldecode($filter);
        $GLOBALS['RCType'] = get_2nd_category($filter);
        $selectedFood = getChosenFood($filter);
        return $selectedFood;
}

function getChosenFood($filter) {
        $chosenFood = array();
        for ($i = 0; $i < count($GLOBALS['RCType']); $i++)
        {
                $productsunUnderCate = get_2nd_RCTypeKey($GLOBALS['RCType'][$i]);
                for ($j = 0; $j < count($productsunUnderCate); $j++)
                {
                        $chosenFood[] = $productsunUnderCate[$j];
                }
        }
        $newProduct = getSpecialProducts("TOP");
        $Promo = getSpecialProducts("PROMO");

        for ($i = 0; $i < count($chosenFood); $i++)
        {
                $allProducts = getOneTypeData($chosenFood[$i][0]);
                $isAvailable = FALSE;
                for ($j = 0; $j < count($allProducts); $j++)
                {
                        if ($allProducts[$j][9] >= 0) {
                                $isAvailable = TRUE;
                        }
                }

                $link = urlencode($chosenFood[$i][0]);
                $name = $chosenFood[$i][0];
                $image = str_ireplace("\\", "/", $chosenFood[$i][1]);
                $food = new RCtypeKey($chosenFood[$i][0], $image);
                $food->setLink($link);
                $food->setShortName($name);
                $food->setIsSelect(TRUE);
                $food->setIsAvailable($isAvailable);
                $food->setBelongTo(str_replace(" & ", "-", $chosenFood[$i][2]));
                $foodArray[] = $food;
        }
        for ($i = 0; $i < count($newProduct); $i++)
        {
                for ($j = 0; $j < count($foodArray); $j++)
                {
                        if ($foodArray[$j]->getRCtypeKeyTile() == $newProduct[$i][0]) {
                                $foodArray[$j]->setHasSpecial(TRUE);
                                $foodArray[$j]->setSpecial("new");
                        }
                }
        }
        for ($i = 0; $i < count($Promo); $i++)
        {
                for ($j = 0; $j < count($foodArray); $j++)
                {
                        if ($foodArray[$j]->getRCtypeKeyTile() == $Promo[$i][0]) {
                                $foodArray[$j]->setHasSpecial(TRUE);
                                $foodArray[$j]->setSpecial("promo");
                        }
                }
        }
        return $foodArray;
}
?>
<div class="row detailTitle-image hidden-xs">
        <div class="detailTitle-imageBG"></div>
        <div class="productTitle">
                <h4><?php echo urldecode($title[1]); ?></h4> 
                <p>Select Item <i class="fa fa-long-arrow-right"></i> 
                        Add to shopping cart <i class="fa fa-long-arrow-right"></i> 
                        Check out <i class="fa fa-long-arrow-right"></i> 
                        Staff will contact you to confirm order and payment method <i class="fa fa-long-arrow-right"></i> 
                        Delivery
                </p>
        </div>
</div>
<div class="container-fluid fill">
        <div class="row productFilter">
                <div class="portfolioFilter">
                        <a href="#" data-filter="*" class="btn btn-default  current">All Categories</a>
                        <?php foreach ($GLOBALS['RCType'] as $type): ?>
                                <a href="#" data-filter=".<?php echo str_replace(" & ", "-", $type); ?>" class="btn btn-default "><?php echo $type; ?></a>
                        <?php endforeach; ?>
                </div>
                <div class="portfolioContainer">
                        <?php foreach ($RCtypekeyArray as $item): ?>
                                <?php if ($item->getIsAvailable()): ?>
                                        <div class="col-sm-6 col-md-3 items <?php echo $item->getBelongTo(); ?>">
                                        <?php else : ?>
                                                <div class="col-sm-6 col-md-3 items soldout <?php echo $item->getBelongTo(); ?>" >
                                                <?php endif; ?>
                                                <?php if ($item->getHasSpecial()): ?>
                                                        <?php if ($item->getSpecial() == "new"): ?>
                                                                <div class="topLogo templatespecialLogo"><img alt="" width="100%" height="100%" src="clients/www.yyfood.co.nz/images/homepage/2.png" class="img-responsive"/></div>
                                                        <?php elseif ($item->getSpecial() == "promo"): ?>
                                                                <div class="proLogo templatespecialLogo"><img alt="" width="100%" height="100%" src="clients/www.yyfood.co.nz/images/homepage/1.png" class="img-responsive"/></div>
                                                        <?php endif; ?>
                                                <?php endif; ?>
                                                <a  class="btn ViewDetailBtn" data-toggle="modal" data-target="#myModal" href="clients/www.yyfood.co.nz/productDetail.php?product=<?php echo $item->getLink(); ?>">
                                                        <div  style="height: 100%; background: url(<?php echo $item->getImage(); ?>) no-repeat; background-size: cover; background-position: center;"></div>
                                                </a>   
                                                <a  class="btn btn-default description" data-toggle="modal" data-target="#myModal" href="clients/www.yyfood.co.nz/productDetail.php?product=<?php echo $item->getLink(); ?>">
                                                        <div class="buttonWarp">
                                                                <?php if ($item->getIsAvailable()): ?>
                                                                        <?php echo $item->getRCtypeKeyTile(); ?>
                                                                <?php else : ?>
                                                                        <strike><?php echo $item->getRCtypeKeyTile(); ?></strike>
                                                                <?php endif; ?>
                                                        </div>
                                                </a>
                                        </div>
                                <?php endforeach; ?>
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


        </div>


