<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'clases.php';

// Obtener la acción del query string, 'list' por defecto
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

// Variable para almacenar la tarea en edición
$tareaEnEdicion = null;

// Variables para ordenamiento y filtrado
$sortField = isset($_GET['field']) ? $_GET['field'] : 'id';
$sortDirection = isset($_GET['direction']) ? $_GET['direction'] : 'ASC';
$filterEstado = isset($_GET['filterEstado']) ? $_GET['filterEstado'] : '';

$tareas = null;
$gestorTareas = new GestorTareas();
$tareas = $gestorTareas->cargarTareas();

// Procesar la acción
switch ($action) {
    case 'add':
        if ($_GET['titulo'] && $_GET['descripcion'] && $_GET['prioridad'] && $_GET['tipo']) {
            $nuevaTarea = [
                "id" => count($tareas) + 1,
                "titulo" => $_GET['titulo'],
                "descripcion" => $_GET['descripcion'],
                "estado" => "pendiente",
                "prioridad" => $_GET['prioridad'],
                "fechaCreacion" => date('Y-m-d'),
                "tipo" => $_GET['tipo']
            ];

            switch ($_GET['tipo']) {
                case 'Desarrollo':
                    $nuevaTarea["lenguajeProgramacion"] = $_GET['lenguajeProgramacion'];
                    break;
                case 'Diseño':
                    $nuevaTarea["herramientaDiseno"] = $_GET['herramientaDiseno'];
                    break;
                case 'Testing':
                    $nuevaTarea["tipoTest"] = $_GET['tipoTest'];
                    break;
                case 'Break':
                    $nuevaTarea["duracion"] = $_GET['duracion'];
                    $nuevaTarea["esObligatorio"] = isset($_GET['esObligatorio']) ? true : false;
                    break;
            }

            $tareas[] = new Tarea($nuevaTarea);
            $gestorTareas->guardarTareas($tareas);
        }
        break;

    case 'edit':
        // Lógica para editar tarea
        break;

    case 'delete':
        // Lógica para eliminar tarea
        break;

    case 'status':
        // Lógica para cambiar el estado de una tarea
        break;

    case 'filter':
        // Lógica para filtrar tareas
        break;

    case 'list':
    default:
        // Cargar todas las tareas si no se han cargado aún
        break;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Gestor de Tareas</h1>

        <!-- Formulario para agregar/editar tarea -->
        <form action="index.php" method="GET" class="row g-3 mb-4 align-items-end">
            <input type="hidden" name="action" value="<?php echo $tareaEnEdicion ? 'edit' : 'add'; ?>">
            <?php if ($tareaEnEdicion): ?>
                <input type="hidden" name="id" value="<?php echo $tareaEnEdicion->id; ?>">
            <?php endif; ?>
            
            <div class="col">
                <input type="text" class="form-control" name="titulo" placeholder="Título" required
                       value="<?php echo $tareaEnEdicion ? $tareaEnEdicion->titulo : ''; ?>">
            </div>
            <div class="col">
                <input type="text" class="form-control" name="descripcion" placeholder="Descripción" required
                       value="<?php echo $tareaEnEdicion ? $tareaEnEdicion->descripcion : ''; ?>">
            </div>
            <div class="col">
                <select class="form-select" name="prioridad" required>
                    <option value="">Prioridad</option>
                    <?php
                    for ($i = 1; $i <= 5; $i++) {
                        $selected = ($tareaEnEdicion && $tareaEnEdicion->prioridad == $i) ? 'selected' : '';
                        echo "<option value=\"$i\" $selected>$i " . ($i == 1 ? '(Alta)' : ($i == 5 ? '(Baja)' : '')) . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col">
                <select class="form-select" name="tipo" id="tipoTarea" required>
                    <option value="">Tipo de Tarea</option>
                    <option value="Desarrollo">Desarrollo</option>
                    <option value="Diseño">Diseño</option>
                    <option value="Testing">Testing</option>
                    <option value="Break">Break</option>
                </select>
            </div>

            <!-- Campos específicos para Break -->
            <div class="col" id="campoBreak" style="display:none;">
                <input type="number" class="form-control" name="duracion" placeholder="Duración (minutos)">
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" name="esObligatorio" value="1">
                    <label class="form-check-label">Break Obligatorio</label>
                </div>
            </div>

            <div class="col">
                <button type="submit" class="btn btn-primary">Guardar Tarea</button>
            </div>
        </form>

        <!-- Tabla de Tareas -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Prioridad</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th>Fecha de Creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tareas as $tarea): ?>
                    <tr>
                        <td><?php echo $tarea->id; ?></td>
                        <td><?php echo $tarea->titulo; ?></td>
                        <td><?php echo $tarea->descripcion; ?></td>
                        <td><?php echo $tarea->prioridad; ?></td>
                        <td><?php echo $tarea->tipo; ?></td>
                        <td><?php echo $tarea->estado; ?></td>
                        <td><?php echo $tarea->fechaCreacion; ?></td>
                        <td>
                            <a href="index.php?action=edit&id=<?php echo $tarea->id; ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="index.php?action=delete&id=<?php echo $tarea->id; ?>" class="btn btn-sm btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
        // Mostrar/ocultar campos específicos basados en el tipo de tarea seleccionado
        document.getElementById('tipoTarea').addEventListener('change', function () {
            var tipoTarea = this.value;
            var campoBreak = document.getElementById('campoBreak');

            campoBreak.style.display = (tipoTarea === 'Break') ? 'block' : 'none';
        });
    </script>
</body>
</html>
