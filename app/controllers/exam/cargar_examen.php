<?php


$id_producto_get = $_GET['id'];

$sql_productos = "SELECT *, cat.nombre_categoria as categoria, u.email as email, u.id_usuario as id_usuario, 
                     m.nombre_modulo as modulo
                  FROM tb_examenes as a 
                  INNER JOIN tb_categorias as cat ON a.id_categoria = cat.id_categoria
                  INNER JOIN tb_modulo as m ON a.id_modulo = m.id_modulo
                  INNER JOIN tb_usuarios as u ON u.id_usuario = a.id_usuario
                   WHERE id_examen = '$id_producto_get'";

$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();
$productos_datos = $query_productos->fetchAll(PDO::FETCH_ASSOC);

foreach ($productos_datos as $productos_dato){
    $nombre_categoria = $productos_dato['nombre_categoria'];
    $nombre_modulo = $productos_dato['nombre_modulo'];
    $email = $productos_dato['email'];
    $id_usuario = $productos_dato['id_usuario'];
    $nombre_examen = $productos_dato['nombre_examen'];
}
