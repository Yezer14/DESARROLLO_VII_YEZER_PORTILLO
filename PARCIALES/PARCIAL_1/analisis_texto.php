<?php

include 'utilidades_texto.php';

$frases = [
    'este es un ejemplo para las frases.',
    'PHP es un lenguaje de programación popular.',
    'La programación es divertida y desafiante.'
];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Análisis de Texto</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Análisis de Texto</h1>
    <table>
        <thead>
            <tr>
                <th>Frase</th>
                <th>Número de Palabras</th>
                <th>Número de Vocales</th>
                <th>Frase Invertida</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($frases as $frase): ?>
                <tr>
                    <td><?php echo htmlspecialchars($frase); ?></td>
                    <td><?php echo contar_palabras($frase); ?></td>
                    <td><?php echo contar_vocales($frase); ?></td>
                    <td><?php echo htmlspecialchars(invertir_palabras($frase)); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
