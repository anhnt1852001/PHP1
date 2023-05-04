<?php
require_once "./connection.php";
$sql = "Select * From news";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <style>
        table {
            text-align: center;
        }
    </style>
</head>

<body>
    <h2>News</h2>
    <a href="them.php">Thêm news</a>
    <table border="1">
        <thead>
            <tr>
                <th>Mã new</th>
                <th>Tên new</th>
                <th>Cate_id</th>
                <th>Ảnh</th>
                <th>view</th>
                <th>Status</th>
                <th>Intro</th>
                <th>Detail</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $c) : ?>
                <tr>
                    <td>
                        <?= $c['news_id'] ?>
                    </td>
                    <td>
                        <?= $c['title'] ?>
                    </td>
                    <td>
                        <?= $c['cate_id'] ?>
                    </td>
                    <td>
                        <img src="images/<?= $c['image'] ?>" alt="" width="120">
                    </td>
                    <td>
                        <?= $c['view'] ?>
                    </td>
                    <td>
                        <?= $c['status'] ?>
                    </td>
                    <td>
                        <?= $c['intro'] ?>
                    </td>
                    <td>
                        <?= $c['detail'] ?>
                    </td>
                    <td>
                        <a href="sua.php?id=<?= $c['news_id'] ?>">Sửa</a>
                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="xoa.php?id=<?= $c['news_id'] ?>">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>