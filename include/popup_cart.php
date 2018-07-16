<!-- ป๊อบอัพกล่อง  cart /// -->
		<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	    <div class="modal-dialog" role="document">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	          <h2 align="center" class="modal-title" id="myModalLabel">Cart</h2>
	        </div>
	        <form id="form_cart" >
	          <div class="modal-body">
	            <div class="container-fulid">
	              <div class="row">
	                <div align="center" class="col-md-12">
	                	<table class="table table-striped table-hover " >
											<tr class="success"><th>img</th><th>name</th><th>color</th><th>brand</th><th>price</th><th></th></tr>
											<?php
											include "database.php";
											$email = $_SESSION['user'];
											$select = "select * from cart join product on cart.prod_id = product.prod_id where cust_email = '$email'";
											$run = mysqli_query($con,$select);
											while($data = mysqli_fetch_array($run)){
												$img = $data['prod_img'];
												$name = $data['prod_name'];
												$color = $data['prod_color'];
												$price = $data['prod_price'];
												$brand= $data['prod_brand'];
												$id= $data['prod_id'];
											?>
											<tr>
												<td><img src="img/watch/<?php echo $img;?>" height="60" width="60"></td>
												<td><?php echo $name;?></td>
												<td><?php echo $color;?></td>
												<td><?php echo $brand;?></td>
												<td><?php echo $price;?></td>
												<td><a id="del<?php echo $id;?>"><span class="glyphicon glyphicon-trash"></span></a></td>
											</tr>
											<script>
												$("#del<?php echo $id;?>").click(function(){
													var data = {product:<?php echo $id; ?>,user:'<?php echo $_SESSION['user']; ?>'};
													$.ajax({
														url:'include/del_cart.php',type:'post',data:data,
														success:function(result){
															if(result == 'yes'){
																location.reload();
															}else{
																alert(result);
															}
														}
													})
												});
											</script>
											<?php } ?>
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td><b>TOTAL</b></td>
												<td><b><?php require'totalprice.php';?></b></td>
												<td><b>THB</b></td>
											</tr>
										</table>
	                </div>
	              </div>
	            </div>
	          </div>
	          <div class="modal-footer">
	            <button type="submit" class="btn btn-success">Pay</button>
	            <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
	          </div>
	        </form>
	      </div>
	    </div>
	  </div>
