<?php


include ('../../config.php');

$nombre_modulo = $_GET['nombre_modulo'];

$sentencia = $pdo->prepare("INSERT INTO tb_modulo
       ( nombre_modulo, fyh_creacion) 
VALUES (:nombre_modulo,:fyh_creacion)");

$sentencia->bindParam('nombre_modulo',$nombre_modulo);
$sentencia->bindParam('fyh_creacion',$fechaHora);
if($sentencia->execute()){
    session_start();
   // echo "se registro correctamente";
    $_SESSION['mensaje'] = "Se registro el módulo de la manera correcta";
    $_SESSION['icono'] = "success";
   // header('Location: '.$URL.'/categorias/');
    ?>
    <script>
        location.href = "<?php echo $URL;?>/modulos";
    </script>
    <?php
}else{
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en la base de datos";
    $_SESSION['icono'] = "error";
  //  header('Location: '.$URL.'/modulo');
    ?>
    <script>
        location.href = "<?php echo $URL;?>/modulos";
    </script>
    <?php
}
