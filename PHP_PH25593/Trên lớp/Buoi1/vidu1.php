<?php
 echo "Xin chào thế giới.";

//  $c = 'các bạn!';
//  echo " Hello $c <br>"; 
//  echo "Xin chào $c";


//Khai báo dữ liệu
 $x = 1;
 $str = 'Xin chào các bạn lớp Web17317';
 $y = 13.5;
 $b = true;


 //Nhúng HTML
 echo "<br/>";
 echo $str;


//Sự khác nhau giữa nháy đơn' và nháy kép"
 echo '<h1>$str</h1>';
 echo "<h1>$str</h1>";

 //Nối chuỗi .

 $result = $str . $y;
 echo $result;

 $abc = "Hello";
 $$abc = "Xin chào";

 echo "<br/>" . $abc, $$abc;

 print("<h3>Học php cơ bản</h3>");

 //Kiểm tra sự tồn tại của biến
 $file = "abc.html";
 if(isset($file)){
    echo "Biến file có tồn tại";
 }else{
    echo "Biến file không tồn tại!";
 }

 
 
