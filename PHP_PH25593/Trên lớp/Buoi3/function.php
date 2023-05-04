<?php
// khai báo hàm
function ten_ham(){
    echo"<h2> Xin chào các bạn </h2>";
}

//Gọi hàm
ten_ham();

// hàm có giá trị trả về 
function tinhTong($a, $b){
    echo"2 số a + b";
    return $a + $b;
   
}

echo "Tổng của 4 + 5 = ".tinhTong(4, 5);

// biến toàn cục
$x = 26;
function bienToanCuc (){
    global $x;
    $x = $x + 5;
}
bienToanCuc();
echo "<br> Biến x = $x";

// Hàm k chứa tham số nhưng vẫn có thể chứa tham số khi chạy
// Hàm có tham số bất định
function thamSoTrongHam(){
// Xác định tham số trog hàm
$arr = func_get_args();// lấy tát cả số trong hàm bất đinh
echo"<pre>";
print_r($arr);
}

thamSoTrongHam(1, 2, 3, 4, 'Tuấn');

// Áp dụng viết hàm tính tổng các tham só 
function tinhTong2(){
    $arr =  func_get_args();
    $tong = 0;
    // ham sizeof, count để đếm các phần tử trong mảng
    for($i = 0; $i < sizeof($arr); $i++ ){
        $tong += $arr[$i];
    }
    return $tong;
}
// gọi hàm tình tổng 2
echo "<br> Tính tổng: ". tinhTong2(2, 4, 6, 8, 10, 267, 1810);
echo"<br>";
// hàm có tham số không xác định 
function tinhTong3(...$number){
 print_r ($number);
}

tinhTong3(3, 4, 5, 6, 7, 222, 267, 1810);

// hàm có tham số có giá trị mặc định
function massage($name, $address = 'Hà Nội', $age = '18'){
    echo" Xin chào $name, ở $address $age tuổi <br>";
}

//gọi hàm
massage('Ly');
massage("Ly", "Đại Mỗ", "19");