<?php


function loadProduct($mainType) {

    $con = getConditions(array("belong_site", "feature_after"),

            array("string", "string"),

            array(ini_get('session.cookie_domain'), $mainType));

    $all = getOneRecord("ClientType", $con);

    $alltypecode = $all[0][2];

    $types = explode("<t>", $alltypecode);

    $products = array();

    $condintion = getConditions(array("belong_site"), array("string"),

            array(ini_get('session.cookie_domain')));

     

    for ($i = 0; $i < count($types); $i++) {

        

        $productlist = getValuesLike("products", "Product_Code", $types[$i], $condintion);

        loadProductType($types[$i],$productlist);

    }

}



function loadProductType($type,$productlist) {
	$name= str_replace("_", " ", $type);
        $name=  ucwords($name);
	

        echo '<div class="gallery">';

        echo '  <div class="dp">'.$name.'</div>';

        echo '  <div class="list">';

        echoProductList($productlist);

        echo '  </div>';

        echo '</div>';



}



function echoProductList($product) {

    for ($i = 0; $i < count($product); $i++) {

        echo '<h4><a href=?PRODUCTS&'. $product[$i][0].'>' . $product[$i][1] . '</a></h4>';

    }

}

?>