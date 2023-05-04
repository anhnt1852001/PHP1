<?php
require "connetion.php";
if (isset($_POST['btn_luu'])) {
    $id = $_POST ['id'];
    $avata = $_POST ['avata'];
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $addrress = $_POST['addrress'];
    //upload file
    $file = $_FILES['avata'];
    // khi cập nhật avata
    if($file['size'] > 0){
        $avata = $file['name'];

    }
    //Câu lệnh sql
    $sql = "UPDATE user SET username='$username',password='$password',avata='$avata',addrress='$addrress'  WHERE id=$id";
  


    //chuẩn bị
    $stmt = $conn->prepare($sql);

    //thực thi
    $stmt->execute();

    //kiểm tra xem filek còn không
    if ($file['size'] > 0) {
        move_uploaded_file($file['tmp_name'], ' uload/' . $avata);
    }

    //Chuyển hướng website về trang show
    $msg = " Sửa dữ liệu thành công";
    header("location: show_user.php?msg=$msg");
    exit;
}

    $id =$_GET['id'];
    //Sql select
    $sql = "SELECT * FROM user WHERE id = $id";
    //Chuẩn bị
    $stmt = $conn->prepare($sql);
    //Thực thi
    $stmt->execute();
    //Lấy dữ liệu cần sửa(Lấy 1 bản ghi)
    $user =$stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm user</title>
</head>
<body>
    <h2>Sửa thông tin</h2>
    <a href="show_user.php">Danh sách</a>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- // lưu lại usẻr update -->
        <input type="hidden"  name="id" value="<?= $user['id']?>">
        Tài khoản: <input type="text" name="username" value="<?= $user['username']?>">
        <br>
        Mật khẩu: <input type="password" name="password" value="<?= $user['password']?>">
        <br>
       <img src="upload/<?= $user ['avata']?>" alt="" width="120"> 
       <!-- lưu lại ảnh vào input khi mà ng dùng không cập nhật -->
        <input type="hidden" name="avata"  value="<?= $user['avata']?>">
        Ảnh đại diện: <input type="file" name="avata">
        <br>
        Địa chỉ: <input type="text" name="addrress" value="<?= $user['addrress']?>">
        <br>
        <button type="submit" name="btn_luu">Sửa</button>
    </form>
</body>

</html>