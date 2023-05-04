<?php
if (isset($_POST['btnGui'])) {
    if (isset($_POST['thanhpho'])) {
        $thanhpho = $_POST['thanhpho'];
        var_dump($thanhpho);
    } else {
        echo "Bạn cần chọn";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <select name="thanhpho[]" multiple="4" id="">
            <option value="HN">Hà Nội</option>
            <option value="HUE">Huế</option>
            <option value="HP">Hải Phòng</option>
            <option value="NT">Nha Trang</option>
            <option value="HCM">Hồ Chí Minh</option>
            <option value="DN">Đà Nẵng</option>
            <option value="NT">Khánh Hòa</option>
        </select>
        <br>
        <button type="submit" name="btnGui">Gửi</button>
    </form>
</body>

</html>