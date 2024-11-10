<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ferretería - Módulo de Proveedores</title>
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
    <form name="form_nuevo" action="./proc_agregar.php" method="post" autocomplete="off">
      <div class="d-flex align-items-center mb-4">
      <h1 class="fw-bold" style="font-size: 28px; color: #495057; border-bottom: 2px solid #495057;">Módulo de Proveedores</h1>

        <div class="ms-auto">
          <button type="submit" class="btn btn-agregar me-2"><i class="bi bi-floppy-fill"></i> Guardar</button>
          <a href="form_listar.php" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas cancelar?')"><i class="bi bi-x-square-fill"></i> Cancelar</a>
        </div>
      </div>

      <div class="card card-custom p-4">
        <!-- Sección Información Personal -->
        <div class="form-section">
          <div class="form-section-title">Información Personal</div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre Completo" required>
                <label for="nombre"><i class="bi bi-person-fill me-2"></i>Nombre Completo</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" id="tipo_proveedor" name="tipo_proveedor" placeholder="Tipo de Proveedor" required>
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
                <textarea class="form-control" id="direccion" name="direccion" placeholder="Dirección" style="height: 100px;" required></textarea>
                <label for="direccion"><i class="bi bi-geo-alt-fill me-2"></i>Dirección</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" required pattern="^[0-9]{8}$">
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
                <input type="text" class="form-control" id="dui" name="dui" placeholder="DUI" required maxlength="10">
                <label for="dui"><i class="bi bi-credit-card-2-front-fill me-2"></i>DUI</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-floating">
                <input type="text" class="form-control" id="nit" name="nit" placeholder="NIT" required maxlength="17">
                <label for="nit"><i class="bi bi-file-earmark-text-fill me-2"></i>NIT</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-floating">
                <input type="text" class="form-control" id="nrc" name="nrc" placeholder="NRC" required maxlength="10">
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
                <input type="text" class="form-control" id="Giro" name="Giro" placeholder="Giro" maxlength="50">
                <label for="giro"><i class="bi bi-briefcase-fill me-2"></i>Giro</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <select class="form-control" id="tiene_percepcion" name="tiene_percepcion" required>
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
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>