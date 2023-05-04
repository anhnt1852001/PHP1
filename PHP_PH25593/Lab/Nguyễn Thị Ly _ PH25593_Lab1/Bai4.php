<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 4</title>
    <style>
        form{
            background-color: orange;
            border: 1px solid orange;
            width: 350px;
        }
        form>h2{
            text-align: center;

        }
        button{
            background-color: grey;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <form action="Bai4.php" method = "post">
    <h2>Bảng tính tiền</h2>
    <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Tên món</th>
      <th scope="col">Đơn giá</th>
      <th scope="col">Số lượng</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td scope="row">Cà ri</td>
      <td>15000 đ</td>
      <td><input type="number" value="0" name="cari" id=""></td>
    </tr>
    <tr>
      <td scope="row">Rau xào</td>
      <td>5000 đ</td>
      <td><input type="number" value="0" name="rauxao" id=""></td>
    </tr>
    <tr>
      <td scope="row">Cá kho</td>
      <td>25000 đ</td>
      <td><input type="number" value="0" name="cakho" id=""></td>
    </tr>
    <tr>
      <td scope="row">Cơm</td>
      <td>10000 đ</td>
      <td><input type="number" value="0" name="com" id=""></td>
    </tr>
      <td scope="row">Tổng thanh toán</td>
    <td></td>
    <td><input type="number" value="0" name="tongien" id=""></td>
    <tr>    
        <td><button type="Submit" name="thanhtoan">Tính tiền</button></td>
    </tr>
  </tbody>
</table>
</form>
</body>
</html>

<br>
<?php
    if(isset($_POST['thanhtoan'])){
        $cari = $_POST['cari'];
        $rauxao = $_POST['rauxao'];
        $cakho = $_POST['cakho'];
        $com = $_POST['com'];
        $tongtien = (($cari*15000)+($rauxao*5000)+($cakho*25000)+($com*10000));

    echo "Số tiền bạn phải thanh toán là: $tongtien VNĐ";
    }
?>