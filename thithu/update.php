<?php
require_once "connection.php";

if (isset($_POST['them'])) {
    $id_bh = $_POST['id_bh'];
    $tenbai = $_POST['tenbai'];
    $noidung = $_POST['noidung'];
    $anh = $_POST['anh'];
    $luotxem = $_POST['luotxem'];
    $luotlike = $_POST['luotlike'];
    $id_casi = $_POST['id_casi'];

    $file = $_FILES['anh'];

    $errors = [];

    if ($file['size'] > 0) {
        $anh = $file['name'];

        $ext = pathinfo($anh, PATHINFO_EXTENSION);
        if ($ext != 'jpg' && $ext != 'png') {
            $errors['anh'] = "Fiile lỗi";
        }
    }

    if (!$errors) {
        // $sql = "INSERT INTO `baihat`(`tenbai`, `noidung`, `anh`, `luotxem`, `luotlike`, `id_casi`) 
        // VALUES ('$tenbai', '$noidung', '$anh', '$luotxem', '$luotlike', '$id_casi')";

        $sql = "UPDATE baihat SET tenbai='$tenbai', noidung='$noidung', anh='$anh', luotxem='$luotxem', luotlike='$luotlike', id_casi='$id_casi' 
        WHERE id_bh=$id_bh";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        if ($file['size'] > 0) {
            move_uploaded_file($file['tmp_name'], 'images/' . $anh);
        }


        header("location: show.php");
        setcookie("success", "thêm ok", time() + 1);
        exit;
    }
}

$sql = "SELECT * FROM casi";
$stmt = $conn->prepare($sql);
$stmt->execute();
$casi = $stmt->fetchAll(PDO::FETCH_ASSOC);


$id_bh = $_GET['id_bh'];
$sql = "SELECT * FROM baihat WHERE id_bh=$id_bh";

$stmt = $conn->prepare($sql);
$stmt->execute();

$baihat = $stmt->fetch(PDO::FETCH_ASSOC);

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
    <h1>Thêm</h1>
    <a href="show.php">
        <button>Danh sach</button>
    </a>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_bh" value="<?= $baihat['id_bh'] ?>">

        <input type="text" name="tenbai" placeholder="Tên bài hát" value="<?= $baihat['tenbai'] ?>">
        <br>

        <textarea name="noidung" id="" cols="30" rows="5" placeholder="Nội dung"><?= $baihat['noidung'] ?></textarea>
        <br>

        <img src="images/<?= $baihat['anh'] ?>" width="210" alt="">
        <input type="hidden" name="anh" value="<?= $baihat['anh'] ?>">
        <input type="file" name="anh" id="">
        <br>

        <input type="number" placeholder="Lượt xem" name="luotxem" value="<?= $baihat['luotxem'] ?>">
        <br>

        <input type="number" name="luotlike" placeholder="Like" value="<?= $baihat['luotlike'] ?>">
        <br>

        <select name="id_casi" id="">
            <?php foreach ($casi as $cs) : ?>
                <option value="<?= $cs['id_casi'] ?>" <?= $baihat['id_casi'] == $cs['id_casi'] ? 'selected' : '' ?>>
                    <?= $cs['ten_cs'] ?>
                </option>
            <?php endforeach ?>
        </select>
        <br>

        <button name="them" type="submit">Thêm</button>
    </form>
</body>

</html>