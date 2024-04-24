<!DOCTYPE html>
<html lang="es">
<?php
$ruta = "../..";
$titulo = "Aplicación de Ventas - Filtrar Productos";
include("../includes/cabecera.php");
?>

<body style="background: #2980B9;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #FFFFFF, #6DD5FA, #2980B9);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #FFFFFF, #6DD5FA, #2980B9); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
    <?php
    include("../includes/menu.php");
    ?>
    <div class="container mt-3">
        <header>
            <h1><i class="fas fa-search"></i> Filtrar Productos</h1>
            <hr />
        </header>

        <nav>
            <a href="listar_categoria.php" class="btn btn-outline-secondary btn-sm">
                <li class="fas fa-arrow-circle-left"></li> Regresar
            </a>
        </nav>

        <section>
            <article>
                <div class="row justify-content-center mt-3">
                    <div class="col-md-5">
                        <form id="frm_filtrar_prod" name="frm_filtrar_prod" method="post">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                                <input type="text" class="form-control" id="txt_valor" name="txt_valor" maxlength="40" placeholder="Valor a buscar..." autofocus />
                                <button class="btn btn-outline-success" id="btn_filtrar" name="btn_filtrar">Filtrar</button>
                                <a class="btn btn-outline-primary" href="filtrar_producto.php">Nuevo</a>
                            </div>
                        </form>

                    </div>
                </div>
            </article>
        </section>

        <div class="modal fade" id="modalResultados" tabindex="-1" aria-labelledby="modalResultadosLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                <div class="modal-content" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalResultadosLabel">Resultados del Filtrado</h5>
                    </div>
                    <div class="modal-body" id="result_filtra" style="width: 100%; overflow: auto;">
                        <table class="table table-hover table-sm table-success table-striped" style="width: 100%; margin: 0;">
                            <!-- Estructura de la tabla -->
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <?php

        include("../includes/pie.php");
        ?>
    </div>
</body>

</html>