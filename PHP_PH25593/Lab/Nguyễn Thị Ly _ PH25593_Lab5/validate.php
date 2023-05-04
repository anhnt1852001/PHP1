<?php
if(isset($_POST['btnUpload'])){
   $ten_sach = $_POST['tensach'];
   $gia = $_POST['gia'];
   $so_trang = $_POST['sotrang'];
   $mo_ta = $_POST['mota'];
   $tac_gia = $_POST['tacgia'];
   $nam_xuat_ban = $_POST['namphathanh'];
   // $ngay_nhap = $_POST['ngay_nhap'];
    $file = $_FILES['file-upload'];
    $file_name = $file['name'];
    $thu_muc_upload = "upload/";

    if($ten_sach == 0){
      $tensach_err = "Không được để trống tên sách";
    }
    if(is_numeric($gia) == false){
       $gia_err="Giá phải là 1 số nguyên";
    }elseif($gia <0){
       $gia_err="Giá phải là 1 số dương";
    }
    if(is_numeric($so_trang) == false){
      $sotrang_err="Số trang phải là 1 số nguyên";
   }elseif($so_trang <0){
      $sotrang_err="Số trang phải là 1 số dương";
   }
    if($file['size'] <= 0){
        $file_err = "Bạn chưa nhập ảnh";
    }
    if($file['size'] > 0){
        $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if($ext != 'jpg' && $ext != 'png' && $ext !='jpeg'){
            $file_err = "Không đúng định dạng ảnh";
        }
    }
    if($file['size'] > 1048576){
      $file_err = "Ảnh không được lớn hơn 1MB";
    }
    if(!isset($file_err)){
        move_uploaded_file($file['tmp_name'], $thu_muc_upload . $file_name);
        $upload_ok = true;
    }

}
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 3</title>
 </head>
 <body>
    <form action="" method="post" enctype = "multipart/form-data">
        <h1>Thêm sách</h1>
       Tên sách <input type="text" name="tensach">
       <?php if(isset($tensach_err)):?>
           <span style="color: red;"><?=$tensach_err ?></span>
        <?php endif ?>
       <br>
       Ảnh <input type="file" name="file-upload">
       <?php if(isset($file_err)):?>
           <span style="color: red;"><?=$file_err ?></span>
        <?php endif ?>
        <br>
       Giá <input type="text" name="gia">
       <?php if(isset($gia_err)):?>
           <span style="color: red;"><?=$gia_err ?></span>
        <?php endif ?>
       <br>
       Số trang <input type="text" name="sotrang">
       <?php if(isset($sotrang_err)):?>
           <span style="color: red;"><?=$sotrang_err ?></span>
        <?php endif ?>
       <br>
       Mô tả <input type="text" name="mota">
       <br>
       Tác giả <input type="text" name="tacgia">
       <br>
       Năm phát hành <input type="text" name="namphathanh">
       <br>
       <button type="submit" name="btnUpload">Thêm</button>
 </body>
 </html>