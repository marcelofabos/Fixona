$(function () {
    $(".reg_producto .btn_mostrar").click(function (e) {
        let codprod = $(this).closest(".reg_producto").children(".codprod").text();
        location.href = "mostrar_producto.php?codprod=" + codprod;
    })
    $(".reg_libro .btn_mostrar").click(function (e) {
        let id_lib = $(this).closest(".reg_libro").children(".id_lib").text();
        location.href = "mostrar_libro.php?id_lib=" + id_lib;
    })

    $(".reg_categoria .btn_mostrar").click(function (e) {
        let id_cate = $(this).closest(".reg_categoria").children(".id_cate").text();
        location.href = "mostrar_categoria.php?id_cate=" + id_cate;
    })



    $(".reg_producto .btn_editar").click(function (e) {
        let codprod = $(this).closest(".reg_producto").children(".codprod").text();
        location.href = "editar_producto.php?codprod=" + codprod;
    });

    $(".reg_libro .btn_editar").click(function (e) {
        let id_lib = $(this).closest(".reg_libro").children(".id_lib").text();
        location.href = "editar_libro.php?id_lib=" + id_lib;
    });

    $(".reg_categoria .btn_editar").click(function (e) {
        let id_cate = $(this).closest(".reg_categoria").children(".id_cate").text();
        location.href = "editar_categoria.php?id_cate=" + id_cate;
    });

    

    $(".reg_producto .btn_borrar").click(function (e) {

        let codprod = $(this).closest(".reg_producto").children(".codprod").text();
        let prod = $(this).closest(".reg_producto").children(".prod").text();

        $("#md_borrar .lbl_codprod").text(codprod);
        $("#md_borrar .lbl_prod").text(prod);


        $("#md_borrar .btn_borrar").attr("href", "../controlador/ctr_borrar_prod.php?codprod=" + codprod);

        $("#md_borrar").modal("show");

    });

    $(".reg_categoria .btn_borrar").click(function (e) {

        let id_cate = $(this).closest(".reg_categoria").children(".id_cate").text();
        let categoria = $(this).closest(".reg_categoria").children(".categoria").text();

        $("#md_borrar .lbl_id_cate").text(id_cate);
        $("#md_borrar .lbl_categoria").text(categoria);


        $("#md_borrar .btn_borrar").attr("href", "../controlador/ctr_borrar_cate.php?id_cate=" + id_cate);

        $("#md_borrar").modal("show");

    });

    $(".reg_libro .btn_borrar").click(function (e) {

        let id_lib = $(this).closest(".reg_libro").children(".id_lib").text();
        let lib = $(this).closest(".reg_libro").children(".lib").text();

        $("#md_borrar .lbl_id_lib").text(id_lib);
        $("#md_borrar .lbl_lib").text(lib);


        $("#md_borrar .btn_borrar").attr("href", "../controlador/ctr_borrar_lib.php?id_lib=" + id_lib);

        $("#md_borrar").modal("show");

    });







})