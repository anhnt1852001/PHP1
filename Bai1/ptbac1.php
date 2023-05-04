<?php
if (isset($_POST['btnGiai'])) {
    $soa = $_POST['soa'];
    $sob = $_POST['sob'];

    if ($soa != 0) {
        $x = -$sob / $soa;
        $kq = "Nghiệm của phương trình là $x";
    } else {
        $kq = "PT vô nghiệm";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ax + B = 0</title>
</head>

<body>
    <form action="" method="POST">
        <input type="number" name="soa" placeholder="Số thứ 1" value="<?= isset($soa) ? $soa : '' ?>" id="">
        <br>
        <input type="number" name="sob" placeholder="Số thứ 2" value="<?= isset($sob) ? $sob : '' ?>" id="">
        <br>
        <button type="submit" name="btnGiai">Giải</button>
    </form>
    <?php
    if (isset($kq)) {
        echo $kq;
    }
    ?>
</body>

</html>