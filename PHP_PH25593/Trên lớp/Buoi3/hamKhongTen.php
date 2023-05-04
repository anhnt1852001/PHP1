<?php
$xinChao = function(){
    echo "Xin chào";
};

$xinChao();

$tinhTong =  function($a, $b){
    return $a + $b;
};
 echo"<br> Tính tổng: ". $tinhTong(26, 18);

 // hàm callback

 function xinChao($callback){
    $callback();

 };

 // sử dụng hàm callback
 xinChao(function(){
    echo " <h2> Xin chào tớ là Ly</h2>";
 });

 // tính tổng của 1 mảng
 function tinhTongMang($arr, $callback){
    return $callback();
 }
 $arr = [1, 3, 5, 7, 10, 18, 26];
 echo tinhTongMang($arr, function(){
    global $arr;
    return array_sum ($arr);
 }); 


 //Áp dụng với hàm array_map
 $arr2 = array_map(function ($n){
    return $n ** 2;
 }, $arr);
 
 echo "<pre>";
 print_r ($arr2);

 // arrow function 
 $tong = fn($a,$b) => $a + $b;
 echo "Tổng: " . $tong(7, 10);

 yield
 function myNumber(){
    for($i = 0;  $i < 10; $i++){
        yield $value = $i * $i;
    }
 }
 foreach (myNumber() as $value){
    echo "<br>$value";
 }