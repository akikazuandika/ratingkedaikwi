  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data stores</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Rating Product</th>
                  <th>Count Rating Product</th>
                  <th>Rating Service</th>
                  <th>Count Rating Service</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <?php $a=0; $n=0; foreach ($stores as $item): ?>
                    <tr>
                      <td><?= $a+=1 ?></td>
                      <td><a href="<?= base_url('/admin/store/id/') . $stores[$n]['id_store'] ?>"><?= $stores[$n]['store_name'] ?></a></td>
                      <td><?= $stores[$n]['rating_product'] ?></td>
                      <td><?= $stores[$n]['count_rating_product'] ?></td>
                      <td><?= $stores[$n]['rating_service'] ?></td>
                      <td><?= $stores[$n]['count_rating_service'] ?></td>
                      <td>
                        <a href="<?= base_url('/admin/store/edit/') . $stores[$n]['id_store'] ?>">Edit</a>
                        <a href="<?= base_url('/admin/store/delete/') . $stores[$n]['id_store'] ?>">Delete</a>
                      </td>
                    </tr>
                  <?php $n++; endforeach; ?>
                </tr>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Rating Product</th>
                    <th>Count Rating Product</th>
                    <th>Rating Service</th>
                    <th>Count Rating Service</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
              </table>
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
