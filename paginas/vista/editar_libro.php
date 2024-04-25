<!DOCTYPE html>
<html lang="es">
<?php
$ruta = "../..";
$titulo = "Aplicación de Ventas - Editar Libro";
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

        $rs_lib = $crudlibro->BuscarLibro($id_lib);

        if (!empty($rs_lib)) {
            $crudeditoriales = new CRUDEditoriales();
            $crudcategoria = new CRUDCategoria();
            $crudautores = new CRUDAutores();

            $rs_edito = $crudeditoriales->ListarEditoriales();
            $rs_cat = $crudcategoria->ListarCategoria();
            $rs_autores = $crudautores->ListarAutor();

        } else {
            header("location: listar_libro.php");
        }
    } else {
        header("location: listar_libro.php");
    }
    ?>
    <div class="container mt-3">
        <header>
            <h1 class="text-success"><i class="fas fa-pen-square"></i> Editar Libro</h1>
            <hr />
        </header>

        <nav>
            <a href="listar_libro.php" class="btn btn-outline-primary btn-sm">
                <li class="fas fa-arrow-circle-left"></li> Regresar
            </a>
        </nav>

        <section>
            <article>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <form id="frm_editar_libro" name="frm_editar_libro" method="post" action="../controlador/ctr_grabar_libro.php" autocomplete="off">
                                    <input type="hidden" id="txt_tipo" name="txt_tipo" value="e" />

                                    <div class="row g-3">
                                        <div class="col-md-4">
                                                <label for="txt_id_libro" class="form-label">Id</label>
                                                <input type="text" class="form-control" id="txt_id_libro" name="txt_id_libro" placeholder="Código" maxlength="5" autofocus value="<?= $rs_lib->id_libro ?>" />
                                        </div>

                                        <div class="col-md-8">
                                                <label for="txt_titulo" class="form-label">Titulo</label>
                                                <input type="text" class="form-control" id="txt_titulo" name="txt_titulo" placeholder="Nombre del Producto" maxlength="40" value="<?= $rs_lib->titulo ?>" />
                                        </div>

                                        <!-- dropdown -->
                                        <div class="col-md-6">
                                            <label for="txt_autor" class="form-label">Autor</label>
                                            <select class="form-select form-select-lg mb-3" id="txt_autor" name="txt_autor" >
                                                <option value="" selected>[Seleccine Autor]</option>
                                                    <?php
                                                        foreach ($rs_autores as $autor){
                                                            $selected = ($autor->nombre == $rs_lib->autor) ? 'selected' : '';
                                                    ?>
                                                        <option value="<?=$autor->id_autor?>" <?=$selected?>><?=$autor->nombre?></option>

                                                    <?php
                                                        }
                                                    ?>
                                                    
                                            </select>
                                        </div>


                                        <div class="col-md-6">
                                            <label for="txt_precio" class="form-label">Precio</label>
                                            <input type="text" class="form-control" id="txt_precio" name="txt_precio" placeholder="Precio" min="1" max="100000" step="1" value="<?= $rs_lib->precio ?>" />
                                        </div>

                                        <div class="col-md-6">
                                            <label for="txt_editorial" class="form-label">Marca</label>
                                            <select class="form-select form-select-lg mb-3" id="txt_editorial" name="txt_editorial">
                                                <option value="">[Seleccione Editorial]</option>
                                                <?php
                                                foreach ($rs_edito as $edito) {
                                                    $selected = ($edito->nombre == $rs_lib->editorial) ? 'selected' : '';
                                                ?>
                                                    <option value="<?= $edito->id_editorial ?>" <?= $selected ?>><?= $edito->nombre ?></option>
                                                <?php
                                                }
                                                ?>

                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="txt_categoria" class="form-label">Categoria</label>
                                            <select class="form-select form-select-lg mb-3" id="txt_categoria" name="txt_categoria">
                                                <option value="">[Seleccione categoria]</option>
                                                <?php
                                                foreach ($rs_cat as $cat) {
                                                    $selected = ($cat->nombre_categoria == $rs_lib->categoria) ? 'selected' : '';
                                                ?>
                                                    <option value="<?= $cat->id_categoria ?>" <?= $selected ?>><?= $cat->nombre_categoria ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>


                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-primary" id="btn_registrar_libro" name="btn_registrar_libro">
                                                <i class="fas fa-save"></i> Actualizar Informacion
                                            </button>
                                        </div>
                                    </div>
                                </form>
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