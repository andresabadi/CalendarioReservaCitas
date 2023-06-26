<?php 
    if(!isset($_GET['id'])){
        header('location: index.php');
    }else{
        include('phpdocker/model/conexion.php');
        $id = $_GET['id'];

        $consulta = $con -> prepare("DELETE FROM contactos WHERE id_contacto=?;");
        $resultado = $consulta -> execute([$id]);

        if($resultado==true){
            header('location: index.php');
        }else{
            echo "error";
        }
    }
?>