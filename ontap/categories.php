<?php
require_once "connection.php";
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
    <title>Danh mục</title>
</head>

<body>
    <h2>Danh mục tour</h2>
    <a href="them"></a>
    <table border="1" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>Mã dạnh mục</th>
                <th>Tên danh mục</th>
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
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>