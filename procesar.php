<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header("Location: index.php");
  exit;
}

function limpiar($txt){ return htmlspecialchars(trim($txt), ENT_QUOTES, 'UTF-8'); }
function formato($num){ return number_format($num, 2, ',', '.'); }

$prod1 = limpiar($_POST['prod1']);
$prod2 = limpiar($_POST['prod2']);
$prod3 = limpiar($_POST['prod3']);

$precio1 = floatval($_POST['precio1']);
$precio2 = floatval($_POST['precio2']);
$precio3 = floatval($_POST['precio3']);

$suma = $precio1 + $precio2 + $precio3;
$descuento = $suma * 0.16;
$total = $suma - $descuento;
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Resultado - Tienda Virtual</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #43cea2, #185a9d);
      margin: 0; padding: 0;
      display: flex; justify-content: center; align-items: center;
      height: 100vh;
    }
    .card {
      background: white;
      padding: 30px;
      border-radius: 15px;
      width: 100%; max-width: 500px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.2);
      text-align: center;
      animation: fadeIn 1s ease;
    }
    h1 { margin-bottom: 20px; }
    ul { list-style: none; padding: 0; text-align: left; }
    li { margin: 8px 0; font-size: 16px; }
    .total { font-size: 20px; font-weight: bold; margin-top: 15px; }
    a {
      display: inline-block; margin-top: 20px;
      padding: 10px 16px; border-radius: 10px;
      text-decoration: none; color: white; background: #43cea2;
      transition: 0.3s;
    }
    a:hover { background: #2d896f; }
    @keyframes fadeIn { from {opacity:0; transform: translateY(20px);} to {opacity:1; transform: translateY(0);} }
  </style>
</head>
<body>
  <div class="card">
    <h1>🧾 Factura</h1>
    <ul>
      <li><b><?php echo $prod1; ?></b> — $<?php echo formato($precio1); ?></li>
      <li><b><?php echo $prod2; ?></b> — $<?php echo formato($precio2); ?></li>
      <li><b><?php echo $prod3; ?></b> — $<?php echo formato($precio3); ?></li>
    </ul>
    <p>Suma de productos: $<?php echo formato($suma); ?></p>
    <p>Descuento (16%): -$<?php echo formato($descuento); ?></p>
    <p class="total">Total a pagar: $<?php echo formato($total); ?></p>
    <a href="index.php">🛒 Volver al formulario</a>
  </div>
</body>
</html>
