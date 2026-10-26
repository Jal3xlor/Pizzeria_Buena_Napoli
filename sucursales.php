<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["vaciar"])) {
    unset($_SESSION["pedidos"]);
    header("Location: sucursales.php");
    exit;
}

$pedidos = $_SESSION["pedidos"] ?? [];
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
            <h1 class="fw-bold">Nuestras sucursales</h1>
            <p class="text-secondary">Visítanos en cualquiera de nuestras sucursales en Honduras y prueba nuestra sazon</p>
        </div>
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-geo-alt-fill"></i>Tegucigalpa</h5>
                        <p class="card-text"> Bulevar Morazán, Tegucigalpa, Francisco Morazán </p>
                        <p class="mb-0"><i class="bi bi-telephone-fill"></i>+504 2020-2020</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-geo-alt-fill"></i>San Pedro Sula</h5>
                        <p class="card-text">Barrio Guamilito, San Pedro Sula, Cortés</p>
                        <p class="mb-0"><i class="bi bi-telephone-fill"></i>+504 2020-2021 </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-geo-alt-fill"></i>La Ceiba</h5>
                        <p class="card-text">La Ceiba, Atlántida, Honduras</p>
                        <p class="mb-0"><i class="bi bi-telephone-fill"></i>+504 2020-2022</p>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-5">

        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
            <div>
                <h2 class="fw-bold">Panel gerencial de órdenes</h2>
                <p class="text-secondary mb-0">Pedidos registrados en la sesion actual</p>
            </div>

            <?php if (count($pedidos) > 0): ?>
                <form method="POST" action="sucursales.php">
                    <button type="submit" name="vaciar" value="1" class="btn btn-danger"><i class="bi bi-trash"></i>Vaciar / Reiniciar Sesión</button>
                </form>
            <?php endif; ?>
        </div>

        <?php if (empty($pedidos)): ?>
            <div class="alert alert-warning" role="alert">
                <span class="badge text-bg-warning">Sin pedidos</span>
                <p>Aun no hay órdenes registradas <p>
            </div>

        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Folio</th>
                            <th>Cliente</th>
                            <th>Teléfono</th>
                            <th>Detalle de pizzas</th>
                            <th class="text-end">Total (L)</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pedidos as $orden): ?>
                            <tr>
                                <td>
                                    <?= htmlspecialchars((string) ($orden["folio"] ?? "—")) ?>
                                </td>
                                <td>
                                    <?= htmlspecialchars((string) ($orden["cliente"] ?? "No registrado")) ?>
                                </td>
                                <td>
                                    <?= htmlspecialchars((string) ($orden["telefono"] ?? "No registrado")) ?>
                                </td>
                                <td>
                                    <?php
                                    $detalle = $orden["pedido"] ?? [];
                                    ?>
                                    <?php if (is_array($detalle) && !empty($detalle)): ?>
                                        <strong>
                                            <?= htmlspecialchars((string) ($detalle["pizza"] ?? "Pizza")) ?>
                                        </strong><br>
                                        Tamaño: <?= htmlspecialchars((string) ($detalle["tamaño"] ?? "No especificado")) ?><br>
                                        Masa: <?= htmlspecialchars((string) ($detalle["masa"] ?? "No especificada")) ?><br>
                                        Salsa: <?= htmlspecialchars((string) ($detalle["salsa"] ?? "No especificada")) ?><br>
                                        Queso: <?= htmlspecialchars((string) ($detalle["queso"] ?? "No especificado")) ?>
                                        <?php if (!empty($detalle["extras"])): ?>
                                            <br>Extras:
                                            <?php foreach ($detalle["extras"] as $extra): ?>
                                                <?= htmlspecialchars((string) $extra) ?><?= $extra !== end($detalle["extras"]) ? ", " : "" ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <p>Sin detalle disponible</p>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end">
                                    L <?= number_format((float) ($orden["total"] ?? 0), 2) ?>
                                </td>
                                <td>
                                    <span class="badge text-bg-success">
                                        <?= htmlspecialchars((string) ($orden["estado"] ?? "Registrado")) ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <p class="text-secondary">
                Total de órdenes registradas: <strong><?= count($pedidos) ?></strong>
            </p>
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