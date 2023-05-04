<?php
$nhanvien = [
['id' => 'NV1', 'hoten' => 'Nguyen Thị Trinh', 'email' => 'anv123@fpt.edu.vn', 'phone' => '0569784324', 'cmnd' => 1597538746, 'luong' => 100],
['id' => 'NV2', 'hoten' => 'Nguyen Thi Ly', 'email' => 'bqh456@fpt.edu.vn', 'phone' => '0569798761', 'cmnd' => 1147859347, 'luong' => 200],
['id' => 'NV2', 'hoten' => 'Nguyen Van Tuan', 'email' => 'hvt999@fpt.edu.vn', 'phone' => '0569793647', 'cmnd' => 1147859512, 'luong' => 300],
];

$tongluong = 0;
$tbluong = 0;

foreach($nhanvien as $value){
    $tongluong = $tongluong + $value['luong'];
}

$soluong = count($nhanvien);
$tbluong = $tongluong / $soluong;

echo "Tổng lương: $tongluong <br> ";
echo "Lương trung bình: $tbluong";
?>
 