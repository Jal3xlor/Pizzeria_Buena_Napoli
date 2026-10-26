<?php
session_start();

$pizzas = [
    "margarita" => ["nombre" => "Pizza Margarita", "mediana" => 220],
    "pepperoni" => ["nombre" => "Pizza Pepperoni", "mediana" => 250],
    "hawaiana" => ["nombre" => "Pizza Hawaiana", "mediana" => 235],
    "cuatroquesos" => ["nombre" => "Pizza Cuatro Quesos", "mediana" => 275],
    "jamonyhongos" => ["nombre" => "Pizza Jamón y Hongos", "mediana" => 240],
    "prosciutto" => ["nombre" => "Prosciutto di Parma", "mediana" => 320],
    "trufada" => ["nombre" => "Trufada Napolitana", "mediana" => 345],
    "fruttidimare" => ["nombre" => "Frutti di Mare", "mediana" => 360],
    "carnivora" => ["nombre" => "Carnivora Suprema", "mediana" => 295],
    "higosycabra" => ["nombre" => "Pizza de Higos y Cabra", "mediana" => 310]
];

$tamaños = [
    "personal" => ["nombre" => "Personal", "precio" => 130],
    "mediana" => ["nombre" => "Mediana", "precio" => 220],
    "familiar" => ["nombre" => "Familiar", "precio" => 340],
    "gigante" => ["nombre" => "Gigante", "precio" => 460]
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

$mensaje = "";
$factura = false;

if (!isset($_SESSION["pedidos"])):
    $_SESSION["pedidos"] = [];
endif;

if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["facturar"])):
    if (isset($_POST["pizza"]) && isset($_POST["tamaño"]) && isset($_POST["masa"]) && isset($_POST["salsa"]) && isset($_POST["queso"])):
        $pizza = $_POST["pizza"];
        $tamaño = $_POST["tamaño"];
        $masa = $_POST["masa"];
        $salsa = $_POST["salsa"];
        $queso = $_POST["queso"];
        $extras = $_POST["extras"] ?? [];

        if (isset($pizzas[$pizza]) && isset($tamaños[$tamaño])):
            $precioBase = $tamaños[$tamaño]["precio"];
            $diferencia = $pizzas[$pizza]["mediana"] - 220;
            $subtotal = $precioBase + $diferencia;
            $listaExtras = [];
            foreach ($extras as $extra):
                if (isset($ingredientes[$extra])) :
                    $subtotal = $subtotal + $ingredientes[$extra]["precio"];
                    $listaExtras[] = $extra;
                endif;
            endforeach;

            $_SESSION["pedidoactual"] = [
                "pizza" => $pizzas[$pizza]["nombre"],
                "clavepizza" => $pizza,
                "tamaño" => $tamaños[$tamaño]["nombre"],
                "masa" => $masa,
                "salsa" => $salsa,
                "queso" => $queso,
                "extras" => $listaExtras,
                "subtotal" => $subtotal
            ];
            unset($_SESSION["facturagenerada"]);

        else:
            $mensaje = "La pizza o el tamaño seleccionado no son opciones valiadas";
        endif;

    else:
        $mensaje = "se debe completar toda la personalizacion";
    endif;

endif;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["facturar"])):
    if (isset($_SESSION["pedidoactual"])) :
        $cliente = trim($_POST["cliente"] ?? "");
        $rtn = trim($_POST["rtn"] ?? "");
        $correo = trim($_POST["correo"] ?? "");
        $telefono = trim($_POST["telefono"] ?? "");
        $entrega = $_POST["entrega"] ?? "";

        if ($cliente == "" || $rtn == "" || $correo == "" || $telefono == ""):
            $mensaje = "Debes completar todos los campos";
        elseif (!preg_match("/^[0-9]{14}$/", $rtn)):
            $mensaje = "El RTN debe contener exactamente 14 números.";
        elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) :
            $mensaje = "Ingresa un correo electronico valido";
        elseif (!preg_match("/^[0-9]{8}$/", $telefono)):
            $mensaje = "El teléfono debe contener exactamente 8 números.";
        elseif ($entrega != "Domicilio" && $entrega != "Recoger en sucursal"):
            $mensaje = "Selecciona una opción de entrega";
        else :

            $pedido = $_SESSION["pedidoactual"];
            $subtotal = $pedido["subtotal"];
            $descuento = 0;

            if ($subtotal >= 500):
                $descuento = $subtotal * 0.05;
            endif;
            $delivery = 0;
            if ($entrega == "Domicilio") :
                $delivery = 50;
            endif;

            $baseimponible = $subtotal - $descuento + $delivery;
            $isv = $baseimponible * 0.15;
            $total = $baseimponible + $isv;

            if (!isset($_SESSION["contadorfacturas"])) :
                $_SESSION["contadorfacturas"] = 1;
            else :
                $_SESSION["contadorfacturas"]++;
            endif;

            $numeroFactura = "BN-" . str_pad(
                $_SESSION["contadorfacturas"],
                6,
                "0",
                STR_PAD_LEFT
            );

            $factura = ["numero" => $numeroFactura,"cliente" => $cliente,"rtn" => $rtn,"correo" => $correo,"telefono" => $telefono,"entrega" => $entrega,"pedido" => $pedido, "subtotal" => $subtotal,"descuento" => $descuento,"delivery" => $delivery,"baseimponible" => $baseimponible,"isv" => $isv,"total" => $total];

            $_SESSION["facturagenerada"] = $factura;
            $_SESSION["pedidos"][] = $factura;

            unset($_SESSION["pedidoactual"]);

        endif;

    else :
        $mensaje = "No hay un pedido pendiente de facturación";
    endif;

