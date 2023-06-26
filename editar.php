<?php

    if(!isset($_GET['id'])){
        echo "No se puede editar";
    }else{
        {
            include 'phpdocker/model/conexion.php';
            $id = $_GET['id'];
            $consulta = $con->prepare("SELECT * FROM contactos WHERE id_contacto=?;");
            $consulta->execute([$id]);
            $contacto = $consulta->fetch(PDO::FETCH_OBJ);
            // print_r($contactos)

        }
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de contactos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container bg-warning mt-3">
        <h1 class="text-center">Agenda de Citas</h1>
        <div class="content row justify-content-center align-items-center">
            <h2 class="text-center">Editar cita</h2>
            <div class="col-auto">
            <form action="btn_editar.php" method="POST" autocomplete="FALSE">
                <div class="form-group">              
                    <label for="nombre">Motivo
                        <input class="form-control" type="text" name="motivo" id="motivo" placeholder="Edita el motivo" value="<?php echo $contacto->motivo ?> " required>
                    </label>
                </div>
                <div class="form-group">              
                    <label for="nombre">Nombre
                        <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Edita el nombre" value="<?php echo $contacto->nombre ?> " required>
                    </label>
                </div>
                <div class="form-group">              
                    <label for="nombre">email
                        <input class="form-control" type="text" name="email" id="email" placeholder="Edita tu correo" value="<?php echo $contacto->email ?> " required>
                    </label>
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono
                        <input class="form-control" type="text" name="telefono" id="telefono" placeholder="Edita tu Telefono"  value="<?php echo $contacto->telefono ?> " required>
                    </label>
                </div>
                <div class="form-group">
                    <input type="hidden" name="id2" value="<?php echo $contacto->id_contacto ?> ">
                    <input type="submit" value="Editar" name="editar" class="btn btn-success btn-sm mb-3 mt-2">  
                </div>  
            </form>
            <a href="index.php" class="btn btn-sm btn-dark mb-3">Regresar</a>
            </div>
        </div>
    </div>
<!-- fin de crear contacto -->

<!-- crear contacto -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>