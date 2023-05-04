<?php
$dem = 0;
$arr = [1, 2, 5, 7, 8, 12, 14, 17, 21, 25, 28];
foreach ($arr as $sole) {
    if ($sole % 2 != 0) {
        echo "Số Lẻ là : $sole <br>";
        $dem++;
    }
}
echo "Tổng các số lẻ có trong mảng là: $dem";
