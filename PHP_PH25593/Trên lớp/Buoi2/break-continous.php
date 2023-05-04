<?php 
//Lệnh break 
for ($i=1; $i<1000; $i++){
    echo "<h3>Vòng lặp thứ $i</h3>";
    if($i == 10){
        break;
    }
}

//Continous
for($i = 1; $i <1000; $i++){
    if($i % 2 == 0 || $i % 3){
        continue;
    }
    echo "<h3>Số $i không chia hết cho 2 và 3</h3>";
}