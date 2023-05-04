<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Họ tên: <input type="text" name ="hoten">
        <br>
        Email: <input type="text" name ="email">
        <br>
        <button type="submit" name ="gui">Gửi</button>
    </form>
</body>
</html>
<?php 
if (isset ($_REQUEST['gui'])){
    $hoten = $_REQUEST['hoten'];
    $email = $_REQUEST['email'];

    echo "<h2>Họ tên: $hoten</h2>";
    echo "<h2>Email: $email</h2>";
}
?>