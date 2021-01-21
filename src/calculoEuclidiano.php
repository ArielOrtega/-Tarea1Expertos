<?php
function dist($arrayA, $arrayB){
    $sum = 0;
    for($i = 0; $i < count($arrayA); $i++){
        $sum += pow($arrayA[$i]-$arrayB[$i],2);
    }
    $distancia = sqrt($sum);

    return $distancia;
}
?>