  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Store <?= $detail['store_name']?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Store</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <!--img src="<?= $detail['image']?>" alt=""><br -->
              <h3>Name : <?= $detail['store_name']?> <br></h3>
              <h3>Location : <?= $detail['store_location']?> <br></h3>
	      <h3>Description : </h3><p><?= $detail['description']?></p><br>

              <h3>Rating Product</h3>
              Rate : <?= $rating_product['value'] ?><br>
              Comment : <br>
                <?php for ($i=0;$i<count($rating_product['comment']);$i++): ?>
                    <?php echo "No. " . $i+1 ;?>
                    <?php echo $rating_product['comment'][$i]; ?><br>
                <?php endfor; ?>

                <h3>Rating Service</h3>
                Rate : <?= $rating_service['value'] ?><br>
                Comment : <br>
                  <?php for ($i=0;$i<count($rating_service['comment']);$i++): ?>
                      <?php echo "No. " . $i+1 ;?>
                      <?php echo $rating_service['comment'][$i]; ?><br>
                  <?php endfor; ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
