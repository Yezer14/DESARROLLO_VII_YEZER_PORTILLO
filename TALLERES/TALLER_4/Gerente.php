<?php
require_once 'Empleado.php';
require_once 'Evaluable.php';

// Clase Gerente que hereda de Empleado e implementa Evaluable
class Gerente extends Empleado implements Evaluable {
    private $departamento;
    private $bono;

    public function __construct($nombre, $idEmpleado, $salarioBase, $departamento) {
        parent::__construct($nombre, $idEmpleado, $salarioBase);
        $this->departamento = $departamento;
        $this->bono = 0;
    }

    // Getters y Setters
    public function getDepartamento() {
        return $this->departamento;
    }

    public function setDepartamento($departamento) {
        $this->departamento = $departamento;
    }

    public function asignarBono($bono) {
        $this->bono = $bono;
    }

    public function getSalarioTotal() {
        return $this->salarioBase + $this->bono;
    }

    // Implementación del método de la interfaz Evaluable
    public function evaluarDesempenio() {
        // Lógica de evaluación de desempeño para Gerente
        return "Evaluación de desempeño para Gerente {$this->nombre}: Satisfactoria.";
    }
}
?>
