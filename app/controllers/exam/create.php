<?php

include('../../config.php');
$id_categoria = $_POST['id_categoria'];
$id_modulo = $_POST['id_modulo'];
$id_usuario = $_POST['id_usuario'];
$nombre_examen = $_POST['nombre_examen'];


$sentencia = $pdo->prepare("INSERT INTO tb_examenes
       (nombre_examen,id_usuario, id_categoria, id_modulo) 
VALUES (:nombre_examen,:id_usuario,:id_categoria,:id_modulo)");

$sentencia->bindParam('nombre_examen', $nombre_examen);
$sentencia->bindParam('id_usuario', $id_usuario);
$sentencia->bindParam('id_categoria', $id_categoria);
$sentencia->bindParam('id_modulo', $id_modulo);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se registro el material de la manera correcta";
    $_SESSION['icono'] = "success";
    $sql_examen = "SELECT * FROM tb_examenes ORDER BY id_examen DESC LIMIT 1";
    $query_exam = $pdo->prepare($sql_examen);
    $query_exam->execute();
    $examen = $query_exam->fetchAll(PDO::FETCH_ASSOC);
    $examenActual = $examen[0]['id_examen'];

    $num_preguntas = $_POST['contador'];
    for ($i = 1; $i <= $num_preguntas; $i++) {
        $pregunta = $_POST['pregunta' . $i];
        $opcion1 = $_POST['opcion' . $i . 'a'];
        $opcion2 = $_POST['opcion' . $i . 'b'];
        $opcion3 = $_POST['opcion' . $i . 'c'];
        $opcion4 = $_POST['opcion' . $i . 'd'];
        $opcionCorrecta = $_POST['correcta' . $i];

        $insertar = $pdo->prepare("INSERT INTO tb_preguntas
                (pregunta,opcion1, opcion2, opcion3, opcion4,correcta,id_examen) 
        VALUES (:pregunta,:opcion1,:opcion2,:opcion3,:opcion4,:correcta,:id_examen)");

        $insertar->bindParam('pregunta', $pregunta);
        $insertar->bindParam('opcion1', $opcion1);
        $insertar->bindParam('opcion2', $opcion2);
        $insertar->bindParam('opcion3', $opcion3);
        $insertar->bindParam('opcion4', $opcion4);
        $insertar->bindParam('correcta', $opcionCorrecta);
        $insertar->bindParam('id_examen', $examenActual);
        $insertar->execute();
    };
    header('Location: ' . $URL . '/exam/');
} else {
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en la base de datos";
    $_SESSION['icono'] = "error";
    header('Location: ' . $URL . '/exam/create.php');
}
