<?php

$calificacion = 85; 

if ($calificacion >= 90 && $calificacion <= 100) {
    $letra = 'A';
} elseif ($calificacion >= 80 && $calificacion < 90) {
    $letra = 'B';
} elseif ($calificacion >= 70 && $calificacion < 80) {
    $letra = 'C';
} elseif ($calificacion >= 60 && $calificacion < 70) {
    $letra = 'D';
} else {
    $letra = 'F';
}


$resultado = ($letra != 'F') ? 'Aprobado' : 'Reprobado';


echo "Tu calificación es $letra ($resultado).\n";


switch ($letra) {
    case 'A':
        echo "Excelente trabajo\n";
        break;
    case 'B':
        echo "Buen trabajo\n";
        break;
    case 'C':
        echo "Trabajo aceptable\n";
        break;
    case 'D':
        echo "Necesitas mejorar\n";
        break;
    case 'F':
        echo "Debes esforzarte más\n";
        break;
    default:
        echo "Calificación inválida\n";
        break;
}
?>
