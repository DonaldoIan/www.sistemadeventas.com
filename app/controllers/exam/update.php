<?php

include ('../../config.php');

$id_categoria = $_POST['id_categoria'];
$id_modulo = $_POST['id_modulo'];
$id_usuario = $_POST['id_usuario'];
$nombre_examen = $_POST['nombre_examen'];
$id_producto = $_POST['id_examen'];




$sentencia = $pdo->prepare("UPDATE tb_examenes
    SET nombre_examen=:nombre_examen,
        id_usuario=:id_usuario,
        id_categoria=:id_categoria,
        id_modulo=:id_modulo,
    WHERE id_examen = :id_examen ");

$sentencia->bindParam('nombre_examen',$nombre_examen);
$sentencia->bindParam('id_usuario',$id_usuario);
$sentencia->bindParam('id_categoria',$id_categoria);
$sentencia->bindParam('id_modulo',$id_modulo);
$sentencia->bindParam('id_examen',$id_producto);

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se actualizo la evaluación de la manera correcta";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'/exam/');
}else{
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo actualizar en la base de datos";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/exam/update.php?id='.$id_producto);
}



