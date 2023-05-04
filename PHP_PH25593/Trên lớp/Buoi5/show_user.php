<?php
session_start();
require_once "connetion.php";
//Kiểm tra có còn người dùng còn phiên làm việc ở đây k 
if(isset($_SESSION['username'])){
header("location: login.php");
exit;
}
// câu lệnh SQL để lấy dữ liệu
$sql = "SELECT * FROM user";

//Chuẩn bị 
$stmt = $conn->prepare($sql);

//thực thi
$stmt->execute();

// lấy tất cả dữ liệu 
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>

<body>
    <h1 style="text-align: center;">Danh sách user</h1>

    <?php if(isset($_GET['msg'])):?>
        <div class="alert alert-primary">
            <?= $_GET['msg'] ?>
        </div> 
    <?php endif ?>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>UserName</th>
            <th>Address</th>
            <th>Avatar</th>
            <th>Action</th>
        </tr>
        <a class="btn btn-primary" style="float:right ;" href="add_user.php"> Thêm user</a>
        <a class="btn btn-primary" style="float:right ;" href="upload.php">upload</a>

        <?php foreach ($users as $index=>$user) : ?>
            <tr>
                <td><?= $index+1?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['addrress'] ?></td>
                <td>
                    <img src="upload/<?= $user['avata'] ?>" alt="" width="100">
                </td>
                <td>
                    <a class="btn btn-primary" href="edit_user.php?id=<?= $user['id'] ?>">Sửa</a>
                    <a onclick="return confirm('Bạn có chắc là muốn xóa không?')" 
                    class="btn btn-danger" href="delete_user.php?id=<?= $user['id'] ?>">Xóa</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</body>

</html>