<?php
require_once "../connection.php";
if (isset($_POST['btnLuu'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    if ($_FILES['avatar']['size'] > 0) {
        $avatar = $_FILES['avatar']['name'];
    } else {
        $avatar = "";
    }
    //viết câu lệnh sql cho bảnh danh mục(user)
    $sql = "INSERT INTO users(username,email,password,avatar,role) VALUES ('$username','$email','$password','$avatar','$role')";
    //Chuẩn bị thực hiện'
    $stmt = $conn->prepare($sql);
    //Thực thi
    $stmt->execute();
    if (!empty($avatar)) {
        move_uploaded_file($_FILES['avatar']['tmp_name'], "../images/" . $avatar);
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
    <link rel="stylesheet" href="css/css.css">
</head>

<body>
    <h2>Thêm người dùng</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="">Tên tài khoản: </label>
        <br>
        <input type="text" name="username">
        <br>
        <label for="">Email: </label><br>
        <input type="text" name="email">
        <br>
        <label for="">Mật khẩu: </label>
        <br>
        <input type="text" name="password">
        <br>
        <label for="">Ảnh đại diện: </label>
        <br>
        <input type="file" name="avatar">
        <br>
        <label for="exampleFormControlTextarea1">Vai trò: </label>
        <br>
        <input type="radio" value="admin" name="role">Admin
        <input type="radio" value="user" name="role">User
        <br>
        <button type="submit" name="btnLuu" class="btn">Lưu</button>
    </form>
</body>

</html>