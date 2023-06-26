<?php 
    if (isset($_POST['agregar'])) {
        include 'phpdocker/model/conexion.php';
        $motivo = $_POST['motivo'];
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $tfno = $_POST['telefono'];
        $empresa = $_POST['empresa'];
        $fecha = $_POST['fecha'];
        $notas = $_POST['notas'];

        $consulta = $con->prepare("INSERT INTO contactos(motivo,nombre,email,telefono,empresa,fecha,notas) VALUES(?,?,?,?,?,?,?);");
        $resultado = $consulta->execute([$motivo,$nombre,$email,$tfno,$empresa,$fecha,$notas]);
        if($resultado==true){
            header("location: index.php");
        }else{
            echo "No se pudo cargar el contacto";
        }

    }
?>