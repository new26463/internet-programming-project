<!-- ป๊อบอัพกล่อง ข้อมูล user/// -->
		<div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 align="center" class="modal-title" id="myModalLabel">Info</h2>
              </div>
              <form id="form_info">
                <div class="modal-body">
                  <div class="container-fulid">
                    <div class="row">
                      <table class="table table-striped table-hover ">
										  <?php
											include 'database.php';
											$email = $_SESSION['user'];
											$select = "SELECT * FROM customer WHERE cust_email= '$email'";
											$run = mysqli_query($con,$select);
											$data = mysqli_fetch_array($run);
											$pass = $data['cust_pass'];
											$name = $data['cust_name'];
											$tel = $data['cust_tel'];
											$address = $data['cust_address'];
											$birthdate = $data['cust_birthdate'];
											$status = $data['cust_status'];
											echo"<tr><td><b>*First Name and Last Name : </b></td><td> ".$name." </td></tr>";
											echo"<tr><td><b>*E-Mail : </b></td><td> ".$email." </td></tr>";
											echo"<tr><td><b>*Tel : </b></td><td> ".$tel." </td></tr>";
											echo"<tr><td><b>*Address : </b></td><td> ".$address." </td></tr>";
											echo"<tr><td><b>*Birthdate : </b></td><td> ".$birthdate." </td></tr>";
											mysqli_close($con);
										  ?>
										  </table>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button data-dismiss="modal" data-toggle="modal" data-target="#edit" class="btn btn-success" >Edit</button>
                  <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                </div>
              </form>
            </div>
          </div>
        </div>
