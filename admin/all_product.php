<!-- สินค้าที่เรียกมาทั้งหมด /// -->
<div class="container">
		<table border="2" class="table table-striped table-hover ">
				<tr class="success"><th>img</th><th>name</th><th>price</th><th>color</th><th>brand</th><th>type</th><th>EDIT</th><th>DELETE</th></tr>
				<?php
					include "database.php";
					$perpage = 12; //จำนวนข้อมูลในแต่ละหน้า
					if (isset($_GET['page'])) {
						$page = $_GET['page'];
					} else {
						$page = 1;
					}
					$start = ($page - 1) * $perpage;
					$select = "select * from product limit {$start} , {$perpage}";
					$run = mysqli_query($con,$select);
					while($data = mysqli_fetch_array($run)){
						$id = $data['prod_id'];
						$img = $data['prod_img'];
						$name= $data['prod_name'];
						$price = $data['prod_price'];
						$color = $data['prod_color'];
						$brand= $data['prod_brand'];
						$type = $data['prod_type'];
						$details = $data['prod_details'];
				?>
				<tr>
					<td><img src="img/watch/<?php echo $img;?>" height="60" width="60"></td>
					<td><?php echo $name;?></td>
					<td><?php echo $price;?></td>
					<td><?php echo $color;?></td>
					<td><?php echo $brand;?></td>
					<td><?php echo $type;?></td>
					<td><a href="#" data-toggle="modal" data-target="#productModal<?php echo $id;?>">Edit</a></td>
					<td><a href="#" onclick="delete_product(<?php echo $id;?>)">Delete</a></td>
					<script type="text/javascript" src="admin/delete.js"></script><!--event การลบ แก้ไข้ ทั้งหมด/// -->
				</tr>
				<?php } ?>	
		</table>
</div>		
<?php
	include "database.php";
	$select = "select * from product";
	$run = mysqli_query($con,$select);
	while($data = mysqli_fetch_array($run)){
		$id = $data['prod_id'];
		$img = $data['prod_img'];
		$name= $data['prod_name'];
		$price = $data['prod_price'];
		$color = $data['prod_color'];
		$brand= $data['prod_brand'];
		$type = $data['prod_type'];
		$details = $data['prod_details'];
?>
<!-- ป๊อบอัพกล่อง edititem /// -->
			<div class="modal fade" id="productModal<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h2 align="center" class="modal-title" id="myModalLabel">Edit Item</h2>
				  </div>
				  <form id="form_item_edit<?php echo $id ?>" >
					<div class="modal-body">
					  <div class="container-fulid">
						<div class="row">
						  <div align="center" class="col-md-12">
							<table class="table table-striped table-hover ">
								<tr><td>ID :  </td><td><input type="radio" name="item-id" id="optionsRadios1" value="<?php echo $id;?>" checked=""> <?php echo $id;?></tr>
								<tr><td>Name :  </td><td><input type="text" name="item-name" value="<?php echo $name;?>"/></td></tr>
								<tr><td>Price :  </td><td><input type="text" name="item-price"  value="<?php echo $price;?>"/></td></tr>
								<tr><td>Color :  </td><td><input type="text" name="item-color"  value="<?php echo $color;?>"/></td></tr>
								<tr><td>Type : </td><td><input type="radio" name="item-type" value="Digital" checked="checked" />Digital
														<input type="radio" name="item-type" value="SmartWatch"/>Smart Watch
								<tr><td>Brand : </td><td><input type="radio" name="item-brand" value="Gshock" checked="checked" />G-shock
														<input type="radio" name="item-brand" value="BabyG" />Baby-G
														<input type="radio" name="item-brand" value="SmartWatch"/>Smart Watch
								<tr><td>Details :  </td><td><textarea name="item-details" rows="10" cols="50" wrap="physical" ><?php echo $details;?></textarea></td></tr>
								<tr><td>Image :  </td><td><input type="file" name="item-img" / ></td></tr>
							</table>
						  </div>
						</div>
					  </div>
					</div>
					<div class="modal-footer">
					  <button type="submit" class="btn btn-success" >Edit Item</button>
					  <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					</div>
				  </form>
				</div>
			  </div>
			</div>
<!-- /// event ทั้งหมดของ แก้ไช -->
	<script>
		$(document).ready(function(){
			$("#form_item_edit<?php echo $id ?>").on("submit",function(e){  
				if (confirm("ต้องการแก้ไข!")) {
					e.preventDefault(); // ปิดการใช้งาน submit ปกติ เพื่อใช้งานผ่าน ajax 
					var data = new FormData($(this)[0]);   // เตรียมข้อมูล form สำหรับส่งด้วย  FormData Object  
					$.ajax({
						url:'include/edit_product.php',type:'post',data:data,
						async: false,cache: false,contentType: false,processData: false, // กรณีใช้งานอัพโหลดไฟล์ด้วย ajax ต้องกำหนด  contentType: false, และ processData: false  
						success:function(result){
							if(result == 'yes'){
								alert("แก้ไขเรียบร้อย");
								location.reload();
							}else{
								alert(result);
							}
						}
					})
				}else{
					e.preventDefault(); //มีไว้เฉย ไม่ให้ข้อความที่พิมหายไป 5555
				}
			});
		});
	</script>
<?php } ?>	
<!-- หน้าๆๆๆ /// -->
<?php 
	$select = "select * from product";
	$run = mysqli_query($con,$select);
	$total_record = mysqli_num_rows($run);
	$total_page = ceil($total_record / $perpage);
	mysqli_close($con); 
?>
	<center><ul class="pagination">
		<li>
			 <a href="product.php?page=1" aria-label="Previous">
			 <span aria-hidden="true">&laquo;</span>
			 </a>
		</li>
			 <?php for($i=1;$i<=$total_page;$i++){ ?>
		<li><a href="product.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
			 <?php } ?>
		<li>
			 <a href="product.php?page=<?php echo $total_page;?>" aria-label="Next">
			 <span aria-hidden="true">&raquo;</span>
			 </a>
		</li>
	</ul></center>
