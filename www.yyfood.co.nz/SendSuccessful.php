<?php
$successfulTitle = "";
$successfulBody = "";
$successfulIsOrder = TRUE;
if (isset($_GET['t'])) {
        $successfulType = $_GET['t'];
        if ($successfulType == "o") {
                $successfulTitle = "Order Placed Successful!";
                $successfulBody = "Our customer service team will contact you shortly in regards to payment and shipping";
                $successfulIsOrder = TRUE;
        } else if ($successfulType == "c") {
                $successfulTitle = "Email Send Successful!";
                $successfulBody = "Our customer service team will contact you shortly.";
                $successfulIsOrder = FALSE;
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
        .successPanel
        {
                width: 550px;
                margin-left: auto;
                margin-right: auto;
        }
        .successPanel-heading{
                padding: 30px;
        }
        .successPanel-body{
                padding: 50px;
        }
        .between:hover
        {
                margin: 25px;
                color: dodgerblue;
        }
        .between
        {
                margin: 25px;
                color: dodgerblue;
        }
</style>
<div class="container-fluid fullpage">
        <div class="fullpage vcenter">
                <div class="centering">
                        <div class="panel panel-success successPanel">
                                <div class="panel-heading successPanel-heading">
                                        <div class="panel-title">
                                                <h4><?php echo $successfulTitle; ?></h4>
                                        </div>
                                </div>
                                <div class=" panel-body successPanel-body">
                                        <h5><?php echo $successfulBody; ?></h5>
                                        <br>

                                        <br>
                                        <?php
                                        if ($successfulIsOrder==TRUE) {
                                                echo '<a onclick="clearShoppingCartToHome()" class="link between"  style="cursor: pointer;">Home</a>';
                                        } else {
                                                echo '<a href="?" class="link">Home</a>';
                                        }
                                        ?>
                                </div>

                        </div>
                </div>
        </div>
</div>
<script>
        function clearShoppingCartToHome()
        {
                localStorage.clear();
                window.location = "?";
        }
</script>
