<?php
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');

include ('../app/controllers/material/cargar_producto.php');
include ('../app/controllers/categorias/listado_de_categoria.php');
include ('../app/controllers/modulos/listado_de_modulo.php');
include ('../app/controllers/niveles/listado_de_nivel.php');




?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Actualizar material</h1>
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

                                    <form action="../app/controllers/material/update.php" method="post" enctype="multipart/form-data">
                                        <input type="text" value="<?php echo $id_producto_get; ?>" name="id_producto" hidden>

                                       
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


                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Nivel:</label>
                                                            <div style="display: flex">
                                                                <select name="id_nivel" id="" class="form-control" required>
                                                                    <?php
                                                                    foreach ($niveles_datos as $niveles_datos){
                                                                        $nombre_nivel_tabla = $niveles_datos['nombre_nivel'];
                                                                        $id_nivel = $niveles_datos['id_nivel']?>
                                                                        <option value="<?php echo $id_nivel; ?>"<?php if($nombre_nivel_tabla == $nombre_nivel){ ?> selected="selected" <?php } ?> >
                                                                            <?php echo $nombre_nivel_tabla;?>
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
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="">Descripción del material:</label>
                                                            <textarea name="descripcion" id="" cols="30" rows="2" class="form-control"><?php echo $descripcion;?></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                               


                                                
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Fecha de ingreso:</label>
                                                            <input type="date" name="fecha_ingreso" value="<?= $fecha_ingreso; ?>" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Imagen del producto</label>
                                                    <input type="file" name="image" class="form-control" id="file">
                                                    <input type="text" name="image_text" value="<?php echo $imagen; ?>" hidden>
                                                    <br>
                                                    <output id="list" style="">
                                                        <img src="<?php echo $URL."/material/img_productos/".$imagen; ?>" width="100%" alt="">
                                                    </output>
                                                    <script>
                                                        function archivo(evt) {
                                                            var files = evt.target.files; // FileList object
                                                            // Obtenemos la imagen del campo "file".
                                                            for (var i = 0, f; f = files[i]; i++) {
                                                                //Solo admitimos imágenes.
                                                                if (!f.type.match('image.*')) {
                                                                    continue;
                                                                }
                                                                var reader = new FileReader();
                                                                reader.onload = (function (theFile) {
                                                                    return function (e) {
                                                                        // Insertamos la imagen
                                                                        document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="',e.target.result, '" width="100%" title="', escape(theFile.name), '"/>'].join('');
                                                                    };
                                                                })(f);
                                                                reader.readAsDataURL(f);
                                                            }
                                                        }
                                                        document.getElementById('file').addEventListener('change', archivo, false);
                                                    </script>
                                                </div>
                                            </div>
                                        </div>





                                        <hr>
                                        <div class="form-group">
                                            <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                            <button type="submit" class="btn btn-success">Actualizar material</button>
                                        </div>
                                    </form>
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
