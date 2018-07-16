<!-- ป๊อบอัพกล่อง sigh up /// -->
		<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 align="center" class="modal-title" id="myModalLabel"><b>Sign Up</b></h2>
              </div>
              <form id="form_signup" class="form-group">
                <div class="modal-body">
                  <div class="container-fulid">
                    <div class="row">
                      <table class="table table-striped table-hover ">
												<tr><td><b>*FirstName & LastName : </b></td><td><input type="text" class="form-control" id="focusedInput" name="name" maxlength="50" size="30" required="required" /></td></tr>
												<tr><td><b>*E-Mail : </b></td><td><input type="text" class="form-control" id="focusedInput" name="email" maxlength="40" size="30" required="required" /></td></tr>
												<tr><td><b>*Password : </b></td><td><input type="password" class="form-control" id="focusedInput" name="pass1" maxlength="20" size="30" required="required" /></td></tr>
												<tr><td><b>*Password Again : </b></td><td><input type="password" class="form-control" id="focusedInput" name="pass2" maxlength="20" size="30" required="required" /></td></tr>
												<tr><td><b>*Tel : </b></td><td><input type="text" name="tel" class="form-control" id="focusedInput" maxlength="10" size="30" required="required" /></td></tr>
												<tr><td><b>*Address : </b></td><td><textarea class="form-control" name="address" rows="8" cols="50" wrap="physical" required="required"></textarea></td></tr>
												<tr><td><b>*Birthdate : </b></td><td><input type="date" class="form-control" name="b_day" required="required" max="2000-12-31"  min="1946-01-01" /></td></tr>
										  </table>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success" id="button_signup" >Create your WhatWatch account</button>
                  <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                </div>
              </form>
            </div>
          </div>
        </div>
