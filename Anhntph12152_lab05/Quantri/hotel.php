<?php
require_once "../connection.php";
//Viết câu lệnh SQL Select
$sql = "Select * From hotel";
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
    <title>Hotel</title>
</head>

<body>
    <center>
        <table border="1">
            <h2>Hotel</h2>
            <thead>
                <tr>
                    <th>Mã hotel</th>
                    <th>Tên hotel</th>
                    <th>Hình ảnh</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $c) : ?>
                    <tr>
                        <td>
                            <?= $c['hotel_id'] ?>
                        </td>
                        <td>
                            <?= $c['hotel_name'] ?>
                        </td>
                        <td>
                            <img src="../images/<?= $c['hotel_image'] ?>" width="120" alt="" class="img">
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </center>
</body>

</html>