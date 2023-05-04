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
            Nhập số từ 1 đến N
        </label>
        <input type="number" name="so" placeholder="Nhập số ..." value="<?= isset($so) ? $so : "" ?>">
        <button type="submit" name="btn">Tìm</button>
    </form>
    <?php
    if (isset($_POST['btn'])) {
        $so = $_POST['so'];
        $sum = 0;
        for ($i = 1; $i <= $so; $i++) {
            if ($i % 2 == 0) {
                $sum += $i;
            }
        }
        echo "Tổng các số chẵn là: $sum";
    }
    ?>
</body>

</html>



<?php
function tinh_tong($so)
{
    $tong = 0;
    for ($i = 1; $i <= $so; $i++) {
        $tong += $i;
    }
    return $tong;
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
            tinh tong
        </label>
        <input type="number" name="so" placeholder="nhap so ..." value="<?= isset($so) ? $so : 0 ?>">
        <button type="submit" name="btn">tim</button>
    </form>
    <?php
    if (isset($_POST['btn'])) {
        $so = $_POST['so'];
        echo tinh_tong($so);
    }
    ?>
</body>

</html>