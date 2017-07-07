<?php
function loadProduct_Nav($mainType) {

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
        loadProductType_Nav($types[$i],$productlist);

    }

}



function loadProductType_Nav($type,$productlist) {
	$name= str_replace("_", " ", $type);
        $name=  ucwords($name);

        echo '  <li><h2>'.$name.'</h2>';

        echo '  <ul>';

        echoProductNames_Nav($productlist);

        echo '</ul>';

        echo '</li>';
}



function echoProductNames_Nav($product) {
    for ($i = 0; $i < count($product); $i++) {
        echo '<li><a href=?PRODUCTS&'. $product[$i][0].'>' . $product[$i][1] . '</a><li>';
    }
}


function loadMainType_Nav($mainType){
	for ($i = 0; $i < count($mainType); $i++) {
		echo' <li class="memu"><a href="?'.$mainType[$i].'">'.$mainType[$i].'</a><span id="s'.$i.'"></span><ul class="subs">';
		loadProduct_Nav($mainType[$i]);
		echo'</ul> </li>';
	}
}

?>