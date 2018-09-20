
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Store
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Store</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <!-- form start -->
            <form role="form" action="" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="storeName">Store Name</label>
                  <input type="Text" class="form-control" id="storeName" name="store_name" placeholder="Enter store name" value="<?= $store['store_name']?>">
                </div>

                <div class="form-group">
                  <label for="storeLocation">Store Location</label>
                  <input type="Text" class="form-control" id="storeLocation" name="store_location" placeholder="Enter store name" value="<?= $store['store_location']?>">
                </div>

		<div class="form-group">
                  <label for="storeDescription">Store Description</label>
                  <input type="Text" class="form-control" id="storeDescription" name="store_description" placeholder="Enter store description" value="<?= $store['description']?>">
                </div>

              </div>
              <!-- /.box-body -->

              <!-- Name : <input type="text" name="store_name" value="<?= $store['store_name']?>"> <br>
              Location : <input type="text" name="store_location" value="<?= $store['store_location']?>"> <br>
              <input type="submit"  value="SAVE"> -->

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
  </div>
