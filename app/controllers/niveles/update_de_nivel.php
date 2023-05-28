<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 25/1/2023
 * Time: 15:03
 */

include ('../../config.php');

$nombre_nivel = $_GET['nombre_nivel'];
$id_nivel = $_GET['id_nivel'];

$sentencia = $pdo->prepare("UPDATE tb_niveles
    SET nombre_nivel=:nombre_nivel,
        fyh_actualizacion=:fyh_actualizacion 
    WHERE id_nivel = :id_nivel ");

$sentencia->bindParam('nombre_nivel',$nombre_nivel);
$sentencia->bindParam('fyh_actualizacion',$fechaHora);
$sentencia->bindParam('id_nivel',$id_nivel);
if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se actualizo el nivel de la manera correcta";
    $_SESSION['icono'] = "success";
    //header('Location: '.$URL.'/roles/');
    ?>
    <script>
        location.href = "<?php echo $URL;?>/niveles";
    </script>
    <?php
}else{
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo actualizar en la base de datos";
    $_SESSION['icono'] = "error";
    // header('Location: '.$URL.'/roles/update.php?id='.$id_rol);
    ?>
    <script>
        location.href = "<?php echo $URL;?>/niveles";
    </script>
    <?php
}



