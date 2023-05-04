<?php
require_once "connection.php";
// Gọi tất cả dữ liệu từ bảng ca sĩ
$sql = "SELECT * FROM casi";
$stmt = $conn->prepare($sql);
$stmt->execute();
$casi = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Thêm dữ liệu
if (isset($_POST['btn_luu'])) {
    $tenbai = $_POST['tenbai'];
    $noidung = $_POST['noidung'];
    $luotxem = $_POST['luotxem'];
    $luotthich = $_POST['luotthich'];
    $id_casi = $_POST['id_casi'];

    $file = $_FILES['anh'];
    $anh = $file['name'];

    if ($tenbai =="" && $luotxem =="" && $luotthich =="" && $noidung =="") {
        $err="Bạn phải nhập đầy đủ thông tin";
    }
    if ($luotxem<=0){
        $luotxem_err="Lượt xem phải là số dương";
    }
    if ($luotthich<0){
        $luotthich_err="Lượt thích phải là số dương";
    }

    if($file['size']>2097152){
        $file_err_size="Lỗi File > 2mb";
    }
    if($file['size']>0){
        $check=strtolower(pathinfo($anh, PATHINFO_EXTENSION));
        if ($check !='jpg' && $check !='png' && $check !='jpeg'){
            $file_err = "File không là ảnh";
        }
    }
    if(!isset($file_err)){
        move_uploaded_file($file['tmp_name'], 'upload/' . $anh);
    }
    if(!isset($err)&&!isset($luotxem_err)&&!isset($luotthich_err)&&!isset($file_err)){
       
        $sql = "INSERT INTO baihat(id_casi, tenbai, noidung, anh, luotxem, luotthich) VALUES('$id_casi','$tenbai','$noidung','$anh','$luotxem','$luotthich') ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $msg = "Thêm dữ liệu thành công";
        header("location: show_casi.php?msg=$msg");
        exit;    
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Thêm sản phẩm</h2>
    <h3><a href="show_casi.php" style="text-decoration: none;">Danh sách</a></h3>
    <form action="" method="post" enctype="multipart/form-data">
        Tên bài hát: <input type="text" name="tenbai" value="<?= $tenbai ?? '' ?>">
        <?php if (isset($err)) : ?>
            <span style="color: red;">
                <?= $err ?>
            </span>
        <?php endif ?>
        <br>
        <br>
        Nội dung: <input type="text" name="noidung" value="<?=  $noidung ?? '' ?>">
        <br>
        <br>
        ảnh: <input type="file" name="anh">
        <br>
        <br>
        Lượt xem: <input type="text" name="luotxem" value="<?= $luotxem ?? '' ?>">
        <br>
        <br>
        Lượt thích: <input type="text" name="luotthich" value="<?= $luotthich ?? '' ?>">
        <br><br>
        id_casi: 
        <select name="id_casi" id="">
            <?php foreach ($casi as $c) : ?>
                <option value="<?= $c['id_casi'] ?>"><?= $c['tencs'] ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>
        <button type="submit" name="btn_luu">Thêm bài hát</button>

    </form>
</body>

</html>
</body>
</html>




