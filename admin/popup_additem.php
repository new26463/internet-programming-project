<!-- ป๊อบอัพกล่อง Additem /// -->
		<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 align="center" class="modal-title" id="myModalLabel">Add Item</h2>
              </div>
              <form id="form_add" >
                <div class="modal-body">
                  <div class="container-fulid">
                    <div class="row">
                      <div align="center" class="col-md-12">
                        <table class="table table-striped table-hover ">
							<tr><td>Name :  </td><td><input type="text" name="item-name" /></td></tr>
							<tr><td>Price :  </td><td><input type="text" name="item-price"  /></td></tr>
							<tr><td>Color :  </td><td><input type="text" name="item-color"  /></td></tr>
							<tr><td>Type : </td><td><input type="radio" name="item-type" value="Digital" checked="checked" />Digital
													<input type="radio" name="item-type" value="SmartWatch"/>Smart Watch
							<tr><td>Brand : </td><td><input type="radio" name="item-brand" value="Gshock" checked="checked" />G-shock
													<input type="radio" name="item-brand" value="BabyG" />Baby-G
													<input type="radio" name="item-brand" value="SmartWatch"/>Smart Watch
							<tr><td>Details :  </td><td><textarea name="item-details" rows="10" cols="50" wrap="physical" ></textarea></td></tr>
							<tr><td>Image :  </td><td><input type="file" name="item-img" / ></td></tr>
						</table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success">Add Item</button>
                  <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                </div>
              </form>
            </div>
          </div>
        </div>
		
