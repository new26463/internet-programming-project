<!-- สินค้าที่เรียกมาทั้งหมด /// -->
<div class="container">
		<table border="2" class="table table-striped table-hover ">
				<tr class="success"><th>email</th><th>pass</th><th>name</th><th>tel</th><th>address</th><th>birthdate</th><th>status</th><th>EDIT</th><th>DELETE</th></tr>
				<?php
					include "database.php";
					$perpage = 8; //จำนวนข้อมูลในแต่ละหน้า
					if (isset($_GET['page'])) {
						$page = $_GET['page'];
					} else {
						$page = 1;
					}
					$start = ($page - 1) * $perpage;
					$select = "select * from customer limit {$start} , {$perpage}";
					$run = mysqli_query($con,$select);
					while($data = mysqli_fetch_array($run)){
						$id = $data['cust_id'];
						$email = $data['cust_email'];
						$pass = $data['cust_pass'];
						$name = $data['cust_name'];
						$tel = $data['cust_tel'];
						$address = $data['cust_address'];
						$birthdate = $data['cust_birthdate'];
						$status = $data['cust_status'];
				?>
				<tr>
					<td><?php echo $email;?></td>
					<td><?php echo $pass;?></td>
					<td><?php echo $name;?></td>
					<td><?php echo $tel;?></td>
					<td><?php echo $address;?></td>
					<td><?php echo $birthdate;?></td>
					<td><?php echo $status;?></td>
					<td><a href="#" data-toggle="modal" data-target="#memberModal<?php echo $id;?>">Edit</a></td>
					<td><a href="#" onclick="delete_member(<?php echo $id;?>)">Delete</a></td>
					<script type="text/javascript" src="admin/delete.js"></script><!--event การลบ แก้ไข้ ทั้งหมด/// -->
				</tr>
				<?php } ?>	
		</table>
</div>		
<?php
	include "database.php";
	$perpage = 8; //จำนวนข้อมูลในแต่ละหน้า
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = 1;
	}
	$start = ($page - 1) * $perpage;
	$select = "select * from customer limit {$start} , {$perpage}";
	$run = mysqli_query($con,$select);
	while($data = mysqli_fetch_array($run)){
		$id = $data['cust_id'];
		$email = $data['cust_email'];
		$pass = $data['cust_pass'];
		$name = $data['cust_name'];
		$tel = $data['cust_tel'];
		$address = $data['cust_address'];
		$birthdate = $data['cust_birthdate'];
		$status = $data['cust_status'];
?>
<!-- ป๊อบอัพกล่อง edititem /// -->
			<div class="modal fade" id="memberModal<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h2 align="center" class="modal-title" id="myModalLabel">Edit Item</h2>
				  </div>
				  <form id="form_member_edit<?php echo $id ?>" >
					<div class="modal-body">
					  <div class="container-fulid">
						<div class="row">
						  <div align="center" class="col-md-12">
							<table class="table table-striped table-hover ">
								<tr><td><b>ID :  <b></td><td><input type="radio" name="id" id="optionsRadios1" value="<?php echo $email;?>" checked=""> <?php echo $email;?></tr>
								<tr><td><b>*FirstName & LastName : </b></td><td><input type="text" class="form-control" id="focusedInput" name="name" maxlength="50" size="30" required="required" value="<?php echo $name;?>"/></td></tr>
								<tr><td><b>*E-Mail : </b></td><td><input type="text" class="form-control" id="focusedInput" name="email" maxlength="40" size="30" required="required" value="<?php echo $email;?>"/></td></tr>		
								<tr><td><b>*Tel : </b></td><td><input type="text" name="tel" class="form-control" id="focusedInput" maxlength="10" size="30" required="required" value="<?php echo $tel;?>"/></td></tr>
								<tr><td><b>*Address : </b></td><td><textarea class="form-control" name="address" rows="8" cols="50" wrap="physical" required="required" ><?php echo $address;?></textarea></td></tr>
								<tr><td><b>*Birthdate : </b></td><td><input type="date" class="form-control" name="b_day" required="required" max="2000-12-31"  min="1946-01-01"  value="<?php echo $birthdate;?>"/></td></tr>
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
			$("#form_member_edit<?php echo $id ?>").on("submit",function(e){  
				if (confirm("ต้องการแก้ไข!")) {
					e.preventDefault(); // ปิดการใช้งาน submit ปกติ เพื่อใช้งานผ่าน ajax 
					var data = new FormData($(this)[0]);   // เตรียมข้อมูล form สำหรับส่งด้วย  FormData Object  
					$.ajax({
						url:'include/edit_member.php',type:'post',data:data,
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
	$select = "select * from customer";
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
