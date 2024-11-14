<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de tareas</title>
    <!-- Estilos existentes -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- Fuente de Google -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        /* Estilos para el body */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .container {
            max-width: 1200px;
            padding: 2rem;
            background-color: white;
            box-shadow: 0 0 20px rgba(0,0,0,0.05);
            border-radius: 15px;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        /* Esstilos para la cabecera */
        header {
            border-bottom: 2px solid #f0f0f0;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
        }

        header h1 {
            color: #2c3e50;
            font-weight: 600;
        }

        /* Botones principales */
        .btn-primary {
            background-color: #3498db;
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }

        .btn-success {
            background-color: #2ecc71;
            border: none;
        }

        .btn-warning {
            background-color: #f1c40f;
            border: none;
            color: #2c3e50;
        }

        /* Tabla estilada */
        .table {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0,0,0,0.03);
        }

        .table thead th {
            background-color: #2c3e50;
            color: white;
            font-weight: 500;
            border: none;
            padding: 1rem;
        }

        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
        }

        /* Modales */
        .modal-content {
            border-radius: 15px;
            border: none;
            box-shadow: 0 0 30px rgba(0,0,0,0.1);
        }

        .modal-header {
            background-color: #f8f9fa;
            border-bottom: 2px solid #eee;
            border-radius: 15px 15px 0 0;
        }

        .modal-title {
            color: #2c3e50;
            font-weight: 600;
        }

        /* Form estilos */
        .form-control {
            border-radius: 8px;
            border: 2px solid #eee;
            padding: 0.7rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #3498db;
            box-shadow: none;
        }

        /* Estados de tareas */
        .badge-completed {
            background-color: #2ecc71;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 6px;
        }

        .badge-pending {
            background-color: #f1c40f;
            color: #2c3e50;
            padding: 0.5rem 1rem;
            border-radius: 6px;
        }

        /* prueba mediaquery para hacerlo responsivo */
        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            .btn {
                width: 100%;
                margin-bottom: 0.5rem;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <header>
        <h1 class="my-4">Gestión de tareas</h1>
    </header>


    <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#crearTareaModal" role="button">Crear Tarea</a>
    <button id="marcarCompletadas" class="btn btn-success">Marcar Completadas</button>
    <button id="marcarPendientes" class="btn btn-warning">Marcar Pendientes</button>

    <div>

        <h1 class='text-center'>Lista de Tareas</h1>
        <div class='table-responsive'>
            <table id='tareasTable' class='table table-striped table-bordered'>
                <thead class='thead-dark'>
                <tr class='text-center'>
                    <th><input type="checkbox" id="selectAll"></th>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Completado</th>
                    <th>Fecha de Registro</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <!-- Aquí se insertarán las tareas desde el archivo home.js-->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal para Crear Tarea -->
<div class="modal fade" id="crearTareaModal" tabindex="-1" aria-labelledby="crearTareaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crearTareaModalLabel">Crear Tarea</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="crearTareaForm">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="completado" class="form-label">Completado</label>
                        <select class="form-control" id="completado" name="completado" required>
                            <option value="0">Pendiente</option>
                            <option value="1">Completada</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Editar Tarea -->
<div class="modal fade" id="editarTareaModal" tabindex="-1" aria-labelledby="editarTareaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarTareaModalLabel">Editar Tarea</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editarTareaForm">
                    <input type="hidden" id="editId" name="id">
                    <div class="mb-3">
                        <label for="editTitulo" class="form-label">Título</label>
                        <input type="text" class="form-control" id="editTitulo" name="titulo" required>
                    </div>
                    <div class="mb-3">
                        <label for="editDescripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="editDescripcion" name="descripcion" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editCompletado" class="form-label">Completado</label>
                        <select class="form-control" id="editCompletado" name="completado" required>
                            <option value="0">Pendiente</option>
                            <option value="1">Completada</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Incluye el JS de jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Incluye el JS de DataTables -->
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<!-- Incluye el JS de DataTables con Bootstrap 5 -->
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<!-- Incluye el JS de Bootstrap 5.3.2 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Incluye el JS personalizado -->
<script src="Views/js/home.js"></script>
<!-- Incluye el JS de SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

</body>
</html>
