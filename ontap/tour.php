<?php
require_once "connection.php";
//Viết câu lệnh SQL Select
$sql = "Select * From tours";
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
</head>

<body>
    <h2>Tour</h2>
    <a href="them_tour.php">Thêm tour</a>
    <table border="1">
        <thead>
            <tr>
                <th>Mã Tour</th>
                <th>Tên Tour</th>
                <th>Ảnh</th>
                <th>Intro</th>
                <th>Description</th>
                <th>Number_date</th>
                <th>price</th>
                <th>cate_id</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $c) : ?>
                <tr>
                    <td>
                        <?= $c['tour_id'] ?>
                    </td>
                    <td>
                        <?= $c['tour_name'] ?>
                    </td>
                    <td>
                        <img src="images/<?= $c['image'] ?>" width="120" alt="">
                    </td>
                    <td>
                        <?= $c['intro'] ?>
                    </td>
                    <td>
                        <?= $c['description'] ?>
                    </td>
                    <td>
                        <?= $c['number_date'] ?>
                    </td>
                    <td>
                        <?= $c['price'] ?>
                    </td>
                    <td>
                        <?= $c['cate_id'] ?>
                    </td>
                    <td>
                        <a href="sua_tour.php?id=<?= $c['tour_id'] ?>">Sửa</a> |
                        <a onclick="return confirm('Bạn có chắc chắn xóa không')" href="xoa_tour.php?id=<?= $c['tour_id'] ?>">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</body>

</html>