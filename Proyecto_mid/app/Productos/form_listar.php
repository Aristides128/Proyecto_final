<?php
require_once '../.././config/server_connection.php';
require_once '../.././utils/paginador.php';
$query = "SELECT * FROM tbl_productos";

$paginador = new Paginador();
if (isset($_GET['buscar']) && !empty($_GET['buscar'])) {
  $query .= " WHERE nombre LIKE '%" . $_GET['buscar'] . "%'
  OR detalles LIKE '%" . $_GET['buscar'] . "%' 
  ";
}
$paginador->query = $query;
$paginador->registros_por_pag = 6;
$paginador->pag_actual = isset($_GET['pa']) ? (int)$_GET['pa'] : 1;
$paginador->destino = 'form_listar.php';
$paginador->crear_paginador();

?>
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

    <!-- Adaptación de contenido al content-wrapper -->
    <div class="content-wrapper container-fluid">
      <div class=" container-fluid">
        <h2 class="text-center list-header">Módulo de Listado de Elementos</h2>

        <!-- Barra de búsqueda -->
        <div class="input-group mb-4">
          <input type="text" class="form-control" placeholder="Ingrese un producto a buscar" aria-label="Buscar elementos" aria-describedby="button-buscar"name="buscar" id="buscar" onkeyup="generar_datagrid();">
          <button class="btn btn-primary" type="button" ><i class="bi bi-search"></i> Buscar</button>
          <button class="btn btn-warning" type="button" id="button-buscar"><i class="bi bi-x-circle"></i> Limpiar</button>
        </div>
        <div class="container-fluid mt-4" id="div_datagrid">
        </div>
      </div>
    </div>
  </section>
  <script src="../../assets/js/movimiento_menu.js"></script>
  <!-- Bootstrap JS (Opcional) -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
  <script>
    // Inicializar tooltips
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
  </script>
</body>

</html>
<script>
  // Ejecutar la búsqueda inicial al cargar la página
  window.onload = function() {
    generar_datagrid();
  };

  function generar_datagrid() {
    let buscar = document.getElementById("buscar").value || ''; // Si no hay búsqueda, buscar será vacío
    let pagina = <?php echo $paginador->pag_actual; ?>; // Obtenemos la página actual desde PHP y se la pasamos atravez de la url al form_listar.php de forma asincrona
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "./listado_productos.php?buscar=" + buscar + "&pa=" + pagina, true); // Incluir número de página
    xhr.onload = function() {
      if (xhr.status === 200) {
        let div_response = document.getElementById("div_datagrid");
        div_response.innerHTML = xhr.responseText; // Inserta el contenido de listado_productos.php en el div_datagrid
      } else {
        console.error("Error en la solicitud: " + xhr.statusText);
      }
    };
    xhr.onerror = function() {
      console.error("Error en la conexión.");
    };
    xhr.send();
  }

  function limpiarBusqueda() {
    document.getElementById("buscar").value = ''; // Limpiar el campo de búsqueda
    generar_datagrid(); // Volver a cargar todos las Productos
  }
</script>