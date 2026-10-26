<?php
$pizzasinsignia = [
    ["nombre" => "Pizza Margarita","categoria" => "Clasica","ingredientes" => "Pomodoro, mozarrela, albahaca y aceite de olvia","precio" => ["Personal(8pulg)"=>130,"Mediana(12pulg)"=>220,"Familiar(16pulg)"=>340,"Gigante(20pulg)"=>460], "etiqueta" => "Clasica","color" => "success", "imagen" => "imagenes/pizzamargarita.jpg"],
    ["nombre" => "Pizza Pepperoni","categoria" => "Clasica","ingredientes" => "Tomate artesanal, doble mozzarela y pepperoni","precio" => ["Personal(8pulg)"=>150,"Mediana(12pulg)"=>250,"Familiar(16pulg)"=>380,"Gigante(20pulg)"=>520], "etiqueta" => "Favorita","color" => "danger", "imagen" => "imagenes/pizzapepperoni.jpg"],
    ["nombre" => "Prosciutto di Parma","categoria" => "Gourmet","ingredientes" => "Pomodoro, morzarrela, prosciutto, rucula y parmesano","precio" => ["Personal(8pulg)"=>195,"Mediana(12pulg)"=>320,"Familiar(16pulg)"=>490,"Gigante(20pulg)"=>650], "etiqueta" => "Gourmet","color" => "warning", "imagen" => "imagenes/prosciuttodiparma.jpg"],
];

$promociones = [
    ["titulo" => "Martes de Margarita", "descripcion"=>"Disfruta una pizza Margarita mediana a menor precio", "incluye"=>"Pizza Margarita Mediana", "preciooriginal"=>220, "precio"=>187, "ahorro"=>33, "etiqueta"=>"15% descuento","icono"=>"bi-percent", "imagen" => "imagenes/pizzamargarita.jpg"],
    ["titulo" => "Plan Familiar", "descripcion"=>"Una Pizza Pepperoni familiar acompañada de dos refrescos", "incluye"=>"Pizza Pepperoni familiar + 2 refrescos", "preciooriginal"=>460, "precio"=>410, "ahorro"=>50, "etiqueta"=>"Combo para compartir","icono"=>"bi-people-fill", "imagen" => "imagenes/pizzapepperoni.jpg"],
    ["titulo" => "Noche de amigos", "descripcion"=>"Dos pizzas personales para compartir: una Margarita y una Pepperoni", "incluye"=>"Pizza Margarita personal + Pizza Pepperoni personal", "preciooriginal"=>280, "precio"=>250, "ahorro"=>30, "etiqueta"=>"Combo de dos pizzas","icono"=>"bi-gift-fill", "imagen" => "imagenes/pizzapepperoni.jpg"]
];

