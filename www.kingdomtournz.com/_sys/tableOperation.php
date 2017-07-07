<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<?php

/*

 * function insertData($databaseName, $tableName, $fieldValue)

 * function deleteData($tableName, $id_value)

 * function updateData($tableName, $idValue, $fieldName, $fieldValue, $fieldType)

 * function insertComment($tableName, $Comment)
 * 
 * function getFields($databaseName, $tableName)

 * function getFieldsType($databaseName, $tableName)

 * function getConditions($fields, $fieldsType, $fieldsValue)

 * function getOneFieldValue($tableName, $id_value, $fieldName)

 * function getValue($tableName, $id_value)

 * function getOneRecord($tableName, $condition)

 * function getAFieldValue($tableName, $id_value, $fieldName)

 * function getValuesByField($tableName, $field)

 * function spliteImgValue($ImgValue)

 */

require_once dirname(__FILE__) . '/databaseOperation.php';
//require_once dirname(__FILE__).'/../data/dataProcess.php';
require_once dirname(__FILE__) . '/globalVariables.php';

//require_once dirname(__FILE__).'/../url/URLprocess.php';

function insertData($tableName, $fieldValue) {
	$con = selectDatabase($GLOBALS['server_databasename']);
	$fieldArray = getFields($GLOBALS['server_databasename'], $tableName);
	$fields = implode(", ", $fieldArray);
	$sql = "INSERT INTO $tableName ($fields) VALUES ($fieldValue)";
	if (mysql_query($sql, $con)) {
		return TRUE;
	} else {

		echo "You Failed To Insert Data: " . mysql_error($con);
		return FALSE;
	}
}

function deleteData($tableName, $id_value) {



	$con = selectDatabase($GLOBALS['server_databasename']);

	$sql = "DELETE FROM $tableName WHERE list_no = '$id_value'";

	if (mysql_query($sql, $con)) {

//            echo "Delete Data Successfully!<br>";
	} else {

		echo "You Failed To Delete Data: " . mysql_error($con);
	}
}

function updateData($tableName, $idValue, $fieldName, $fieldType, $fieldValue
) {

	$con = selectDatabase($GLOBALS['server_databasename']);

	$updateOption = getConditions($fieldName, $fieldType, $fieldValue);

	$updateOption = str_replace("AND", ",", $updateOption);

	$sql = "UPDATE $tableName SET $updateOption WHERE ID = '$idValue'";





//        mysql_query("SET CHARACTER_SET_SERVER='utf8'");
//        $sql=  unicode($sql);

	if (mysql_query($sql, $con)) {

//            echo "Update Data Successfully!<br>";

		return TRUE;
	} else {

		echo "You Failed To Update Data: " . mysql_error($con);
	}
}

function insertComment($tableName, $Comment, $productID, $belong_site, $date) {
	$con = selectDatabase($GLOBALS['server_databasename']);
	$append = "'<CoMmEnT>" . $Comment . "'";
	$sql = "UPDATE Comment SET Comments = CONCAT( Comments, " . $append . ") WHERE IssueID = '" . $productID . "' AND belong_site = '" . $belong_site . "' AND Period = '" . $date . "'";
	if (mysql_query($sql, $con)) {
		return TRUE;
	} else {
		echo "You Failed To udpate Data: " . mysql_error($sql);
		echo $sql;
		return FALSE;
	}
}

function insertRating($tableName, $Rating, $rank, $productID, $belong_site) {
	$con = selectDatabase($GLOBALS['server_databasename']);
	$sql = "UPDATE ProductRating SET Rate = '" . $Rating . "' , RcTypeKey = '" . $rank . "' WHERE ProductID = '" . $productID . "' AND belong_site = '" . $belong_site . "'";
	if (mysql_query($sql, $con)) {
		return TRUE;
	} else {
		echo "You Failed To udpate Data: " . mysql_error($con);
		return FALSE;
	}
}

function getFields($databaseName, $tableName) {



	$link = connectServer();

	$fields = mysql_list_fields($databaseName, $tableName, $link);

	$columns = mysql_num_fields($fields);

	$fieldArray = array();

	for ($i = 0; $i < $columns; $i++) {

		$fieldArray[$i] = mysql_field_name($fields, $i);
	}

	/* for ($i = 0; $i < count($fieldArray); $i++) {

	  echo $fieldArray[$i] . "<br>";

	  } */

	return $fieldArray;
}

