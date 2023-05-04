<?php
// cài đặt timezone cho hệ thống
date_default_timezone_set("Asia/Ho_Chi_Minh");
//Hàm đưa ra thời gian hiện đại, có cả format

$date1 = date("d-m-y h:i:s");
echo "Ngày hiện tại: " .$date1;

// Thời gian tinh theo số nguyên
$dateInt = time(); // hàm time trả về thờ gian hiện tại nhưng là số nguyên
echo "<br>Ngày hiện tại số nguyên: ".$dateInt;

// chuyển từ time là int sang thường 
$int = 1658709438;
$date2 = date("d-m-y h:i:s", $int);
echo "<br> Ngày được quy đổi: ".$date2;

//Tình ngày hôm qua
$dateYesterday = date("d-m-y h:i:s", time() - 60 * 60 * 24);
echo "<br>Ngày hôm qua là: ".$dateYesterday;

//Tính ngày mai
$dateTomorow =  date("d-m-y h:i:s", time() + 60 * 60 * 24);
echo "<br>Ngày mai là: ".$dateTomorow;

//chuyển thời gian sang kiểu int (timestemp)
$day = "2022-07-26 00:00:00";
$dayInt = strtotime($day);
echo "<br> Ngày theo in của $day là $dayInt";