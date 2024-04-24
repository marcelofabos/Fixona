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

            $rs_edito = $crudeditoriales->ListarEditoriales();
            $rs_cat = $crudcategoria->ListarCategoria();
        ?>
        <div class="container mt-3">
            <header>
                <h1 class="text-primary">
                    <i class="fas fa-plus-circle"></i> Registrar Producto</h1>
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
                                    <form id="frm_regitrar_prod" name="frm_registrar_prod" method="post" action="../controlador/ctr_grabar_prod.php" autocomplete="off">
                                        <input type="hidden" id="txt_tipo" name="txt_tipo" value="r"/>

                                        <div class="row g-3">

                                            <div class="col-md-4">
                                                <label for="txt_codprod" class="form-label">Id</label>
                                                <input type="text" class="form-control" id="txt_codprod" name="txt_codprod" placeholder="Código" maxlength="5" autofocus />
                                            </div>
                                            <div class="col-md-8">
                                                <label for="txt_prod" class="form-label">Titulo</label>
                                                <input type="text" class="form-control" id="txt_prod" name="txt_prod" placeholder="Nombre del Producto" maxlength="40" />
                                            </div>
                                            <div class="col-md-4">
                                                <label for="txt_stk" class="form-label">Autor</label>
                                                <input type="number" class="form-control" id="txt_stk" name="txt_stk" placeholder="Stock" maxlength="4" min="1" max="9999" />
                                            </div>
                                            <div class="col-md-4">
                                                <label for="txt_cst" class="form-label">Nacionalidad</label>
                                                <input type="text" class="form-control" id="txt_cst" name="txt_cst" placeholder="Costo" maxlength="8" />
                                            </div>
                                            <div class="col-md-4">
                                                <label for="txt_gnc" class="form-label">Categoria</label>
                                                <input type="number" class="form-control" id="txt_gnc" name="txt_gnc" placeholder="Ganancia" maxlength="1" max="100" step="0.01" />
                                            </div>
                                            <div class="col-md-4">
                                                <label for="txt_gnc" class="form-label">Precio</label>
                                                <input type="number" class="form-control" id="txt_gnc" name="txt_gnc" placeholder="Ganancia" maxlength="1" max="100" step="0.01" />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="cbo_mar" class="form-label">Editorial</label>
                                                <select class="form-select form-select-lg mb-3" id="cbo_mar" name="cbo_mar" >
                                                    <option value="" selected>[Seleccine Marca]</option>
                                                <?php
                                                
                                                    foreach ($rs_edito as $edito){
                                                
                                                ?>
                                                    <option value="<?=$mar->codigo_marca?>"><?=$mar->marca?></option>

                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="cbo_cat" class="form-label">Categoría</label>
                                                <select class="form-select form-select-lg mb-3" id="cbo_cat" name="cbo_cat">
                                                    <option value="" selected>[Seleccion Categoria]</option>

                                                <?php
                                                
                                                    foreach ($rs_cat as $cat){
                                                
                                                ?>
                                                    <option value="<?=$cat->codigo_categoria?>"><?=$cat->categoria?></option>

                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-primary" id="btn_registrar_prod" name="btn_registrar_prod" >
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