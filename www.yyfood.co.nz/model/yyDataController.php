<?php

/*
 * 此文件为www.yyfood.co.nz网站调取后端数据库数据以及数据处理的所有Functions
 */

require_once dirname(__FILE__) . '/../_sys/globalVariables.php';

require_once dirname(__FILE__) . '/../_sys/databaseOperation.php';

require_once dirname(__FILE__) . '/../_sys/tableOperation.php';

require_once dirname(__FILE__) . '/../_sys/dataProcess.php';

//获取第一级分类
function get_1st_category() {
        $condition = getConditions(array("belong_site", "edit_type"), array("string", "string"), array("www.yyfood.co.nz", "on"));
        $allResult = getOneRecord("SiteStructure", $condition);
//	print_r($allResult);
        return $allResult;
}

//获取第二级分类
function get_2nd_category($firstCateName) {
        $condition = getConditions(array("Title", "belong_site", "edit_type"), array("string", "string", "string"), array($firstCateName, "www.yyfood.co.nz", "on"));
        $allResult = getOneValueByCondition("SiteStructure", "Subfeatures", $condition);
        $output = explode("<t>", $allResult[0]);
//	print_r($output);
        return $output;
}

//获取所有的RCTypeKey
function getAllRCTypeKey() {
        $allResult = get_1st_category();
        $num = 0;
        $allType = array();
        for ($i = 0; $i < count($allResult); $i++)
        {
                $typeKeyArray = get_1st_RCTypeKey($allResult[$i][1]);
                for ($j = 0; $j < count($typeKeyArray); $j++)
                {
                        $allType[$num++] = $typeKeyArray[$j];
                }
        }
//        print_r($allType);
        return $allType;
}

//变量是第一级分类名称，获取该第一级分类的所有RC_Type_Key
function get_1st_RCTypeKey($firstCateName) {
        $secondCategory = get_2nd_category($firstCateName);
        $output = array();
        for ($i = 0; $i < count($secondCategory); $i++)
        {
                $temp = get_2nd_RCTypeKey($secondCategory[$i]);
                if (!empty($temp)) {
                        $output = array_merge($output, $temp);
                }
        }
//	print_r($output);
        return $output;
}

//变量是第二级分类名称，获取该第二级分类的所有RC_Type_Key
function get_2nd_RCTypeKey($secondCateName) {
        $condition = getConditions(array("feature_after", "belong_site", "edit_type"), array("string", "string", "string"), array($secondCateName, "www.yyfood.co.nz", "on"));
        $allResult_1 = getOneValueByCondition("ClientType", "AllTypeCode", $condition);
        $allResult_2 = getOneValueByCondition("ClientType", "images", $condition);
        $typeArray = explode("<t>", $allResult_1[0]);
        $imageArray = explode("#pic#", $allResult_2[0]);
        if (count($typeArray) == count($imageArray)) {
                $output = array(array());
                for ($i = 0; $i < count($typeArray); $i++)
                {
                        $output[$i][0] = $typeArray[$i];
                        $img = str_replace("\\", "/", $imageArray[$i]);
                        $output[$i][1] = $img;
                        $output[$i][2]=$secondCateName;
                }
//                print_r($output);
                return $output;
        } else {
                echo "Type And Image of " . $secondCateName . " Don't Match With Each Other!!!";
        }
}

//获取属于某RC_Type_Key的所有商品的信息
function getOneTypeData($typeName) {
//	$temp = explode(" / ", $typeName);
//        if (count($temp) > 1) {
//                $typeName = $temp[0] . " / " . unicode($temp[1]);
//        } else {
//                $typeName = $temp[0];
//        }
        $condition = getConditions(array("RcTypeKey", "belong_site", "edit_type"), array("string", "string", "string"), array($typeName, "www.yyfood.co.nz", "on"));
        $allResult = getOneRecord("products", $condition);
//	print_r($allResult);
        return $allResult;
}

//获取属于某特殊类型的所有商品的信息，eg:HOT-TOP-PROMO  top=新产品 PROMO=促销
function getSpecialProducts($specialType) {
        $condition = getConditions(array("PromoType", "belong_site", "edit_type"), array("string", "string", "string"), array($specialType, "www.yyfood.co.nz", "on"));
        $allResult = getOneRecord("products", $condition);
        for ($i = 0; $i < count($allResult); $i++)
        {
                $typeArray[$i] = $allResult[$i][3];
        }
        $typeArray = array_values(array_unique($typeArray));
        $output = array(array());
        for ($i = 0; $i < count($typeArray); $i++)
        {
                $temp = array(array());
                $num = 0;
                for ($j = 0; $j < count($allResult); $j++)
                {
                        if ($typeArray[$i] == $allResult[$j][3]) {
                                $temp[$num++] = $allResult[$j];
                        }
                }
                $output[$i][0] = $typeArray[$i];
                $output[$i][1] = $temp[0][5];
                $output[$i][2] = $temp;
        }
//	print_r($output);
        return $output;
}

