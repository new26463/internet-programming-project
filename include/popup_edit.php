<!-- ป๊อบอัพกล่อง  edit /// -->
		<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h2 align="center" class="modal-title" id="myModalLabel">Edit</h2>
              </div>
              <form id="form_edit">
                <div class="modal-body">
                  <div class="container-fulid">
                    <div class="row">
						<?php
							include "database.php";
							$login = $_SESSION['user'];
							$select = "select * from customer where cust_email = '$login'";
							$run = mysqli_query($con,$select);
							$data = mysqli_fetch_array($run);
							$name = $data['cust_name'];
							$email = $data['cust_email'];
							$tel = $data['cust_tel'];
							$add = $data['cust_address'];
							$bd = $data['cust_birthdate'];
							
						?>
                      	<table class="table table-striped table-hover ">
						<tr><td><b>*FirstName & LastName : </b></td><td><input type="text" class="form-control" id="focusedInput" name="name" maxlength="50" size="30" required="required" value="<?php echo $name;?>"/></td></tr>
						<tr><td><b>*E-Mail : </b></td><td><input type="text" class="form-control" id="focusedInput" name="email" maxlength="40" size="30" required="required" value="<?php echo $email;?>"/></td></tr>		
						<tr><td><b>*Tel : </b></td><td><input type="text" name="tel" class="form-control" id="focusedInput" maxlength="10" size="30" required="required" value="<?php echo $tel;?>"/></td></tr>
						<tr><td><b>*Address : </b></td><td><textarea class="form-control" name="address" rows="8" cols="50" wrap="physical" required="required" ><?php echo $add;?></textarea></td></tr>
						<tr><td><b>*Birthdate : </b></td><td><input type="date" class="form-control" name="b_day" required="required" max="2000-12-31"  min="1946-01-01"  value="<?php echo $bd;?>"/></td></tr>
					  </table>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success" >Edit</button>
                  <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                </div>
              </form>
            </div>
          </div>
        </div>
		