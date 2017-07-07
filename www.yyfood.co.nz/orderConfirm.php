
<?php
//var_dump($_POST);
require_once dirname(__FILE__) . '/model/yyDataController.php';

$cartItemCollection = array();
$totalprice = 0;
if (isset($_POST['quantity'])) {
        $array = $_POST['quantity'];
        foreach ($array as $value)
        {
                foreach ($value as $id => $quantity)
                {
                        $item = getProductInformation($id);
                        if ($item[13] == "on" && $quantity > 0) {
                                $id = $item[0];
                                $name = $item[1];
                                $size = $item[2];

                                $brand = $item[4];
                                $packageSize = $item[10];
                                $packageDetail = explode("/", $packageSize);
                                $packageSize = $packageDetail[0];
                                $unit = $packageDetail[1];
                                $rc = $item[3];
                                $image = getTypeImage($rc);
                                $image = str_ireplace("\\", "/", $image);

//                                $image = $item[5];
                                $price = $item[6] / 100;
                                $special = $item[7] / 100;
                                //cartItem($ID, $name, $image, $price, $size, $RCtypeKey, $quanity, $special) 
//                                $food = new Product($id, $name, $image, $price, $size, $packageSize, $special);
                                $food = new Product();
                                $food->ProductWithArguments($id, $name, $image, $price, $size, $packageSize, $special);
                                $food->setQuanity($quantity);
                                $food->setRCtypeName($rc);
                                $food->setUnit($unit);
                                $food->setBrand($brand);
                                $cartItemCollection[] = $food;
                        }
                }
        }
}
$val = "abc";
?>
<div class="row detailTitle-image hidden-xs">
        <div class="detailTitle-imageBG"></div>
        <div class="productTitle">
                <div class="row OrderInfo">
                        <h4>Your Order</h4>

                </div>
        </div>
</div>
<div class="container-fluid confrimContainer" >

        <div>
                <form id="confrimForm" action="?orderConfirm.php" method="post">
                        <table class= tablesorter" id ="orderTable">
                                <thead>
                                        <tr class="confirmTable-thead">
                                                <th>products</th>
                                                <!--<th>Title</th>-->
                                                <th class="hidden-xs">size</th>
                                                <th class="hidden-md hidden-sm hidden-xs psize">package</th>
                                                <th class="hidden-sm hidden-xs">price</th>
                                                <th class="xs-totalhead"><span class="hidden-xs">quantity</span><span class="hidden-sm hidden-md hidden-lg ">subtotal</span></th>
                                                <th class="hidden-xs">total</th>
                                        </tr>
                                </thead>
                                <tbody id="confirmTbody">
                                        <?php for ($i = 0; $i < count($cartItemCollection); $i++): ?>
                                                <tr>
                                                        <td class="protd">
                                                                <div class="row">
                                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5 image-lg xs-image"><img class="img-responsive confirmImage" src="<?php echo $cartItemCollection[$i]->getImage(); ?>"></div>
                                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 text-lg xs-Name"><?php echo $cartItemCollection[$i]->getRCtypeName() ?> </div>
                                                                        <div class="col-xs-12 hidden-sm hidden-md hidden-lg xs-size">
                                                                                <span><?php echo $cartItemCollection[$i]->getSize(); ?> </span>
                                                                                <span>$<?php echo $cartItemCollection[$i]->getUnitPrice(); ?></span>
                                                                        </div>
                                                                </div>
                                                        </td>     
                                                        <td class="hidden-xs">
                                                                <span><?php echo $cartItemCollection[$i]->getSize(); ?> </span>
                                                                <div class="hidden-xs hidden-lg pkgsize">package size <br><?php echo $cartItemCollection[$i]->getPackageSize(); ?></div>
                                                                <span class="hidden-xs hidden-md hidden-lg">$<?php echo $cartItemCollection[$i]->getUnitPrice(); ?></span>
                                                        </td>
                                                        <td class="hidden-md hidden-sm hidden-xs"><span><?php echo $cartItemCollection[$i]->getPackageSize(); ?> </span></td>
                                                        <td class="hidden-sm hidden-xs" ><span id="price">$<?php echo $cartItemCollection[$i]->getUnitPrice(); ?></span></td>

                                                        <td class="">
                                                                <div class="xs-input">
                                                                        <input name="quantity[][<?php echo $cartItemCollection[$i]->getID(); ?>]" data-fuction="#blur" id="quantities_<?php echo $cartItemCollection[$i]->getID(); ?>" type="number" value="<?php echo $cartItemCollection[$i]->getQuanity(); ?>" maxlength="2" size="4"  min="0" class="quantity-number" autocomplete="off"/>
                                                                        <button type="submit" class="btn pull-right deleteBtn" data-fuction="#delete" data-target="#quantities_<?php echo $cartItemCollection[$i]->getID(); ?>"><span class="glyphicon glyphicon-trash glyphiconDel"></span></button>
                                                                </div>
                                                                <div class="xs-total hidden-sm hidden-md hidden-lg">
                                                                        <span class="glyphicon glyphicon-usd"></span><span><?php echo $cartItemCollection[$i]->getTotal(); ?></span>
                                                                </div>
                                                        </td>
                                                        <td class="totalprice-info hidden-xs"><span class="glyphicon glyphicon-usd"></span><span><?php echo $cartItemCollection[$i]->getTotal(); ?></span></td>
                                                        <?php $totalprice = $totalprice + $cartItemCollection[$i]->getTotal(); ?>
                                                </tr>
                                        <?php endfor; ?> 
                                </tbody>
                                <tfoot>
                                        <tr>
                                                <td class="updateBtn">
                                                        <button  type="button" id="confrimupdate" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-refresh"></span>  update</button>
                                                </td>
                                                <td  class="empty hidden-xs" ></td>
                                                <td  class="empty hidden-xs" ></td>
                                                <td  class="empty hidden-xs" ></td>
                                                <td class="empty hidden-xs"></td>
                                                <td class="empty hidden-xs">
