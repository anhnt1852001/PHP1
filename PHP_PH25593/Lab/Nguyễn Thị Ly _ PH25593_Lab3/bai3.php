
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            margin-left:500px;
            margin-top: 100px;
        }
        label,input,button{
            display: block;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <form action="bai3.php" method="GET">
        <label for="">
            Nhập vào số bất kì
            <input type="text" name="so">
            <button name="ktra">Tìm Số Chia Hết</button>
                    <?php
                        $a = [20,4,21,5,4,7,6,7,434,54];
                        if(isset($_GET['ktra'])){
                            if(empty($_GET["so"])==false){
                                $n=$_GET["so"];
                                $kt=0;
                                for($i=0;$i<sizeof($a);$i++){
                                    if($a[$i]%$n==0){
                                        $kt=1;
                                    }
                                }
                                if($kt==0){
                                    echo "Không Có Số nào chia hết cho $n ở trong mảng";
                                }else{
                                    echo "Các Số chia hết cho $n là: ";
                                    for($i=0;$i<sizeof($a);$i++){
                                        if($a[$i]%$n==0){
                                            echo $a[$i]." ";
                                        }
                                    }
                                }
                                
                            }else{
                                echo "Bạn Chưa Nhập";
                            }
                        }
                    ?>          
        </label>
    </form>
</body>
</html>
