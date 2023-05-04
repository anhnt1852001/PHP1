<?php
session_start();
require_once "connection.php";

if(isset($_POST['dangnhap'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    //SQL 
    $sql = "SELECT * FROM users WHERE username='$username'";

    $stmt = $conn->prepare($sql);

    $stmt->execute();

    $users = $stmt->fetch(PDO::FETCH_ASSOC);

    //Kiểm tra xem có user nào không
    if($users){
        //kiểm tra mk
       if($password == $users['password']){
        //đăng nhập thành công
        // khởi tạo session
        $_SESSION['$username'] = $username;
        echo "
        <script>alert('Đăng nhập thành công')</script>
        ";
        //chuyển hướng vào web

        header("location: show_products.php");
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
         password: <input type="password" name="password">
        <br>
      <button type="submit" name="dangnhap">Đăng nhập</button>
    </form>
</body>
</html>