<?php
$x = 5;
if ($x > 5) {
    echo "Số $x > 5 ";
} elseif($x == 5) {
    echo "Số $x = 5";
}
 else {
    echo "Số $x < 5";
}



//Phát biểu switch case
echo "<br>"; 
switch ($x) {
    case 1:
        echo "Bạn chọn chương trình 1";
        break;
    case 2:
        echo "Bạn chọn chương trình 2";
        break;
    case 3:
        echo "Bạn chọn chương trình 3";
        break;
    case 4:
        echo "Bạn chọn chương trình 4";
        break;
    case 5:
        echo "Bạn chọn chương trình 5";
        break;
    default :
        echo "Bạn  chọn chương trình không đúng";
        break;
}