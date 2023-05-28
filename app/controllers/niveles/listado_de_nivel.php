<?php


$sql_niveles = "SELECT * FROM tb_niveles ";
$query_niveles = $pdo->prepare($sql_niveles);
$query_niveles->execute();
$niveles_datos = $query_niveles->fetchAll(PDO::FETCH_ASSOC);