<?php
require_once "connection.php";

$sql=" SELECT*FROM baihat";

$stmt = $conn->prepare($sql);

$stmt->execute();

$baihat = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <form action="" method="post">
        <h1>Danh sách bài hát</h1>
        <?php if(isset($_GET['msg'])):?>
            <div class="alert alert-primary">
                <?= $_GET['msg']?>
            </div>
            <?php endif?>
  <table class="table">
  <thead>
    <tr>
      <th>id</th>
        <th>pub_id</th>
        <th>book_title</th>
        <th>image</th>
        <th>quantity</th>
        <th>intro</th>
        <th>detail</th>
        <th>price</th>
        <th>Action</th>
    </tr>
  </thead>
      <?php foreach ($books as $index=> $books):?>
        <tr>
            <td><?=$index+1?></td>
            <td><?=$baihat['tenbai']?></td>
            <td><?=$baihat['id_casi']?></td>
            <td><?=$baihat['noidung']?></td>
            <td>
                <img src="upload/<?=$baihat['image']?>" width="100" alt="">
            </td>
            <td><?=$baihat['luotxem']?></td>
            <td><?=$baihat['luotthich']?></td>
            
            <td>
                <a href="add_bh.php" class="btn btn-warning">Thêm</a>
                <a class="btn btn-primary" href="update_bh.php?id=<?= $baihat['id_bh'] ?>">Sửa</a>
                <a href="" class="btn btn-danger">Xóa</a>
            </td>
        </tr>
      
      <?php endforeach ?>
</table>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>