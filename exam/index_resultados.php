<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../layout/parte1.php');


include('../app/controllers/exam/listado_examenes.php');



?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de Evaluaciones</h1>
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
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Material registrado</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: block;">
                            <div class="table table-responsive">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>
                                                <center>Nro</center>
                                            </th>
                                            <th>
                                                <center>Examen</center>
                                            </th>
                                            <th>
                                                <center>Calificación</center>
                                            </th>
                                            <th>
                                                <center>Usuario</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador = 1;
                                        $sql_examenes = "SELECT u.email, e.nombre_examen, c.calificacion FROM tb_calificacion c JOIN tb_examenes e ON c.id_examen = e.id_examen JOIN tb_usuarios u ON c.id_usuario = u.id_usuario";
                                        $query_examenes = $pdo->prepare($sql_examenes);
                                        $query_examenes->execute();
                                        $todosExamenes = $query_examenes->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($todosExamenes as $examen) {
                                            echo "<tr>
                                                    <td>$contador</td>
                                                    <td>" . $examen['nombre_examen'] . "</td>
                                                    <td>" . $examen['calificacion'] . "</td>
                                                    <td>" . $examen['email'] . "</td>
                                                </tr>";
                                            $contador++;
                                        }
                                        echo "</tbody></table>";

                                        /*foreach ($productos_datos as $productos_dato){
                                    ?>
                                       
                                       <td><?php echo $contador = $contador + 1; ?></td>

                                           <td><?php echo $productos_dato['examen'];?></td>
                                           <td><?php echo $productos_dato['calificacion'];?></td>                                          

                                           
                                           <td><?php echo $productos_dato['email'];?></td>
                                           <td>
                                               <center>
                                                   <div class="btn-group">
                                                   </div>
                                               </center>
                                           </td>
                                       </tr>
                                       <?php
                                   }*/
                                        ?>
                                    </tbody>
                                    </tfoot>
                                </table>
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


<?php include('../layout/mensajes.php'); ?>
<?php include('../layout/parte2.php'); ?>


<script>
    $(function() {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Roles",
                "infoEmpty": "Mostrando 0 a 0 de 0 Roles",
                "infoFiltered": "(Filtrado de _MAX_ total Roles)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Roles",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            buttons: [{
                    extend: 'collection',
                    text: 'Reportes',
                    orientation: 'landscape',
                    buttons: [{
                        text: 'Copiar',
                        extend: 'copy',
                    }, {
                        extend: 'pdf'
                    }, {
                        extend: 'csv'
                    }, {
                        extend: 'excel'
                    }, {
                        text: 'Imprimir',
                        extend: 'print'
                    }]
                },
                {
                    extend: 'colvis',
                    text: 'Visor de columnas',
                    collectionLayout: 'fixed three-column'
                }
            ],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>