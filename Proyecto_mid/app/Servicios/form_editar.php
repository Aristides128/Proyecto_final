<?php
require_once '../../config/server_connection.php';


$id_servicio = @$_REQUEST['id'];
$conexion = new ServerConnection();

$conexion->query = "SELECT * FROM tbl_servicios WHERE id_servicio = '{$id_servicio}'";

$dt_servicios = $conexion->get_records();

$nombre = $dt_servicios[0]['nombre'];
$precio_venta1 = $dt_servicios[0]['precio_venta1'];
$precio_venta2 = $dt_servicios[0]['precio_venta2'];
$precio_venta3 = $dt_servicios[0]['precio_venta3'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ferretería - Módulo editar de Servicios</title>
  <link rel="shortcut icon" href="../../assets/images/logo.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <style>
    body {
      background-color: #f1f3f5;
      font-family: 'Arial', sans-serif;
      color: #495057;
    }

    .card-custom {
      border-radius: 12px;
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
      background-color: #ffffff;
      border: none;
    }

    .form-section {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 10px;
      margin-bottom: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .form-section-title {
      font-size: 1.2rem;
      font-weight: bold;
      color: #495057;
      margin-bottom: 10px;
    }

    .form-control {
      border-radius: 8px;
      border: 1px solid #e0e0e0;
      background-color: #fafafa;
      transition: border-color 0.3s ease;
    }

    label {
      font-size: 0.9rem;
      color: #7f8c8d;
    }

    .btn-agregar {
      background-color: #198754;
      color: #ffffff;
      font-weight: bold;
      border-radius: 12px;
      transition: background-color 0.3s ease;
    }

    .btn-agregar:hover {
      background-color: #157347;
    }

    .btn-danger {
      background-color: #e74c3c;
      color: white;
      border-radius: 12px;
    }

    .btn-danger:hover {
      background-color: #c0392b;
    }

    .form-control:focus {
      border-color: #198754;
      box-shadow: 0 0 5px rgba(25, 135, 84, 0.5);
    }

    .highlight {
      background-color: #f9fafb;
      padding: 20px;
      border-radius: 12px;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <div class="container mt-5">
    <form name="form_nuevo" action="./proc_editar.php?id= <?php echo $id_servicio ?>" method="post" autocomplete="off">
      <div class="d-flex align-items-center mb-4">
        <h1 class="fw-bold" style="font-size: 28px; color: #495057; border-bottom: 2px solid #495057;">Módulo de editar servicios</h1>
        <div class="ms-auto">
          <button type="submit" class="btn btn-agregar me-2"><i class="bi bi-floppy-fill"></i> Guardar</button>
          <a href="form_listar.php" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas cancelar?')"><i class="bi bi-x-square-fill"></i> Cancelar</a>
        </div>
      </div>

      <div class="card card-custom p-4">
        <!-- Sección Información del Servicio -->
        <div class="form-section">
          <div class="form-section-title">Información del Servicio</div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" id="nombre" value="<?php echo $nombre ?>" name="nombre" placeholder="Nombre del servicio" required>
                <label for="nombre"><i class="bi bi-box me-2"></i>Nombre del Servicio</label>
              </div>
            </div>
          </div>
        </div>

        <!-- Sección Precios de Venta -->
        <div class="form-section highlight">
          <div class="form-section-title">Precios de Venta</div>
          <div class="row g-3">
            <div class="col-md-4">
              <div class="form-floating">
                <input type="number" class="form-control" id="precio_venta1" value="<?php echo $precio_venta1 ?>" name="precio_venta1" placeholder="Precio de Venta 1" required>
                <label for="precio_venta1"><i class="bi bi-currency-dollar me-2"></i>Precio de Venta 1</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-floating">
                <input type="number" class="form-control" id="precio_venta2" value="<?php echo $precio_venta2 ?>" name="precio_venta2" placeholder="Precio de Venta 2" required>
                <label for="precio_venta2"><i class="bi bi-currency-dollar me-2"></i>Precio de Venta 2</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-floating">
                <input type="number" class="form-control" value="<?php echo $precio_venta3 ?>" id="precio_venta3" name="precio_venta3" placeholder="Precio de Venta 3" required>
                <label for="precio_venta3"><i class="bi bi-currency-dollar me-2"></i>Precio de Venta 3</label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>