<?php

$soa = $_POST['soa'];
$sob = $_POST['sob'];
if ($soa !=0) {
    $x = -$sob / $soa;
    echo "Nghiệm của phương trình là $x";
} else {
    echo "PT vô nghiệm";
}