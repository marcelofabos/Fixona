<!DOCTYPE html>
<html lang="es">
<?php

$ruta = ".";
$titulo = "Aplicacion de Ventas";
include("paginas/includes/cabecera.php");


?>

<body>
    <?php
    include("paginas/includes/menu.php");
    ?>
    <div class="container mt-3">
        <header>
            <h1><i class="fas fa-university"></i> <?= $titulo ?>
            </h1>
            <hr />
        </header>


        <section>

            <article>
                <!--Carousel-->
                <div id="carouselExampleDark" class="carousel carousel-dark slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000">
                            <img src="./img/fondo3.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Marcelo Oscco Galarza</h5>
                                <p>Proyecto PHP / MYSQL</p>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <img src="./img/fondo3.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Marcelo Oscco Galarza</h5>
                                <p>Proyecto PHP / MYSQL</p>
                            </div>
                        </div>
                        <div class="carousel-item ">
                            <img src="./img/fondo3.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Marcelo Oscco Galarza</h5>
                                <p>Proyecto PHP / MYSQL</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </article>

        </section>

    </div>

    <section class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3>Envio de mensajeria por correo</h3>
                <hr>
                <br>
                <form action="" id="form">
                    <input type="email" id="email">
                    <button type="submit">Enviar</button>
                </form>
                <br>
            </div>
        </div>
    </section>


    <script src="./js/app.js"></script>
</body>

</html>