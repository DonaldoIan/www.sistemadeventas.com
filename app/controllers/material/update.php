<?php

include ('../../config.php');

$id_categoria = $_POST['id_categoria'];
$id_modulo = $_POST['id_modulo'];
$id_nivel = $_POST['id_nivel'];
$id_usuario = $_POST['id_usuario'];
$descripcion = $_POST['descripcion'];
$fecha_ingreso = $_POST['fecha_ingreso'];
$id_producto = $_POST['id_producto'];
$image_text = $_POST['image_text'];


if($_FILES['image']['name'] != null){
    //echo "hay imagen nueva";
    $nombreDelArchivo = date("Y-m-d-h-i-s");
    $image_text = $nombreDelArchivo."__".$_FILES['image']['name'];
    $location = "../../../material/img_productos/".$image_text;
    move_uploaded_file($_FILES['image']['tmp_name'],$location);
}else{
   // echo "no hay imagen";
}


$sentencia = $pdo->prepare("UPDATE tb_material
    SET descripcion=:descripcion,
        fecha_ingreso=:fecha_ingreso,
        imagen=:imagen,
        id_usuario=:id_usuario,
        id_categoria=:id_categoria,
        id_modulo=:id_modulo,
        id_nivel=:id_nivel,
        fyh_actualizacion=:fyh_actualizacion 
    WHERE id_producto = :id_producto ");

$sentencia->bindParam('descripcion',$descripcion);
$sentencia->bindParam('fecha_ingreso',$fecha_ingreso);
$sentencia->bindParam('imagen',$image_text);
$sentencia->bindParam('id_usuario',$id_usuario);
$sentencia->bindParam('id_categoria',$id_categoria);
$sentencia->bindParam('id_modulo',$id_modulo);
$sentencia->bindParam('id_nivel',$id_nivel);
$sentencia->bindParam('fyh_actualizacion',$fechaHora);
$sentencia->bindParam('id_producto',$id_producto);

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se actualizo el material de la manera correcta";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'/material/');
}else{
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo actualizar en la base de datos";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/material/update.php?id='.$id_producto);
}



