<?php
if (isset($_POST['Tinhtien'])) {

    $sodem = $_POST['sodem'];
    $Tongtien = $sodem * 860000;
    $kq = "Tổng tiền phải trả là $Tongtien";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính Tiền Khách Sạn</title>
</head>

<body>
    <form action="" method="POST">
        Số Đêm: <input type="text" name="sodem" value="<?= isset($sodem) ? $sodem : '' ?>" id="">
        <br>
        <button type="submit" name="Tinhtien">Tính Tiền</button>
    </form>
    <?php
    if (isset($kq)) {
        echo $kq;
    }
    ?>
</body>

</html>