//获取yyfood的所有商品信息
function getAllProducts() {
        $condition = getConditions(array("belong_site", "edit_type"), array("string", "string"), array("www.yyfood.co.nz", "on"));
        $allResult = getOneRecord("products", $condition);
//	print_r($allResult);
        return $allResult;
}

//拆分$volume变量，提取package size
function getPackageSize($volume) {
        if (strpos($volume, '<t>') !== false) {
                $temp = explode("<t>", $volume);
                return $temp[0];
        } else {
                return $volume;
        }
}

//拆分$volume变量，提取price unit
function getPriceUnit($volume) {
        if (strpos($volume, '<t>') !== false) {
                $temp = explode("<t>", $volume);
                return $temp[1];
        } else {
                return "";
        }
}

//根据Product ID寻找对应的Product Image
function getProductImage($productID) {
        $typeName = getOneFieldValue("products", $productID, "RcTypeKey");
        return getTypeImage($typeName);
}

//根据RCTypeKey Name寻找对应的Image
function getTypeImage($typeName) {
        $condition = getConditions(array("belong_site", "edit_type"), array("string", "string"), array("www.yyfood.co.nz", "on"));
        $allResult = getOneRecord("ClientType", $condition);
        for ($i = 0; $i < count($allResult); $i++)
        {
                if (strpos($allResult[$i][1], $typeName) !== false) {
                        $temp_1 = explode("<t>", $allResult[$i][1]);
                        $temp_2 = explode("#pic#", $allResult[$i][3]);

                        if (count($temp_1) == count($temp_2)) {
                                $Imgtemp = $temp_2[array_search($typeName, $temp_1)];
                                $img = str_replace("\\", "/", $Imgtemp);
                                return $img;
                        } else {
                                return "";
                        }
                }
        }
        return "";
}

//分别根据活动和RCTypeKey将PRODUCT ID分类传出，return的数据结构是4D Array
function getPackageDeal() {
        $condition = getConditions(array("belong_site", "edit_type"), array("string", "string"), array("www.yyfood.co.nz", "on"));
        $allResult = getOneRecord("PackageDeal", $condition);
        $productIDArray = array(array());
        for ($i = 0; $i < count($allResult); $i++)
        {
                $temp = explode(",", $allResult[$i][4]);
                $productIDArray[$i] = $temp;
        }
        $output = array();
        for ($a = 0; $a < count($productIDArray); $a++)
        {
                $subOutput = array();
                $subOutput[0][0] = $allResult[$a][2];
                $subOutput[0][1] = $allResult[$a][5];
                for ($b = 0; $b < count($productIDArray[$a]); $b++)
                {
                        $temp_1 = getProductInformation($productIDArray[$a][$b]);
                        $typeArray[$b] = $temp_1[3];
                }
                $typeArray = array_values(array_unique($typeArray));
                for ($v = 0; $v < count($typeArray); $v++)
                {
                        $subOutput[$v + 1][0] = $typeArray[$v];
                        $img = str_replace("\\", "/", getTypeImage($typeArray[$v]));
                        $subOutput[$v + 1][1] = $img;
                }
                for ($w = 0; $w < count($productIDArray[$a]); $w++)
                {
                        $temp_2 = getProductInformation($productIDArray[$a][$w]);
                        for ($z = 1; $z < count($subOutput); $z++)
                        {
                                if ($temp_2[3] == $subOutput[$z][0]) {
                                        $index = $z;
                                }
                        }
                        $subOutput[$index][2][] = $productIDArray[$a][$w];
                }
                $output[$a] = $subOutput;
        }
        return $output;
}

//根据Product ID从Product表中提取信息
function getProductInformation($productID) {
        $result = getValue("products", $productID);
        return $result;
}

function getHomeProductDetail($productID){
        $condition = getConditions(array("id","edit_type"), array("int", "string"), array($productID, "on"));
        $allResult = getOneRecord("pages", $condition);
        $output=array();
        $output[0] = $allResult[3];
        $output[1] = $allResult[6];
        return $output;
}
 
//$test=get_2nd_RCTypeKey("Prawn");
//print_r($test);
        
//get_1st_category();
//get_2nd_category("Frozen Seafood");
//get_1st_RCTypeKey("Frozen Seafood");
//get_2nd_RCTypeKey("Prawn");
//get_2nd_RCTypeKey("Octopus & Cuttlefish");
//getOneTypeData("RAW PRAWN CUTLET - BLACK TIGER / 黑老虎生凤尾虾");
//getSpecialProducts("hot");
//getAllProducts();
//getAllRCTypeKey();
//print_r(getPackageDeal());
//print_r(getProductInformation(173));