<!--                                                        <span class="hidden-sm hidden-md hidden-lg">Total Price</span>
                                                        <span class="glyphicon glyphicon-usd"></span><span><?php // echo $totalprice = number_format($totalprice, 2);    ?></span>-->
                                                </td>
                                        </tr>
                                </tfoot>
                        </table>

                </form>

                <div class="col-xs-12 col-md-6 Ordercomment">
                        <h5>Please Note: </h5>
                        <p>* You are <strong>not</strong> required to pay for this order now. You will be contacted by one of our sales staff to arrange payment.</p>
                        <p>* Free delivery to anywhere In Auckland on orders <strong>over $150</strong>.</p>
                        <p>* For orders outside of Auckland a delivery charge will apply.</p>
                </div>
                <div class="col-xs-12 col-md-6 pull-right  totalSummary">
                        <div class="table clearPaddingAndMargin">
                                <div class="row summaryRow">
                                        <div class="col-xs-6 summaryCol">
                                                Price ex. GST:
                                        </div>
                                        <div class="col-xs-6 summaryCol">
                                                <span class="glyphicon glyphicon-usd"></span><span><?php $totalprice = number_format($totalprice, 2);
                                        echo $totalprice;
                                        ?></span>
                                        </div>
                                </div>
                                <div class="row summaryRow">
                                        <div class="col-xs-6 summaryCol">
                                                GST:
                                        </div>
                                        <div class="col-xs-6 summaryCol">
                                                <span class="glyphicon glyphicon-usd"></span><span><?php $gst = number_format($totalprice * 0.15, 2);
                                                        echo $gst;
                                        ?></span>
                                        </div>
                                </div>
                                <div class="row summaryRow">
                                        <div class="col-xs-6 summaryCol">
                                                Price incl. GST:
                                        </div>
                                        <div class="col-xs-6 summaryCol">
                                                <span class="glyphicon glyphicon-usd"></span><span><?php $total = number_format($gst + $totalprice, 2);
                                                        echo $total;
                                        ?></span>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
        <script>

                var form = document.getElementById("confrimForm");
                var btn = $("#confrimupdate");

                document.getElementById("confrimupdate").addEventListener("click", function () {
                        var divs = $("input.quantity-number");
                        if (divs.length > 0)
                        {
                                var $icon = btn.find(".glyphicon-refresh"),
                                        animateClass = "glyphicon-refresh-animate ";
                                $icon.addClass(animateClass);
                                form.submit();
                                writeLocalFromSQL();
                        }
                });

                $("button[data-fuction=#delete]").click(function (ev) {
                        ev.preventDefault();
                        var $icon = btn.find(".glyphicon-refresh"),
                                animateClass = "glyphicon-refresh-animate ";
                        $icon.addClass(animateClass);
                        var target = $(this).attr("data-target");
                        $(target).val(0);
                        form.submit();
                        writeLocalFromSQL();
                });
                $("input[data-fuction=#blur]").blur(function (ev) {
                        ev.preventDefault();
                        var $icon = btn.find(".glyphicon-refresh"),
                                animateClass = "glyphicon-refresh-animate ";
                        $icon.addClass(animateClass);
                        var target = $(this).attr("data-target");
                        $(target).val(0);
                        form.submit();
                        writeLocalFromSQL();
                });
                $("#confrimForm").keypress(function (ev)
                {
                        if (ev.which == 13) {
                                ev.preventDefault();
                                $("#confrimupdate").click();
                        }
                });
                $(document).ready(function () {
                        $(function () {
                                $("#orderTable").tablesorter(
                                        {
                                                theme: 'bootstrap',
                                                headerTemplate: '{content} {icon}',
                                                widgets: ['uitheme']
                                        });
                        });
                });

                $(document).ready(function () {
                        document.getElementById("Cart").style.display = "none";
                });
        </script>

        <div class="clearfix" style="border-bottom: dashed 1px lightgray;"></div>

        <div class="row col-xs-12 col-sm-12 col-md-6 " id="contact_form">
                <form class="form-horizontal" role="form" action="?EmailSend.php" method="post">
                        <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" id="inputName" placeholder="Name" required autofocus="">
                                </div>
                        </div>
                        <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="example@email.com" pattern="[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" required >
                                </div>
                        </div>
                        <div class="form-group">
                                <label for="inputPhone" class="col-sm-2 control-label">Phone</label>
                                <div class="col-sm-10">
                                        <input type="text" name="phone" class="form-control" id="inputName" placeholder="Phone No." required autofocus="">
                                </div>
                        </div>
                        <div class="form-group">
                                <label for="inputAddress" class="col-sm-2 control-label">Address</label>
                                <div class="col-sm-10">
                                        <input type="text" name="address" class="form-control" id="inputName" placeholder="Delivery Address" required autofocus="">
                                </div>
                        </div>
                        <div class="form-group">
                                <label for="inputMessage" class="col-sm-2 control-label">Message</label>
                                <div class="col-sm-10">
                                        <textarea class="form-control" name="message" id="inputMessage" placeholder="Message"></textarea>
                                </div>
                        </div>
                        <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit"  id="contact_submit"  class="btn btn-default"><span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;Submit</button>
                                </div>
                        </div>

