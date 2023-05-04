<?php
session_start();
require_once "connetion.php";

if(isset($_POST['dangnhap'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    //SQL 
    $sql = "SELECT * FROM user WHERE username='$username'";

    $stmt = $conn->prepare($sql);

    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    //Kiểm tra xem có user nào không
    if($user){
        //kiểm tra mk
       if($password == $user['password']){
        //đăng nhập thành công
        // khởi tạo session
        $_SESSION['$usename'] = $usename;
        echo "
        <script>alert('Đăng nhập thành công')</script>
        ";
        //chuyển hướng vào web

        header("location: show_user.php");
        exit;
       }
    }else{
        $error = "Username hoặc mật khẩu không đúng";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(isset($error)):?>
        <div class="alert"><?= $error ?></div>
        <?php endif ?>
    <form action="" method="post">
        username: <input type="text" name="username">
        <br>
         password: <input type="text" name="password">
        <br>
      <button type="submit" name="dangnhap">Đăng nhập</button>
    </form>
</body>
</html>