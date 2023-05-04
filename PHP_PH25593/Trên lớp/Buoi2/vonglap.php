<?php 
//Vòng lặp for
for($i=0; $i <= 5; $i++){
    echo "<h3>Vòng lặp thứ $i</h3>";
}

for($i=0; $i <= 5; $i++):
    echo "<h3>Vòng lặp thứ $i</h3>";
endfor;

//Vòng lặp while
$dem = 1;
while($dem <= 5){
    echo "<h3>Vòng lặp while thứ $dem</h3>";
    $dem++;
}

//Vòng lặp do while
$dem = 1;
do{
    echo "<h3>Vòng lặp do...while thứ $dem</h3>";
    $dem++;
}while($dem <=5);

