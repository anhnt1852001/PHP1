<?php
session_start();
require_once "connection.php";
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
            header("location: quantri.php");
            die;
        } else {
            $pass_error = "Mật khẩu không chính xác!!!";
        }
    } else {
        $user_error = "Username không đúng!!! <br>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Đăng nhập</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div class="center-containe login">
        <div class="center-container">
            <!--header-->
            <div class="header-w3l">
                <h1>Login Form</h1>
            </div>
            <!--//header-->
            <div class="main-content-agile">
                <div class="sub-main-w3">
                    <div class="wthree-pro">
                        <h2>Login Quick</h2>
                    </div>
                    <form action="#" method="POST">
                        <div class="pom-agile">
                            <input placeholder="Nhập username" name="username" class="user" type="text" required="">
                            <?php
                            if (isset($user_error)) {
                                echo $user_error;
                            }
                            ?>
                        </div>
                        <div class="pom-agile">
                            <input placeholder="Password" name="password" class="pass" type="password" required="">
                            <?php
                            if (isset($pass_error)) {
                                echo $pass_error;
                            }
                            ?>
                        </div>
                        <div class="sub-w3l">
                            <div class="right-w3l">
                                <input type="submit" value="Login" name="btnLogin">
                            </div>
                            <br>
                            <a href="dangky.php"><button type="button" class="btn btn-outline-info">Đăng ký</button></a>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>