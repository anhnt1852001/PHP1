<?php
if (isset($_POST['btn'])) {
    $soa = $_POST['soa'];
    $sob = $_POST['sob'];
    $soc = $_POST['soc'];
    if ($soa == 0) {
        if ($sob == 0) {
            $kq = "PT vô nghiệm ";
        } else {
            $kq = "PT có 1 nghiệm là : " . -$soc / $sob;
        }
    } else {
        $denta = pow($sob, 2) - $soa * $soc * 4;
        if ($denta < 0) {
            $kq = "PT vô nghiệm";
        } else if ($denta == 0) {
            $kq = "PT có nghiệm kép:  " . -$sob / 2 * $soa;
        } else {
            $x1 =  (-$sob - sqrt($denta)) / (2 * $soa);
            $x2 =  (-$sob + sqrt($denta)) / (2 * $soa);
            $kq = "PT có 2 nghiệm phân biệt là: " . "<br>" . "x1=" . $x1 . "<br>" . "x2=" . $x2;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <label for="">PT bac 2</label>
        <br>
        <label for="">Nhập số a: </label>
        <input type="number" name="soa" value="<?= isset($soa) ? $soa : "" ?> ">
        <br>
        <label for="">Nhập số b: </label>
        <input type="number" name="sob" value="<?= isset($sob) ? $sob : "" ?> ">
        <br>
        <label for="">Nhập số c: </label>
        <input type="number" name="soc" value="<?= isset($soc) ? $soc : "" ?> ">
        <br>
        <button type="submit" name="btn">Tính</button>
    </form>
    <?php
    if (isset($kq)) {
        echo $kq;
    }
    ?>
</body>

</html>