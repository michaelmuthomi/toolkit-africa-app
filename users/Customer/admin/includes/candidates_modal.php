<!-- Description -->
<div class="modal fade" id="platform">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="fullname"></span></b></h4>
            </div>
            <div class="modal-body">
                <p id="desc"></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Attendee -->
<div class="modal fade" id="addnew1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Event Category :</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="attendants-list.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="fullname" class="col-sm-3 control-label">First Name</label>

                    <div class="col-sm-9">
                    	<input type="text" class="form-control" id="fullname" name="fullname"  value="<?php echo $user['fname']; ?>" readonly>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="regno" class="col-sm-3 control-label">idnumber</label>

                    <div class="col-sm-9">
                    	<input type="text" class="form-control" id="regno" name="regno" value="<?php echo $user['idnumber']; ?>" readonly>
                  	</div>
                </div>

                
                <div class="form-group">
                    <label for="position" class="col-sm-3 control-label">Event Category</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="position" name="position" required>
                        <option value="" selected>- Select -</option>
                        <?php
                          $sql = "SELECT * FROM events_category";
                          $query = $conn->query($sql);
                          while($row = $query->fetch_assoc()){
                            echo "
                              <option value='".$row['description']."'>".$row['description']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
                
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Submit</button>
              </form>
            </div>
        </div>
    </div>
</div>





     