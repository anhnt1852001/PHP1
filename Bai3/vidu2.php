<?php
require_once "function.php";
if (isset($_POST['btn'])) {
    $son = $_POST['son'];
    $kq = "Giai thừa của $son! = " . giai_thua($son);
    if (kiem_tr_so_nguyen_to($son)) {
        $kq .= "<br> Số $son là số nguyên tố";
    } else {
        $kq .= "<br> Số $son không là số nguyên tố";
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
        <input type="number" name="son" value="<?= isset($son) ? $son : 0 ?>" id="">
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