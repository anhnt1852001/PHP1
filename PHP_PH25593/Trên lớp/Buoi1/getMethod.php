<?php 
//Lấy dữ liệu theo phương thức GET
$hoten = $_GET['hoten'];
$taikhoan = $_GET['taikhoan'];
$matkhau = $_GET['matkhau'];

//In ra màn hình

echo "Họ tên: $hoten <br>";
echo "Tài khoản: $taikhoan <br>";
echo "Mật khẩu: $matkhau <br>";