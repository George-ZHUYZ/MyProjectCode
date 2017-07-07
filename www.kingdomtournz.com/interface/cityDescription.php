

		<?php

		function cityDescription($cityName){
			$condition = getConditions(array("title"), array("string"), array($cityName));
			$allResult = getOneRecord("Destinations", $condition);
			return $allResult[0][6];
		}
		
		
		// 变量是Destination表中的ID
		
		function getCityDetail($ID){
			$condition = getConditions(array("id"), array("int"), array($ID));
			$allResult = getOneRecord("Destinations", $condition);
			return $allResult;
		}
		
		function getCityEnglishTitle($ID){
			$allResult=getCityDetail($ID);
			return $allResult[0][1];
		}
		
		function getCityChineseName($ID){
			$allResult=getCityDetail($ID);
			return $allResult[0][7];
		}
		
		function getCityDescription($ID){
			$allResult=getCityDetail($ID);
			return $allResult[0][6];
		}
		?>

