<?php

include ('../../config.php');

$nombre_nivel = $_GET['nombre_nivel'];

$sentencia = $pdo->prepare("INSERT INTO tb_niveles
       ( nombre_nivel, fyh_creacion) 
VALUES (:nombre_nivel,:fyh_creacion)");

$sentencia->bindParam('nombre_nivel',$nombre_nivel);
$sentencia->bindParam('fyh_creacion',$fechaHora);
if($sentencia->execute()){
    session_start();
   // echo "se registro correctamente";
    $_SESSION['mensaje'] = "Se registro la categoría de la manera correcta";
    $_SESSION['icono'] = "success";
   // header('Location: '.$URL.'/categorias/');
    ?>
    <script>
        location.href = "<?php echo $URL;?>/niveles";
    </script>
    <?php
}else{
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en la base de datos";
    $_SESSION['icono'] = "error";
  //  header('Location: '.$URL.'/categorias');
    ?>
    <script>
        location.href = "<?php echo $URL;?>/niveles";
    </script>
    <?php
}
