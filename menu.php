<?php
$ids = ["Entradas" => "entradas","Pizzas Clasicas" => "pizzasclasicas","Pizzas Gourmet de la Casa" => "pizzasgourmetdelacasa","Calzones y Especialidades al Horno" => "calzonesyespecialidadesalhorno","Postres Italianos" => "postresitalianos","Bebidas" => "bebidas"];

$menu = [
     "Entradas" => [
        ["nombre" => "Pan de Ajo Supremo","descripcion" => "Pan baguette artesanal horneado con mantequilla de ajo, perejil y una capa generosa de queso mozzarella derretido.","imagen" => "imagenes/pandeajosupremo.jpg","precio" => 95],
        ["nombre" => "Bruschetta Caprese","descripcion" => "Rodajas de pan rústico tostado, cubiertas con dados de tomate fresco, albahaca, un toque de ajo y reducción de vinagre balsámico.","imagen" => "imagenes/bruschettacaprese.jpg","precio" => 110],
        ["nombre" => "Bastones de Mozzarella","descripcion" => "Dedos de queso mozzarella empanizados con especias italianas y fritos a la perfección, servidos con salsa marinara casera.","imagen" => "imagenes/bastonesdemozzarella.jpg","precio" => 135],
        ["nombre" => "Focaccia de la Casa","descripcion" => "Masa delgada y crujiente horneada con aceite de oliva extra virgen, romero fresco y sal marina.","imagen" => "imagenes/focacciadelacasa.jpg","precio" => 85],
        ["nombre" => "Papas Diabla","descripcion" => "Gajos de papa sazonados con pimentón, queso parmesano rallado y un toque sutil de pepperoncino.","imagen" => "imagenes/papasdiabla.jpg","precio" => 105]
    ],
    "Pizzas Clasicas" => [
        ["nombre" => "Pizza Margarita","descripcion" => "Salsa pomodoro de la casa, queso mozzarella rallado, albahaca fresca y aceite de oliva.","imagen" => "imagenes/pizzamargarita.jpg","precios" => ["Personal (8 pulgadas)" => 130,"Mediana (12 pulgadas)" => 220,"Familiar (16 pulgadas)" => 340,"Gigante (20 pulgadas)" => 460]],
        ["nombre" => "Pizza Pepperoni","descripcion" => "Salsa de tomate artesanal, doble porcion de queso mozzarella y pepperoni americano crujiente.","imagen" => "imagenes/pizzapepperoni.jpg","precios" => ["Personal (8 pulgadas)" => 150,"Mediana (12 pulgadas)" => 250,"Familiar (16 pulgadas)" => 380,"Gigante (20 pulgadas)" => 520]],
        ["nombre" => "Pizza Hawaiana","descripcion" => "Salsa pomodoro, queso mozzarella, jamon Virginia seleccionado y piña dulce en trozos.","imagen" => "imagenes/pizzahawaiana.jpg","precios" => ["Personal (8 pulgadas)" => 140,"Mediana (12 pulgadas)" => 235,"Familiar (16 pulgadas)" => 360,"Gigante (20 pulgadas)" => 495]],
        ["nombre" => "Pizza Cuatro Quesos","descripcion" => "Salsa de tomate, combinacion de mozzarella, gorgonzola, parmesano y provolone.","imagen" => "imagenes/pizzacuatroquesos.jpg","precios" => ["Personal (8 pulgadas)" => 165,"Mediana (12 pulgadas)" => 275,"Familiar (16 pulgadas)" => 410,"Gigante (20 pulgadas)" => 560]],
        ["nombre" => "Pizza Jamón y Hongos (Extra)","descripcion" => "Salsa pomodoro, queso mozzarella, jamón curado y champiñones frescos laminados.","imagen" => "imagenes/pizzajamonyhongosextra.jpg","precios" => ["Personal (8 pulgadas)" => 145,"Mediana (12 pulgadas)" => 240,"Familiar (16 pulgadas)" => 370,"Gigante (20 pulgadas)" => 510]]
    ],
    "Pizzas Gourmet de la Casa" => [
        ["nombre" => "Prosciutto di Parma","descripcion" => "Salsa pomodoro, mozzarella fresca, jamon prosciutto di Parma, rucula y parmesano.","imagen" => "imagenes/prosciuttodiparma.jpg","precios" => ["Personal (8 pulgadas)" => 195,"Mediana (12 pulgadas)" => 320,"Familiar (16 pulgadas)" => 490,"Gigante (20 pulgadas)" => 650]],
        ["nombre" => "Trufada Napolitana","descripcion" => "Base blanca de crema, mozzarella, champiñones salteados, aceite de trufa negra y cebollin.","imagen" => "imagenes/trufadanapolitana.jpg","precios" => ["Personal (8 pulgadas)" => 210,"Mediana (12 pulgadas)" => 345, "Familiar (16 pulgadas)" => 520,"Gigante (20 pulgadas)" => 690]],
        ["nombre" => "Frutti di Mare","descripcion" => "Salsa pomodoro, mozzarella, camarones, calamares y mejillones salteados al vino blanco.","imagen" => "imagenes/fruttidimare.jpg","precios" => ["Personal (8 pulgadas)" => 220,"Mediana (12 pulgadas)" => 360,"Familiar (16 pulgadas)" => 540,"Gigante (20 pulgadas)" => 710]],
        ["nombre" => "Carnivora Suprema","descripcion" => "Salsa pomodoro, mozzarella, carne molida sazonada, tocino ahumado, jamon y pepperoni.","imagen" => "imagenes/carnivorasuprema.jpg","precios" => ["Personal (8 pulgadas)" => 185,"Mediana (12 pulgadas)" => 295,"Familiar (16 pulgadas)" => 440,"Gigante (20 pulgadas)" => 590]],
        ["nombre" => "Pizza de Higos y Cabra (Extra)","descripcion" => "Queso de cabra, higos dulces, cebolla caramelizada, nueces y reducción de balsámico.","imagen" => "imagenes/pizzadehigosycabraextra.jpg","precios" => ["Personal (8 pulgadas)" => 190,"Mediana (12 pulgadas)" => 310,"Familiar (16 pulgadas)" => 475,"Gigante (20 pulgadas)" => 630]]
    ],
    "Calzones y Especialidades al Horno" => [
        ["nombre" => "Calzone de Carnes","descripcion" => "Masa de pizza doblada y rellena de salsa pomodoro, mozzarella, pepperoni, jamon y carne molida artesanal.","imagen" => "imagenes/calzonedecarnes.jpg","precio" => 175],
        ["nombre" => "Calzone Vegetariano","descripcion" => "Masa doblada rellena de mozzarella, champiñones, pimientos verdes, cebolla morada y aceitunas negras.","imagen" => "imagenes/calzonevegetariano.jpg","precio" => 155],
        ["nombre" => "Focaccia con Romero","descripcion" => "Pan plano horneado a la piedra con aceite de oliva extra virgen, romero fresco y escamas de sal marina.","imagen" => "imagenes/focacciaconromero.jpg","precio" => 85],
        ["nombre" => "Calzone Alfredo con Pollo (Extra)","descripcion" => "Relleno de pechuga de pollo desmenuzada, espinacas frescas y una cremosa salsa Alfredo con queso mozzarella.","imagen" => "imagenes/calzonealfredoconpolloextra.jpg","precio" => 180],
        ["nombre" => "Focaccia Caprese (Extra)","descripcion" => "Nuestra focaccia tradicional abierta a la mitad, rellena de rodajas de tomate, queso mozzarella fresco y pesto de albahaca.","imagen" => "imagenes/focacciacapreseextra.jpg","precio" => 115]
    ],
    "Postres Italianos" => [
        ["nombre" => "Tiramisú Casero","descripcion" => "Postre tradicional con capas de bizcocho húmedo en café espresso, crema de mascarpone y cacao en polvo.","imagen" => "imagenes/tiramisucasero.jpg","precio" => 115],
        ["nombre" => "Cannoli Sicilianos","descripcion" => "Tubos de masa crujiente frita rellenos de una crema dulce de queso ricotta y chispas de chocolate.","imagen" => "imagenes/cannolisicilianos.jpg","precio" => 105],
        ["nombre" => "Panna Cotta de Fresa (Extra)","descripcion" => "Postre cremoso de vainilla italiana con consistencia gelatinosa, cubierto de un coulis dulce de fresas frescas.","imagen" => "imagenes/pannacottadefresaextra.jpg","precio" => 95],
        ["nombre" => "Gelato de Pistacho (Extra)","descripcion" => "Helado artesanal cremoso de estilo italiano saborizado con pistachos tostados naturales.","imagen" => "imagenes/gelatodepistachoextra.jpg","precio" => 80],
        ["nombre" => "Calzone de Nutella (Extra)","descripcion" => "Masa horneada rellena de Nutella derretida y fresas frescas, espolvoreada con azúcar glass.","imagen" => "imagenes/calzodenutella.jpg","precio" => 140]
    ],
    "Bebidas" => [
        ["nombre" => "Bebidas Gaseosas","descripcion" => "Variedad de refrescos embotellados tradicionales de 500 ml","imagen" => "imagenes/bebidasgaseosas.jpg","precio" => 40],
        ["nombre" => "Refrescos Naturales","descripcion" => "Opciones frescas del día como limonada con menta, té frío de la casa o jugo de jamaica natural.","imagen" => "imagenes/refrescosnaturales.jpg","precio" => 55],
        ["nombre" => "Soda Italiana de Fresa (Extra)","descripcion" => "Agua carbonatada refrescante mezclada con jarabe artesanal de fresas maduras y hielo.","imagen" => "imagenes/sodaitalianadefresaextra.jpg","precio" => 65],
        ["nombre" => "Licuado de Frutos Rojos (Extra)","descripcion" => "Mezcla de fresas, moras y arándanos licuados con base de agua o leche cremosa.","imagen" => "imagenes/licuadodefrutosrojos.jpg","precio" => 75],
        ["nombre" => "Café Espresso Italiano (Extra)","descripcion" => "Extracción intensa de granos de café seleccionados, perfecta para acompañar los postres.","imagen" => "imagenes/cafeespressoitaliano.jpg","precio" => 45]
    ]
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
            <a href="index.php" class="navbar-brand  fw-bold">Bella Napoli</a>
        
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu-principal" aria-controls="menu-principa" aria-expanded="false" aria-label="Abrir menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="menu-nav" class="collapse navbar-collapse">
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
    <main class="container py-5">
        <div class="p-4 p-md-5 mb-5 text-center bg-white border rounded-4 shadow-sm">
            <p class="text-uppercase text-secondary fw-semibold mb-2">Sabor italiano en cada bocado</p>
            <h2 class="display-5 fw-bold">Nuestro menú</h2>
            <p class="lead text-secondary mb-0">Descubre tus pizzas o platos favoritos AQUI!!!!</p>
        </div>

        <div class="d-flex flex-wrap justify-content-center gap-2 mb-5">
            <?php foreach ($menu as $categoria =>$productos) : ?>
                <a class="btn btn-outline-dark rounded-pill px-3" href="#<?php echo $ids[$categoria]; ?>">
                    <?php echo $categoria; ?></a>
            <?php endforeach ?>
        </div>
        <?php foreach ($menu as $categoria => $productos):?>
            <section class="mb-5" id="<?php echo $ids[$categoria]; ?>">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-4 border-bottom pb-3">
                    <div>
                        <p class="text-secondary text-uppercase small fw-semibold mb-1">Bella Napoli</p>
                        <h2 class="fw-bold mb-0"><?php echo $categoria; ?></h2>
                    </div>
                    <span class="badge text-bg-dark rounded-pill px-3 py-2"><?php echo count($productos); ?> opciones</span>
                </div>
                <div class="row g-4">
                    <?php foreach ($productos as $producto): ?>
                        <div class="col-12 col-md-6 col-xl-4">
                            <article class="card h-100 border-0 shadow-sm">
                                <img src="<?php echo $producto["imagen"]; ?>" class="card-img-top" alt="<?php echo $producto["nombre"]; ?>">
                                <div class="card-body d-flex flex-column p-4">
                                    <h3 class="h5 fw-bold"><?php echo $producto["nombre"]; ?></h3>
                                    <p class="text-secondary"><?php echo $producto['descripcion']; ?></p>
                                    <?php if (isset($producto["precios"])): ?>
                                        <div class="table-responsive mt-auto">
                                            <table class="table table-sm table-hover align-middle mb-0">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>Tamaño</th>
                                                        <th>Precio</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($producto["precios"] as $tamaño => $precio): ?>
                                                        <tr>
                                                            <td><?php echo $tamaño; ?></td>
                                                            <td class="text-end fw-semibold">L <?php echo $precio; ?></td>
                                                        </tr>
                                                    <?php endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php else:  ?>
                                        <div class="mt-auto pt-2">
                                            <p class="fs-4 fw-bold mb-0">L <?php echo $producto["precio"] ?></p>
                                            <small class="text-secondary">Precio por unidad</small>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </article>
                        </div>
                    <?php endforeach ?>
                </div>
            </section>
        <?php endforeach ?>
        
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