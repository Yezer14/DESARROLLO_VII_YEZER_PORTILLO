<?php
require_once 'Gerente.php';
require_once 'Desarrollador.php';
require_once 'Empresa.php';

// Crear instancia de Empresa
$empresa = new Empresa();

// Crear y agregar Gerente
$gerente = new Gerente("Carlos", 101, 5000, "Ventas");
$gerente->asignarBono(1000);
$empresa->agregarEmpleado($gerente);

// Crear y agregar Desarrollador
$desarrollador = new Desarrollador("Ana", 102, 4000, "PHP", "Senior");
$empresa->agregarEmpleado($desarrollador);

// Listar empleados
echo "Lista de empleados:\n";
$empresa->listarEmpleados();

// Calcular nómina total
echo "Nómina total: $" . $empresa->calcularNominaTotal() . "\n";

// Evaluar desempeño de empleados
echo "Evaluaciones de desempeño:\n";
$empresa->evaluarDesempenioEmpleados();
?>
