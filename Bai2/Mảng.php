<?php
$arr = [
    1, 2, 13.5, 'hello', 'Nguyễn Thế Anh', 'Anhntph12152@fpt.edu.vn'
];
echo $arr[4];

$arr[0] = 'Đậu Linh Đan';


print_r($arr);

echo "<br>";

//Mảng nhiều chiều
$arr2 = [
    [1, 2, 13.5, 'Trần Thị Bích Hường', 'abcxyz@gmail.com', '038404045644'],
    ['Nguyễn Thế Anh', 'Hà Nội', 'Anhntph12152@fpt.edu.vn']
];

echo "<br>";
//Lấy ra email của mảng số 2
echo "<br>" . $arr2[1][2];


$arr3 = [
    'Name' => 'Nguyễn Thê Anh',
    'Email' => 'Anhntph12153@fpt.edu.vn',
    'Address' => 'Hà Nội'
];
echo "<br>" . $arr3['Email'] . "<br>";

echo "<br>";
//Truy cập mảng 1 chiều
foreach ($arr as $item) {
    echo "Phần tử : $item <br>";
}

echo "<br>";
//foreach truy cập mảng 2 chiều 
foreach ($arr2 as $items) {
    foreach ($items as $item) {
        echo "Phần tử $item <br>";
    }
}
echo "<br>";
//Truy cập mảng có khóa và phần tử
foreach ($arr3 as $k => $v) {
    echo "Key: $k , Value: $v <br>";
}
