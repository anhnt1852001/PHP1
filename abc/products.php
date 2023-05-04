<?php
require_once "./connection.php";
$sql = "Select * From products";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <style>
        table {
            text-align: center;
        }
    </style>
</head>

<body>
    <h2>Product</h2>
    <a href="them.php">Thêm Product</a>
    <table border="1">
        <thead>
            <tr>
                <th>Mã SP</th>
                <th>Tên SP</th>
                <th>Brand_id</th>
                <th>Ảnh</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $c) : ?>
                <tr>
                    <td>
                        <?= $c['product_id'] ?>
                    </td>
                    <td>
                        <?= $c['product_name'] ?>
                    </td>
                    <td>
                        <?= $c['brand_id'] ?>
                    </td>
                    <td>
                        <img src="images/<?= $c['image'] ?>" alt="" width="120">
                    </td>
                    <td>
                        <?= $c['price'] ?>
                    </td>
                    <td>
                        <?= $c['quantity'] ?>
                    </td>
                    <td>
                        <?= $c['description'] ?>
                    </td>
                    <td>
                        <a href="sua.php?id=<?= $c['product_id'] ?>">Sửa</a>
                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="xoa.php?id=<?= $c['product_id'] ?>">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>