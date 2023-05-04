<?php
require_once "../connection.php";
//Viết câu lệnh SQL Select
$sql = "Select * From users";
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
    <title>User</title>
    <style>
        h2 {
            color: #3ca59d;
        }

        table {
            text-align: center;
        }

        .link-form {
            text-decoration: none;
            color: blue;
        }

        .link-form:hover {
            background-color: black;
            color: white;
            transition: all 2s ease-in-out;

        }

        .hover-a:hover {
            color: white;
            transition: all 2s ease-in-out;

        }

        th {
            background-color: #fa1616;
            color: white;
        }

        td {
            background-color: #f6ab6c;
        }

        .img {
            padding: 5px;
        }

        .img:hover {
            transform: scale(1.1);
            transition: all 2s ease-in-out;
        }
    </style>
</head>

<body>
    <center>
        <table border="1">
            <h2>Thêm Người Dùng (User)</h2>
            <div class="hover-a">
                <a href="themngdung.php" class="link-form">Thêm mới user</a>
            </div>
            <thead>
                <tr>
                    <th>Mã người dùng</th>
                    <th>Tên tài khoản</th>
                    <th>Email</th>
                    <th>Mật khẩu</th>
                    <th>Ảnh đại diện</th>
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
                        <td>
                            <img src="../images/<?= $c['avatar'] ?>" width="120" alt="" class="img">
                        </td>
                        <td>
                            <?= $c['role'] ?>
                        </td>
                        <td>
                            <a href="capnhat_user.php?id=<?= $c['user_id'] ?>">Sửa</a> |
                            <a onclick="return confirm('Bạn có chắc chắn xóa không')" href="xoa_user.php?id=<?= $c['user_id'] ?>">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </center>
</body>

</html>