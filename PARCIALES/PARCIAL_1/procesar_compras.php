<?php

include 'funciones_tienda.php';

$productos = [
    'camisa' => 50,
    'pantalon' => 70,
    'zapatos' => 80,
    'calcetines' => 10,
    'gorra' => 25
];


$carrito = [
    'camisa' => 2,
    'pantalon' => 1,
    'zapatos' => 1,
    'calcetines' => 3,
    'gorra' => 0
];

$subtotal = 0;
foreach ($carrito as $producto => $cantidad) {
    if (isset($productos[$producto])) {
        $subtotal += $productos[$producto] * $cantidad;
    }
}


$descuento = calcular_descuento($subtotal);
$impuesto = aplicar_impuesto($subtotal);
$total_a_pagar = calcular_total($subtotal, $descuento, $impuesto);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen de Compra</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Resumen de la Compra</h1>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio Unitario</th>
                <th>Cantidad</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($carrito as $producto => $cantidad): ?>
                <?php if ($cantidad > 0): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($producto); ?></td>
                        <td><?php echo '$' . number_format($productos[$producto], 2); ?></td>
                        <td><?php echo htmlspecialchars($cantidad); ?></td>
                        <td><?php echo '$' . number_format($productos[$producto] * $cantidad, 2); ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p><strong>Subtotal:</strong> $<?php echo number_format($subtotal, 2); ?></p>
    <p><strong>Descuento aplicado:</strong> $<?php echo number_format($descuento, 2); ?></p>
    <p><strong>Impuesto (7%):</strong> $<?php echo number_format($impuesto, 2); ?></p>
    <p><strong>Total a pagar:</strong> $<?php echo number_format($total_a_pagar, 2); ?></p>
</body>
</html>
