<?php
require "connetion.php";
if (isset($_POST['btn_luu'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $addrress = $_POST['addrress'];
    //upload file
    $file = $_FILES['avata'];
    $avata = $file['name'];

    //Câu lệnh sql
    $sql = "INSERT INTO user(username, password, avata, addrress) VALUES('$username', '$password', '$avata', '$addrress')";

    



    //chuẩn bị
    $stmt = $conn->prepare($sql);

    //thực thi
    $stmt->execute();

    //kiểm tra xem filek còn không
    if ($file['size'] > 0) {
        move_uploaded_file($file['tmp_name'], ' uload/' . $avata);
    }

    //Chuyển hướng website về trang show
    $msg = "Thêm dữ liệu thành công";
    header("location: show_user.php?msg=$msg");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adduser</title>
</head>

<body>
    <h2>Thêm người dùng</h2>
    <a href="show_user.php">Danh sách</a>
    <form action="" method="post" enctype="multipart/form-data">
        Tài khoản: <input type="text" name="username">
        <br>
        Mật khẩu: <input type="password" name="password">
        <br>
        Ảnh đại diện: <input type="file" name="avata">
        <br>
        Địa chỉ: <input type="text" name="addrress">
        <br>
        <button type="submit" name="btn_luu">Lưu</button>
    </form>
</body>

</html>