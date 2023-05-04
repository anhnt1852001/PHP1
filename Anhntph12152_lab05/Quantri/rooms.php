<?php
require_once "../connection.php";
//Viết câu lệnh SQL Select
$sql = "Select * From rooms";
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
    <center>
        <h2>Rooms</h2>
        <a href="them_rooms.php">Thêm Rooms</a>
        <table border="1">
            <thead>
                <tr>
                    <th>Mã Rooms</th>
                    <th>Tên Rooms</th>
                    <th>Mã hotel</th>
                    <th>Giá</th>
                    <th>Ảnh</th>
                    <th>Detail</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($result as $c) : ?>
                    <tr>
                        <td>
                            <?= $c['id'] ?>
                        </td>
                        <td>
                            <?= $c['name'] ?>
                        </td>
                        <td>
                            <?= $c['hotel_id'] ?>
                        </td>
                        <td>
                            <?= $c['price'] ?>
                        </td>
                        <td>
                            <img src="../images/<?= $c['image'] ?>" width="120" alt="">
                        </td>
                        <td>
                            <?= $c['detail'] ?>
                        </td>
                        <td>
                            <?= $c['status'] ?>
                        </td>
                        <td>
                            <a href="capnhat_rooms.php?id=<?= $c['id'] ?>">Sửa</a> |
                            <a onclick="return confirm('Bạn có chắc chắn xóa không')" href="xoa_rooms.php?id=<?= $c['id'] ?>">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </center>
</body>

</html>