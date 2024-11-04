<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listar productos</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Boxicons CSS -->
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../../assets/css/index_productos.css">
  <link rel="stylesheet" href="../../assets/css/estilo_listar.css">
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

    <!-- Adaptación de contenido al content-wrapper -->
    <div class="content-wrapper container-fluid">
        <div class="container-fluid">
          <h2 class="edit-header">Detalles del Producto</h2>
          <div class="d-flex justify-content-end mt-4 clase1">
            <button type="submit" class="btn btn-primary me-3"><i class="bi bi-plus-circle"></i> Nuevo producto</button>
            <a href="index.html" class="btn btn-warning"><i class="bi bi-x-lg"></i> Cancelar</a>
          </div>
          <div class="row">
            <div class="col-md-6">
              <h4 class="section-title">Información del Producto</h4>
              <div class="product-detail">
                <h4>Nombre del Producto</h4>
                <p id="nombre">Nombre del Producto Ejemplo</p>

                <h4>Marca</h4>
                <p id="marca">Marca Ejemplo</p>

                <h4>Categoría</h4>
                <p id="categoria">Categoría Ejemplo</p>

                <h4>Detalles</h4>
                <p id="detalles">Detalles del producto aquí.</p>
              </div>
            </div>
            <div class="col-md-6 text-center">
              <img src="ruta/a/la/imagen.jpg" alt="Imagen del Producto" class="product-image">
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-md-4">
              <h4 class="section-title">Precios de Venta</h4>
              <div class="product-detail">
                <p id="precio1">Precio 1: $10.00</p>
                <p id="precio2">Precio 2: $15.00</p>
                <p id="precio3">Precio 3: $20.00</p>
              </div>
            </div>
            <div class="col-md-4">
              <h4 class="section-title">Existencias</h4>
              <div class="product-detail">
                <p id="existencias_minimas">Existencias Mínimas: 5</p>
                <p id="codigo_interno">Código Interno: 12345</p>
                <p id="codigo_barras">Código de Barras: 67890</p>
              </div>
            </div>
            <div class="col-md-4">
              <h4 class="section-title">Estado</h4>
              <div class="product-detail">
                <p id="estado">Activo</p>
              </div>
            </div>
          </div>
        </div>
      
    </div>
  </section>
  <!-- Bootstrap JS (Opcional) -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
  <script src="../../assets/js/movimiento_menu.js"></script>
</body>

</html>