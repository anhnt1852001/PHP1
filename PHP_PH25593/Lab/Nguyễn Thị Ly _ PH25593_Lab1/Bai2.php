
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 2</title>
    <style>
        input{
            margin: 0px 0px 10px 0px;
        }
    </style>
</head>
<body>
    <form action="Bai2.php" method = "post">
        <label for="">Nhập điểm thi giữa kì: </label>
        <input type="number" name="giuaki" />
        <br>
        <label for="">Nhập điểm thi cuối kì: </label>
        <input type="number" name="cuoiki" />
        <br>
        <label for="">Điểm trung bình: </label>
        <input type="number" name="trungbinh" />
        <br>
        <button type="Submit" name="dangky">Gửi</button>
    </form>
</body>
</html>
<br>
<?php
    if(isset($_POST['dangky'])){
        
        $diemgiuaki = $_POST['giuaki'];
        $diemcuoiki = $_POST['cuoiki'];
        $trungbinh = ($diemgiuaki + $diemcuoiki)/2;

        echo "Điểm giữa kì: $diemgiuaki <br>";
        echo "Điểm cuối kì: $diemcuoiki <br>";
        echo "Điểm trung bình: $trungbinh <br>";

        if($trungbinh >= 9){
            echo "Hạng A";
        }elseif($trungbinh >= 7){
            echo "Hạng B";
        }elseif($trungbinh >= 5){
            echo "Hạng C";
        }elseif ($trungbinh < 5) {
            echo "Hạng F";
        }
    }
?>