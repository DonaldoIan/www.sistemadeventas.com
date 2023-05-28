<?php
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');

include ('../app/controllers/exam/listado_examenes.php');
include ('../app/controllers/categorias/listado_de_categoria.php');
include ('../app/controllers/modulos/listado_de_modulo.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Registro de nueva evaluación</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

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

                                    <form action="../app/controllers/exam/create.php" method="post" enctype="multipart/form-data">

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
                                                            <label for="">Modulo:</label>
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



                                                     


                                                   
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="">Usuario</label>
                                                            <input type="text" class="form-control" value="<?php echo $email_sesion; ?>" disabled>
                                                            <input type="text" name="id_usuario" value="<?php echo $id_usuario_sesion; ?>" hidden>
                                                        </div>
                                                    </div>
                                                   
                                                    

                                             
                                                    
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="">Nombre del Examen:</label>
                                                            <input type="text" name="nombre_examen" class="form-control" placeholder="" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                                    <div class="col-md-4">
                                                        <div class="form-group" id="preguntas">
                                                            <input type="button" class="btn btn-primary" onclick="agregar_preguntas()" value="Añadir pregunta">
<!--                                                             <button  class="btn btn-primary" onclick="agregar_preguntas()" >Añadir pregunta</button>
 -->                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                

                                       
                                        <div class="form-group">
                                            <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                            <button type="submit" class="btn btn-primary">Guardar evaluación</button>
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

<script>
    var contador_preguntas=1;
    function agregar_preguntas(){
        var divPregunta= document.createElement('div');
        //divPregunta.className='form-group';
        divPregunta.innerHTML =

                '<label class= "form-group">Pregunta ' + contador_preguntas+ '</label>' +
                '<textarea name="pregunta' + contador_preguntas + '" rows="2" cols="30"></textarea><br>' +
                '<b>Opciones </b>'+
                '<input type="text" name="opcion' + contador_preguntas + 'a" placeholder="Opción 1" required>' +
                '<input type="text" name="opcion' + contador_preguntas + 'b" placeholder="Opción 2" required>' +
                '<input type="text" name="opcion' + contador_preguntas + 'c" placeholder="Opción 3" required>' +
                '<input type="text" name="opcion' + contador_preguntas + 'd" placeholder="Opción 4" required>' +
                '<input type="text" name="correcta' + contador_preguntas + '" placeholder="Opción correcta" required>'+
                '<input type="text" name="contador" value="'+contador_preguntas+'"hidden>';

        contador_preguntas++;

        document.getElementById('preguntas').appendChild(divPregunta);
    }


</script>
