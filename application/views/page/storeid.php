<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Rating <?= $detail['store_name']?></title>
  </head>
  <body>
    <img src="<?= $detail['image']?>" alt=""><br>
    <h2>Name : <?= $detail['store_name']?> <br></h2>
    <h2>Location : <?= $detail['store_location']?> <br></h2>

    <h2>Rating Product</h2>
    Rate : <?= $rating_product['value'] ?><br>
    Comment : <br>
      <?php for ($i=0;$i<count($rating_product['comment']);$i++): ?>
          <?php echo "No. " . $i+1 ;?>
          <?php echo $rating_product['comment'][$i]; ?><br>
      <?php endfor; ?>

      <h2>Rating Service</h2>
      Rate : <?= $rating_service['value'] ?><br>
      Comment : <br>
        <?php for ($i=0;$i<count($rating_service['comment']);$i++): ?>
            <?php echo "No. " . $i+1 ;?>
            <?php echo $rating_service['comment'][$i]; ?><br>
        <?php endfor; ?>
  </body>
</html>
