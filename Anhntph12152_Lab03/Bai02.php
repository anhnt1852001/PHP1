<?php
function sumSN($son)
{
    $sum = 0;
    for ($i = 1; $i <= $son; $i++) {
        $sum += $i;
    }
    return $sum;
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
            Nhập số từ 1 đến N
        </label>
        <input type="number" name="son" placeholder="Nhập số ..." value="<?= isset($son) ? $son : "" ?>">
        <button type="submit" name="btn">Tính</button>
    </form>
    <?php
    if (isset($_POST['btn'])) {
        $son = $_POST['son'];
        echo sumSN($son);
    }
    ?>
</body>

</html>