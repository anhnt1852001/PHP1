<?php 
//Toán tử 3 ngôi
$a = 10;
$b = ($a > 10) ? true : false;
var_dump($b);
echo "<br>";
echo ($a == 10) ? $a * 2 : $a;
echo "<br>";
//Lệnh switch case
$chon = isset($_GET['url']) ? $_GET['url']: 'home';
switch ($chon) {
    case 'home':
        echo "Đây là trang HOME";
        break;
    case 'product':
        echo "Danh sách sản phẩm";
        break;
    case 'detail':
        echo "Chi tiết sản phẩm";
        break;
    default:
        echo "404 File not found.";
        break;
}