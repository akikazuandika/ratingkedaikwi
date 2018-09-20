
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Settings
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Settings</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="storeName">Name</label>
                  <input type="Text" class="form-control" id="storeName" name="store_name" placeholder="Enter store name" value="<?= $detail['name']?>">
                </div>

                <div class="form-group">
                  <label for="storeLocation">Email</label>
                  <input type="Text" class="form-control" id="storeLocation" name="store_location" placeholder="Enter store name" value="<?= $detail['email']?>">
                </div>    
                <div class="form-group">
                  <label for="changePassword">Change Password</label><br>
                  <button id="changePassword" type="button" name="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">Change Password</button>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input type="submit" name="btnSave" class="btn btn-primary" value="Save">
              </div>
            </form>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Change Password</h4>
          </div>
          <div class="modal-body">
              <form class="" action="" method="post">
                <div class="form-group">
                  <label for="oldPass">Old Password</label>
                  <input type="password" class="form-control" id="oldPass" name="oldPass" placeholder="Enter old password">
                </div>

                <div class="form-group">
                  <label for="newPass">New Password</label>
                  <input type="password" class="form-control" id="newPass" name="newPass" placeholder="Enter new password">
                </div>

                <div class="form-group">
                  <label for="newPassConfirm">Re-Type New Password</label>
                  <input type="password" class="form-control" id="newPassConfirm" name="newPassConfirm" placeholder="Enter re-type new password">
                </div>
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="btnChangePassword">Save changes</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

  </div>
  <script type="text/javascript">
    $("#btnChangePassword").click(function(){
        if ($("#newPass").val() !== $("#newPassConfirm").val()) {
            alert("New Pass and retype pass not same");
        }else{
            $.ajax({
                method:"POST",
                url:"/ratingkedaikwi/admin/settings/changepassword",
                data : {
                  oldPass : $("#oldPass").val(),
                  newPass : $("#newPass").val()
                },
                success : function(results){
                    if (results == "true") {
                      $("#modal-default").modal("hide");
                      alert("Changed");
                      $("#oldPass").val("");
                      $("#newPass").val("");
                      $("#newPassConfirm").val("");
                    }else if (results == "false") {
                      alert("Wrong Password");
                    }else{
                      alert("error");
                    }
                }
            });
        }
    })
  </script>
