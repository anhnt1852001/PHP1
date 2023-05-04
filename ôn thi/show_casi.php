<?php
session_start();
require_once "connection.php";
$sql = "SELECT * FROM baihat";
$stmt = $conn->prepare($sql);
$stmt->execute();
$baihat = $stmt->fetchAll(PDO::FETCH_ASSOC);

//echo "<pre>"
// print_r($casi)
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show casi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <h1 style="text-align: center;">Danh sách bài hát</h1>
    <!-- <?php if (isset($_GET)) : ?>
        <div>
            <?= $_GET['msg'] ?>
        </div>
    <?php endif ?> -->
    <table class="table" style="text-align: center;">
        <tr>
            <th>ID</th>
            <th>id_casi</th>
            <th>Tên bài hát</th>
            <th>Nội dung</th>
            <th>Image</th>
            <th>Lượt xem</th>
            <th>Lượt thích</th>
            <th>Action</th>
        </tr>

        <?php foreach ($baihat as $index => $baihat) : ?>
            <tr>
                <td><?= $index+1 ?></td>
                <td><?= $baihat['id_casi'] ?></td>
                <td><?= $baihat['tenbai'] ?></td>
                <td><?= $baihat['noidung'] ?></td>
                <td>
                    <img src="upload/<?= $baihat['anh'] ?>" alt="" width="100px">
                </td>
                <td><?= $baihat['luotxem'] ?></td>
                <td><?= $baihat['luotthich'] ?></td>
                <td>
                    <a class="btn btn-warning" href="add_casi.php?id_bh=<?= $baihat['id_bh'] ?>">Thêm</a>
                    <a class="btn btn-primary" href="edit_casi.php?id_bh=<?= $baihat['id_bh'] ?>">Sửa</a>
                    <a onclick="return confirm('Bạn có muốn xóa không')" class="btn btn-danger" href="delete_casi.php?id_bh=<?= $baihat['id_bh'] ?>">Xóa</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</body>

</html>