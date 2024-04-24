<!DOCTYPE html>
<html lang="es">
<?php
$ruta = "../..";
$titulo = "Aplicacion de Ventas - Información del Producto";
include("../includes/cabecera.php");
?>

<body style="background: #2980B9;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #FFFFFF, #6DD5FA, #2980B9);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #FFFFFF, #6DD5FA, #2980B9); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
    <?php
    include("../includes/menu.php");
    include "../includes/cargar_clases.php";

    if (isset($_GET["id_cate"])) {
        $id_cate = $_GET["id_cate"];
        $crudcategoria = new CRUDCategoria();
        $rs_cate = $crudcategoria->MostrarCategoria($id_cate);

        if (empty($rs_cate)) {
            header("location : listar_producto.php");
        }
    } else {
        header("location : listar_categoria.php");
    }
    ?>
    <div class="container mt-3">
        <header>
            <h1 class="text-info">
                <i class="fas fa-info-circle"></i> Categoria
            </h1>
            <hr />
        </header>

        <nav>
            <a href="listar_categoria.php" class="btn btn-outline-secondary btn-sm">
                <i class="fas fa-arrow-circle-left"></i> Regresar
            </a>
        </nav>

        <section>
            <article>
                <div class="row justify-content-center mt-3">
                    <div class="card col-md-6">
                        <div class="card-body">
                            <div class="row g-3">

                                <div class="col-md-4">
                                    <h5 class="card-title">Id</h5>
                                    <p class="card-text"><?= $rs_cate->id_categoria?></p>
                                </div>
                                <div class="col-md-8">
                                    <h5 class="card-title">Titulo</h5>
                                    <p class="card-text"><?= $rs_cate->nombre_categoria?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </section>

        <?php
        include("../includes/pie.php");
        ?>
    </div>
</body>

</html>