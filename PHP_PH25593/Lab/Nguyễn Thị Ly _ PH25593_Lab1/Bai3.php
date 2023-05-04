<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 3</title>
    <style>
        input{
            margin: 0px 0px 10px 0px;
        }
    </style>
</head>
<body>
<form action="Bai3.php" method = "post">
        <label for="">Giá tiền 1 đêm: 860.000 VNĐ</label>
        <br>
        <label for="">Nhập số đêm bạn ở: </label>
        <input type="number" name="day" />
        <br>
        <label for="">Tổng tiền bạn phải trả: </label>
        <input type="text" name="tongtien" />
        <br>
        <button type="Submit" name="thanhtoan">Tính tiền</button>
    </form>
</body>
</html>
<br>
<?php
    if(isset($_POST['thanhtoan'])){
        $sodem = $_POST['day'];
        $thanhtoan = 860000*$sodem;

        echo "Bạn đã ở $sodem đêm <br>";
        echo "Số tiền bạn phải thanh toán là: $thanhtoan VNĐ";
    }
?>