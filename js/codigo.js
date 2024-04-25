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

    $(".reg_venta .btn_mostrar").click(function (e) {
        let id_venta = $(this).closest(".reg_venta").children(".id_venta").text();
        location.href = "mostrar_venta.php?id_venta=" + id_venta;
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

    $(".reg_venta .btn_borrar").click(function (e) {

        let id_venta = $(this).closest(".reg_venta").children(".id_venta").text();
        let venta = $(this).closest(".reg_venta").children(".venta").text();

        $("#md_borrar .lbl_id_venta").text(id_venta);
        $("#md_borrar .lbl_venta").text(venta);

        $("#md_borrar .btn_borrar").attr("href", "../controlador/ctr_borrar_ven.php?id_ven=" + id_venta);

        $("#md_borrar").modal("show");

    });

    $(document).ready(function () {
        $("#frm_filtrar_lib").submit(function (e) {
            e.preventDefault();
    
            var valor = $("#txt_valor").val();
    
            if (valor != "") {
                $.post("../controlador/ctr_filtrar_lib.php",
                { valor: valor },
                function (rpta) {
                        // Mostrar los resultados en el modal
                    $("#result_filtra").html(rpta);
                    $("#modalResultados").modal('show');
                });
            } else {
                alert("?");
                $("#txt_valor").focus();
            }
        });
    });
    $(document).ready(function () {
        $("#frm_consultar_lib #txt_id_lib").focusout(function (e) {

            e.preventDefault();
            // Capturar el valor ingresado en el cuadro de texto
            let id_lib = $(this).val();

            if (id_lib != "") {
                // Implementar la consulta por medio de AJAX para JQuery 
                $.ajax({
                    url: "../controlador/ctr_consultar_lib.php",
                    type: "POST",
                    data: { id_lib: id_lib },
                    success: function (rpta) {
                        let rp = JSON.parse(rpta);

                        if (rp) {
                            $(".id_libro").html(rp.id_libro);
                            $(".titulo").html(rp.titulo);
                            $(".autor").html(rp.autor);
                            $(".nacionalidad").html(rp.nacionalidad);
                            $(".editorial").html(rp.editorial);
                            $(".categoria").html(rp.categoria);
                            $(".precio").html("S/. " + rp.precio);


                        } else {

                            $('#md_consulta_error .modal-header').addClass('bg-gradient')
                            $("#md_consulta_error .modal-body").html('<p>El codigo <b>' + id_lib + '</b> no existe</p>');
                            $("#md_consulta_error").modal('show');

                            $("#txt_id_lib").val("");

                            let vacio = "&nbsp;";

                            $(".id_libro").html(vacio);
                            $(".titulo").html(vacio);
                            $(".autor").html(vacio);
                            $(".nacionalidad").html(vacio);
                            $(".editorial").html(vacio);
                            $(".categoria").html(vacio);
                            $(".precio").html(vacio);

                            $("#txt_id_lib").focus();
                        }
                    }
                });
            }

        });
    });
    $(document).ready(function () {
        $("#frm_consultar_ven #txt_id_venta").focusout(function (e) {

            e.preventDefault();
            // Capturar el valor ingresado en el cuadro de texto
            let id_venta = $(this).val();

            if (id_venta != "") {
                // Implementar la consulta por medio de AJAX para JQuery 
                $.ajax({
                    url: "../controlador/ctr_consultar_venta.php",
                    type: "POST",
                    data: { id_venta: id_venta },
                    success: function (rpta) {
                        let rp = JSON.parse(rpta);

                        if (rp) {
                            $(".id_venta").html(rp.id_venta);
                            $(".id_libro").html(rp.id_libro);
                            $(".titulo").html(rp.titulo);
                            $(".autor").html(rp.autor);
                            $(".nacionalidad").html(rp.nacionalidad);
                            $(".editorial").html(rp.editorial);
                            $(".categoria").html(rp.categoria);
                            $(".precio").html(rp.precio);
                            $(".cantidad_venta").html(rp.cantidad_venta);
                            $(".total").html(rp.total);


                        } else {

                            $('#md_consulta_error .modal-header').addClass('bg-gradient')
                            $("#md_consulta_error .modal-body").html('<p>El codigo <b>' + id_venta + '</b> no existe</p>');
                            $("#md_consulta_error").modal('show');

                            $("#txt_id_venta").val("");

                            let vacio = "&nbsp;";                         
                                                            
                            $(".id_venta").html(vacio);
                            $(".id_libro").html(vacio);
                            $(".titulo").html(vacio);
                            $(".autor").html(vacio);
                            $(".nacionalidad").html(vacio);
                            $(".editorial").html(vacio);
                            $(".categoria").html(vacio);
                            $(".precio").html(vacio);
                            $(".cantidad_venta").html(vacio);
                            $(".total").html(vacio);

                            $("#txt_id_venta").focus();
                        }
                    }
                });
            }

        });
    });
    $(document).ready(function () {
        $("#frm_consultar_cate #txt_id_cate").focusout(function (e) {

            e.preventDefault();
            // Capturar el valor ingresado en el cuadro de texto
            let id_cate = $(this).val();

            if (id_cate != "") {
                // Implementar la consulta por medio de AJAX para JQuery 
                $.ajax({
                    url: "../controlador/ctr_consultar_cate.php",
                    type: "POST",
                    data: { id_cate: id_cate },
                    success: function (rpta) {
                        let rp = JSON.parse(rpta);

                        if (rp) {
                            $(".id_cate").html(rp.id_categoria);
                            $(".cate").html(rp.nombre_categoria);



                        } else {

                            $('#md_consulta_error .modal-header').addClass('bg-gradient')
                            $("#md_consulta_error .modal-body").html('<p>El codigo <b>' + id_cate + '</b> no existe</p>');
                            $("#md_consulta_error").modal('show');

                            $("#txt_id_lib").val("");

                            let vacio = "&nbsp;";

                            $(".id_libro").html(vacio);
                            $(".cate").html(vacio);
                        }
                    }
                });
            }

        });
    });

    $(document).ready(function () {
        $("#frm_filtrar_cate").submit(function (e) {
            e.preventDefault();
    
            var valor = $("#txt_valor").val();
    
            if (valor != "") {
                $.post("../controlador/ctr_filtrar_cate.php",
                { valor: valor },
                function (rpta) {
                        // Mostrar los resultados en el modal
                    $("#result_filtra").html(rpta);
                    $("#modalResultados").modal('show');
                });
            } else {
                alert("?");
                $("#txt_valor").focus();
            }
        });
    });
    $(document).ready(function () {
        $("#frm_filtrar_ven").submit(function (e) {
            e.preventDefault();
    
            var valor = $("#txt_valor").val();
    
            if (valor != "") {
                $.post("../controlador/ctr_filtrar_ven.php",
                { valor: valor },
                function (rpta) {
                        // Mostrar los resultados en el modal
                    $("#result_filtra").html(rpta);
                    $("#modalResultados").modal('show');
                });
            } else {
                alert("?");
                $("#txt_valor").focus();
            }
        });
    });


})