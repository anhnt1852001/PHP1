<?php 
require_once "./connection.php";
$sql = "select * From products";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <style>
        table {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Product</h2>
    <a href="insert.php">Thêm Products</a>
    <table border="1">
        <thead>
            <tr>
                <th>Mã Sản Phẩm</th>
                <th>Tên Sản Phẩm</th>
                <th>Danh Mục</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Ảnh</th>
                <th>Ghi chú</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($result as $p) : ?>
                <tr>
                    <td>
                        <?= $p['product_id']?>
                    </td>
                    <td>
                        <?= $p['product_name']?>
                    </td>
                    <td>
                        <?= $p['cate_id']?>
                    </td>
                    <td>
                        <?= $p['price']?>
                    </td>
                    <td>
                        <?= $p['quantity']?>
                    </td>
                    <td>
                        <img src="images/<?= $p['image'] ?>" alt="" width="120">
                    </td>
                    <td>
                        <?= $p['description']?>
                    </td>
                    <td>
                        <a href="update.php?id=<?= $p['product_id'] ?>">Sửa</a>
                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="delete.php?id=<?= $p['product_id'] ?>">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>