function getFieldsByIndex($databaseName, $tableName, $indexArray) {



	$link = connectServer();

	$fields = mysql_list_fields($databaseName, $tableName, $link);

	$columns = mysql_num_fields($fields);

	$fieldArray = array();

	$someFields = array();

	$j = 0;

	for ($i = 0; $i < $columns; $i++) {

		$fieldArray[$i] = mysql_field_name($fields, $i);

		if (in_array($i, $indexArray)) {

			$someFields[$j++] = $fieldArray[$i];
		}
	}

	/* for ($i = 0; $i < count($fieldArray); $i++) {

	  echo $fieldArray[$i] . "<br>";

	  } */

	return $someFields;
}

function getFieldsType($databaseName, $tableName) {



	$link = connectServer();

	$fields = mysql_list_fields($databaseName, $tableName, $link);

	$columns = mysql_num_fields($fields);

	$fieldArray = array();



	for ($i = 0; $i < $columns; $i++) {

		$fieldArray[$i] = mysql_field_type($fields, $i);
	}

	/* for ($i = 0; $i < count($fieldArray); $i++) {

	  echo $fieldArray[$i] . "<br>";

	  } */





	return $someFields;
}

function getConditions($fields, $fieldsType, $fieldsValue) {

	$num_fields = count($fields);

	$num_fieldsType = count($fieldsType);

	$num_fieldsValue = count($fieldsValue);

	$conditon = array();

	if ($num_fields > 0 && $num_fieldsType > 0) {

		if (($num_fields == $num_fieldsType) && ($num_fieldsType == $num_fieldsValue)) {

			for ($i = 0; $i < $num_fields; $i++) {

				if (($fieldsType[$i] == "int") || ($fieldsType[$i] == "real")) {

					$conditon[$i] = $fields[$i] . " = " . $fieldsValue[$i];
				} else {

					$conditon[$i] = $fields[$i] . " = '" . $fieldsValue[$i] . "'";
				}
			}

			$condition_output = implode(" AND ", $conditon);

			return $condition_output;

			//echo $condition_output;
		} else {

			echo "Get Condition Failed: Failed Match Field, Field Type, Field Value!";
		}
	}
}

function getOneFieldValue($tableName, $id_value, $fieldName) {



	$con = selectDatabase($GLOBALS['server_databasename']);

	$sql = "SELECT * FROM $tableName WHERE ID = '$id_value'";

	$result = mysql_query($sql, $con);

	if ($result) {

		while ($row = mysql_fetch_array($result)) {

			//echo "Select Data Successfully!";
//            echo $row[$fieldName] . "<br>";

			return $row[$fieldName];
		}
	} else {

		echo "You Failed To Select Data: " . mysql_error($con);
	}
}

function getValue($tableName, $id_value) {



	$con = selectDatabase($GLOBALS['server_databasename']);

	$sql = "SELECT * FROM $tableName WHERE ID = $id_value";

	$result = mysql_query($sql, $con);

	$item = array();

	if ($result) {

		while ($row = mysql_fetch_array($result)) {

			//echo "Select Data Successfully!";

			$fields = getFields($GLOBALS['server_databasename'], "$tableName");

			for ($i = 0; $i < count($fields); $i++) {

//                    echo $row[$fields[$i]] . " ";
				$item[$i] = $row[$fields[$i]];
//				$item[$fields[$i]] = $row[$fields[$i]];
			}



//                echo "<br>";
		}

		return $item;
	} else {

		echo "You Failed To Select Data: " . mysql_error($con);
	}
}

function getOneRecord($tableName, $condition) {



	$con = selectDatabase($GLOBALS['server_databasename']);

	$sql = "SELECT * FROM $tableName WHERE $condition";

	$result = mysql_query($sql, $con);

	$items = array();

	$j = 0;

	if ($result) {

		while ($row = mysql_fetch_array($result)) {

			//echo "Select Data Successfully!";

			$fields = getFields($GLOBALS['server_databasename'], "$tableName");

			$item = array();

			for ($i = 0; $i < count($fields); $i++) {

//                    echo $row[$fields[$i]] . " ";

				$item[$i] = $row[$fields[$i]];
			}

//                echo "<br>";

			$items[$j++] = $item;
		}

		return $items;
	} else {

		echo "You Failed To Select Data: " . mysql_error($con);
	}
}

