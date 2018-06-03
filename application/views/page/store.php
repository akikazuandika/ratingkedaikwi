<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Stores</title>
  </head>
  <body>
      <table border="1">
        <tr>
          <td>No</td>
          <td>Name</td>
          <td>Rating Product</td>
          <td>Count Rating Product</td>
          <td>Rating Service</td>
          <td>Count Rating Service</td>
          <td>Action</td>
        </tr>
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
      </table>
  </body>
</html>
