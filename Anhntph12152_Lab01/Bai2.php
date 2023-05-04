<?php
if (isset($_POST['tinhtien'])) {
    $cari = $_POST['cari'];
    $rau = $_POST['rau'];
    $cakho = $_POST['cakho'];
    $com = $_POST['com'];
    $tongtien = $cari * 15000 + $rau * 5000 + $cakho * 25000 + $com * 10000;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng Tính Tiền</title>

</head>

<body>

    <form action="" method="POST">
        <table width="500" height="500" border="1" style="border-collapse:collapse;background-color: orangered;color:#fff;border:1px solid orangered">
            <tr>
                <th colspan="3">
                    <p>BẢNG TÍNH TIỀN</p>
                </th>
            </tr>
            <tr>
                <th>Tên món</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
            </tr>
            <tr>
                <th>Cà ri</th>
                <th>15000 đ</th>
                <th><input type="number" name="cari" id="" placeholder="0" value="<?= isset($cari) ? $cari : '0' ?>"></th>
            </tr>
            <tr>
                <th>Rau xào</th>
                <th>5000 đ</th>
                <th><input type="number" name="rau" id="" placeholder="0" value="<?= isset($rau) ? $rau : '0' ?>"></th>
            </tr>
            <tr>
                <th>Cá kho</th>
                <th>25000 đ</th>
                <th><input type="number" name="cakho" id="" placeholder="0" value="<?= isset($cakho) ? $cakho : '0' ?>"></th>
            </tr>
            <tr>
                <th>Cơm</th>
                <th>10000 đ</th>
                <th><input type="number" name="com" id="" placeholder="0" value="<?= isset($com) ? $com : '0' ?>"></th>
            </tr>
            <tr>
                <th colspan="2">Tổng tiền thanh toán</th>
                <th><span><?= isset($tongtien) ? $tongtien : '0' ?></span> đ</th>
            </tr>
            <tr>
                <th colspan="1"><button name="tinhtien" style="background-color: darkgrey;">Tính tiền</button></th>
            </tr>
        </table>
    </form>
</body>

</html>