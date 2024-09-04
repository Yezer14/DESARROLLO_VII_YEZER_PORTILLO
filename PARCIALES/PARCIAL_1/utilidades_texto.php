<?php

function contar_palabras($texto){
    return count($texto)
}

function contar_vocales($texto){
    return in_array(strtolower($palabra[0]), ['a', 'e', 'i', 'o', 'u']);
}