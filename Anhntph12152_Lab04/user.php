<?php
require_once "connection.php";
$sql = "Select*From user";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="css.css">
</head>

<body>
    <center>
        <table border="1">
            <h2>User</h2>
            <a href="them_user.php">Thêm mới user</a>
            <?php
            if (isset($_GET['message'])) : ?>
                <p>
                    <? $_GET['message'] ?>
                </p>
            <?php endif; ?>
            <thead>
                <tr>
                    <th>Mã người dùng</th>
                    <th>Tên tài khoản</th>
                    <th>email</th>
                    <th>Mật khẩu</th>
                    <th>ảnh đại diện</th>
                    <th>Vai trò</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $c) : ?>
                    <tr>
                        <td>
                            <?= $c['user_id'] ?>
                        </td>
                        <td>
                            <?= $c['username'] ?>
                        </td>
                        <td>
                            <?= $c['email'] ?>
                        </td>
                        <td>
                            <?= $c['password'] ?>
                        </td>
                        <td> <img src="images<?= $c['avata'] ?>" width="120" alt=""></td>
                        <td>
                            <?= $c['role'] ?>
                        </td>
                        <td>Action</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </center>
</body>

</html>