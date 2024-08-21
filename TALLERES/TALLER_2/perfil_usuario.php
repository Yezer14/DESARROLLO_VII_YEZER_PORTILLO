<?php
$nombre = "yezer_portillo";
$edad = 24;
$correo = "yezer.portillo@utp.ac.pa";
$telefono = 62475985;

define("OCUPACION","Estudiante");

$presentacion1 = "Hola, mi nombre es " . $nombre . " y tengo " . $edad . " años, mi correo es" . $correo . "y mi numero de telefono es" . $telefono .;
$presentaicon2 = "Hola, mi nombre es $nombre y tengo $edad años, mi correo es $correo y mi numero de telefono es $telefono .";

echo $presentacion1 . "<br>";
print ($presentaicon2 . "<br>");
printf ("En resumen: %s, %d años, %s, %d, %s <br>", $nombre, $edad, $correo, $telefono, OCUPACION);

var_dump ($nombre);
echo "<br>";
var_dump ($edad);
echo "<br>";
var_dump ($correo);
echo "<br>";
var_dump ($telefono);
echo "<br>";
var_dump (OCUPACION);
echo "<br>";
?>