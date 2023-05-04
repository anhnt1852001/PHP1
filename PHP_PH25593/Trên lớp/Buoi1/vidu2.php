<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí</title>
    <style>
        input{
            margin: 0px 0px 10px 0px;
        }
    </style>
</head>
<body>
    <form action="getMethod.php" method = "GET">
        <label for="">Họ Tên</label>
        <input type="text" name="hoten"><br>
        <label for="">Tài khoản</label>
        <input type="text" name="taikhoan"><br>
        <label for="">Mật khẩu</label>
        <input type="password" name="matkhau" id=""><br>
        <button type="Submit">Đăng ký</button>
    </form>
</body>
</html>