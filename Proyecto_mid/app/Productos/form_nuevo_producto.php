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
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agregar Nuevo Producto</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="../../assets/css/index_productos.css">
  <link rel="stylesheet" href="../../assets/css/estilo_agregar.css">
  <link rel="stylesheet" href="../../assets/css/estilodetalles.css">
</head>
<style>
  /* Encabezado */
  .text-center h2 {
    font-size: 1.8rem;
    color: black;
    font-weight: bold;
    margin-bottom: 20px;
  }

  /* Tarjetas */
  .card-header {
    font-weight: bold;
    color: orange;
    padding: 10px;
    text-align: center;

  }

  /* Imagen de vista previa */
  #preview {
    border-radius: 8px;
    max-width: 100%;
    height: auto;
    margin-top: 10px;
    display: block;
  }

  /* Responsive */
  @media (max-width: 768px) {
    .container-fluid {
      padding: 10px;
    }

    .card-header h5 {
      font-size: 1rem;
    }

    .text-center h2 {
      font-size: 1.5rem;
    }
  }
</style>

<body>
  <div class="sidebar close">
    <div class="logo-details">
      <i class="bi bi-person-circle"></i>
      <span class="logo_name">Clienes</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="#">
          <i class="bi bi-person-circle"></i>
          <span class="link_name">Clientes</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Category</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection'></i>
            <span class="link_name">Category</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Category</a></li>
          <li><a href="#">HTML & CSS</a></li>
          <li><a href="#">JavaScript</a></li>
          <li><a href="#">PHP & MySQL</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt'></i>
            <span class="link_name">Posts</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Posts</a></li>
          <li><a href="#">Web Design</a></li>
          <li><a href="#">Login Form</a></li>
          <li><a href="#">Card Design</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-pie-chart-alt-2'></i>
          <span class="link_name">Analytics</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Analytics</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-line-chart'></i>
          <span class="link_name">Chart</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Chart</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-plug'></i>
            <span class="link_name">Plugins</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Plugins</a></li>
          <li><a href="#">UI Face</a></li>
          <li><a href="#">Pigments</a></li>
          <li><a href="#">Box Icons</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-compass'></i>
          <span class="link_name">Explore</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Explore</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-history'></i>
          <span class="link_name">History</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">History</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-cog'></i>
          <span class="link_name">Setting</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Setting</a></li>
        </ul>
      </li>
      <li>
        <div class="profile-details">
          <div class="profile-content">
            <img src="image/profile.jpg" alt="profileImg">
          </div>
          <div class="name-job">
            <div class="profile_name">Prem Shahi</div>
            <div class="job">Web Desginer</div>
          </div>
          <i class='bx bx-log-out'></i>
        </div>
      </li>
    </ul>
  </div>

  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu'></i>
      <span class="title">Menu</span>
    </div>
    <div class="container-fluid">
      <div class="container-fluid">
        <div class="text-center">
          <h2>Agregar Nuevo Producto</h2>
        </div>
        <div class="card-body">
          <form action="./proc_agregar.php" method="POST" enctype="multipart/form-data">
            <!-- Botones de acción -->
            <div class="d-flex justify-content-end mb-4">
              <button type="submit" class="btn btn-success me-3"><i class="bi bi-floppy"></i> Guardar Cambios</button>
              <a href="index.html" class="btn btn-warning"><i class="bi bi-x-circle"></i> Cancelar</a>
            </div>

            <div class="row">
              <!-- Información básica -->
              <div class="col-md-6">
                <div class="card mb-4">
                  <div class="card-header bg-light">
                    <h5>Información Básica</h5>
                  </div>
                  <div class="card-body">
                    <div class="mb-3">
                      <label for="nombre" class="form-label">Nombre del Producto</label>
                      <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-box"></i></span>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej: Martillo">
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="id_marca" class="form-label">Marca</label>
                      <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-star"></i></span>
                        <select class="form-select" id="id_marca" name="id_marca">
                          <option value="" disabled selected>Selecciona una Marca</option>
                          <?php
                          foreach ($marcas as $marca) {
                            echo "<option value='" . $marca['id_marca'] . "'>" . $marca['nombre'] . "</option>";
                          }
                          ?>
                          <!-- Opciones de marca -->
                        </select>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="id_categoria" class="form-label">Categoría</label>
                      <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-tags"></i></span>
                        <select class="form-select" id="id_categoria" name="id_categoria">
                          <option value="" disabled selected>Selecciona una Categoría</option>
                          <?php
                          foreach ($categorias as $categoria) {
                            echo "<option value='" . $categoria['id_categoria'] . "'>" . $categoria['nombre'] . "</option>";
                          }
                          ?>
                          <!-- Opciones de categoría -->
                        </select>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="id_unidad" class="form-label">Unidad</label>
                      <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-star"></i></span>
                        <select class="form-select" id="id_unidad" name="id_unidad_medida">
                          <option value="" disabled selected>Selecciona una Unidad fisica</option>
                          <?php
                          foreach ($unidades as $unidad) {
                            echo "<option value='" . $unidad['id_unidad_medida'] . "'>" . $unidad['nombre'] . "</option>";
                          }
                          ?>
                          <!-- Opciones de unidades -->
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Precios y detalles -->
              <div class="col-md-6">
                <div class="card mb-4">
                  <div class="card-header bg-light">
                    <h5>Precios y Detalles</h5>
                  </div>
                  <div class="card-body">
                    <div class="mb-3">
                      <label for="id_Ubicacion" class="form-label">Ubicacion</label>
                      <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-star"></i></span>
                        <select class="form-select" id="id_ubidacion" name="id_ubicacion_fisica">
                          <option value="" disabled selected>Selecciona una Unidad</option>
                          <?php
                          foreach ($ubicaciones as $ubicacion) {
                            echo "<option value='" . $ubicacion['id_ubicacion_fisica'] . "'>" . $ubicacion['nombre'] . "</option>";
                          }
                          ?>
                          <!-- Opciones de Ubicaciones fisicas -->
                        </select>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="detalles" class="form-label">Detalles</label>
                      <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-info-circle"></i></span>
                        <textarea class="form-control" id="detalles" name="detalles" rows="3" placeholder="Descripción del producto"></textarea>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <label for="precio_venta1" class="form-label">Precio Venta 1</label>
                        <div class="input-group">
                          <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                          <input type="number" class="form-control" id="precio_venta1" name="precio_venta1" placeholder="$0.00" step="0.01" min="1">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label for="precio_venta2" class="form-label">Precio Venta 2</label>
                        <div class="input-group">
                          <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                          <input type="number" class="form-control" id="precio_venta2" name="precio_venta2" placeholder="$0.00" step="0.01" min="1">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label for="precio_venta3" class="form-label">Precio Venta 3</label>
                        <div class="input-group">
                          <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                          <input type="number" class="form-control" id="precio_venta3" name="precio_venta3" placeholder="$0.00" min="1" step="0.01">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <!-- Códigos y existencias -->
              <div class="col-md-6">
                <div class="card mb-4">
                  <div class="card-header bg-light">
                    <h5>Códigos y Existencias</h5>
                  </div>
                  <div class="card-body">
                    <div class="mb-3">
                      <label for="codigo_interno" class="form-label">Código Interno</label>
                      <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                        <input type="text" class="form-control" id="codigo_interno" name="codigo_interno">
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="codigo_barras" class="form-label">Código de Barras</label>
                      <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                        <input type="text" class="form-control" id="codigo_barras" name="codigo_barras">
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="existencias_minimas" class="form-label">Existencias Mínimas</label>
                      <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-boxes"></i></span>
                        <input type="number" class="form-control" id="existencias_minimas" name="existencias_minimas">
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <!-- Imagen y estado -->
              <div class="col-md-6">
                <div class="card mb-4">
                  <div class="card-header bg-light">
                    <h5>Imagen y Estado</h5>
                  </div>
                  <div class="card-body">
                    <div class="mb-3">
                      <label for="id_presentacion" class="form-label">Presentacion</label>
                      <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-star"></i></span>
                        <select class="form-select" id="id_presentacion" name="id_presentacion">
                          <option value="" disabled selected>Selecciona una Presentacion</option>
                          <?php
                          foreach ($presentaciones as $presentacion) {
                            echo "<option value='" . $presentacion['id_presentacion'] . "'>" . $presentacion['nombre'] . "</option>";
                          }
                          ?>
                          <!-- Opciones de presentacion -->
                        </select>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="imagen" class="form-label">Imagen</label>
                      <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-image"></i></span>
                        <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" onchange="previewImage(event)">
                      </div>
                      <img id="preview" src="#" alt="Vista previa" style="display: none; width: 100%; margin-top: 10px;">
                    </div>
                    <div class="form-check mt-3">
                      <input class="form-check-input" type="checkbox" id="activo" name="activo">
                      <label class="form-check-label" for="activo">Activo</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    </div>
  </section>
  <script src="../../assets/js/movimiento_menu.js"></script>
  <script>
    function previewImage(event) {
      const preview = document.getElementById('preview');
      preview.src = URL.createObjectURL(event.target.files[0]);
      preview.style.display = 'block';
    }
  </script>
</body>


</html>