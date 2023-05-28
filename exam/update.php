<?php
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');

include ('../app/controllers/exam/cargar_examen.php');
include ('../app/controllers/categorias/listado_de_categoria.php');
include ('../app/controllers/modulos/listado_de_modulo.php');




?>


<?php

    if(isset($_GET['idpregunta'])){
        $id_pregunta_get = $_GET['idpregunta'];
        $preguntaEditada = $_POST['pregunta'];
        $opcion1Editada = $_POST['opcion1'];
        $opcion2Editada = $_POST['opcion2'];
        $opcion3Editada = $_POST['opcion3'];
        $opcion4Editada = $_POST['opcion4'];
        $opcionCorrectaEditada = $_POST['correcta'];

        /* echo "ID pregunta: ".$id_pregunta_get;
        echo "CORRECTA: ".$opcionCorrectaEditada;
        echo "opcion1: ".$opcion1Editada;
        echo "opcion2: ".$opcion2Editada;
        echo "opcion3: ".$opcion3Editada;
        echo "opcion4: ".$opcion4Editada; */
        /* $query = "UPDATE tb_preguntas
        SET pregunta='$preguntaEditada',
            opcion1='$opcion1Editada',
            opcion2='$opcion2Editada',
            opcion3='$opcion3Editada',
            opcion4='$opcion4Editada',
            correcta='$opcionCorrectaEditada'
        WHERE id_pregunta = '$id_pregunta_get'";
        echo "\n EL QUERY ES $query\n"; */
        $update_pregunta = $pdo->prepare("UPDATE tb_preguntas
            SET pregunta=:pregunta,
                opcion1=:opcion1,
                opcion2=:opcion2,
                opcion3=:opcion3,
                opcion4=:opcion4,
                correcta=:correcta
            WHERE id_pregunta = :id_pregunta ");

        $update_pregunta->bindParam('id_pregunta',$id_pregunta_get);
        $update_pregunta->bindParam('pregunta',$preguntaEditada);
        $update_pregunta->bindParam('opcion1',$opcion1Editada);
        $update_pregunta->bindParam('opcion2',$opcion2Editada);
        $update_pregunta->bindParam('opcion3',$opcion3Editada);
        $update_pregunta->bindParam('opcion4',$opcion4Editada);
        $update_pregunta->bindParam('correcta',$opcionCorrectaEditada);
        $update_pregunta->execute();
        //header('Location: '.$URL.'/exam/update.php?id='.$id_producto_get);
        //echo "LA PREGUNTA EDITADA SERÁ: ".$preguntaEditada;
        //header("Location: ".$_SERVER['PHP_SELF']);

    }
 
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Actualizar evaluación</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Llene los datos con cuidado</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: block;">
                            <div class="row">
                                <div class="col-md-12">

                                    <form action="../app/controllers/exam/update.php" method="post" enctype="multipart/form-data">
                                        <input type="text" value="<?php echo $id_producto_get; ?>" name="id_examen" hidden>

                                       
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Categoría:</label>
                                                            <div style="display: flex">
                                                                <select name="id_categoria" id="" class="form-control" required>
                                                                    <?php
                                                                    foreach ($categorias_datos as $categorias_dato){
                                                                        $nombre_categoria_tabla = $categorias_dato['nombre_categoria'];
                                                                        $id_categoria = $categorias_dato['id_categoria']?>
                                                                        <option value="<?php echo $id_categoria; ?>"<?php if($nombre_categoria_tabla == $nombre_categoria){ ?> selected="selected" <?php } ?> >
                                                                            <?php echo $nombre_categoria_tabla;?>
                                                                        </option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>

                                                   <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Modulo:</label>
                                                            <div style="display: flex">
                                                                <select name="id_modulo" id="" class="form-control" required>
                                                                    <?php
                                                                    foreach ($modulos_datos as $modulo_datos){
                                                                        $nombre_modulo_tabla = $modulo_datos['nombre_modulo'];
                                                                        $id_modulo = $modulo_datos['id_modulo']?>
                                                                        <option value="<?php echo $id_modulo; ?>"<?php if($nombre_modulo_tabla == $nombre_modulo){ ?> selected="selected" <?php } ?> >
                                                                            <?php echo $nombre_modulo_tabla;?>
                                                                        </option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>


                                                  

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Usuario</label>
                                                            <input type="text" class="form-control" value="<?php echo $email; ?>" disabled>
                                                            <input type="text" name="id_usuario" value="<?php echo $id_usuario; ?>" hidden>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="">Nombre del Examen:</label>
                                                            <input type="text" value= "<?php echo $nombre_examen?>" name="nombre_examen" class="form-control" placeholder="" required>
                                                        </div>
                                                    </div>
                                                </div>


                                                  


                                              
                                               
  
                                        <div class="form-group">
                                            <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                            <button type="submit" class="btn btn-success">Actualizar evaluación</button>
                                        </div>
                                    </form>

                                    <div class="row">
                                                    <?php
                                                        $contador = 0;
                                                        $sql_examen= "SELECT * FROM tb_preguntas WHERE id_examen=".$id_producto_get;
                                                        $query_exam= $pdo->prepare($sql_examen);
                                                        $query_exam->execute();
                                                        $preguntas = $query_exam->fetchAll(PDO::FETCH_ASSOC);
                                                        
                                                        echo "<table>
                                                        <thead>
                                                            <tr>
                                                                <th>No.</th>
                                                                <th>Pregunta</th>
                                                                <th>Opción 1</th>
                                                                <th>Opción 2</th>
                                                                <th>Opción 3</th>
                                                                <th>Opción 4</th>
                                                                <th>Opción correcta</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>";
                                                        foreach ($preguntas as $pregunta){
                                                            $contador++;
                                                            //    <form action='update.php?id=".$id_producto_get."&idpregunta=".$pregunta['id_pregunta']."' method='post' enctype='multipart/form-data'>

                                                            echo "
                                                                <tr>
                                                                <form action='update.php?id=".$id_producto_get."&idpregunta=".$pregunta['id_pregunta']."' method='post' enctype='multipart/form-data'>

                                                                    <td>$contador</td>
                                                                    <td><input type='text' name='pregunta' value='".$pregunta['pregunta']."'></td>
                                                                    <td><input type='text' name='opcion1' value='".$pregunta['opcion1']."'></td>
                                                                    <td><input type='text' name='opcion2' value='".$pregunta['opcion2']."'></td>
                                                                    <td><input type='text' name='opcion3' value='".$pregunta['opcion3']."'></td>
                                                                    <td><input type='text' name='opcion4' value='".$pregunta['opcion4']."'></td>
                                                                    <td><input type='text' name='correcta' value='".$pregunta['correcta']."'></td>
                                                                    <tr><td><input type='submit' value='EDITAR'></td></tr>
                                                                    </form>
                                                                </tr>
                                                            ";
                                                        }
                                                        echo "</tbody></table>";




                                                        
                                                        //echo "<p>PREGUNTA: $examenActual</p>";
                                                    ?>
                                                                    
                                                </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include ('../layout/mensajes.php'); ?>
<?php include ('../layout/parte2.php'); ?>

