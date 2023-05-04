<?php
require_once "connection.php";
$sql = "SELECT * FROM casi";
$stmt = $conn->prepare($sql);
$stmt->execute();
$casi = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['luu'])) {
    $tenbai = $_POST['tenbai'];
    $id_casi = $_POST['id_casi'];
    $noidung = $_POST['noidung'];
    $luotxem = $_POST['luotxem'];
    $luotthich = $_POST['luotthich'];

    $file = $_FILES['image'];
    $image = $file['name'];
    // vadidate

    if ($tenbai == "") {
        $tenbai_err = "Bạn phải nhập tên bài hát";
    }
    if ($noidung == "") {
        $noidung_err = "Bạn phải nhập nội dung";
    }
    if ($luotxem == "") {
        $luotxem_err = "Bạn phải nhập lượt xem";
    }
    if ($luotthich == "") {
        $luotthich_err = "Bạn phải nhập lượt thích";
    }
    if($file['size'] <= 0){
        $file_err = "Bạn chưa upload file";
     }elseif($file['size'] >= 2097152){
        $file_err = "Bạn không được chọn ảnh quá 2MB";
    }

    if ($file['size'] > 0) {
        //Lấy extension của file
        $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg') {
            $file_err = "File không phải là ảnh";
        }
    }

    if (!isset($tenbai_err) && !isset($noidung_err)&& !isset($luotxem_err) && !isset($luotthich_err)  && !isset($file_err)) {

        $sql = "INSERT INTO baihat (tenbai, noidung, image, luotxem, luotthich, id_casi)VALUE('$tenbai','$noidung', '$image', '$luotxem', '$luotthich', '$id_casi')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if (!isset($file_err)) {
            move_uploaded_file($file['tmp_name'], 'upload/' . $image);
            $ok = true;
        }

        $msg = "Thêm dữ liệu thành công";
        header("location: show_bh.php?msg=$msg");
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
    <form action="" method="post" enctype="multipart/form-data">
        <h1>Thêm bài hát</h1>
        <label for="">Tên bài</label>
        <input type="text" name="tenbai" value="<?=$tenbai ?? ''?>">
        <?php if (isset($tenbai_err)) : ?>
            <span style="color: red"><?= $tenbai_err?> </span>
        <?php endif ?>
        <br>
        <label for="">Ca sĩ</label>
        <select name="id_casi" id="">
            <?php foreach ($casi as $c) : ?>
                <option value="<?= $c['id_casi'] ?>"><?= $c['ten_cs'] ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="">Nội dung</label>
        <input type="text" name="noidung"  value="<?=$noidung ?? ''?>">
        <?php if (isset($noidung_err)) : ?>
            <span style="color: red"><?= $noidung_err?> </span>
        <?php endif ?>
        <br>
        <label for="">Image</label>
        <input type="file" name="image" value="<?= $image ?? '' ?>">
        <?php
        if (isset($file_err)) : ?>
            <span style="color: red"><?= $file_err ?> </span>
        <?php endif ?>
        <br>
        <label for="">Lượt xem </label>
        <input type="text" name="luotxem"  value="<?=$luotxem ?? ''?>">
        <?php if (isset($luotxem_err)) : ?>
            <span style="color: red"><?= $luotxem_err?> </span>
        <?php endif ?>
        <br>
        <label for="">Lượt thích</label>
        <input type="text" name="luotthich"  value="<?=$luotthich ?? ''?>">
        <?php if (isset($luotthich_err)) : ?>
            <span style="color: red"><?= $luotthich_err?> </span>
        <?php endif ?>
        <br>
        <button type="submit" name="luu">Lưu</button>
        <a href="show_bh.php">Danh sách</a>
    </form>
</body>

</html>