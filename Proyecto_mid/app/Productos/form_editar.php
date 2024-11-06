<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Producto</title>
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

    <div class="content-wrapper container-fluid">
      <div class="container-fluid">
        <h2 class="edit-header text-center list-header">Editar Producto</h2>
        <form action="/guardar-producto" method="POST" enctype="multipart/form-data">
          <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-success me-3"><i class="bi bi-floppy2-fill"></i> Guardar Cambios</button>
            <button type="submit" class="btn btn-primary me-3"><i class="bi bi-plus-circle"></i> Nuevo producto</button>
            <a href="index.html" class="btn btn-warning"><i class="bi bi-x-lg"></i> Cancelar</a>
          </div>
          <div class="row">
            <!-- Información básica -->
            <div class="col-md-6">
              <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Producto</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-tag"></i></span>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                </div>
              </div>
              <div class="mb-3">
                <label for="id_marca" class="form-label">Marca</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-star"></i></span>
                  <select class="form-select" id="id_marca" name="id_marca" required>
                    <option value="" disabled selected>Selecciona Marca</option>
                  </select>
                </div>
              </div>
              <div class="mb-3">
                <label for="id_categoria" class="form-label">Categoría</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-th-list"></i></span>
                  <select class="form-select" id="id_categoria" name="id_categoria" required>
                    <option value="" disabled selected>Selecciona Categoría</option>
                  </select>
                </div>
              </div>
            </div>
            <!-- Información adicional -->
            <div class="col-md-6">
              <div class="mb-3">
                <label for="detalles" class="form-label">Detalles</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-info-circle"></i></span>
                  <textarea class="form-control" id="detalles" name="detalles" rows="3" placeholder="Detalles" required></textarea>
                </div>
              </div>
              <div class="mb-3">
                <label for="id_ubicacion_fisica" class="form-label">Ubicación Física</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                  <select class="form-select" id="id_ubicacion_fisica" name="id_ubicacion_fisica" required>
                    <option value="" disabled selected>Selecciona Ubicación Física</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="row mt-3">
            <!-- Precios -->
            <div class="col-md-4">
              <label class="form-label">Precios de Venta</label>
              <div class="input-group mb-2">
                <span class="input-group-text">$</span>
                <input type="number" class="form-control" id="precio_venta1" name="precio_venta1" placeholder="Precio Venta 1" step="0.01" required>
              </div>
              <div class="input-group mb-2">
                <span class="input-group-text">$</span>
                <input type="number" class="form-control" id="precio_venta2" name="precio_venta2" placeholder="Precio Venta 2" step="0.01" required>
              </div>
              <div class="input-group mb-2">
                <span class="input-group-text">$</span>
                <input type="number" class="form-control" id="precio_venta3" name="precio_venta3" placeholder="Precio Venta 3" step="0.01" required>
              </div>
            </div>

            <!-- Códigos y existencias -->
            <div class="col-md-4">
              <div class="mb-3">
                <label for="existencias_minimas" class="form-label">Existencias Mínimas</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-box"></i></span>
                  <input type="number" class="form-control" id="existencias_minimas" name="existencias_minimas" required>
                </div>
              </div>
              <div class="mb-3">
                <label for="codigo_interno" class="form-label">Código Interno</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-code"></i></span>
                  <input type="text" class="form-control" id="codigo_interno" name="codigo_interno" required>
                </div>
              </div>
              <div class="mb-3">
                <label for="codigo_barras" class="form-label">Código de Barras</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                  <input type="text" class="form-control" id="codigo_barras" name="codigo_barras" required>
                </div>
              </div>
            </div>

            <!-- Imagen y estado -->
            <div class="col-md-4">
              <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" onchange="previewImage(event)">
                <img id="preview" src="#" alt="Vista previa" style="display: none;">
              </div>
              <div class="form-check mt-3">
                <input class="form-check-input" type="checkbox" id="activo" name="activo">
                <label class="form-check-label" for="activo">Activo</label>
              </div>
            </div>
          </div>
        </form>
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