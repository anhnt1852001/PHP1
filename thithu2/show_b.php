<?php
require_once "connection.php";

$sql="SELECT * FROM book";

$stmt = $conn->prepare($sql);

$stmt->execute();

$book = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
        <h1>Danh sách sách</h1>
        <?php if(isset($_GET['msg'])):?>
             <div class="alert alert-primary">
                <?=$_GET['msg']?>
             </div>
        <?php endif?>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Book_ID</th>
      <th scope="col">Book_title</th>
      <th scope="col">Pub_id</th>
      <th scope="col">Image</th>
      <th scope="col">Quantity</th>
      <th scope="col">Intro</th>
      <th scope="col">Detail</th>
      <th scope="col">Price</th>
      <th scope="col">Action</th>

    </tr>
  </thead>

     <tr>
        <?php foreach ($book as $index => $b)?>
        <td><?=$index+1?></td>
        <td><?=$b['book_title']?></td>
        <td><?=$b['pub_id']?></td>
        <td>
       <img src="upload/<?=$b['image']?>" width="100" alt="">
        </td>
        <td><?=$b['quantity']?></td>
        <td><?=$b['intro']?></td>
        <td><?=$b['detail']?></td>
        <td><?=$b['price']?></td>
        <td>
            <a href="add_b.php" class="btn btn-warning">Thêm</a>
            <a href="update_b.php?id<?=$b['book_id']?>" class="btn btn-primary">Sửa</a>
            <a onclick="return confirm('Bạn có muốn xóa không!!')" href="delete_b.php?id<?=$b['book_id']?>" class="btn btn-danger">Xóa</a>
        </td>
     </tr>
  </table>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>