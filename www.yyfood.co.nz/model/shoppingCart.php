<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function addToCart($product_ID, $product_Num = 1) {
    if (isset($_SESSION['cart'])) {
        if(productExists($product_ID)){
            return;
        }
        $max = count($_SESSION['cart']);
        $_SESSION['cart'][$max]['productid'] = $product_ID;
		$_SESSION['cart'][$max]['productnum'] = $product_Num;
    } else {
        $_SESSION['cart'] = array();
        $_SESSION['cart'][0]['productid'] = $product_ID;
		$_SESSION['cart'][0]['productnum'] = $product_Num;
    }
}

function productExists($product_ID){
    $max = count($_SESSION['cart']);
    $flag = 0;
    for($i = 0;$i < $max;$i++){
        if($product_ID == $_SESSION['cart'][$i]['productid']){
            $flag = 1;
            break;
        }
    }
    return $flag;
}

function removeFromCart($product_ID){
    $max = count($_SESSION['cart']);
    for($i = 0;$i < $max;$i++){
        if($product_ID == $_SESSION['cart'][$i]['productid']){
            unset($_SESSION['cart'][$i]);
            break;
        }
    }
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}

function clearCart(){
    $_SESSION['cart'] = array();
}
