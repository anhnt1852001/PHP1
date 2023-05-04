<?php
if(isset($_POST['gui'])){
    $hoten = $_POST['hoten'];
    $email = $_POST['email'];

    if($hoten == ""){
        $hoten_err = "Bạn chưa nhập họ tên";
    }
    if($email == ""){
        $email_err = "Bạn chưa nhập email";
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $email_err = "Email chưa đúng định dạng";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab4.1</title>
</head>
<body>
    <form action="Lab4.1.php" method="post">
    Họ tên: <input type="text" name ="hoten" value="<?= $hoten ??''?>">
    <?php
    if(isset($hoten_err)): ?>
    <span style="color: red"><?= $hoten_err?> </span>
    <?php endif ?>
    <br>
        Email: <input type="text" name ="email" value="<?= $email ??''?>">
        <?php
    if(isset($email_err)): ?>
    <span style="color: red"><?= $email_err?> </span>
    <?php endif ?>
        <br>
        <button type="submit" name="gui">Đăng nhập</button>
    </form>
</body>
</html>