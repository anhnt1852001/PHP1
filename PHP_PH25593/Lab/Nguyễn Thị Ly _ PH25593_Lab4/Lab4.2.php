<?php
  if(isset($_POST['gui'])){
    $hoten = $_POST['hoten'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $re = $_POST['re-password'];

    if($hoten == ""){
        $hoten_err = "Bạn chưa nhập tên";
    }
    if($email == ""){
        $email_err = "Bạn chưa nhập Email";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_err = "Email chưa đúng định dạng";
    }
    if($password == ""){
        $password_err = "Bạn chưa nhập password";
    }
    if($re == ""){
        $re_err = "Bạn chưa nhập re-password";
    }elseif($re != $password){
        $re_err = "Re-password không trùng với password ";
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab4.2</title>
</head>
<body>
    <form action="Lab4.2.php" method="post">
        <h2>Đăng ký thành viên</h2>
        <label for="">Họ tên</label>
        <br>
        <input type="text" value="<?=$hoten ?? ''?>" name="hoten">
        <?php if(isset($hoten_err)):?>
            <span style="color: red"><?=$hoten_err?></span>
            <?php endif ?>
        <br>
        <label for="">Email</label>
        <br>
        <input type="text" value="<?=$email ?? ''?>" name="email">
        <?php if(isset($email_err)):?>
            <span style="color: red"><?=$email_err?></span>
            <?php endif ?>
        <br>
        <label for="">Password</label>
        <br>
        <input type="password" value="<?=$password ?? ''?>" name="password">
        <?php if(isset($password_err)):?>
            <span style="color: red"><?=$password_err?></span>
            <?php endif ?>
        <br>
        <label for="">Re-password</label>
        <br>
        <input type="password" value="<?=$re ?? ''?>" name="re-password">
        <?php if(isset($re_err)):?>
            <span style="color: red"><?=$re_err?></span>
            <?php endif ?>
        <br>
        <button type="submit" name="gui">Đăng ký</button>
    </form>
</body>
</html>