<?php
class Tarea {
    public $id;
    public $titulo;
    public $descripcion;
    public $estado;
    public $prioridad;
    public $fechaCreacion;
    public $tipo;

    public function __construct($data) {
        $this->id = $data['id'];
        $this->titulo = $data['titulo'];
        $this->descripcion = $data['descripcion'];
        $this->estado = $data['estado'];
        $this->prioridad = $data['prioridad'];
        $this->fechaCreacion = $data['fechaCreacion'];
        $this->tipo = $data['tipo'];
    }

    public function cambiarEstado($nuevoEstado) {
        $this->estado = $nuevoEstado;
    }
}

class TareaDesarrollo extends Tarea {
    public $lenguajeProgramacion;

    public function __construct($data) {
        parent::__construct($data);
        $this->lenguajeProgramacion = $data['lenguajeProgramacion'];
    }
}

class TareaDiseno extends Tarea {
    public $herramientaDiseno;

    public function __construct($data) {
        parent::__construct($data);
        $this->herramientaDiseno = $data['herramientaDiseno'];
    }
}

class TareaTesting extends Tarea {
    public $tipoTest;

    public function __construct($data) {
        parent::__construct($data);
        $this->tipoTest = $data['tipoTest'];
    }
}

// Nueva clase TareaBreak
class TareaBreak extends Tarea {
    public $duracion;
    public $esObligatorio;

    public function __construct($data) {
        parent::__construct($data);
        $this->duracion = $data['duracion'];
        $this->esObligatorio = $data['esObligatorio'];
    }
}

class GestorTareas {
    private $archivo = 'tareas.json';

    public function cargarTareas() {
        if (!file_exists($this->archivo)) {
            return [];
        }

        $contenidoJson = file_get_contents($this->archivo);
        $tareasData = json_decode($contenidoJson, true);

        $tareas = [];
        foreach ($tareasData as $data) {
            switch ($data['tipo']) {
                case 'Desarrollo':
                    $tareas[] = new TareaDesarrollo($data);
                    break;
                case 'Diseño':
                    $tareas[] = new TareaDiseno($data);
                    break;
                case 'Testing':
                    $tareas[] = new TareaTesting($data);
                    break;
                case 'Break':
                    $tareas[] = new TareaBreak($data);
                    break;
                default:
                    $tareas[] = new Tarea($data);
            }
        }

        return $tareas;
    }

    public function guardarTareas($tareas) {
        $tareasArray = [];
        foreach ($tareas as $tarea) {
            $tareasArray[] = (array)$tarea;
        }

        file_put_contents($this->archivo, json_encode($tareasArray, JSON_PRETTY_PRINT));
    }
}
