<?php
if (isset($_POST['btn'])) {
    $number = $_POST['number'];
    $kq = "";

    for ($i = 2; $i <= $number; $i++) {
        $dem = 0;
        for ($j = 2; $j <= $i; $j++) {
            if ($i % $j == 0) {
                $dem++;
            }
            if ($dem > 2) {
                break;
            }
        }
        if ($dem <= 2) {
            $kq .= "Số nguyên tố: $i <br>";
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

    <form action="" method="post">
        <label for="">
            Nhập số N:
        </label>
        <input type="number" name="number" value="<?= isset($number) ? $number : "" ?>">
        <button type="submit" name="btn">Kết quả</button>
    </form>

    <?php
    if (isset($kq)) {
        echo $kq;
    }
    ?>

</body>

</html>