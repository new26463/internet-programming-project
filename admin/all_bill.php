<div class="container">
	<table >
		<tr>
			<select name="year" id="pagelist" class="form-control"><option value="">กรุณาเลือก</option>
				<?php 
				include "database.php";
				$select = "select * from bill GROUP BY bill_date,bill_time ";
				$run = mysqli_query($con,$select);
				if($run){
				while($data = mysqli_fetch_array($run)){
						$date = $data['bill_date'];
						$time = $data['bill_time'];
				?>
				<option value="<?php echo $date;?>-<?php echo $time;?>">Date : <?php echo $date ;?> Time : <?php echo $time ;?></option>
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
	?>
	<div id="<?php echo $date;?>-<?php echo $time;?>" style="display:none">
		<h6><table  class="table table-striped table-hover ">
				<tr class="success"><th>เลขใบสั่งซื้อ</th><th>img</th><th>name</th><th>color</th><th>brand</th><th>price</th><th>customer</th></tr>
					<?php
						include "database.php";
						$select1 = "select * from bill join product on bill.prod_id = product.prod_id  
									where (bill.bill_date = '$date') and (bill.bill_time = '$time')";
						$run1 = mysqli_query($con,$select1);
						if($run1){
						while($data1 = mysqli_fetch_array($run1)){
							$img = $data1['prod_img'];
							$name = $data1['prod_name'];
							$color = $data1['prod_color'];
							$price = $data1['prod_price'];
							$brand = $data1['prod_brand'];
							$email = $data1['cust_email'];
							$id = $data1['bill_order'];
					?>
				<tr>
					<td><?php echo $id;?></td>
					<td><img src="img/watch/<?php echo $img;?>" height="60" width="60"></td>
					<td><?php echo $name;?></td>
					<td><?php echo $color;?></td>
					<td><?php echo $brand;?></td>
					<td><?php echo $price;?></td>
					<td><?php echo $email;?></td>
				</tr>
					<?php }}?>
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