<!DOCTYPE html>
<html lang="es">
    <?php
        $ruta = "../..";
        $titulo = "Aplicacion de Ventas - Registrar Producto";
        include("../includes/cabecera.php");
    ?>
    <body style="background: #2980B9;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #FFFFFF, #6DD5FA, #2980B9);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #FFFFFF, #6DD5FA, #2980B9); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
        <?php
            include("../includes/menu.php");
            include "../includes/cargar_clases.php";

            $crudeditoriales = new CRUDEditoriales();
            $crudcategoria = new CRUDCategoria();

            $rs_edito = $crudeditoriales->ListarEditorial();
            $rs_cat = $crudcategoria->ListarCategoria();
        ?>
        <div class="container mt-3">
            <header>
                <h1 class="text-primary">
                    <i class="fas fa-plus-circle"></i> Registrar Editorial</h1>
                <hr />
            </header>

            <nav>
                <a href="listar_editoriales.php" class="btn btn-outline-secondary btn-sm">
                    <i class="fas fa-arrow-circle-left"></i> Regresar
                </a>
            </nav>

            <section>
                <article>
                    <div class="row justify-content-center">
                        <div class="card col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <!--Inicio del Formulario-->
                                    <form id="frm_registrar_edit" name="frm_registrar_edit" method="post" action="../controlador/ctr_grabar_edito.php" autocomplete="off">
                                        <input type="hidden" id="txt_tipo" name="txt_tipo" value="r"/>

                                        <div class="row g-3">

                                            <div class="col-md-4">
                                                <label for="txt_id_edito" class="form-label">Id</label>
                                                <input type="text" class="form-control" id="txt_id_edito" name="txt_id_edito" placeholder="Id" maxlength="5" autofocus />
                                            </div>
                                            <div class="col-md-8">
                                                <label for="txt_nombre" class="form-label">Nombre</label>
                                                <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" placeholder="Nombre" maxlength="40" />
                                            </div>
                                            <div class="col-md-4">
                                                <label for="txt_pais" class="form-label">Pais</label>
                                                <input type="text" class="form-control" id="txt_pais" name="txt_pais" placeholder="Pais" maxlength="5" min="1" max="9999" />
                                            </div>
                                        </div><br>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-primary" id="btn_registrar_edito" name="btn_registrar_edito" >
                                                <i class="fas fa-save"></i> Grabar Informacion
                                        
                                            </button>
                                        </div>


                                    </form>
                                    <!--Fin-->
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