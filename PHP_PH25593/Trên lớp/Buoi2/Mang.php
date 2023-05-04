<?php 
//Mảng trong PHP
//Khai báo mảng
$a = array(1,3,5,6,3,9,);
//Cách 2
$a2 = [12,'hello', 'string', 5,8,19];

//In mảng
echo "<pre>";
print_r($a);
var_dump($a2);

//mảng kết hợp
$product = [
    'masp' => 'SP001',
    'tensp' => 'Iphone 13 Pro',
    'price' => 10000000,
    'desc' => 'Iphone 13 Pro là sản phẩm tuyệt vời của nhà táo...'
];

print_r($product);

//Lấy phần tử của mảng
echo $a2[1];
echo "<br>Tên sản phẩm: " .$product['tensp'];
