<!-- ป๊อบอัพกล่อง login /// -->
		<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 align="center" class="modal-title" id="myModalLabel"><b>Login</b></h2>
              </div>
              <form id="form_login" >
                <div class="modal-body">
                  <div class="container-fulid">
                    <div class="row">
                      <div align="center" class="col-md-12">
                        <table class="table table-striped table-hover ">
													<tr><div class="form-group has-error">
													  <td><label class="control-label" for="inputError">Email : </label></td>
													  <td><input type="text" class="form-control" id="inputError" name="email" maxlength="30" placeholder="Your email" required="required" ></td>
													</div></tr>
													<tr><div class="form-group has-error">
													  <td><label class="control-label" for="inputError">Password : </label></td>
													  <td><input type="password" class="form-control" id="inputError" name="password" maxlength="30" placeholder="Your password" required="required" ></td>
													</div></tr>
												</table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success">Login</button>
                  <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                </div>
              </form>
            </div>
          </div>
        </div>
