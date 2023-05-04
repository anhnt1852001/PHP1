<?php
$nhanvien = [
['id' => 'NV1', 'hoten' => 'Nguyen Thị Trinh', 'email' => 'anv123@fpt.edu.vn', 'phone' => '0569784324', 'cmnd' => 1597538746, 'luong' => 100],
['id' => 'NV2', 'hoten' => 'Nguyen Thi Ly', 'email' => 'bqh456@fpt.edu.vn', 'phone' => '0569798761', 'cmnd' => 1147859347, 'luong' => 800],
['id' => 'NV2', 'hoten' => 'Nguyen Van Tuan', 'email' => 'hvt999@fpt.edu.vn', 'phone' => '0569793647', 'cmnd' => 1147859512, 'luong' => 500],
];
?>
<?php foreach($nhanvien as $nhanvien): ?>
<h4> Mã nhân viên: <?= $nhanvien['id'] ?></h4>
<h4> Tên nhân viên: <?= $nhanvien['hoten'] ?> </h4>
<h4> Email: <?= $nhanvien['email'] ?> </h4>
<h4> phone: <?= $nhanvien['phone'] ?> </h4>
<h4> CMND: <?= $nhanvien['cmnd'] ?> </h4>
<h4> Lương: <?= $nhanvien['luong'] ?> </h4>
<hr>
<?php endforeach?>
