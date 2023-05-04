<?php
require_once "connection.php";
if (isset($_POST['btnLuu'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    if ($_FILES['avata']['size'] > 0) {
        $avata = $_FILES['avata']['name'];
    } else {
        $avata = "";
    }
    //viết câu lệnh sql cho bảnh danh mục(categories)
    $sql = "INSERT INTO user(username,email,password,avata,role) Values('$username','$email','$password','$avata','$role')";
    //Chuẩn bị thực hiện'
    $stmt = $conn->prepare($sql);
    //Thực thi
    $stmt->execute();
    if (!empty($avata)) {
        move_uploaded_file($_FILES['avata']['tmp_name'], "images" . $avata);
    }
    header("location:user.php?message=Thêm dữ liệu thành công");
    die;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm danh mục</title>
    <link rel="stylesheet" href="them.css">
</head>

<body>
    <h2>Thêm người dùng</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="">Tên tài khoản</label><br>
        <input type="text" name="username"><br>
        <label for="">Email</label><br>
        <input type="text" name="email"><br>
        <label for="">Mật khẩu</label><br>
        <input type="text" name="password"><br>
        <label for="">Ảnh đại diện</label><br>
        <input type="file" name="avata"><br>
        <label for="">Vai trò</label><br>
        <input type="number" min="1" max="2" name="role"><br>
        <button type="submit" name="btnLuu">Lưu</button>
    </form>
</body>

</html>