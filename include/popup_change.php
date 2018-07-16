<!-- ป๊อบอัพกล่อง change pass /// -->
		<div class="modal fade" id="change" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 align="center" class="modal-title" id="myModalLabel"><b>Change Password</b></h2>
              </div>
              <form id="form_change" >
                <div class="modal-body">
                  <div class="container-fulid">
                    <div class="row">
                      <div align="center" class="col-md-12">
                        <table class="table table-striped table-hover ">
							<tr><div class="form-group has-error">
								<td><label class="control-label" for="inputError">Password Old: </label></td>
								<td><input type="password" class="form-control" id="inputError" name="passwordo" maxlength="30" placeholder="Your password" required="required" ></td>
							</div></tr>
							<tr><div class="form-group has-error">
								<td><label class="control-label" for="inputError">Password Old-re : </label></td>
								<td><input type="password" class="form-control" id="inputError" name="passwordo1" maxlength="30" placeholder="Your password" required="required" ></td>
							</div></tr>
						</table><hr>
						<table class="table table-striped table-hover ">
							<tr><div class="form-group has-error">
								<td><label class="control-label" for="inputError">Password New : </label></td>
								<td><input type="password" class="form-control" id="inputError" name="passwordn" maxlength="30" placeholder="Your password" required="required" ></td>
							</div></tr>
							<tr><div class="form-group has-error">
								<td><label class="control-label" for="inputError">Password New-re : </label></td>
								<td><input type="password" class="form-control" id="inputError" name="passwordn1" maxlength="30" placeholder="Your password" required="required" ></td>
							</div></tr>
						</table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success">Change</button>
                  <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                </div>
              </form>
            </div>
          </div>
        </div>
