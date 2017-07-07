                             		
<?php
require_once dirname(__FILE__) . '/model/yyDataController.php';
require_once dirname(__FILE__) . '/Product.php';

$query = $_SERVER['QUERY_STRING'];
$title = explode("=", $query);
$name = urldecode($title[1]);
//$name=  str_replace("_", " ", $name);
$productsCollection = getProducts($name);
$image = getTypeImage($name);

function getProducts($name) {
        $allProducts = getOneTypeData($name);
        $productArray = array();
        for ($i = 0; $i < count($allProducts); $i++)
        {
                $pro = $allProducts[$i];
                $id = $pro[0];
                $name = $pro[1];
                $size = $pro[2];
                $brand = $pro[4];
                $packageSize = $pro[10];
                $packageDetail = explode("/", $packageSize);
                $packageSize = $packageDetail[0];
                $unit = $packageDetail[1];
                $rc = $pro[3];
                $image = $pro[5];
                $price = $pro[6] / 100;
                $discount = $pro[7] / 100;
                $available = $pro[9];
                $special = "null";
                $product = new Product();
                $product->ProductWithArguments($id, $name, $image, $price, $size, $packageSize, $discount);
                $product->setRCtypeName($rc);
                $product->setUnit($unit);
                $product->setBrand($brand);
                $product->setAvailable($available);
                if ($pro[11] == "top" || $pro[11] == "hot") {
                        $special = $pro[11];
                        $product->setIsSpecial(TRUE);
                        $product->setSpecialType($special);
                } else {
                        $product->setIsSpecial(FALSE);
                        $product->setSpecialType($special);
                }
                $productArray[] = $product;
        }
        return $productArray;
}
?>
<script>
        $('div.shoppingcart').click(function () {
                var el = $(this);
                el.addClass('shoppingcartfly');
                el.one('webkitAnimationEnd oanimationend msAnimationEnd animationend',
                        function () {
                                el.removeClass('shoppingcartfly');
                        });
        });
</script>
<div class="container-fluid detailbg">
        <div class="row clearfix">
                <button type="button" class="close closebtn" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <div class="col-lg-6 col-md-6 col-md-offset-0 col-sm-12 col-sm-offset-3 col-xs-12 column productImage">
                        <div class="detailimage" style="background: url(<?php echo $image; ?>) no-repeat"></div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 column productTable">
                        <h3>
                                <?php echo $name; ?>
                        </h3>
                        <div class="">
                                <table class="table table-hover pdtable">
                                        <thead>
                                                <tr>
                                                        <th class="hidden-xs">
                                                                Description
                                                        </th>
                                                        <th>
                                                                Size
                                                        </th>
                                                        <th class="hidden-xs">
                                                                Pack/CTN
                                                        </th>
                                                        <th class="hidden-xs hidden-md">
                                                                Brand
                                                        </th>
                                                        <th>
                                                                Price
                                                        </th>
                                                        <th>
                                        <div class="thShopping">Add</div>
                                        </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                                <?php foreach ($productsCollection as $product): ?>
                                                        <tr >
                                                                <td class="hidden-xs">
                                                                        <?php if ($product->getAvailable() >= 0): ?>
                                                                                <?php echo $product->getProductName(); ?>
                                                                        <?php else : ?>
                                                        <strike><?php echo $product->getProductName(); ?></strike>
                                                <?php endif; ?>
                                                </td>
                                                <td><?php echo $product->getSize(); ?></td>
                                                <td class="hidden-xs"><?php echo $product->getPackageSize(); ?></td>
                                                <td class="hidden-xs hidden-md"><?php echo $product->getBrand(); ?></td>
                                                <td class="discount">
                                                        <?php if ($product->getDiscount() < 1): ?>
                                                        <strike>$<?php echo $product->getPrice(); ?></strike>
                                                        <span>$<?php echo $product->getUnitPrice(); ?></span>
                                                <?php else: ?>
                                                        $<?php echo $product->getUnitPrice(); ?>
                                                <?php endif; ?>

                                                </td>
                                                <td>
                                                        <?php if ($product->getAvailable() >= 0): ?>
                                                                <div class="shoppingcart"><a  class="shoppingLink"  href="javascript:AddToCart('<?php echo $product->getProductName(); ?>' , <?php echo $product->getID(); ?>, <?php echo $product->getDiscountPrice(); ?>)"><span class="glyphicon glyphicon-shopping-cart carBtn"></span></a>
                                                                </div>
                                                        <?php else : ?>
                                                                sold out
                                                        <?php endif; ?>
                                                </td>
                                                </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                </table>
                        </div><!--table-responsive-->
                </div><!--col-lg-6 col-md-6 col-sm-6 col-xs-12 column productTable-->
        </div><!--row clearfix-->
</div><!-- container-fluid-->

<div id="popup" class="alert alert-success popupMessage"></div>