<?php for ($i = 0; $i < count($cartItemCollection); $i++): ?>
                                <input type="hidden" name="Product[<?php echo $i; ?>][ID]" value="<?php echo $cartItemCollection[$i]->getID(); ?>">
                                <input type="hidden" name="Product[<?php echo $i; ?>][shortName]" value="<?php echo $cartItemCollection[$i]->getShortName(); ?>">
                                <input type="hidden" name="Product[<?php echo $i; ?>][productName]" value="<?php echo $cartItemCollection[$i]->getProductName(); ?>">
                                <input type="hidden" name="Product[<?php echo $i; ?>][image]" value="<?php echo $cartItemCollection[$i]->getImage(); ?>">
                                <input type="hidden" name="Product[<?php echo $i; ?>][size]" value="<?php echo $cartItemCollection[$i]->getSize(); ?>">
                                <input type="hidden" name="Product[<?php echo $i; ?>][package]" value="<?php echo $cartItemCollection[$i]->getPackageSize(); ?>">
                                <input type="hidden" name="Product[<?php echo $i; ?>][price]" value="<?php echo $cartItemCollection[$i]->getPrice(); ?>">
                                <input type="hidden" name="Product[<?php echo $i; ?>][quantity]" value="<?php echo $cartItemCollection[$i]->getQuanity(); ?>">
                                <input type="hidden" name="Product[<?php echo $i; ?>][special]" value="<?php echo $cartItemCollection[$i]->getDiscount(); ?>">
                                <input type="hidden" name="Product[<?php echo $i; ?>][total]" value="<?php echo $cartItemCollection[$i]->getTotal(); ?>">
<?php endfor; ?>
                        <input type="hidden" name="subtotal" value="<?php echo $totalprice; ?>">
                        <input type="hidden" name="gst" value="<?php echo $gst; ?>">
                </form>
        </div>

        <div id="modal-dialog" class="modal fade in ">
                <div class="modal-dialog">
                        <div class="modal-content">
                                <div class="modal-body" id="confrim-modal-body">
                                </div>
                                <div class="modal-footer" id="confrim-modal-footer">
                                        <a  id="btnYes" class="btn confirm">OK</a>
                                </div>
                        </div>
                </div>
        </div>
        <script>
                var content = document.getElementById("confrim-modal-body");
                var divs = $("input.quantity-number");
                $('#contact_form').on('submit', function (e)
                {
                        if (divs.length > 0)
                        {
                                $('#contact_submit').attr('disabled', 'disabled');
//                                return true;
                        } else
                        {
                                e.preventDefault();
                                $('contact_submit').attr('href', '#modal-dialog');
                                $('contact_submit').attr('data-toggle', 'modal');
                                $("#modal-dialog").modal('show');
//                                return false;
                        }
                });


                $('#modal-dialog').on('show.bs.modal', function () {

                        content.innerHTML = "<p>Sorry, you do not have any product to submit.</p>" + " <br><p>Now back to home page.</p>";

                });

                $('#btnYes').click(function () {

                        window.location = "?";
                });
        </script>

</div>

