<!-- vòng lặp for -->
<?php
for ($x = 0; $x <= 20; $x++) {
    echo "$x <br>";
}
?>
<!-- Trong đó:

$x = 0 : Dữ liệu cần lặp, do nó chưa có giá trị nên mình gán nó là 0.
$x <= 20 : Điều kiện lặp, ví dụ này nghĩa là nó sẽ lặp đến khi nào $x nhỏ hơn hoặc bằng 20.
$x++ : Toán tử đếm khi vòng lặp thực hiện, $x++ nó giống như $x + 1, tức là tăng 1 giá trị mỗi chu kỳ lặp. -->

<!-- Sử dụng vòng lặp while
Vòng lặp while là được sử dụng rất nhiều trong WordPress, đặc biệt là để lặp truy vấn (query) để hiển thị dữ liệu bài viết ra bên ngoài. Cách sử dụng như sau: -->


<?php
 
while ( [điều kiện] ) {
    // code thực thi trong vòng lặp
}
 
?>
<!-- Ví dụ mình muốn lặp cho đến khi $x nhỏ hơn hoặc bằng 20 thì có như sau: -->


<?php
 
$x = 1;
 
while ( $x <= 20) {
    $x++;
    echo "$x <br>";
}
?>


<!-- Sử dụng vòng lặp do…while
Cái vòng lặp này thì cũng tương tự while mà thôi, nhưng nó sẽ thực hiện các đoạn code trước rồi mới kiểm tra điều kiện sau. -->


<?php
 
$x = 0;
 
do {
    $x++;
    echo "$x <br>";
} while ( $x <= 20 )
?>


<!-- Sử dụng vòng lặp foreach
Vòng lặp này ta sẽ lặp các giá trị và khoá trong mảng, chúng ta không có gắn điều kiện hay số lần lặp gì cả mà nó sẽ lặp khi nào hết mảng thì thôi. -->

<?php
 
$web = array(
    'PHP', 'ASP.NET', 'Ruby on Rail', 'CSS', 'HTML', 'Java'
);
 
foreach( $web as $lang ) {
    echo "$lang <br>";
}
?>
<!-- Trong đó, $web as $lang nghĩa là nó sẽ lấy cặp khoá và giá trị trong mảng $web bỏ vào $lang để hiển thị ra.

Hoặc nếu bạn có một mảng bất tuần tự và muốn hiển thị ra cặp khoá và giá trị thì sẽ làm như sau: -->

<?php
 
$web = array(
    'dynamic'    => 'PHP',
    'styling'    => 'CSS',
    'behavior'    => 'Javascript'
);
 
foreach ( $web as $key => $value ) {
    echo "$key is $value <br>";
}
 
?>

<?php
$array_ten = array("Thuy","Diem","Loan","Tran");
 
echo $array_ten[3];
?>


<?php 

echo "<pre>";
 
print_r($array_ten);
 
echo "</pre>";
 
//Kết quả sẽ được
Array
(
    [0] => Thuy
    [1] => Diem
    [2] => Loan
    [3] => Tran
)
?>

<?php
$sinhvien= array ("name" => "Nongdanit", "job" => "Sinh Viên", "age"=>"18", "email" => "nongdanit@gmail.com");
// Nó được tạo nên bởi các index không phải là số mà là một chuỗi hoặc số lẫn chuỗi.

// Vậy để lấy giá trị chúng ta phải sử dụng index là chuỗi, như muốn lấy tuổi trong mảng trên là dùng:

1
echo $sinhvien['age'];//kết quả 18
?>

<?php 
1
2
3
foreach($array_ten as $value){
    echo "$value<br>";
}
// Lặp qua mảng kết hợp như sau:

1
2
3
foreach($sinhvien as $key => $value){
    echo "Key: $key. Value: $value<br>";
}
?>