$testimonios = [
    ["nombre"=> "Maria", "comentario" => "Buenos sabores, comida caliente", "pedido"=>"Pizza Margarita", "estrellas"=>5],
    ["nombre"=> "Carlos", "comentario" =>"Mucho pepperoni, me gustó", "pedido"=>"Pizza Pepperoni", "estrellas"=>5],
    ["nombre"=> "Reggina", "comentario" => "Me encanta el prosciutto, me encanto la pizza", "pedido"=>"Prosciutto di Parma", "estrellas"=>5]
];
?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>DEINSA HONDURAS | Pagina Principal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <header id="inicio" class="bg-warning-subtle">
        <div class="container py-4 text-center">
            <div class="row align-items-center g-3">
                <div class="col-12 col-lg-7 d-flex align-items-center gap-3">
                    <img src="imagenes/logobellanapoli.jpg" alt="Logo de restaurante Bella Napoli" width="100" class="logo-empresa">
                    <div>
                        <h1 class="display-4 fw-bold"><i class="bi bi-fire"></i>Bella Napoli</h1>
                        <p class="lead mb-0">El autentico sabor de la comida italiana artesanal</p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
        <div class="container">
            <a href="index.php" class="navbar-brand fw-bold">Bella Napoli</a>
        
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu-principal" aria-controls="menu-principal" aria-expanded="false" aria-label="Abrir menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="menu-principal" class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto align-items-center ">
                    <li class="nav-item"><a href="index.php" class="nav-link px-3">Inicio</a></li>
                    <li class="nav-item"><a href="menu.php" class="nav-link px-3">Nuestro Menu</a></li>
                    <li class="nav-item"><a href="armapizza.php" class="nav-link px-3">Arma tu pizza</a></li>
                    <li class="nav-item"><a href="sucursales.php" class="nav-link px-3">Sucursales</a></li>
                    <li class="nav-item"><a href="pagos.php" class="nav-link px-3">Pagos</a></li>
                    <li class="nav-item"><a href="https://wa.me/50432806129" class="btn btn-warning ms-lg-3 mt-lg-0"><i class="bi bi-bag"></i>Ordenar Ahora</a></li>
                </ul>
            </div>
       </div>
    </nav>
    <main>

        <section class="container pý-5">
            <div class="row justify-content-center">
                <div class="col-lg-9 text-center">
                    <span class="badge text-danger mb-3">PIZZERIA ITALIANA ARTESANAL</span>
                    <h2 class="display-5 fw-bold">Un sabor que es toda una experiencia</h2>
                    <p class="lead my-4">Descubre nuestras pizzas elaborads con los mejores ingredientes, recetas italianas de legados y el sabor que convertira tu comida en un momento especial</p>
                    <a href="menu.php" class="btn btn-danger btn-lg me-2 mb-2"><i class="bi bi-menu"></i>Explora el menu</a>
                    <a href="armapizza.php" class="btn btn-danger btn-lg me-2 mb-2"><i class="bi bi-pizza"></i>Arma tu pizza</a>
                </div>
            </div>
        </section>
        <section class="bg-light py-5">
            <div class="container">
                <div class="text-center mb-4">
                    <h2 class="fw-bold">Nuestra Pasion por las Pizzas</h2>
                    <p class="text-secondary">Tradicion, los mejores ingredientes y preparacion artesanal</p>
                </div>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100 text-center p-4">
                            <div class="card-body">
                                <i class="bi bi-flower1 display-3 text-danger"></i>
                                <h3 class="h4 fw-bold mt-3">Los mejores ingredientes</h3>
                                <p class="text-secondary mb-0">Combinaciones de sabores pensadas para disfrutar cada bocado</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100 text-center p-4">
                            <div class="card-body">
                                <i class="bi bi-fire display-3 text-danger"></i>
                                <h3 class="h4 fw-bold mt-3">Tradición italiana</h3>
                                <p class="text-secondary mb-0">Pizzas clásicas ihechas con recetas italianas</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100 text-center p-4">
                            <div class="card-body">
                                <i class="bi bi-heart-fill display-3 text-danger"></i>
                                <h3 class="h4 fw-bold mt-3">Momentos para compartir</h3>
                                <p class="text-secondary mb-0">Opciones para disfrutar solo, con tu pareja, amigos o familia.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-5 bg-white">
            <div class="container">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3 mb-4">
                    <div>
                        <span class="text-danger fw-bold text-uppercase">Nuestras Especilidades</span>
                        <h2 class="display-6 fw-bold mb-1">Pizzas Insignia</h2>
                        <p class="text-secondary mb-0">Elegí tu favorita entre las mas pedidas</p>
                    </div>

                    <a href="menu.php" class="btn btn-outline-danger">Ver menú completo <i class="bi bi-arrow-right"></i></a>
                </div>

                <div class="row g-4">
                    <?php foreach ($pizzasinsignia as $pizza): ?>
                        <div class="col-md-6 col-lg-4">
                            <article class="card border-0 shadow-sm h-100">
                                <img src="<?= $pizza["imagen"] ?>" class="card-img-top object-fit-cover" alt="<?= $pizza['nombre'] ?>" height="240" loading="lazy" >
                                <div class="card-body d-flex flex-column">
                                    <span class="badge text-bg-danger align-self-start mb-2"><?=$pizza["etiqueta"] ?></span>
                                    <p class="small text-secondary mb-1"><?= $pizza["categoria"]?></p>
                                    <h3 class="h4 fw-bold"><?= $pizza["nombre"] ?></h3>
                                    <p class="text-secondary"><?= $pizza["ingredientes"] ?></p>
                                    <h4 class="h6 fw-bold">Precios por tamaño</h4>
                                    <ul class="list-group list-group-flush mb-3">
                                        <?php foreach ($pizza["precio"] as $tamaño => $precio): ?>
                                            <li class="list-group-item px-0 d-flex justify-content-between gap-2">
                                                <span><?=$tamaño?></span>
                                                <span class="fw-bold text-danger text-nowrap">L<?= number_format($precio, 2) ?></span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>

                                    <a href="menu.php" class="btn btn-danger mt-auto">Ver menú <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </article>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <section class="py-5">
            <div class="container">
                <div class="text-center mb-5">
                    <span class="text-danger fw-bold text-uppercase">Ofertas Especiales</span>
                    <h2 class="display-6 fw-bold">Promociones </h2>
                    <p class="text-secondary">Aprovecha de nuestras promociones a precios especiales</p>
                </div>
                <div class="row g-4">
                    <?php foreach ($promociones as $promocion): ?>
                        <div class="col-md-6 col-lg-4">
                            <article class="card h-100 border-0 shadow">
                                <img src="<?= $promocion["imagen"]?>" class="card-img-top object-fit-cover" alt="<?= $promocion["titulo"]?>" height="220" loading="lazy">
                                <div class="card-body d-flex flex-column">
                                    <span class="badge text-bg-danger align-self-start mb-3"><i class="bi <?=$promocion["icono"]?>"></i><?=$promocion["etiqueta"]?></span>
                                    <h3 class="h4 fw-bold"><?= $promocion["titulo"]?></h3>
                                    <p class="text-secondary"><?=$promocion["descripcion"]?></p>
                                    <p class="small mb-2"><i class="bi bi-bag-check text-danger"></i><?= $promocion["incluye"]?></p>
                                    <div class="mt-auto border-top pt-3">
                                        <p class="mb-0 text-secondary">Precio normal:<span class="text-decoration-line-through">L<?= number_format($promocion["preciooriginal"], 2) ?></span></p>
                                        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                                            <span class="fs-3 fw-bold text-danger">L<?= number_format($promocion["precio"], 2) ?></span>
                                            <span class="badge text-bg-success">Ahorrás L<?= number_format($promocion["ahorro"], 2) ?></span>
                                        </div>

                                        <a href="menu.php" class="btn btn-danger w-100 mt-3">Consultar ofertas!!!!!</a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    <?php endforeach; ?>
                </div>
                <p class="small text-secondary mt-3">Las promociones solo son de decoracion, aun no sirven en el calculo D:</p>
            </div>
        </section>
        <section class="py-5 bg-white">
            <div class="container">
                <div class="text-center mb-5">
                    <span class="text-danger fw-bold text-uppercase">Comentarios y opiniones</span>
                    <h2 class="display-6 fw-bold">comentarios de nuestros clientes</h2>
                    <p class="text-secondary">Nuestros clientes dicen:</p>
                </div>

                <div class="row g-4">
                    <?php foreach ($testimonios as $testimonio): ?>
                        <div class="col-md-6 col-lg-4">
                            <article class="card border-0 shadow-sm h-100">
                                <div class="card-body p-4">
                                    <div class="text-warning mb-3" aria-label="<?= (int) $testimonio["estrellas"] ?> de 5 estrellas">
                                        <?php for ($i = 0; $i < $testimonio['estrellas']; $i++): ?><!--ciclo for pa las estrellas :D-->
                                            <i class="bi bi-star-fill"></i>
                                        <?php endfor; ?>
                                    </div>
                                    <div class="mb-4">
                                        <p class="fst-italic">“<?= $testimonio["comentario"]?>”</p>
                                    </div>
                                    <h3 class="h6 fw-bold mb-1"><?=$testimonio["nombre"]?></h3>
                                    <p class="small text-secondary mb-0"><?=$testimonio["pedido"]?> </p>
                                </div>
                            </article>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <section class="bg-danger text-white py-5">
            <div class="container text-center py-3">
                <i class="bi bi-pizza display-3"></i>
                <h2 class="display-6 fw-bold mt-3">Tu próxima pizza favorita te espera</h2>
                <p class="lead mb-4">Ve nuestro menu o prepara tu proxima pizza :D</p>

                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="menu.php" class="btn btn-warning btn-lg fw-bold">Ver menú</a>
                    <a href="arma_pizza.php" class="btn btn-outline-light btn-lg">Armar mi pizza</a>
                </div>
            </div>
        </section>

    </main>
    <footer class="bg-dark text-light py-4">
        <div class="container text-center">
            <div>
                <a href="https://www.facebook.com/"  class="text-light me-3"><i class="bi bi-facebook"></i>Facebook | BellaNapoliHN</a>
                <a href="https://www.instagram.com/"  class="text-light me-3"><i class="bi bi-instagram"></i>Instagram | BellaNapoliHN</a>
                <a href="https://www.tiktok.com/"  class="text-light me-3"><i class="bi bi-tiktok"></i>Tiktok | BellaNapoliHN</a>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-6">
                    <h2 class="h4 fw-bold"><i class="bi bi-fire text-warning"></i> Bella Napoli</h2>
                    <p class="text-white-50">Sabores italianos, pizzas para compartir y momentos para recordar</p>
                </div>
                <div class="col-md-6 col-lg-6">
                    <h3 class="h5 fw-bold">Horario de atención</h3>
                    <p class="text-white-50 mb-2"><i class="bi bi-clock"></i> Lunes a domingo</p>
                    <p>11:00 a. m. – 10:00 p. m.</p>
                    <p class="text-white-50 mb-0"><i class="bi bi-geo-alt"></i> Honduras</p>
                </div>
            </div>
            <div class="text-center">
                <p class="mb-2">&copy;2026 Bella Napoli. Todos los derechos reservdos</p>
                <p class="mb-2">Pasion por la Pizzs</p>
            </div>
            
            
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>