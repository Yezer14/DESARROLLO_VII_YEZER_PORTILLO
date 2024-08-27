
<?php
// Ejemplo de uso de explode()
$frase = "Manzana,Naranja,Plátano,Uva";
$frutas = explode(",", $frase);

echo "Frase original: $frase
";
echo "Array de frutas:
";
print_r($frutas);

// Ejercicio: Crea una variable con una lista de tus 5 películas favoritas separadas por guiones (-)
// y usa explode() para convertirla en un array
$misPeliculas = "inception-interestelar-piratas del caribe-el conjuro 2-deadpool 2"; // Reemplaza esto con tu lista de películas
$arrayPeliculas = explode("-", $misPeliculas);

echo "
Mis películas favoritas:
";
print_r($arrayPeliculas);

// Bonus: Usa explode() con un límite
$texto = "carne, pollo, cerdo, atun";
$array = explode(",", $texto, 2);

echo "
Texto original: $texto
";
echo "Array con límite:
";
print_r($array);
?>
      
