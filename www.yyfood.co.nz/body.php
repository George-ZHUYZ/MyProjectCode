<?php

function loadContent() {
        $query = $_SERVER['QUERY_STRING'];
        $title = explode("&", $query, 2);
        switch ($title[0]) {
                case "product":
                        require_once dirname(__FILE__) . '/TemplatePage.php';
                        break;
                case "orderConfirm.php":
                        require_once dirname(__FILE__) . '/orderConfirm.php';
                        break;
                case "EmailSend.php":
                        require_once dirname(__FILE__) . '/EmailSend.php';
                        break;
                case "aboutus":
                        require_once dirname(__FILE__) . '/aboutus.php';
                        break;
                case "contactus":
                        require_once dirname(__FILE__) . '/contactus.php';
                        break;
                case "contactUsEmail.php":
                        require_once dirname(__FILE__) . '/contactUsEmail.php';
                        break;
                case "SendSuccessful.php":
                        require_once dirname(__FILE__) . '/SendSuccessful.php';
                        break;
                default:
                        require_once dirname(__FILE__) . '/home.php';
                        break;
        }
}
?>
<body>
        <div id="bodyBackground">
                <div id="bodyBackgroundimg"></div>
        </div>
        <div id="wrapper">
                <div class="topHead">
                        <div class="topHead-content col-xs-12 col-sm-7 pull-left">
                                <div class="topPhone col-xs-12 col-md-5"><span class="glyphicon glyphicon-earphone"></span><span class="hidden-sm phoneText">Phone:</span>+64 9 276 2268 </div>
                                <div class="topEmail col-xs-12 col-md-6 col-md-offset-1"><span class="glyphicon glyphicon-envelope"></span><span class="hidden-sm emailText">Email:</span><a href="mailto:sales@yyfood.co.nz" target="_top">sales@yyfood.co.nz</a></div>
                        </div>
                        <div class="topHead-shopping col-xs-12 col-sm-5 pull-right">
                                <div class="row shoppingcar collapse-group">
                                        <div class="panel panel-default cart-panel" id="draggable">
                                                <div class="panel-heading" id="shoppingcartHeading">
                                                        <div id="shoppingcartHeader">
                                                                <a id="checkout" title="Check out"><span class="glyphicon glyphicon-shopping-cart pull-left" id="shoppingcarIcon"></span></a>
                                                                <a id="shoppingcartTitleBtn"><h3 class="panel-title pull-left" id="shoppingcartTitle">Your Cart<span class="fa fa-caret-down openIcon"></span></h3></a>
                                                                <span class="badge pull-right" id="shoppingcartNumber">0</span>
                                                        </div>
                                                </div>
                                                <div class="panel-body collapse" id="shoppingcart-panel-body">
                                                        <form id="shoppingForm" action="?orderConfirm.php" method="post">
                                                                <div id="Cart">    
                                                                        <p>Your cart is empty!</p>
                                                                </div>
                                                                <a href="javascript:ProceedUpdate()" class="btn  add-right-margin">Update</a>
                                                                <a  id="submitButton" class="btn btn-default ">Checkout</a>
                                                                <a  href="javascript:localStorage.clear();location.reload();" class="btn btn-default  pull-right">Clear All</a>
                                                        </form>
                                                </div>

                                                <script>

                                                        
                                                        var cart_products = Array();
                                                        var cart_productsName = Array();
                                                        var cart_quantities = Array();
                                                        var product_prices = Array();
                                                        var currency_symbol = '$';

                                                        $(document).ready(function () {
                                                                //                                                localStorage.clear();
                                                                readLocal();
                                                                $('.nav li a').each(function () {
                                                                        if ($($(this))[0].href == String(window.location))
                                                                        {
                                                                                $(this).parent().addClass('active');
                                                                        } else if ($($(this))[0].href == String(window.location) + ('?'))
                                                                        {
                                                                                $(this).parent().addClass('active');
                                                                        }

                                                                });

                                                        });

                                                        var form = document.getElementById("shoppingForm");
                                                        document.getElementById("checkout").addEventListener("click", function () {
                                                                var divs = $("input.quantity-text");
                                                                if (divs.length > 0)
                                                                {
                                                                        form.submit();

                                                                } else
                                                                {
                                                                        emptyPopup("Your shopping cart is Empty!!");
                                                                }
                                                        });
                                                        document.getElementById("submitButton").addEventListener("click", function () {
                                                                var divs = $("input.quantity-text");
                                                                if (divs.length > 0)
                                                                {
                                                                        form.submit();

                                                                } else
                                                                {
                                                                        emptyPopup("Your shopping cart is Empty!!");
                                                                }
                                                        });
                                                        function emptyPopup(successNotice)
                                                        {
                                                                document.getElementById("popupEmpty").innerHTML = successNotice;
                                                                document.getElementById("popupEmpty").style.display = "block";
                                                                setTimeout('HidePopup()', 2000);
                                                        }
                                                        function HidePopup()
                                                        {
                                                                document.getElementById("popupEmpty").style.display = "none";
                                                        }

                                                        $('#shoppingcartTitleBtn').on('click', function (e) {
                                                                e.preventDefault();
                                                                var $this = $(this);
                                                                var $collapse = $this.closest('.collapse-group').find('.collapse');
                                                                $collapse.collapse('toggle');
                                                        });

                                                        $('#shoppingcart-panel-body').on('shown.bs.collapse', function () {
                                                                $(".openIcon").removeClass("fa-caret-down").addClass("fa-caret-up");
                                                        });

                                                        $('#shoppingcart-panel-body').on('hidden.bs.collapse', function () {

                                                                $(".openIcon").removeClass("fa-caret-up").addClass("fa-caret-down");
                                                        });
                                                </script>

                                        </div>
                <!--                    <div class="shoppingcarImage"><img  class="img-responsive"  src="clients/www.yyfood.co.nz/images/Nav/basket.jpg"/></div>
                                <div class="shoppingNum">1</div>-->
                                </div>
                        </div>
                </div>
                <?php require_once dirname(__FILE__) . '/verticalNav.php'; ?>
                <div class="container-fluid homePage " >
                        <?php loadContent(); ?>
                </div>
        </div>
</body>	
