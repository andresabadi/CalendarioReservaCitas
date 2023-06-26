<?php 
    if(!isset($_POST['editar'])){
        header('location: index.php');
    }else{
        include('phpdocker/model/conexion.php');
        $motivo = $_POST['motivo'];
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $empresa = $_POST['empresa'];
        $fecha = $_POST['fecha'];
        $notas = $_POST['notas'];
        $id = $_POST['id2'];

        $consulta = $con -> prepare("UPDATE contactos SET motivo=?, nombre=?, email=?, telefono=? WHERE id_contacto=?;");
        $resultado = $consulta -> execute([$motivo, $nombre, $email, $telefono, $id]);

        if($resultado==true){
            header('location: index.php');
        }else{
            echo "error";
        }
    }
?>