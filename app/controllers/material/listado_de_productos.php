<?php


$sql_productos = "SELECT *, cat.nombre_categoria as categoria, 
u.email as email,
 m.nombre_modulo as modulo,
 r.nombre_nivel as nivel
 FROM tb_material as a 
 INNER JOIN tb_categorias as cat ON a.id_categoria = cat.id_categoria 
 INNER JOIN tb_modulo as m ON a.id_modulo = m.id_modulo 
 INNER JOIN tb_niveles as r ON a.id_nivel = r.id_nivel 
 INNER JOIN tb_usuarios as u ON u.id_usuario = a.id_usuario";
 
$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();
$productos_datos = $query_productos->fetchAll(PDO::FETCH_ASSOC);



?>
