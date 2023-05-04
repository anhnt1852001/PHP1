<?php
session_start();

require_once "db.php";
if (isset($_POST['btnLogin'])) {
    extract($_REQUEST);
    //Câu lệnh SQL kiểm tra xem user có tồn tại không
    $sql = "SELECT * FROM users WHERE username='$username'";
    //Chuẩn bị
    $stmt = $conn->prepare($sql);
    //Thực thi 
    $stmt->execute();
    //Lấy dữ liệu
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    //Nếu username nhập vào là đúng
    if ($user != false) {
        //Kiểm tra mật khẩu của username
        if (password_verify($password, $user['password'])) {
            $_SESSION['user']['name'] = $username;
            $_SESSION['user']['avatar'] = $user['avatar'];
            header("location: index.php");
            die;
        } else {
            $pass_error = "Mật khẩu không chính xác!!!";
        }
    } else {
        $user_error = "Username không đúng!!!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang đăng nhập</title>
</head>

<body>
    <h2>Đăng nhập</h2>
    <form action="" method="POST">
        <label for="">Username: </label>
        <br>
        <input type="text" name="username" id="">
        <?php
        if (isset($user_error)) {
            echo $user_error;
        }
        ?>
        <br>
        <label for="">Password: </label>
        <br>
        <input type="text" name="password" id="">
        <?php
        if (isset($pass_error)) {
            echo $pass_error;
        }
        ?>
        <br>
        <button type="submit" name="btnLogin">Login</button>
    </form>
</body>

</html>