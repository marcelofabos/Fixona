<!DOCTYPE html>
<html lang="es">
<?php
$ruta = "../..";
$titulo = "Aplicacion de Ventas - Lista de Biblio";
include("../includes/cabecera.php");
?>

<body style="background: #2980B9;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #FFFFFF, #6DD5FA, #2980B9);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #FFFFFF, #6DD5FA, #2980B9); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */">
    <?php
    include("../includes/menu.php");
    include "../includes/cargar_clases.php";

    $crudlibro = new CRUDLibro();
    $rs_lib = $crudlibro->ListarLibro();
    ?>
    <div class="container mt-3">
        <header>
            <h1>
                <i class="fas fa-list-alt"></i> Libros
            </h1>
            <hr />
        </header>

        <nav>
            <div class="btn-group col-md-5" role="group">
                <a href="registrar_libro.php" class="btn btn-outline-primary">
                    <i class="fas fa-plus-circle"></i> Registrar
                </a>
                <a href="consultar_libro.php" class="btn btn-outline-primary">
                    <i class="fas fa-search"></i> Consultar
                </a>
                <a href="filtrar_libro.php" class="btn btn-outline-primary">
                    <i class="fas fa-filter"></i> Filtrar
                </a>
            </div>
        </nav>

        <section>
            <article>
                <div class="row justify-content-center mt-3">
                    <div class="col-md-8">
                        <table class="table table-hover table-sm table-success">
                            <tr class="table-primary">
                                <th>N°</th>
                                <th>Id</th>
                                <th>Titulo</th>
                                <th>Categoria</th>
                                <th>Precio</th>

                                <th class="text-center" colspan="3"> Acciones</th>
                            </tr>
                            <?php
                            $i = 0;
                            foreach ($rs_lib as $libro) {
                                $i++;
                            ?>
                                <tr class="reg_libro">
                                    <td><?= $i ?></td>
                                    <td class="id_lib"><?= $libro->id_libro ?></td>
                                    <td class="lib"><?= $libro->titulo ?> </td>
                                    <td><?= $libro->categoria ?></td>
                                    <td><?= $libro->precio ?></td>
                                    <td> <a href="#" class="btn_mostrar btn btn-outline-primary"><i class="fas fa-info"></i></a></td>
                                    <td> <a href="#" class="btn_editar btn btn-outline-success"><i class="fas fa-pen"></i></a></td>
                                    <td> <a href="#" class="btn_borrar btn btn-outline-danger"><i class="fas fa-trash"></i></a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </article>
        </section>

        <?php
        include("../includes/pie.php");
        ?>
    </div>


    <!--Modal Borrar-->

    <div class="modal fade" id="md_borrar" data-bs-backdrop="static" data-bs-keyboards="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-danger" id="staticBackdropLael"><i class="fas fa trash-alt"></i> Borrar Producto</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <h5 class="card-title">¿Seguro de borrar el registro?</h5>
                        <p class="card-text">
                            <span class="lbl_lib"></span> (<span class="lbl_id_lib"></span>)
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <a href="#" class="btn_borrar btn btn-outline-danger">Borrar</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>