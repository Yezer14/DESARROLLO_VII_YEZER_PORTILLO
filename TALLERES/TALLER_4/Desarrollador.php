<?php
require_once 'Empleado.php';
require_once 'Evaluable.php';

// Clase Desarrollador que hereda de Empleado e implementa Evaluable
class Desarrollador extends Empleado implements Evaluable {
    private $lenguajePrincipal;
    private $nivelExperiencia;

    public function __construct($nombre, $idEmpleado, $salarioBase, $lenguajePrincipal, $nivelExperiencia) {
        parent::__construct($nombre, $idEmpleado, $salarioBase);
        $this->lenguajePrincipal = $lenguajePrincipal;
        $this->nivelExperiencia = $nivelExperiencia;
    }

    // Getters y Setters
    public function getLenguajePrincipal() {
        return $this->lenguajePrincipal;
    }

    public function setLenguajePrincipal($lenguajePrincipal) {
        $this->lenguajePrincipal = $lenguajePrincipal;
    }

    public function getNivelExperiencia() {
        return $this->nivelExperiencia;
    }

    public function setNivelExperiencia($nivelExperiencia) {
        $this->nivelExperiencia = $nivelExperiencia;
    }

    // Implementación del método de la interfaz Evaluable
    public function evaluarDesempenio() {
        // Lógica de evaluación de desempeño para Desarrollador
        return "Evaluación de desempeño para Desarrollador {$this->nombre}: Excelente.";
    }
}
?>
