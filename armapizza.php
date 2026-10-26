
<?php
$pizzas = [
    "margarita" => ["nombre" => "Pizza Margarita", "descripcion" => "Salsa pomodoro, mozzarella, albahaca fresca y aceite de oliva.","mediana" => 220 ],
    "pepperoni" => ["nombre" => "Pizza Pepperoni","descripcion" => "Salsa de tomate, doble mozzarella y pepperoni americano.","mediana" => 250],
    "hawaiana" => ["nombre" => "Pizza Hawaiana","descripcion" => "Salsa pomodoro, mozzarella, jamón Virginia y piña.", "mediana" => 235],
    "cuatroquesos" => ["nombre" => "Pizza Cuatro Quesos","descripcion" => "Mozzarella, gorgonzola, parmesano y provolone.", "mediana" => 275],
    "jamonyhongos" => ["nombre" => "Pizza Jamón y Hongos","descripcion" => "Salsa pomodoro, mozzarella, jamón curado y champiñones.","mediana" => 240],
    "prosciutto" => ["nombre" => "Prosciutto di Parma","descripcion" => "Mozzarella fresca, prosciutto, rúcula y parmesano.","mediana" => 320],
    "trufada" => ["nombre" => "Trufada Napolitana","descripcion" => "Base de crema, mozzarella, champiñones y aceite de trufa.","mediana" => 345],
    "fruttidimare" => ["nombre" => "Frutti di Mare","descripcion" => "Salsa pomodoro, mozzarella, camarones, calamares y mejillones.","mediana" => 360],
    "carnivora" => ["nombre" => "Carnivora Suprema","descripcion" => "Mozzarella, carne molida, tocino, jamón y pepperoni.","mediana" => 295],
    "higosycabra" => ["nombre" => "Pizza de Higos y Cabra","descripcion" => "Queso de cabra, higos, cebolla caramelizada, nueces y balsámico.","mediana" => 310]
];

$tamanos = [
    "personal" => ["nombre" => "Personal (8 pulgadas)", "precio" => 130],
    "mediana" => ["nombre" => "Mediana (12 pulgadas)", "precio" => 220],
    "familiar" => ["nombre" => "Familiar (16 pulgadas)", "precio" => 340],
    "gigante" => ["nombre" => "Gigante (20 pulgadas)", "precio" => 460]
];

$ingredientes = [
    "pepperoni" => ["nombre" => "Pepperoni adicional", "precio" => 25],
    "jamon" => ["nombre" => "Jamón adicional", "precio" => 20],
    "hongos" => ["nombre" => "Champiñones adicionales", "precio" => 15],
    "aceitunas" => ["nombre" => "Aceitunas", "precio" => 10],
    "pina" => ["nombre" => "Piña", "precio" => 15],
    "tocino" => ["nombre" => "Tocino adicional", "precio" => 25],
    "pimientos" => ["nombre" => "Pimientos", "precio" => 15],
    "cebolla" => ["nombre" => "Cebolla adicional", "precio" => 10],
    "queso" => ["nombre" => "Queso extra", "precio" => 30]
];

$pedidoenviado = false;
$mensaje = "";
$total = 0;
$pizzaelegida = "margarita";
$tamanoelegido = "personal";
$masa = "tradicional";
$salsa = "pomodoro";
$queso = "mozzarella";
$extras = [];

if ($_SERVER["REQUEST_METHOD"] == "POST"):
    $pizzaelegida = $_POST["pizza"] ?? "";
    $tamanoelegido = $_POST["tamano"] ?? "";
    $masa = $_POST["masa"] ?? "";
    $salsa = $_POST["salsa"] ?? "";
    $queso = $_POST["queso"] ?? "";
    $extras = $_POST["extras"] ?? [];
    if (
        isset($pizzas[$pizzaelegida]) &&
        isset($tamanos[$tamanoelegido]) &&
        in_array($masa, ["tradicional", "delgada", "gruesa"]) &&
        in_array($salsa, ["pomodoro", "alfredo", "pesto", "barbacoa"]) &&
        in_array($queso, ["mozzarella", "cuatroquesos", "cabra"]) &&
        is_array($extras)
    ):
        $pedidoenviado = true;
        $preciobase = $tamanos[$tamanoelegido]["precio"];
        $diferencia = $pizzas[$pizzaelegida]["mediana"] - 220;
        $total = $preciobase + $diferencia;
        foreach ($extras as $extra):
            if (isset($ingredientes[$extra])):
                $total = $total + $ingredientes[$extra]["precio"];
            endif;
        endforeach;
        $extrasvalidos = [];
        foreach ($extras as $extra):
            if (isset($ingredientes[$extra])):
                $extrasvalidos[] = $extra;
            endif;
        endforeach;
        $extras = $extrasvalidos;
    else:
        $mensaje = "Hay una opción inválida. Revisa tu pedido e inténtalo nuevamente.";
    endif;

