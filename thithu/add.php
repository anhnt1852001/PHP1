<?php
require_once "connection.php";

if (isset($_POST['them'])) {
    $tenbai = $_POST['tenbai'];
    $noidung = $_POST['noidung'];
    $luotxem = $_POST['luotxem'];
    $luotlike = $_POST['luotlike'];
    $id_casi = $_POST['id_casi'];

    $file = $_FILES['anh'];
    $anh = $file['name'];

    $errors = [];

    if($file['size'] > 0){
        $ext = pathinfo($anh, PATHINFO_EXTENSION);
        if($ext != 'jpg' && $ext != 'png'){
            $errors['anh'] = "Fiile lỗi";
        }   
    }

    if (!$errors) {
        $sql = "INSERT INTO `baihat`(`tenbai`, `noidung`, `anh`, `luotxem`, `luotlike`, `id_casi`) 
        VALUES ('$tenbai', '$noidung', '$anh', '$luotxem', '$luotlike', '$id_casi')";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        move_uploaded_file($file['tmp_name'], 'images/' . $anh);
        header("location: show.php");
        setcookie("success", "thêm ok", time() + 1);
        exit;
    }
}

$sql = "SELECT * FROM casi";

$stmt = $conn->prepare($sql);
$stmt->execute();


$casi = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
        <input type="text" name="tenbai" placeholder="Tên bài hát">
        <br>
        <textarea name="noidung" id="" cols="30" rows="5" placeholder="Nội dung"></textarea>
        <br>
        <input type="file" name="anh" id="">
        <br>
        <input type="number" placeholder="Lượt xem" name="luotxem">
        <br>
        <input type="number" name="luotlike" placeholder="Like">
        <br>
        <select name="id_casi" id="">
            <?php foreach ($casi as $cs) : ?>
                <option value="<?= $cs['id_casi'] ?>">
                    <?= $cs['ten_cs'] ?>
                </option>
            <?php endforeach ?>
        </select>
        <br>
        <button name="them" type="submit">Thêm</button>
    </form>
</body>

</html>