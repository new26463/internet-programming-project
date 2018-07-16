<div class="container">
	<h2>HISTORY.</h2>
	<table >
		<tr>
			<select name="year" id="pagelist" class="form-control"><option value="">กรุณาเลือก</option>
				<?php
				include "database.php";
				session_start();
				$id_now = $_SESSION['user'];
				$select = "select * from bill where cust_email = '$id_now' GROUP BY bill_order ";
				$run = mysqli_query($con,$select);
				if($run){
				while($data = mysqli_fetch_array($run)){
						$date = $data['bill_date'];
						$time = $data['bill_time'];
						$order = $data['bill_order'];
				?>
				<option value="<?php echo $order;?>">Order : <?php echo $order;?></option>
				<?php }} ?>
			</select>
		</tr>
	</table>
	<?php
		$select = "select * from bill GROUP BY bill_date,bill_time ";
		$run = mysqli_query($con,$select);
		if($run){
			while($data = mysqli_fetch_array($run)){
				$date = $data['bill_date'];
				$time = $data['bill_time'];
				$order = $data['bill_order'];
	?>
	<div id="<?php echo $order;?>" style="display:none">
		<h5><b>ทำรายการเมื่อ วันที่ : <?php echo $date;?> เวลา : <?php echo $time;?></b></h5>
		<h6><table  class="table table-striped table-hover ">
				<tr class="success"><th><center>img</center></th><th>name</th><th>color</th><th>brand</th><th>price</th><th><center>status</center></th></tr>
					<?php
						include "database.php";
						$select1 = "select * from bill join product on bill.prod_id = product.prod_id
									where (bill.cust_email = '$id_now') and (bill.bill_order = '$order')";
						$run1 = mysqli_query($con,$select1);
						if($run1){$sum=0;
						while($data1 = mysqli_fetch_array($run1)){
							$img = $data1['prod_img'];
							$name = $data1['prod_name'];
							$color = $data1['prod_color'];
							$price = $data1['prod_price'];
							$brand= $data1['prod_brand'];
							$sum+=$price;
					?>
				<tr>
					<td><center><img src="img/watch/<?php echo $img;?>" height="60" width="60"></center></td>
					<td><?php echo $name;?></td>
					<td><?php echo $color;?></td>
					<td><?php echo $brand;?></td>
					<td><?php echo $price;?></td>
					<td><center>สินค้ากำลังจัดส่ง</center></td>
				</tr>

					<?php }?>
				<tr><td></td><td></td><td></td><td></td><td><b>ราคารวม</b></td>
					<td><center><b><?php echo $sum;?></b><center></td>
					<?php }?>
				</tr>
		</table></h6>
	</div>
	<?php }} ?>
	<script language="javascript">
		$("#pagelist").change(function(){
			var viewID = $("#pagelist option:selected").val();
			$("#pagelist option").each(function(){
				var hideID = $(this).val();
				$("#"+hideID).hide();
			});
			$("#"+viewID).show();
		});
	</script>
</div>
