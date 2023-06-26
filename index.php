<?php
    include 'phpdocker/model/conexion.php';
    $consulta = $con->query("SELECT * FROM contactos;");
    $contactos = $consulta->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Citas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container mt-3 mb-3">
    <h1 class="text-center">Agenda de Citas</h1>
    <div class="row justify-content-center align-items-center">
        <div class="col-auto">
            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#nuevaCitaModal">
                Nueva cita
            </button>
        </div>
    </div>
</div>

<!-- Modal para Nueva cita -->
<div class="modal fade" id="nuevaCitaModal" tabindex="-1" role="dialog" aria-labelledby="nuevaCitaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nuevaCitaModalLabel">Nueva cita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="crear_contacto.php" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label for="motivo">Motivo</label>
                        <input class="form-control" type="text" name="motivo" id="motivo" placeholder="Escribe el motivo de la cita" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Escribe tu nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="text" name="email" id="email" placeholder="Escribe tu correo" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input class="form-control" type="text" name="telefono" id="telefono" placeholder="Número de teléfono" required>
                    </div>
                    <div class="form-group">
                        <label for="empresa">Empresa</label>
                        <input class="form-control" type="text" name="empresa" id="empresa" placeholder="Nombre de la empresa" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha y Hora</label>
                        <input class="form-control" type="datetime-local" name="fecha" id="fecha" placeholder="Indica la hora de tu reserva" required>
                    </div>
                    <div class="form-group">
                        <label for="notas">Notas</label>
                        <input class="form-control" type="text" name="notas" id="notas" placeholder="Deja tu comentario" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Agregar Contacto" name="agregar" class="btn btn-success btn-sm mb-3 mt-2">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Citas existentes -->
<div class="container bg-primary mt-3">
    <h2 class="text-center">Citas existentes</h2>
    <div class="content">
        <table class="table table-bordered bg-dark text-white" id="mydatatable">
            <thead>
                <tr>
                    <th>Motivo</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Empresa</th>
                    <th>Fecha y Hora</th>
                    <th>Notas</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($contactos as $dato){ ?>
                <tr>
                    <td><?php echo $dato->motivo ?></td>
                    <td><?php echo $dato->nombre ?></td>
                    <td><?php echo $dato->email ?></td>
                    <td><?php echo $dato->telefono ?></td>
                    <td><?php echo $dato->empresa ?></td>
                    <td><?php echo $dato->fecha ?></td>
                    <td><?php echo $dato->notas ?></td>
                    <td><a href="editar.php?id=<?php echo $dato->id_contacto ?>" class="btn btn-warning">Editar</a></td>
                    <td><a href="eliminar.php?id=<?php echo $dato->id_contacto ?>" class="btn btn-danger">Eliminar</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#mydatatable').DataTable();
    });
</script>
</body>
</html>
