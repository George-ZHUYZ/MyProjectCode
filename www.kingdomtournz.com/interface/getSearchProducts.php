
		<?php
		
		
		 
		
		
		
		function getSearchProducts($keyword,$belong_site){
			$keyword = unicode($keyword);
			$condition = getConditions(array("belong_site"), array("string"), array($belong_site));
			$allResult = getValuesLike("products", "Product_Name", $keyword, $condition);
			$discountProductList = array();
			$num = 0;
			for($i=0;$i<count($allResult);$i++){

					for($j = 0;$j<count($allResult[$i]);$j++){
						if($j == 4){
							$introductions = explode("<p>#introduction#</p>", $allResult[$i][4]);
							$briefs = explode("<p>#title#</p>",$introductions[0]);
							$discountProductList[$num][4] = $briefs[1];
						}else{
							$discountProductList[$num][$j] = $allResult[$i][$j];
						}
					}
					$num++;
				
			}
			for($a = 0; $a < count($discountProductList); $a++){
			displayList($discountProductList[$a]);
			
			}
			
			if(count($discountProductList)){return TRUE;}
			return FALSE;
		}
		?>

