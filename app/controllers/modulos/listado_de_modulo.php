<?php


$sql_modulo = "SELECT * FROM tb_modulo ";
$query_modulo = $pdo->prepare($sql_modulo);
$query_modulo->execute();
$modulos_datos = $query_modulo->fetchAll(PDO::FETCH_ASSOC);