function getAFieldValue($tableName, $id_value, $fieldName) {



	$con = selectDatabase($GLOBALS['server_databasename']);

	$sql = "SELECT * FROM $tableName WHERE id = '$id_value'";

	$result = mysql_query($sql, $con);

	if ($result) {

		while ($row = mysql_fetch_array($result)) {

			if ($row["edit_type"] == "off") {

				echo "This record is temporarily taken offline!";
			} else {

				//echo "Select Data Successfully!";
//                    echo $row[$fieldName] . "<br>";

				return $row[$fieldName];
			}
		}
	} else {

		echo "You Failed To Select Data: " . mysql_error($con);
	}
}

function getValuesByField($tableName, $field) {



	$con = selectDatabase($GLOBALS['server_databasename']);

	$sql = "SELECT * FROM $tableName";

	$result = mysql_query($sql, $con);

	$items = array();

	if ($result) {

		$i = 0;

		while ($row = mysql_fetch_array($result)) {

			$items[$i++] = $row[$field];
		}
	} else {

		echo "You Failed To Select Data: " . mysql_error($con);
	}

	return $items;
}

function getValuesLike($tableName, $field, $keyword, $condition) {
	$con = selectDatabase($GLOBALS['server_databasename']);
	$sql = "";
	if (empty($condition)) {
		$sql = "SELECT * FROM $tableName WHERE $field like '%$keyword%' ";
	} else {
		$sql = "SELECT * FROM $tableName WHERE " . $condition . " AND $field like '%$keyword%' ";
	}

	$result = mysql_query($sql, $con);
	$items = array();
	if ($result) {
		$i = 0;

		while ($row = mysql_fetch_array($result)) {
			$halfNum = count($row) / 2;
			$item = array();
			for ($j = 0; $j < $halfNum; $j++) {
				$item[$j] = $row[$j];
			}
			$items[$i++] = $item;
		}
	} else {
		echo "You Failed To Select Data: " . mysql_error($con);
	}
	return $items;
}

function getOneValueByCondition($tableName, $field, $condition) {
	$con = selectDatabase($GLOBALS['server_databasename']);
	$sql = "";
	if (!empty($condition)) {
		$sql = "SELECT * FROM $tableName WHERE $condition";
	}else{
		$sql = "SELECT * FROM $tableName";
	}
	$output=array();
	$num=0;
	$result = mysql_query($sql, $con);
	if ($row = mysql_fetch_array($result)) {
		while ($row = mysql_fetch_array($result)) {
			$output[$num++]=$row[$field];	
		}
	} else {
		$output[0] = "null";
	}
	return $output;
}

function spliteImgValue($ImgValue) {

	$imgAdd = explode("<&&>", $ImgValue);

	return $imgAdd;
}

function getpage($pageID) {
	$sitebelong = rightDomain(curPageURL());
	$condition = getConditions(array("id", "belong_site"), array("int", "string"),
			array($pageID, $sitebelong));
	//print $condition;
	$content_code = getOneRecord("pages", $condition);
	if ($content_code[0][7] == 'on') {
		return $content_code[0][5];
	} else {
		return 'This record is off line; please contact the Web Master for any request about this issue!';
	}
}

function updateComment($ID, $Comment, $belong_site, $date) {
	$cond = getConditions(array("belong_site", "IssueID", "Period"),
			array("string", "string", "String"), array($belong_site, $ID, $date));
	$items = getOneRecord("Comment", $cond);
	$product_name = $items[0][2];
//	$product_name = getOneFieldValue("products", $ID, "Product_Name");
	$review = implode("<PiNgLuN>", $Comment);
	$isUpdate = FALSE;
	$tablename = "Comment";
	if (empty($items)) {
		$value = "null, " . $ID . ",'" . $product_name . "', '" . $date . " ', '" . $review . "', '" . $belong_site . "', 'on' ";
		if (insertData($tablename, $value)) {
			$isUpdate = TRUE;
		}
	} else {

		if (insertComment($tablename, $review, $ID, $belong_site, $date)) {
			$isUpdate = TRUE;
		}
	}
	return $isUpdate;
}

