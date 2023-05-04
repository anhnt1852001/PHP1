
<?php
if(isset($_POST['gui'])){
    $hoten = $_POST['hoten'];
    $email = $_POST['email'];
    $noiDung = $_POST['noidung'];

    if($hoten == ""){
        $hoten_err = "Bạn chưa nhập họ tên";
    }
    if($email == ""){
        $email_err = "Bạn chưa nhập email";
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $email_err = "Email không đúng dạng";
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
    <form action="vadidate.php" method="post">
    Họ tên: <input type="text" name ="hoten" value="<?= $hoten ??''?>">
    <?php
    if(isset($hoten_err)): ?>
    <span style="color: red"><?= $hoten_err?> </span>
    <?php endif ?>
        <br>
        Email: <input type="text" name ="email" value="<?= isset($email) ? $email : ''?>">
        <?php
    if(isset($email_err)): ?>
    <span style="color: red"><?= $email_err?> </span>
    <?php endif ?>
        <br>
        Nội dung<br>
        <textarea name="noidung" id="" cols="30" rows="10"></textarea>
        <br>
        <button type="submit" name ="gui">Gửi</button>
    </form>
</body>
</html>
