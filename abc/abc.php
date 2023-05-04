<?php
echo "Mảng A theo thứ tự giảm dần <br>";
// Khởi tạo mảng
$arrA = array(1, 10, 2, 100, 3, 4, 9, 7);
$arrB = array(3,5,6,22,33);
// sắp xếp giảm gần bằng rsort
rsort($arrA);
// dùng vòng lặp foreach để hiển thị
foreach( $arrA as $n) {
    echo "$n <br>";
}

echo "<br>";
echo "Mảng C theo thứ tự giảm dần <br>";
// gộp 2 mảng A và B
$arrC = array_merge($arrA, $arrB);
rsort($arrC);
// dùng vòng lặp foreach để hiển thị
foreach( $arrC as $n) {
    echo "$n <br>";
}
?>