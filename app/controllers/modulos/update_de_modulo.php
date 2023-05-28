<?php

 
include ('../../config.php');

$nombre_modulo = $_GET['nombre_modulo'];
$id_modulo = $_GET['id_modulo'];

$sentencia = $pdo->prepare("UPDATE tb_modulo
    SET nombre_modulo=:nombre_modulo,
        fyh_actualizacion=:fyh_actualizacion 
    WHERE id_modulo = :id_modulo ");

$sentencia->bindParam('nombre_modulo',$nombre_modulo);
$sentencia->bindParam('fyh_actualizacion',$fechaHora);
$sentencia->bindParam('id_modulo',$id_modulo);
if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se actualizo el módulo de la manera correcta";
    $_SESSION['icono'] = "success";
    //header('Location: '.$URL.'/roles/');
    ?>
    <script>
        location.href = "<?php echo $URL;?>/modulos";
    </script>
    <?php
}else{
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo actualizar en la base de datos";
    $_SESSION['icono'] = "error";
    // header('Location: '.$URL.'/roles/update.php?id='.$id_rol);
    ?>
    <script>
        location.href = "<?php echo $URL;?>/modulos";
    </script>
    <?php
}