endif;
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
        <div class="text-center mb-5">
            <p class="text-secondary fw-semibold">Personaliza tu pedido</p>
            <h2 class="display-6 fw-bold">Arma tu pizza</h2>
            <p class="lead text-secondary">Elige tu pizza favorita y agrega los ingredientes que más te gusten.</p>
        </div>
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-4">
                <h3 class="h4 fw-bold mb-3"><i class="bi bi-receipt me-2"></i>Precios de ingredientes extra</h3>
                <p class="text-secondary"> El precio de la pizza ya incluye la masa, la salsa y el queso base.Estos son los precios de los ingredientes que puedes agregar.</p>
                <div class="row g-3">
                    <?php foreach ($ingredientes as $clave => $ingrediente): ?>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="border rounded p-3 bg-light h-100">
                                <span><?php echo $ingrediente["nombre"]; ?></span>
                                <div class="fw-bold text-success">L <?php echo number_format($ingrediente["precio"], 2); ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="alert alert-info mt-3 mb-0">
                    <p><i class="bi bi-info-circle me-2"></i>La diferencia es a base de los precios del menu</p>
                </div>
            </div>
        </div>

         <?php if ($mensaje != ""): ?>
            <div class="alert alert-danger"><?php echo $mensaje; ?></div>
        <?php endif; ?>

        <?php if ($pedidoenviado): ?>
            <div class="card border-success shadow-sm mb-4">
                <div class="card-body p-4">
                    <h3 class="h4 text-success fw-bold"><i class="bi bi-check-circle-fill me-2"></i>Esta es tu pizza</h3>
                    <p class="mb-1"><strong>Pizza:</strong> <?php echo $pizzas[$pizzaelegida]["nombre"]; ?></p>
                    <p class="mb-1"><strong>Tamaño:</strong> <?php echo $tamanos[$tamanoelegido]["nombre"]; ?></p>
                    <p class="mb-1"><strong>Masa:</strong> <?php echo $masa; ?></p>
                    <p class="mb-1"><strong>Salsa:</strong> <?php echo $salsa; ?></p>
                    <p class="mb-1"><strong>Queso:</strong> <?php echo $queso; ?></p>
                    <p class="mb-1"><strong>Ingredientes extra:</strong>
                        <?php if (count($extras) > 0): ?>
                            <?php foreach ($extras as $extra): ?>
                                <?php echo $ingredientes[$extra]["nombre"]; ?>
                                (L <?php echo number_format($ingredientes[$extra]["precio"], 2); ?>)
                                <br>
                            <?php endforeach; ?>
                        <?php else: ?>
                            Ninguno
                        <?php endif; ?>
                    </p>
                    <hr>
                    <p class="h3 fw-bold mb-0">Total: L <?php echo number_format($total, 2); ?></p>
                    <p class="text-secondary small mt-2 mb-0">Total calculado</p>
                </div>
            </div>
        <?php endif; ?>

        <form action="pagos.php" method="POST" id="formulario">

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    <h3 class="h5 fw-bold mb-3"><span class="badge text-bg-dark me-2">1</span>Elige tu pizza</h3>
                    <label for="pizza" class="form-label">Variedad</label>
                    <select class="form-select" name="pizza" id="pizza" required>
                        <?php foreach ($pizzas as $clave => $pizza): ?>
                            <option value="<?php echo $clave; ?>" data-diferencia="<?php echo $pizza["mediana"] - 220; ?>" data-descripcion="<?php echo $pizza["descripcion"]; ?>" <?php if ($pedidoenviado && $pizzaelegida == $clave): ?>selected<?php endif; ?>> <?php echo $pizza["nombre"]; ?> </option>
                        <?php endforeach; ?>
                    </select>
                    <p class="text-secondary small mt-2 mb-0" id="descripcionpizza">Selecciona una variedad para ver su descripción.</p>
                </div>
            </div>
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    <h3 class="h5 fw-bold mb-3"><span class="badge text-bg-dark me-2">2</span>Selecciona el tamaño</h3>
                    <div class="row g-3">
                        <?php foreach ($tamanos as $clave => $tamano): ?>
                            <div class="col-6 col-md-3">
                                <input class="btn-check" type="radio" name="tamaño" id="<?php echo $clave; ?>" value="<?php echo $clave; ?>" data-base="<?php echo $tamano["precio"]; ?>" <?php if (($pedidoenviado && $tamanoelegido == $clave) || (!$pedidoenviado && $clave == "personal")): ?>checked<?php endif; ?> required>

                                <label class="btn btn-outline-dark w-100 h-100 py-3" for="<?php echo $clave; ?>">
                                    <i class="bi bi-circle"></i>
                                    <span class="d-block fw-bold"><?php echo $tamano["nombre"]; ?></span>
                                    <span class="d-block small mt-2" id="precio<?php echo $clave; ?>"></span>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    <h3 class="h5 fw-bold mb-3"><span class="badge text-bg-dark me-2">3</span>Personaliza tu pizza</h3>
                    <div class="row g-4">
                        <div class="col-md-4">
                            <label for="masa" class="form-label fw-semibold">Tipo de masa</label>
                            <select class="form-select" name="masa" id="masa" required>
                                <option value="tradicional" <?php if ($masa == "tradicional"): ?>selected<?php endif; ?>>Tradicional</option>
                                <option value="delgada" <?php if ($masa == "delgada"): ?>selected<?php endif; ?>>Delgada y crujiente</option>
                                <option value="gruesa" <?php if ($masa == "gruesa"): ?>selected<?php endif; ?>>Gruesa</option>
                            </select>
                            <div class="form-text">Incluida en el precio base.</div>
                        </div>
                        <div class="col-md-4">
                            <label for="salsa" class="form-label fw-semibold">Tipo de salsa</label>
                            <select class="form-select" name="salsa" id="salsa" required>
                                <option value="pomodoro" <?php if ($salsa == "pomodoro"): ?>selected<?php endif; ?>>Pomodoro</option>
                                <option value="alfredo" <?php if ($salsa == "alfredo"): ?>selected<?php endif; ?>>Alfredo</option>
                                <option value="pesto" <?php if ($salsa == "pesto"): ?>selected<?php endif; ?>>Pesto</option>
                                <option value="barbacoa" <?php if ($salsa == "barbacoa"): ?>selected<?php endif; ?>>Barbacoa</option>
                            </select>
                            <div class="form-text">Incluida en el precio base.</div>
                        </div>

                        <div class="col-md-4">
                            <label for="queso" class="form-label fw-semibold">Tipo de queso</label>
                            <select class="form-select" name="queso" id="queso" required>
                                <option value="mozzarella" <?php if ($queso == "mozzarella"): ?>selected<?php endif; ?>>Mozzarella</option>
                                <option value="cuatroquesos" <?php if ($queso == "cuatroquesos"): ?>selected<?php endif; ?>>Mezcla de cuatro quesos</option>
                                <option value="cabra" <?php if ($queso == "cabra"): ?>selected<?php endif; ?>>Queso de cabra</option>
                            </select>
                            <div class="form-text">Incluido en el precio base.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    <h3 class="h5 fw-bold mb-3"><span class="badge text-bg-dark me-2">4</span>Agrega ingredientes extra</h3>
                    <p class="text-secondary">Marca los ingredientes que deseas añadir. Cada uno se cobra una sola vez por pizza.</p>
                    <div class="row g-3">
                        <?php foreach ($ingredientes as $clave => $ingrediente): ?>
                            <div class="col-6 col-md-4">
                                <div class="form-check border rounded p-3 ps-5 h-100">
                                    <input class="form-check-input extra" type="checkbox" name="extras[]" id="extra<?php echo $clave; ?>" value="<?php echo $clave; ?>" data-precio="<?php echo $ingrediente["precio"]; ?>"  <?php if ($pedidoenviado && in_array($clave, $extras)): ?>checked<?php endif; ?>>
                                    <label class="form-check-label w-100" for="extra<?php echo $clave; ?>">
                                        <span class="d-block fw-semibold"><?php echo $ingrediente["nombre"]; ?></span>
                                        <span class="text-success">+ L <?php echo number_format($ingrediente["precio"], 2); ?></span>
                                    </label>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="card border-dark shadow-sm">
                <div class="card-body p-4 text-center">
                    <p class="text-secondary mb-1">Precio estimado de tu pizza</p>
                    <h2 class="display-5 fw-bold" id="total">L 130.00</h2>
                    <p class="small text-secondary">El precio se actualiza automaticamente</p>
                    <button type="submit" class="btn btn-dark btn-lg w-100"><i class="bi bi-check-circle me-2"></i>Confirmar mi pizza</button>

                    <a href="menu.php" class="btn btn-outline-secondary mt-3">Volver al menú </a>
                </div>
            </div>
        </form>
        
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
    <script src="js/armapizza.js"></script>
</body>
</html>