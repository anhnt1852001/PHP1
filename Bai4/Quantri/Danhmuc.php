<?php
require_once "../connection.php";
//Viết câu lệnh SQL Select
$sql = "Select * From categories";
//Chuẩn bị
$stmt = $conn->prepare($sql);
//Thực thi
$stmt->execute();
//Lấy dữ liệu
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            text-align: center;
        }
    </style>
</head>

<body>
    <h2>Danh Mục Sản Phẩm</h2>
    <a href="them_danhmuc.php">Thêm danh mục</a>
    <table border="1">
        <thead>
            <tr>
                <th>Mã danh mục</th>
                <th>Tên danh mục</th>
                <th>Hình ảnh</th>
                <th>Mổ tả</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($result as $c) : ?>
                <tr>
                    <td>
                        <?= $c['cate_id'] ?>
                    </td>
                    <td>
                        <?= $c['cate_name'] ?>
                    </td>
                    <td>
                        <img src="../images/<?= $c['cate_image'] ?>" width="120" alt="">
                    </td>
                    <td>
                        <?= $c['description'] ?>
                    </td>
                    <td>
                        <a href="capnhat_danhmuc.php?id=<?= $c['cate_id'] ?>">Sửa</a> |
                        <a onclick="return confirm('Bạn có chắc chắn xóa không')" href="xoa_danhmuc.php?id=<?= $c['cate_id'] ?>">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>