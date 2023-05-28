<?php

include ('../../config.php');

$id_producto = $_POST['id_producto'];

$sentencia = $pdo->prepare("DELETE FROM tb_material WHERE id_producto=:id_producto ");

$sentencia->bindParam('id_producto',$id_producto);
if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se elimino el material de la manera correcta";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'/material/');
}else{
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo eliminar el registro en la base de datos";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/material/delete.php?id='.$id_producto);
}
