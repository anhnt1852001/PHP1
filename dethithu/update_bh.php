<?php
require_once "connection.php";
$sql = "SELECT * FROM casi";
$stmt = $conn->prepare($sql);
$stmt->execute();
$casi = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (isset($_POST['sua'])) {
    $id_bh = $_POST['id_bh'];
    $anh = $_POST['anh'];

    $tenbai = $_POST['tenbai'];
    $id_casi = $_POST['id_casi'];
    $noidung = $_POST['noidung'];
    $luotxem = $_POST['luotxem'];
    $luotthich = $_POST['luotthich'];

    $file = $_FILES['anh'];
    // khi cập nhật avata
    if($file['size'] > 0){
        $anh = $file['name'];

    }

    $sql = "UPDATE baihat SET tenbai = '$tenbai', noidung = '$noidung', anh = '$anh', luotxem = '$luotxem', luotthich = '$luotthich', id_casi = '$id_casi'
    WHERE id_bh = $id_bh";

    $stmt = $conn->prepare($sql);

    $stmt->execute();

    if ($file['size'] > 0) {
        move_uploaded_file($file['tmp_name'], ' upload/' . $anh);
    }

    $msg = "Sửa dữ liệu thành công";
    header("location: show_bh.php?msg=$msg");
}

$id_bh = $_GET['id'];

$sql = "SELECT * FROM baihat WHERE id_bh=$id_bh";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
   
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
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_bh" value="<?= $result['id_bh'] ?>">
        <label for="">Tên bài</label>
        <input type="text" name="tenbai" value="<?= $result['tenbai'] ?>">
       
        <br>
        <label for="">CS</label>
        <select name="id_casi" id="">
            <?php foreach ($casi as $cs) : ?>
                <option value="<?= $cs['id_casi'] ?>" <?= $result['id_casi'] == $cs['id_casi'] ? 'selected' : '' ?>>
                    <?= $cs['ten_cs'] ?>
                </option>
            <?php endforeach ?>
        </select>
        <br>
        <label for="">Nội dung</label>
        <input type="text" name="noidung"  value="<?= $result['noidung'] ?>">
      
        <br>
        <input type="hidden" name="anh" value="<?= $result['anh'] ?>">
        <label for="">Ảnh:</label>
        <br>
        <input type="file" name="anh" id="">
        <?php if (!empty($result['anh'])) :  ?>
            <input type="hidden" name="anh" value="<?= $result['anh'] ?>">
            <br>
            <img src="upload/<?= $result['anh'] ?>" width="120" alt="">
        <?php endif; ?>
       
        <br>
        <label for="">Lượt xem </label>
        <input type="text" name="luotxem" value="<?= $result['luotxem'] ?>">

        <br>
        <label for="">Lượt thích</label>
        <input type="text" name="luotthich"  value="<?= $result['luotthich'] ?>">
        
        <br>
        <button type="submit" name="sua">Sửa</button>
    </form>
</body>
</html>