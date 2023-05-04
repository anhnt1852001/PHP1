<?php
if(isset($_POST['dangky'])){
//Lấy dữ liệu theo phương thức POST

$hoten = $_POST['hoten'];
$taikhoan = $_POST['taikhoan'];
$matkhau = $_POST['matkhau'];

//In ra màn hình

echo "Họ tên: $hoten <br>";
echo "Tài khoản: $taikhoan <br>";
echo "Mật khẩu: $matkhau <br>";

}else{
    echo "Bạn chưa nhập dữ liệu vào form đăng ký...hãy quay lại để nhập";
}