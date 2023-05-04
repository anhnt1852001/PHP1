<?php
require_once "../connection.php";

if (isset($_POST['btnLuu'])) {
    //lấy dữ liệu từ form
    extract($_REQUEST);
    //Kiểm tra người dùng có cập nhật ảnh không
    if ($_FILES['avatar']['size'] > 0) {
        $avatar = $_FILES['avatar']['name'];
    }
    //Viết câu lệnh sql
    $sql = "UPDATE users SET username='$username', email='$email', password='$password', avatar='$avatar', role='$role' WHERE user_id=$user_id";
    //chuẩn bị
    $stmt = $conn->prepare($sql);
    //Thực thi
    if ($stmt->execute()) {
        $message = "Cập nhật dữ liệu thành công";
        if ($_FILES['avatar']['size'] > 0) {
            move_uploaded_file($_FILES['avatar']['tmp_name'], "../images/" . $avatar);
        }
    } else {
        $message = "Cập nhật thất bại";
    }
}
//lấy ra từ thanh url
$user_id = $_GET['id'];
//viết ra câu lệnh SELECT có điều kiện
$sql = " SELECT * FROM users WHERE user_id=$user_id";
//Chuẩn bị
$stmt = $conn->prepare($sql);
//Thực thi 
$stmt->execute();
//lấy dữ liệu 
$result = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm user</title>
    <link rel="stylesheet" href="css/css.css">
</head>

<body>
    <h2>Thêm người dùng</h2>
    <a href="user.php">User</a>
    <?php
    if (isset($message)) : ?>
        <h4><?= $message ?></h4>
    <?php endif; ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="user_id" value="<?= $result['user_id'] ?>">
        <label for="">Tên tài khoản: </label>
        <br>
        <input type="text" name="username" value="<?= $result['username'] ?>">
        <br>
        <label for="">Email: </label><br>
        <input type="text" name="email" value="<?= $result['email'] ?>">
        <br>
        <label for="">Mật khẩu: </label>
        <br>
        <input type="text" name="password" value="<?= $result['password'] ?>">
        <br>
        <label for="">Ảnh đại diện: </label>
        <br>
        <input type="file" name="avatar">
        <?php
        if (!empty($result['avatar'])) : ?>
            <input type="hidden" name="avatar" value="<?= $result['avatar'] ?>">
            <br>
            <img src="../images/<?= $result['avatar'] ?>" width="120" alt="">
        <?php endif; ?>
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