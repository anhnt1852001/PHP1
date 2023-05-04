<?php
require_once "connection.php";

// câu lệnh SQL để lấy dữ liệu
$sql = "SELECT * FROM products";

//Chuẩn bị 
$stmt = $conn->prepare($sql);

//thực thi
$stmt->execute();

// lấy tất cả dữ liệu 
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>

<body>
    <form action="show_catelogies.php" method="post">
        <h1>Danh sách sản phẩm</h1>
        <?php if (isset($_GET['msg'])) : ?>
            <div class="alert alert-primary">
                <?= $_GET['msg'] ?>
            </div>
        <?php endif ?>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Danh Mục</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Description</th>
                <th>Action</th>
                <th> <a class="btn btn-primary" href="./add_products.php">Thêm sản phẩm</a>
                    <a class="btn btn-primary" style="float:right ;" href="upload.php">upload</a>
                </th>

            </tr>


            <?php foreach ($products as $index => $products) : ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $products['product_name'] ?></td>
                    <td> <?= $products['cate_id'] ?></td>
                    <td><?= $products['price'] ?></td>
                    <td><?= $products['quantity'] ?></td>
                    <td>
                        <img src="upload/<?= $products['image'] ?>" alt="" width="100">
                    </td>
                    <td><?= $products['description'] ?></td>
                    <td>
                        <a class="btn btn-primary" href="edit_user.php?id=<?= $products['product_id'] ?>">Sửa</a>
                        <a onclick="return confirm('Bạn có chắc là muốn xóa không?')" class="btn btn-danger" href="delete.php?id=<?= $products['product_id'] ?>">Xóa</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </form>
</body>

</html>