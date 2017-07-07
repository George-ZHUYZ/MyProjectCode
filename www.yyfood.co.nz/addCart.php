
<?php
//$RCTypeKey = "RAW PRAWN MEAT - VANNAMEI / 生虾仁";
//$RCTypeKey = "FORZEN LYCHEE / 急凍荔枝";
//getProducts($RCTypeKey);


require_once dirname(__FILE__) . '/_sys/URLprocess.php';
$query = url_code();
$typeName = explode("=", $query, 2);
print_r($typeName);

function getProductsTable($typeName) {

        $id = explode(" / ", $typeName);
        $id = $id[1];
        $all = getOneTypeData($typeName);
        $image = getProductImage($typeName);



        echo '<div id="wrapper">

	

	<div class="modal fade" id="' . $id . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			

				<div class="modal-body">
					<div class="container">
						<div class="row clearfix">';

        echo '<div class="col-md-6 column productImage">';

        echo '		<img src="' . $image . '" class="img-thumbnail">';
        echo'</div>
							<div class="col-md-6 column productTable">
								<h3>';
        echo '	' . $typeName . '';
        echo '</h3>';


        echo '<table class="table table-hover">
									<thead>
										<tr>
											<th>
												Item Description
											</th>
											<th>
												Size(per lb)
											</th>
											<th>
												Pack/CTN
											</th>
											<th>
												<div class="thShopping">Shopping Cart</div>
											</th>
										</tr>
									</thead>
									<tbody>';
        for ($i = 0; $i < count($all); $i++)
        {


                $itemTitle = $all[$i][1];
                $itemSize = $all[$i][2];
                $itemWeight = $all[$i][10];




                echo '<tr>
		<td>
		' . $itemTitle . '
		</td>
		<td>
		' . $itemSize . '
		</td>
		<td>
		' . $itemWeight . '
		</td>
		<td>
			<div class="shoppingcart"><a href="#"><img class="img-responsive" width="60%" height="60%" src="clients/www.yyfood.co.nz/images/addCart/shoppingcart.png"/></a></div>
		</td>
	</tr>';
        }
        echo '</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

			</div> 

		</div> 
	</div> 
</div>
';
}
?>




<!--


<button class="btn btn-primary btn-lg" data-toggle="modal" 
                        data-target="#' . $id . '">
        ADD TO CART
        </button>-->