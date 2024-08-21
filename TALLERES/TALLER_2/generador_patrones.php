<?php

echo "Patrón de triángulo rectángulo:\n";
for ($i = 1; $i <= 5; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "\n"; 
}

echo "\n"; 


echo "Números impares del 1 al 20:\n";
$num = 1;
while ($num <= 20) {
    if ($num % 2 != 0) {
        echo $num . "\n";
    }
    $num++;
}

echo "\n"; 


echo "Contador regresivo desde 10 hasta 1, saltando el número 5:\n";
$num = 10;
do {
    if ($num != 5) {
        echo $num . "\n";
    }
    $num--;
} while ($num >= 1);

echo "\n"; 


echo "Recorrido de un array de cadenas usando foreach:\n";
$cadenas = array("PHP", "es", "genial");

foreach ($cadenas as $cadena) {
    echo $cadena . " ";
}
echo "\n"; 

?>
