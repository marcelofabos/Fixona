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

    if (isset($_GET["id_lib"])) {
        $id_lib = $_GET["id_lib"];
        $crudlibro = new CRUDLibro();
        $rs_lib = $crudlibro->MostrarLibro($id_lib);

        if (empty($rs_lib)) {
            header("location : listar_libro.php");
        }
    } else {
        header("location : listar_libro.php");
    }
    ?>
    <div class="container mt-3">
        <header>
            <h1 class="text-info">
                <i class="fas fa-info-circle"></i> Información del Libro
            </h1>
            <hr />
        </header>

        <nav>
            <a href="listar_libro.php" class="btn btn-outline-secondary btn-sm">
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
                                    <p class="card-text"><?= $rs_lib->id_libro ?></p>
                                </div>     
                                <div class="col-md-4">
                                    <h5 class="card-title">Titulo</h5>
                                    <p class="card-text"><?= $rs_lib->titulo ?></p>
                                </div>                          
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <h5 class="card-title">Autor</h5>
                                    <p class="card-text"><?= $rs_lib->autor ?></p>
                                </div>
                                <div class="col-md-8">
                                    <h5 class="card-title">Nacionalidad</h5></h5>
                                    <p class="card-text"><?= $rs_lib->nacionalidad ?></p>
                                </div>
                                <div class="col-md-4">
                                    <h5 class="card-title">Editorial</h5>
                                    <p class="card-text"><?= $rs_lib->editorial?></p>
                                </div>
                                <div class="col-md-4">
                                    <h5 class="card-title">Categoria</h5>
                                    <p class="card-text"><?= $rs_lib->categoria ?></p>
                                </div>
                                <div class="col-md-2">
                                    <h5 class="card-title">Precio</h5>
                                    <p class="card-text">S/ <?= $rs_lib->precio ?></p>
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