function updateRating($ID, $total, $belong_site, $date) {
	$cond = getConditions(array("belong_site", "ProductID", "Period"),
			array("string", "string", "String"), array($belong_site, $ID, $date));
	$items = getOneRecord("ProductRating", $cond);
	$product_name = $items[0][2];
//	$product_name = getOneFieldValue("products", $ID, "Product_Name");
	$rateStar = Array(0, 0, 0, 0, 0, 0);
	$score = 0;
	$rateStar[$total] ++;
	$isUpdate = FALSE;
	$tablename = "ProductRating";
	if (empty($items)) {
		$rate = implode("<rate>", $rateStar);
		$value = "null, " . $ID . ",'" . $product_name . "', '" . $score . "', '" . $rate . " ', '" . $date . "', '" . $belong_site . "'";
		if (insertData($tablename, $value)) {
			$isUpdate = TRUE;
		}
	} else {
		$rate = $items[0][4];
//		print_r($items);
//		$totalRate = array(0, 0, 0, 0, 0, 0);
		$rate = explode("<rate>", $rate);
//		for ($j = 1; $j < count($rate); $j++) {
//			$totalRate[$j] = $totalRate[$j] + $rate[$j];
//		}
		$count = $rate[$total];
		$count = $count + 1;
		$rate[$total] = "" . $count;
		$rank = getRankbyRating($rate);

		$overall = ceil($rank * 6);
		if($overall>=5)
		{
			$overall=5;
		}
		$rate[0] = $overall;


		$rate = implode("<rate>", $rate);
		if (insertRating("Productrating", $rate, $rank, $ID, $belong_site)) {
			$isUpdate = TRUE;
		}
	}
	return $isUpdate;
}

function getRankbyRating($Rating) {
	$n = 0;
	$z = 1.96;
	$rank = 0;
	foreach ($Rating as $r) {
		$n+=$r;
	}
	if ($n == 0) {
		$rank = 0;
	} else {
		$phat = ($Rating[5] + $Rating[4]) / $n;
		$rank = ($phat + $z * $z / (2 * $n) - $z * sqrt(($phat * (1 - $phat) + $z * $z / (4 * $n)) / $n)) / (1 + $z * $z / $n);
	}
	return $rank;
}

function getFullTable($tableName) {
	$con = selectDatabase($GLOBALS['server_databasename']);
	$sql = "SELECT * FROM " . $tableName;
	$result = mysql_query($sql, $con);
	return $result;
}

//require './dataProcess.php';
//$fields = getFields("tr_ganji","motor");
//$type = getFieldsType("tr_ganji","motor");
//mysql_query("set names utf8");
//$value = array ("#0003","Japan","Toyota",  unicode("我们"),"2006","60000","12000","on");
//getConditions($fields,$value);
//getAFieldValue("motor", "#0002", "model");
//getValue("car", "#0001");
//$fields = array("make","kilometer");
//$type = array("var","int");
//$value = array("Toyota", "80000");
//getOneRecord("motor", getConditions($fields,$type,$value));
//insertData("", $value)
//deleteData("motor", "#0003");
//$field = array("year","price");
//$value = array("2012","12000");
//$type = array("int","int");
//updateData("motor", "#0001", $field, $value, $type);
//getOneFieldValue("fruit", "#0001", "IMAGE")
//    print_r( getValuesByField("fruit", "NAME")) ; 
//    print_r(spliteImgValue("img/apple0.jpg<&&>img/apple1.jpg<&&>img/apple2.jpg<&&>img/apple3.jpg"));
//updateReview(41, "nz", "clyde", "ccc@dsa.com", "this is commond", 5, 4, 3, 0, 0,
//		"127.0.0.1", "2014/08/01");
//update(42,3,"www.kingdomtour.com","2014");
//function update($ID, $total, $belong_site, $date)
//{
//	$cond = getConditions(array("belong_site", "ProductID", "Period"),
//			array("string", "string", "String"), array($belong_site, $ID, $date));
//	print_r($items);
//$items = getOneRecord("ProductRating", $cond);
//print_r($items);
//
//}

//$temp = getOneValueByCondition("dictionary", "Chinese", "English = 'acukland'");
////echo $temp;
//print_r($temp);
?>

