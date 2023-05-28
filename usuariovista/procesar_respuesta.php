<?php
$respuestaSeleccionada = $_POST['respuesta'];
$respuestaCorrecta = $_POST['respuesta_correcta'];

if ($respuestaSeleccionada === $respuestaCorrecta) {
    // La respuesta es correcta
    // Sumar 10 puntos al usuario
    $puntos = 10; // Puntos a sumar

    // Aquí puedes realizar la lógica para guardar los puntos del usuario en la base de datos,
    // por ejemplo, actualizar un campo "puntos" en la tabla de usuarios.

    // Mostrar mensaje de acierto
    echo "¡Respuesta correcta! Has ganado $puntos puntos.";
} else {
    // La respuesta es incorrecta
    // Mostrar mensaje de error
    echo "Respuesta incorrecta. Inténtalo nuevamente.";
}
?>