<?php

function calcular_descuento($total_compra) {
    $descuento = 0;
    
    if ($total_compra >= 1000) {
        $descuento = $total_compra * 0.15; 
    } elseif ($total_compra >= 501) {
        $descuento = $total_compra * 0.10; 
    } elseif ($total_compra >= 100) {
        $descuento = $total_compra * 0.05; 
    }
    
    return $descuento;
}


function aplicar_impuesto($subtotal) {
    $impuesto = $subtotal * 0.07; /
    return $impuesto;
}


function calcular_total($subtotal, $descuento, $impuesto) {
    $total = $subtotal - $descuento + $impuesto;
    return $total;
}
?>
