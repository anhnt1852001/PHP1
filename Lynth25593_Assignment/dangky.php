<?php
require_once "connection.php";
// kiểm tra user nhấn nut lưu 
if (isset($_POST['btnLuu'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $role = $_POST['role'];
    $password = password_hash($password, PASSWORD_DEFAULT);
    //xử lý file upload vào web;
    if ($_FILES['avatar']['size'] > 0) {
        $avatar = $_FILES['avatar']['name'];
    } else {
        $avatar = "";
    }
    // viet code sql
    $sql = "INSERT INTO users(username,email,avatar,password,role) 
               VALUES ('$username','$email','$avatar','$password','$role')";
    $stmt = $conn->prepare($sql);
    $user_sql = "SELECT username FROM users";
    if ($stmt->execute()) {
        //nếu $cate_image không rỗng thì upload ảnh vào thư mục images trong htdocs
        if (!empty($avatar)) {
            move_uploaded_file($_FILES['avatar']['tmp_name'], "../images/" . $avatar);
        }
        header("location: login.php?message=Đăng Ký thành công");
        die;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <h2>Đăng Ký</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <!-- thuoc tinh bat buoc khi muon them anh -->
        <label for="">User name</label>
        <br>
        <input type="text" name="username" id="">
        <br>
        <label for="">Email</label>
        <br>
        <input type="text" name="email" id="">
        <br>
        <label for="">Avatar</label>
        <br>
        <input type="file" name="avatar" id="">
        <br>
        <label for="">Passworld</label>
        <br>
        <input type="password" name="pass" id="">
        <br>
        <label for="">Role</label>
        <select name="role" id="">
            <option value="">role</option>
            <option value="user">user</option>
            <option value="admin">admin</option>
            <option value="nhanvien">nhân viên</option>
        </select>
        <br>
        <button type="submit" name="btnLuu">lưu</button>
    </form>
</body>

</html>