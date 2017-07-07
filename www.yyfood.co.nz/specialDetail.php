<?php
require_once dirname(__FILE__) . '/_sys/tableOperation.php';

$query = $_SERVER['QUERY_STRING'];
$pageQuery = explode("=", $query);
$pageID = $pageQuery[1];
$content = getValue("pages", $pageID);
?>
<style>
        .spDetail{
                background-color: white;
        }
        .spDetailTitle{
                height: 110px;
                width: 100%;
                background-color: #428bca;
        }
        .spDetailTitle h3{
                color: white;
                margin: 0;
                padding-top: 25px;
        }
        .spDetailContent{
                padding: 5%;
        }
</style>
<div class="container-fluid spDetail">
        <button type="button" class="close closebtn" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <div class="spDetailTitle"><h3> <?php echo $content[3]; ?></h3></div>
        <div class="spDetailContent">
                <?php
                echo $content[5];
                ?>
        </div>
</div>

