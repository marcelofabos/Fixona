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
                    <i class="fas fa-plus-circle"></i> Registrar Libro</h1>
                <hr />
            </header>

            <nav>
                <a href="listar_libro.php" class="btn btn-outline-secondary btn-sm">
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
                                    <form id="frm_regitrar_lib" name="frm_registrar_lib" method="post" action="../controlador/ctr_grabar_lib.php" autocomplete="off">
                                        <input type="hidden" id="txt_tipo" name="txt_tipo" value="r"/>

                                        <div class="row g-3">

                                            <div class="col-md-4">
                                                <label for="txt_id_libro" class="form-label">Id</label>
                                                <input type="text" class="form-control" id="txt_id_libro" name="txt_id_libro" placeholder="Id" maxlength="5" autofocus />
                                            </div>
                                            <div class="col-md-8">
                                                <label for="txt_titulo" class="form-label">Titulo</label>
                                                <input type="text" class="form-control" id="txt_titulo" name="txt_titulo" placeholder="Titulo" maxlength="40" />
                                            </div>
                                            <div class="col-md-4">
                                                <label for="txt_autor" class="form-label">Autor</label>
                                                <input type="text" class="form-control" id="txt_autor" name="txt_autor" placeholder="Autor" maxlength="5" min="1" max="9999" />
                                            </div>
                                            <div class="col-md-4">
                                                <label for="txt_precio" class="form-label">Precio</label>
                                                <input type="number" class="form-control" id="txt_precio" name="txt_precio" placeholder="Precio"  />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="cbo_editorial" class="form-label">Editorial</label>
                                                <select class="form-select form-select-lg mb-3" id="cbo_editorial" name="cbo_editorial" >
                                                    <option value="" selected>[Seleccine Editorial]</option>
                                                <?php
                                                    foreach ($rs_edito as $data ){
                                                ?>
                                                    <option value="<?=$data->id_editorial?>"><?=$data->nombre?></option>

                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="cbo_categoria" class="form-label">Categoria</label>
                                                <select class="form-select form-select-lg mb-3" id="cbo_categoria" name="cbo_categoria">
                                                    <option value="" selected>[Seleccion Categoria]</option>

                                                <?php
                                                
                                                    foreach ($rs_cat as $dato){
                                                
                                                ?>
                                                    <option value="<?=$dato->id_categoria?>"><?=$dato->nombre_categoria?></option>

                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-primary" id="btn_registrar_lib" name="btn_registrar_lib" >
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