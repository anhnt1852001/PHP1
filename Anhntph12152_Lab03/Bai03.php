<?php
function tim_GT($max, $vitri)
{
    $arr_songuyen = [2, 54, 65, 23, 12, 45, 3, 5, 7, 5, 75, 3, 5, 3, 6, 5, 4];
    for ($i = 0; $i < count($arr_songuyen); $i++) {
        if ($max == null) {
            $max = $arr_songuyen[$i];
            $vitri = $i;
        } else {
            if ($arr_songuyen[$i] > $max) {
                $max = $arr_songuyen[$i];
                $vitri = $i;
            }
        }
    }
    return "Giá trị lớn nhất là $max, nằm tại vị trí $vitri";
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
    <?php
    $max = null;
    $vitri = null;
    echo  tim_GT($max, $vitri);
    ?>
</body>

</html>