<?php
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');

include ('../app/controllers/material/listado_de_productos.php');
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
                    <h1 class="m-0">Registro de un nuevo material</h1>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Llene todos los datos solicitados.</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: block;">
                            <div class="row">
                                <div class="col-md-12">

                                    <form action="../app/controllers/material/create.php" method="post" enctype="multipart/form-data">

                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="row">
                                                   
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Categoría:</label>
                                                            <div style="display: flex">
                                                                <select name="id_categoria" id="" class="form-control" required>
                                                                    <?php
                                                                    foreach ($categorias_datos as $categorias_dato){ ?>
                                                                        <option value="<?php echo $categorias_dato['id_categoria']; ?>">
                                                                            <?php echo $categorias_dato['nombre_categoria']; ?>
                                                                        </option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <a href="<?php echo $URL;?>/categorias" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>



                                                     <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Módulo:</label>
                                                            <div style="display: flex">
                                                                <select name="id_modulo" id="" class="form-control" required>
                                                                    <?php
                                                                    foreach ($modulos_datos as $modulo_dato){ ?>
                                                                        <option value="<?php echo $modulo_dato['id_modulo']; ?>">
                                                                            <?php echo $modulo_dato['nombre_modulo']; ?>
                                                                        </option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <a href="<?php echo $URL;?>/modulos" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>



                                                     <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Nivel:</label>
                                                            <div style="display: flex">
                                                                <select name="id_nivel" id="" class="form-control" required>
                                                                    <?php
                                                                    foreach ($niveles_datos as $niveles_dato){ ?>
                                                                        <option value="<?php echo $niveles_dato['id_nivel']; ?>">
                                                                            <?php echo $niveles_dato['nombre_nivel']; ?>
                                                                        </option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <a href="<?php echo $URL;?>/niveles" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>


                                                   <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Usuario</label>
                                                            <input type="text" class="form-control" value="<?php echo $email_sesion; ?>" disabled>
                                                            <input type="text" name="id_usuario" value="<?php echo $id_usuario_sesion; ?>" hidden>
                                                        </div>
                                                    </div>
                                                   
                                                    

                                             
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Descripción del Material:</label>
                                                            <textarea name="descripcion" id="" cols="30" rows="2" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Fecha de ingreso:</label>
                                                            <input type="date" name="fecha_ingreso" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Subir Material</label>
                                                    <input type="file" name="image" class="form-control" id="file">
                                                    <br>
                                                    <output id="list" style=""></output>
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
                                            <button type="submit" class="btn btn-primary">Guardar material</button>
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
