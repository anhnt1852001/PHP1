<?php
if (isset($_POST['btnGiai'])) {
    $n = $_POST['n'];

    function fibonacci($n)
    {
        $f0 = 0;
        $f1 = 1;
        $fn = 1;

        if ($n < 0) {
            return -1;
        } else if ($n == 0 || $n == 1) {
            return $n;
        } else {
            for ($i = 2; $i <= $n; $i++) {
                $f0 = $f1;
                $f1 = $fn;
                $fn = $f0 + $f1;
            }
        }
        return $fn;
    }
    echo "Tổng của dãy fibanacci là " . fibonacci($n);
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
        <input type="number" name="n" placeholder="" value="<?= isset($n) ?  $n : 0 ?>" id="">
        <br>
        <button type="submit" name="btnGiai">Tính</button>
    </form>
</body>

</html>