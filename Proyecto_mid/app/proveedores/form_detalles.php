<?php

$id = @$_GET['id'];
include_once "../../config/server_connection.php";
$con = new ServerConnection();
$con->query = "SELECT * FROM tbl_proveedores WHERE id_proveedor = $id";
$dt_proveedor = $con->get_records();
$nombre = @$dt_proveedor[0]['nombre'];
$tipo_proveedor = @$dt_proveedor[0]['tipo_proveedor'];
$direccion = @$dt_proveedor[0]['direccion'];
$telefono = @$dt_proveedor[0]['telefono'];
$giro = @$dt_proveedor[0]['giro'];
$nrc = @$dt_proveedor[0]['nrc'];
$dui = @$dt_proveedor[0]['dui'];
$nit = @$dt_proveedor[0]['nit'];
$tiene_percepcion = @$dt_proveedor[0]['tiene_percepcion'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ferretería - Módulo detalles de Proveedores</title>
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
    <div class="d-flex align-items-center mb-4">
      <h1 class="fw-bold" style="font-size: 28px; color: #495057; border-bottom: 2px solid #495057;">Módulo de detalles Proveedores</h1>

      <div class="ms-auto">
        <a href="./form_listar.php" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas cancelar?')"><i class="bi bi-x-square-fill"></i> Cancelar</a>
      </div>
    </div>

    <div class="card card-custom p-4">
      <!-- Sección Información Personal -->
      <div class="form-section">
        <div class="form-section-title">Información Personal</div>
        <div class="row g-3">
          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control" disabled id="nombre" value="<?php echo $nombre ?>" name="nombre" placeholder="Nombre Completo" required>
              <label for="nombre"><i class="bi bi-person-fill me-2"></i>Nombre Completo</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control" disabled id="tipo_proveedor" value="<?php echo $tipo_proveedor ?>" name="tipo_proveedor" placeholder="Tipo de Proveedor" required>
              <label for="tipo_proveedor"><i class="bi bi-card-list me-2"></i>Tipo de Proveedor</label>
            </div>
          </div>
        </div>
      </div>

      <!-- Sección Contacto -->
      <div class="form-section highlight">
        <div class="form-section-title">Información de Contacto</div>
        <div class="row g-3">
          <div class="col-md-6">
            <div class="form-floating">
              <textarea class="form-control" id="direccion" disabled name="direccion" placeholder="Dirección" style="height: 100px;" required><?php echo $direccion ?></textarea>
              <label for="direccion"><i class="bi bi-geo-alt-fill me-2"></i>Dirección</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating">
              <input type="tel" class="form-control" disabled id="telefono" value="<?php echo $telefono ?>" name="telefono" placeholder="Teléfono" required pattern="^[0-9]{8}$">
              <label for="telefono"><i class="bi bi-telephone-fill me-2"></i>Teléfono</label>
            </div>
          </div>
        </div>
      </div>

      <!-- Sección Documentación -->
      <div class="form-section">
        <div class="form-section-title">Documentación</div>
        <div class="row g-3">
          <div class="col-md-4">
            <div class="form-floating">
              <input type="text" class="form-control" disabled id="dui" value="<?php echo $dui ?>" name="dui" placeholder="DUI" required maxlength="10">
              <label for="dui"><i class="bi bi-credit-card-2-front-fill me-2"></i>DUI</label>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-floating">
              <input type="text" class="form-control" disabled id="nit" value="<?php echo $nit ?>" name="nit" placeholder="NIT" required maxlength="17">
              <label for="nit"><i class="bi bi-file-earmark-text-fill me-2"></i>NIT</label>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-floating">
              <input type="text" class="form-control" disabled value="<?php echo $nrc ?>" id="nrc" name="nrc" placeholder="NRC" required maxlength="10">
              <label for="nrc"><i class="bi bi-building me-2"></i>NRC</label>
            </div>
          </div>
        </div>
      </div>

      <!-- Sección Adicional -->
      <div class="form-section highlight">
        <div class="form-section-title">Información Adicional</div>
        <div class="row g-3">
          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control" disabled id="giro" value="<?php echo $giro ?>" name="giro" placeholder="Giro" maxlength="50">
              <label for="giro"><i class="bi bi-briefcase-fill me-2"></i>Giro</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating">
              <select class="form-control" disabled id="tiene_percepcion" name="tiene_percepcion" required>
                <option value="Si">Sí</option>
                <option value="No">No</option>
              </select>
              <label for="tiene_percepcion"><i class="bi bi-puzzle-fill me-2"></i>Percepción</label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>