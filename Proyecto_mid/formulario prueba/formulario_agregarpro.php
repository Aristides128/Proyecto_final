<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ferretería - Módulo de Producto</title>
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
        <h1 class="fw-bold" style="font-size: 28px; color: #495057; border-bottom: 2px solid #495057;">Módulo de Producto</h1>
        <div class="ms-auto">
          <button type="submit" class="btn btn-agregar me-2"><i class="bi bi-floppy-fill"></i> Guardar</button>
          <a href="form_listar.php" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas cancelar?')"><i class="bi bi-x-square-fill"></i> Cancelar</a>
        </div>
      </div>

      <div class="card card-custom p-4">
        <!-- Sección Información del Producto -->
        <div class="form-section">
          <div class="form-section-title">Información del Producto</div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del Producto" required>
                <label for="nombre"><i class="bi bi-box me-2"></i>Nombre del Producto</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" id="codigo_interno" name="codigo_interno" placeholder="Código Interno" required>
                <label for="codigo_interno"><i class="bi bi-barcode me-2"></i>Código Interno</label>
              </div>
            </div>
          </div>
        </div>

        <!-- Sección Detalles del Producto -->
        <div class="form-section">
          <div class="form-section-title">Detalles del Producto</div>
          <div class="row g-3">
            <div class="col-md-12">
              <div class="form-floating">
                <textarea class="form-control" id="detalles" name="detalles" placeholder="Detalles del Producto" rows="4" required></textarea>
                <label for="detalles"><i class="bi bi-pencil me-2"></i>Detalles del Producto</label>
              </div>
            </div>
          </div>
        </div>

        <!-- Sección Categoría y Marca -->
        <div class="form-section highlight">
          <div class="form-section-title">Categoría y Marca</div>
          <div class="row g-3">
            <div class="col-md-4">
              <div class="form-floating">
                <select class="form-control" id="id_marca" name="id_marca" required>
                  <option value="">Seleccionar Marca</option>
                  <!-- Aquí van las opciones de marcas -->
                </select>
                <label for="id_marca"><i class="bi bi-tags me-2"></i>Marca</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-floating">
                <select class="form-control" id="id_categoria" name="id_categoria" required>
                  <option value="">Seleccionar Categoría</option>
                  <!-- Aquí van las opciones de categorías -->
                </select>
                <label for="id_categoria"><i class="bi bi-list-ul me-2"></i>Categoría</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-floating">
                <select class="form-control" id="id_ubicacion_fisica" name="id_ubicacion_fisica" required>
                  <option value="">Seleccionar Ubicación Física</option>
                  <!-- Aquí van las opciones de ubicaciones -->
                </select>
                <label for="id_ubicacion_fisica"><i class="bi bi-geo-alt me-2"></i>Ubicación Física</label>
              </div>
            </div>
          </div>
        </div>

        <!-- Sección Presentación y Unidad de Medida -->
        <div class="form-section">
          <div class="form-section-title">Presentación y Unidad de Medida</div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="form-floating">
                <select class="form-control" id="id_presentacion" name="id_presentacion" required>
                  <option value="">Seleccionar Presentación</option>
                  <!-- Aquí van las opciones de presentaciones -->
                </select>
                <label for="id_presentacion"><i class="bi bi-cup me-2"></i>Presentación</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <select class="form-control" id="id_unidad_medida" name="id_unidad_medida" required>
                  <option value="">Seleccionar Unidad de Medida</option>
                  <!-- Aquí van las opciones de unidades de medida -->
                </select>
                <label for="id_unidad_medida"><i class="bi bi-cube me-2"></i>Unidad de Medida</label>
              </div>
            </div>
          </div>
        </div>

        <!-- Sección Precios y Existencias -->
        <div class="form-section highlight">
          <div class="form-section-title">Precios y Existencias</div>
          <div class="row g-3">
            <div class="col-md-4">
              <div class="form-floating">
                <input type="number" class="form-control" id="existencias_minimas" name="existencias_minimas" placeholder="Existencias Mínimas" required>
                <label for="existencias_minimas"><i class="bi bi-hash me-2"></i>Existencias Mínimas</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-floating">
                <input type="number" class="form-control" id="precio_venta1" name="precio_venta1" placeholder="Precio de Venta 1" required>
                <label for="precio_venta1"><i class="bi bi-currency-dollar me-2"></i>Precio de Venta 1</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-floating">
                <input type="number" class="form-control" id="precio_venta2" name="precio_venta2" placeholder="Precio de Venta 2" required>
                <label for="precio_venta2"><i class="bi bi-currency-dollar me-2"></i>Precio de Venta 2</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-floating">
                <input type="number" class="form-control" id="precio_venta3" name="precio_venta3" placeholder="Precio de Venta 3" required>
                <label for="precio_venta3"><i class="bi bi-currency-dollar me-2"></i>Precio de Venta 3</label>
              </div>
            </div>
          </div>
        </div>

        <!-- Sección Código de Barras y Estado -->
        <div class="form-section">
          <div class="form-section-title">Código de Barras e Imagen</div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" id="codigo_barras" name="codigo_barras" placeholder="Código de Barras" required>
                <label for="codigo_barras"><i class="bi bi-barcode me-2"></i>Código de Barras</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                <label for="imagen"><i class="bi bi-image me-2"></i>Imagen del Producto</label>
              </div>
            </div>
          </div>
        </div>

        <!-- Estado Activo -->
        <div class="form-section">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="activo" name="activo" checked>
            <label class="form-check-label" for="activo">
              <i class="bi bi-check-circle me-2"></i>Producto Activo
            </label>
          </div>
        </div>

      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>