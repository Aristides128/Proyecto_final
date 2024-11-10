<?php
//marcas, categorias, ubicaciones fisicas, presentaciones, unidades de medida
require_once '../../config/server_connection.php';

// Marcas
$server = new ServerConnection();
$server->query = "SELECT * FROM tbl_marcas";
$marcas = $server->get_records();

// Categorias
$server->query = "SELECT * FROM tbl_categorias";
$categorias = $server->get_records();

// Ubicaciones fisicas
$server->query = "SELECT * FROM tbl_ubicaciones_fisicas";
$ubicaciones = $server->get_records();

// Presentaciones
$server->query = "SELECT * FROM tbl_presentaciones";
$presentaciones = $server->get_records();

// Unidades de medida
$server->query = "SELECT * FROM tbl_unidades_medida";
$unidades = $server->get_records();

?>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ferretería - Módulo de agregar Producto</title>
  <link rel="shortcut icon" href="../../assets/images/logo.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../../assets/css/Estilo.css">
  <link rel="stylesheet" href="../../assets/css/estilo_formularios.css">

<body>
  </head>

  <body>
    <div class="container mt-5">
      <form name="form_nuevo" action="./proc_agregar.php" method="post" autocomplete="off" enctype="multipart/form-data" >
        <div class="d-flex align-items-center mb-4">
          <h1 class="fw-bold" style="font-size: 28px; color: #495057; border-bottom: 2px solid #495057;">Módulo de agregar Producto</h1>
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
                    <option value="" disabled selected>Seleccionar Marca</option>
                    <!-- Aquí van las opciones de marcas -->
                    <?php
                    foreach ($marcas as $marca) {
                      echo "<option value='" . $marca['id_marca'] . "'>" . $marca['nombre'] . "</option>";
                    }
                    ?>
                  </select>
                  <label for="id_marca"><i class="bi bi-tags me-2"></i>Marca</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating">
                  <select class="form-control" id="id_categoria" name="id_categoria" required>
                    <option value="" disabled selected>Seleccionar Categoría</option>
                    <!-- Aquí van las opciones de categorías -->
                    <?php
                    foreach ($categorias as $categoria) {
                      echo "<option value='" . $categoria['id_categoria'] . "'>" . $categoria['nombre'] . "</option>";
                    }
                    ?>
                  </select>
                  <label for="id_categoria"><i class="bi bi-list-ul me-2"></i>Categoría</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating">
                  <select class="form-control" id="id_ubicacion_fisica" name="id_ubicacion_fisica" required>
                    <option value="" disabled selected>Seleccionar Ubicación Física</option>
                    <!-- Aquí van las opciones de ubicaciones -->
                    <?php
                    foreach ($ubicaciones as $ubicacion) {
                      echo "<option value='" . $ubicacion['id_ubicacion_fisica'] . "'>" . $ubicacion['nombre'] . "</option>";
                    }
                    ?>
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
                    <option value="" disabled selected>Seleccionar Presentación</option>
                    <!-- Aquí van las opciones de presentaciones -->
                    <?php
                    foreach ($presentaciones as $presentacion) {
                      echo "<option value='" . $presentacion['id_presentacion'] . "'>" . $presentacion['nombre'] . "</option>";
                    }
                    ?>
                  </select>
                  <label for="id_presentacion"><i class="bi bi-cup me-2"></i>Presentación</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <select class="form-control" id="id_unidad_medida" name="id_unidad_medida" required>
                    <option value="" disabled selected>Seleccionar Unidad de Medida</option>
                    <!-- Aquí van las opciones de unidades de medida -->
                    <?php
                    foreach ($unidades as $unidad) {
                      echo "<option value='" . $unidad['id_unidad_medida'] . "'>" . $unidad['nombre'] . "</option>";
                    }
                    ?>
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
              <input class="form-check-input" value="Activo" type="checkbox" id="activo" name="activo" checked>
              <label class="form-check-label" for="activo">
                <i class="bi bi-check-circle me-2"></i>Producto Activo
              </label>
            </div>
          </div>

        </div>
    </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>

</html>