<?php
	include 'database.php';
	include "numcart.php";
	$check=$num;
	$perpage = 12; //จำนวนข้อมูลในแต่ละหน้า
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = 1;
	}
	$start = ($page - 1) * $perpage;
	$select = "select * from product where prod_brand = 'SmartWatch' limit {$start} , {$perpage}";
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
<!-- กล่องสินค้าที่เรียกมาทั้งหมด /// -->
	<div  class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
		<div class="thumbnail">
			 <img src="img/watch/<?php echo $img;?>">
			 <div class="caption">
			   <h4 align="center"><b><?php echo $name;?></b></h4>
			   <p><center>THB : <b style="color:red;"><?php echo $price;?></b></center></p>
			   <p align="center">
					<a class="btn btn-warning" role="button" data-toggle="modal" data-target="#myModal<?php echo $id;?>">Details</a>
					<a class="btn btn-success" <?php if(!$_SESSION)echo 'data-toggle="modal" data-target="#login"';?> id="<?php echo $id ?>">Add to cart</a>
			   </p>
			 </div>
		</div>
	</div>

<!-- /// ป๊อปอัพเวลากด details -->
	<div class="modal fade" id="myModal<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close close1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h2 align="center" class="modal-title" id="myModalLabel"><?php echo $name;?></h2>
		  </div>
		  <div class="modal-body">
			<div class="container-fulid">
			  <div class="row">
				<!-- /// รูปทั้งหมดของนาฬิกา -->
					<div class="col-md-12" id="t1">
					  <a href="#" class="thumbnail">
						<img src="img/watch/<?php echo $img;?>"/>
					  </a>
					</div>

				<!-- details ต่างๆ ///-->
					<div class="col-md-12">
						<center>
							<?php
								include 'database.php';
								$select1 = "select * from product where prod_name = '$name'";
								$run1 = mysqli_query($con,$select1);
								while($data1 = mysqli_fetch_array($run1)){
									$id1 = $data1['prod_id'];
									if($id1 == $id)$id1 = "";
									$color1 = $data1['prod_color'];
									$color2 = $data1['prod_color'];
									if($color1 == 'white')$color1 = '#e4e8de';
									else if($color1 == 'gray')$color1 = '#f2f0e8';
									else if($color1 == 'golden')$color1 = '#E6BE8A';
									else if($color1 == 'green')$color1 = '#CCCC00';
							?>
							<span data-toggle="<?php echo $color2;?>" title="<?php echo $color2;?>">
								<img align="center" class="circle" data-dismiss="modal" data-toggle="modal" data-target="#myModal<?php echo $id1;?>" style="width:40px; height:40px; background:<?php echo $color1;?>;margin-left:5px;">
							</span>
							<?php } ?>
						</center>
						<hr width="95%" color="#ccc" style="margin:10px 0;">
						<center style="font-size:15px;">
							<b>THB : <font color="red"><?php echo $price;?></font></b><br>
							<b>color : <?php echo $color;?></b><br>
							<p><?php echo $details;?></p>
						</center>
					</div>
			  </div>
			</div>
		  </div>
		  <!-- ปุ่มกด ///-->
		  <div class="modal-footer">
			<button type="button" class="btn btn-success" <?php if(!$_SESSION)echo 'data-dismiss="modal" data-toggle="modal" data-target="#login"';?> id="z<?php echo $id ?>">Add to cart</button>
			<button type="button" class="btn btn-danger close1" data-dismiss="modal">Close</button>
		  </div>
		</div>
	  </div>
	</div>
<!-- บอกว่าสีอะไร ///-->
	<script type="text/javascript">
		$('[data-toggle="black"]').tooltip();
		$('[data-toggle="gray"]').tooltip();
		$('[data-toggle="golden"]').tooltip();
		$('[data-toggle="pink"]').tooltip();
		$('[data-toggle="green"]').tooltip();
		$('[data-toggle="blue"]').tooltip();
	</script>
<!-- /// event ทั้งหมดของ add to cart -->
	<script>
		$(document).ready(function(){
			if(<?php echo $check ?>)$("#cart").modal("show");
			$("#<?php echo $id ?>").click(function(){
				var data = {product:<?php echo $id; ?>,user:'<?php echo $_SESSION['user']; ?>'};
				$.ajax({
					url:'include/add_cart.php',type:'post',data:data,
					success:function(result){
						if(result == 'yes'){
								location.reload();
								//$("#cart").modal("show");
								//window.setTimeout(function(){ alert("Hello"); }, 1500);
							}
					}
				})
			});
			$("#z<?php echo $id ?>").click(function(){
				var data = {product:<?php echo $id; ?>,user:'<?php echo $_SESSION['user']; ?>'};
				$.ajax({
					url:'include/add_cart.php',type:'post',data:data,
					success:function(result){
						if(result == 'yes'){
								location.reload();
							}
					}
				})
			});
		});
	</script>
<?php } ?>
<?php
	$select = "select * from product where prod_brand = 'SmartWatch'";
	$run = mysqli_query($con,$select);
	$total_record = mysqli_num_rows($run);
	$total_page = ceil($total_record / $perpage);
	mysqli_close($con);
?>
<center style="clear:both">
	<ul class="pagination">
		<li>
			<a href="smartwatch.php?page=1" aria-label="Previous">
				<span aria-hidden="true">&laquo;</span>
			</a>
		</li>
		<?php for($i=1;$i<=$total_page;$i++){ ?>
			<li><a href="smartwatch.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
		<?php } ?>
		<li>
			<a href="smartwatch.php?page=<?php echo $total_page;?>" aria-label="Next">
				<span aria-hidden="true">&raquo;</span>
			</a>
		</li>
	</ul>
</center>
