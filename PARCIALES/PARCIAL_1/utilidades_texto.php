<?php

function contar_palabras($texto) {
    $palabras = str_word_count($texto, 1);
    return count($palabras);
}


function contar_vocales($texto) {
    $texto = strtolower($texto);
    $vocales = ['a', 'e', 'i', 'o', 'u'];
    $contador = 0;

    foreach ($vocales as $vocal) {
        $contador += substr_count($texto, $vocal);
    }

    return $contador;
}

function invertir_palabras($texto) {
    $palabras = explode(' ', $texto);
    $palabras_invertidas = array_reverse($palabras);
    return implode(' ', $palabras_invertidas);
}

echo "la cantidad de palabras que hay en el texto son:"("", $palabras)
?>