endif;

if (isset($_SESSION["facturagenerada"]) && !isset($_SESSION["pedidoactual"])):
    $factura = $_SESSION["facturagenerada"];
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
    <main class="container py-5">
        <div class="text-center mb-4">
            <h1 class="fw-bold text-danger">Pagos y facturación</h1>
            <p class="text-secondary">Bella Napoli: Pedido y Recibo</p>
        </div>

        <?php if ($mensaje != ""): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($mensaje) ?>
            </div>
        <?php endif; ?>

        <?php if (is_array($factura)): ?>

            <div class="card shadow-sm mx-auto" style="max-width: 850px;">
                <div class="card-header bg-success text-white text-center py-3">
                    <h2 class="h4 mb-1"><i class="bi bi-check-circle"></i> Factura generada</h2>
                    <p class="mb-0">Bella Napoli</p>
                </div>

                <div class="card-body p-4">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h3 class="h6 fw-bold">Datos del comprobante</h3>
                            <p class="mb-1">Número: <?= htmlspecialchars($factura["numero"]) ?></p>
                            <p class="mb-1">Cliente: <?= htmlspecialchars($factura["cliente"]) ?></p>
                            <p class="mb-1">RTN: <?= htmlspecialchars($factura["rtn"]) ?></p>
                        </div>
                        <div class="col-md-6">
                            <h3 class="h6 fw-bold">Información de contacto</h3>
                            <p class="mb-1">Correo: <?= htmlspecialchars($factura["correo"]) ?></p>
                            <p class="mb-1">Teléfono: <?= htmlspecialchars($factura["telefono"]) ?></p>
                            <p class="mb-1">Entrega: <?= htmlspecialchars($factura["entrega"]) ?></p>
                        </div>
                    </div>
                    <h3 class="h5 fw-bold">Detalle del pedido</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead class="table-danger">
                                <tr>
                                    <th>Descripción</th>
                                    <th class="text-end">Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Pizza <?= htmlspecialchars($factura["pedido"]["pizza"]) ?>, tamaño <?= htmlspecialchars($factura["pedido"]["tamaño"]) ?></td>
                                    <td class="text-end">L <?= number_format($factura["pedido"]["subtotal"] - array_sum(array_column(array_map(function($extra) use ($ingredientes) { return $ingredientes[$extra]; }, $factura["pedido"]["extras"]), "precio")), 2) ?></td>
                                </tr>
                                <tr>
                                    <td>Masa: <?= htmlspecialchars($factura["pedido"]["masa"]) ?></td>
                                    <td class="text-end">Incluida</td>
                                </tr>
                                <tr>
                                    <td>Salsa: <?= htmlspecialchars($factura["pedido"]["salsa"]) ?></td>
                                    <td class="text-end">Incluida</td>
                                </tr>
                                <tr>
                                    <td>Queso: <?= htmlspecialchars($factura["pedido"]["queso"]) ?></td>
                                    <td class="text-end">Incluido</td>
                                </tr>
                                <?php foreach ($factura["pedido"]["extras"] as $extra): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($ingredientes[$extra]["nombre"]) ?></td>
                                        <td class="text-end">L <?= number_format($ingredientes[$extra]["precio"], 2) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between mb-2">
                                <span>Subtotal:</span>
                                <span>L <?= number_format($factura["subtotal"], 2) ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Descuento:</span>
                                <span>- L <?= number_format($factura["descuento"], 2) ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Entrega:</span>
                                <span>L <?= number_format($factura["delivery"], 2) ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>ISV (15%):</span>
                                <span>L <?= number_format($factura["isv"], 2) ?></span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between fw-bold fs-5 text-danger">
                                <span>Total:</span>
                                <span>L <?= number_format($factura["total"], 2) ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-white d-flex flex-wrap gap-2 justify-content-center py-3">
                    <button class="btn btn-danger" onclick="window.print()">
                        <i class="bi bi-printer"></i> Imprimir comprobante
                    </button>
                    <a href="armapizza.php" class="btn btn-outline-danger"><i class="bi bi-plus-circle"></i> Crear otro pedido</a>
                </div>
            </div>

        <?php elseif (isset($_SESSION["pedidoactual"])): ?>
            <?php $pedido = $_SESSION["pedidoactual"]; ?>
            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="card shadow-sm">
                        <div class="card-header bg-danger text-white">
                            <h2 class="h5 mb-0">Resumen de tu pedido</h2>
                        </div>
                        <div class="card-body">
                            <p><strong>Pizza:</strong> <?= htmlspecialchars($pedido["pizza"]) ?></p>
                            <p><strong>Tamaño:</strong> <?= htmlspecialchars($pedido["tamaño"]) ?></p>
                            <p><strong>Masa:</strong> <?= htmlspecialchars($pedido["masa"]) ?></p>
                            <p><strong>Salsa:</strong> <?= htmlspecialchars($pedido["salsa"]) ?></p>
                            <p><strong>Queso:</strong> <?= htmlspecialchars($pedido["queso"]) ?></p>
                            <p class="fw-bold mb-1">Ingredientes adicionales:</p>
                            <?php if (count($pedido["extras"]) > 0): ?>
                                <ul>
                                    <?php foreach ($pedido["extras"] as $extra): ?>
                                        <li><?= htmlspecialchars($extra) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else: ?>
                                <p>No seleccionaste ingredientes adicionales.</p>
                            <?php endif; ?>
                            <hr>
                            <div class="d-flex justify-content-between fw-bold fs-5">
                                <span>Subtotal:</span>
                                <span class="text-danger">L <?= number_format($pedido["subtotal"], 2) ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="card shadow-sm">
                        <div class="card-header bg-dark text-white">
                            <h2 class="h5 mb-0">Datos para la facturación</h2>
                        </div>
                        <div class="card-body">
                            <form action="pagos.php" method="POST">
                                <input type="hidden" name="facturar" value="1">
                                <div class="mb-3">
                                    <label for="cliente" class="form-label">Nombre del cliente o empresa</label>
                                    <input type="text" class="form-control" id="cliente" name="cliente" placeholder="ej. Juan" required>
                                </div>
                                <div class="mb-3">
                                    <label for="rtn" class="form-label">RTN (14 números)</label>
                                    <input type="text" class="form-control" id="rtn" name="rtn" maxlength="14" pattern="[0-9]{14}" inputmode="numeric" placeholder="12345678901234" required>
                                </div>
                                <div class="mb-3">
                                    <label for="correo" class="form-label">Correo electrónico</label>
                                    <input type="email" class="form-control" id="correo" name="correo" required>
                                </div>
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Teléfono (8 números)</label>
                                    <input type="tel" class="form-control" id="telefono" name="telefono" maxlength="8" pattern="[0-9]{8}" inputmode="numeric" placeholder="ej. 98765432" required>
                                </div>
                                <div class="mb-3">
                                    <label for="entrega" class="form-label">Tipo de entrega</label>
                                    <select class="form-select" id="entrega" name="entrega" required>
                                        <option value="">Selecciona una opción</option>
                                        <option value="Domicilio">Entrega a domicilio (L 50.00)</option>
                                        <option value="Recoger en sucursal">Recoger en sucursal (gratis)</option>
                                    </select>
                                </div>
                                <div class="alert alert-secondary">
                                    <p class="mb-1">Descuento del 5% en pedidos de L 500.00 o más.</p>
                                    <p class="mb-0">El ISV se calcula al 15% como regla de esta simulación.</p>
                                </div>
                                <button type="submit" class="btn btn-danger w-100">
                                    <i class="bi bi-receipt"></i> Generar comprobante
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-warning text-center mx-auto" style="max-width: 700px;">
                <i class="bi bi-exclamation-circle fs-3"></i>
                <h2 class="h5 mt-2">No tienes ningún pedido pendiente</h2>
                <p>Primero personaliza tu pizza para continuar con la facturación.</p>
                <a href="armapizza.php" class="btn btn-danger">Ir a Arma tu pizza</a>
            </div>
        <?php endif; ?>

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