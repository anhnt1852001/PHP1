<?php
if (isset($_POST['btn'])) {
    $son = $_POST['son'];
    $gt = 1;
    for ($i = 2; $i <= $son; $i++) {
        $gt *= $i;
    }
    $kq = "Giai thừa của $son! = $gt";
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
        <label for="">Nhập vào số nguyên</label>
        <input type="number" name="son" min=0 id="" value="<?= isset($son) ? $son : 0 ?>">
        <br>
        <button type="submit" name="btn">Tính</button>
        <?php
        if (isset($kq)) {
            echo $kq;
        }
        ?>
    </form>
</body>

</html>