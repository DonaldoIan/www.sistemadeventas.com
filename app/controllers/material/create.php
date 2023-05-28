<?php

include ('../../config.php');
$id_categoria = $_POST['id_categoria'];
$id_modulo = $_POST['id_modulo'];
$id_nivel = $_POST['id_nivel'];
$id_usuario = $_POST['id_usuario'];
$descripcion = $_POST['descripcion'];

$fecha_ingreso = $_POST['fecha_ingreso'];

$image = $_POST['image'];

$nombreDelArchivo = date("Y-m-d-h-i-s");
$filename = $nombreDelArchivo."__".$_FILES['image']['name'];
$location = "../../../material/img_productos/".$filename;

move_uploaded_file($_FILES['image']['tmp_name'],$location);

$sentencia = $pdo->prepare("INSERT INTO tb_material
       (descripcion, fecha_ingreso, imagen, id_usuario, id_categoria, id_modulo, id_nivel, fyh_creacion) 
VALUES (:descripcion,:fecha_ingreso,:imagen,:id_usuario,:id_categoria,:id_modulo,:id_nivel, :fyh_creacion)");

$sentencia->bindParam('descripcion',$descripcion);
$sentencia->bindParam('fecha_ingreso',$fecha_ingreso);
$sentencia->bindParam('imagen',$filename);
$sentencia->bindParam('id_usuario',$id_usuario);
$sentencia->bindParam('id_categoria',$id_categoria);
$sentencia->bindParam('id_modulo',$id_modulo);
$sentencia->bindParam('id_nivel',$id_nivel);
$sentencia->bindParam('fyh_creacion',$fechaHora);

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se registro el material de la manera correcta";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'/material/');
}else{
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en la base de datos";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/material/create.php');
}




