
<?php
// Use mysql
require_once dirname(__FILE__) . '/_sys/tableOperation.php';
$tableName = "pages";
$id_value = 327;
$fieldName = "content_code";

$temp = getAFieldValue($tableName, $id_value, $fieldName);
$image = getAFieldValue($tableName, $id_value, 'images');
//echo  $temp;  
?>
<div>

        <div class="container-fluid" >
                <!-- Contact with Map - START -->

                <div class="aboutmax">
                        <div class="about-body">
                                <?php echo '<b>' . $temp . '</b>'; ?>    
                        </div>
                </div>
                <div class="aboutImage">
                        <img src="<?php echo $image; ?>" class="img-thumbnail img-responsive" alt="photo" >
                </div>

        </div>
</div>
