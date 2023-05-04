<?php
require_once "connection.php";

$sql = "SELECT *FROM baihat";

$stmt = $conn->prepare($sql);
$stmt->execute();

$baihat = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Hiển thị</h1>
    <a href="add.php">
        <button>Thêm</button>
    </a>

    <table border="2">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Nội dùn</th>
            <th>Ảnh</th>
            <th>lượt xem</th>
            <th>like</th>
            <th>id ca sĩ</th>
            <th>Action</th>
        </tr>

        <?php foreach ($baihat as $index => $bh) : ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= $bh['tenbai'] ?></td>
                <td><?= $bh['noidung'] ?></td>
                <td>
                    <img src="images/<?= $bh['anh'] ?>" width="110" alt="">
                </td>
                <td><?= $bh['luotxem'] ?></td>
                <td><?= $bh['luotlike'] ?></td>
                <td><?= $bh['id_casi'] ?></td>
                <td>
                    <a href="update.php?id_bh=<?= $bh['id_bh'] ?>">
                        <button>Update</button>
                    </a>

                    <a onclick="return confirm('Xóa?')" href="delete.php?id_bh=<?= $bh['id_bh'] ?>">
                        <button>Delete</button>
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</body>

</html>