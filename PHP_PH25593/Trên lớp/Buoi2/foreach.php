<?php 
// $a = [2, 5, 12, 33, 'hello', 'iphone', 'samsung'];

//Vòng lặp foreach
// foreach ($a as $value) {
//     echo  "$value <br>";
// }

//
// foreach ($a as $key => $value) {
//     echo "Key: $key => Value: $value <br>";
// }

//Mảng kết hợp
//danh sách sản phẩm
$product = [
    ['masp' => 'Sp001', 'tensp' => 'Iphone 13', 'price' => 20000000],
    ['masp' => 'Sp002', 'tensp' => 'Iphone 13 Pro', 'price' => 26000000],
    ['masp' => 'Sp003', 'tensp' => 'Iphone 13 Pro Max', 'price' => 30000000],

];
?>

<?php foreach ($product as $product): ?>
    <h3>Mã sản phẩm: <?= $product['masp'] ?></h3>
    <h3>Tên sản phẩm: <?= $product['tensp'] ?> Có giá: <?= $product['price']?></h3>
    <hr>
<?php endforeach ?>