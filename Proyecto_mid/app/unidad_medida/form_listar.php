<?php
require_once '../.././config/server_connection.php';
require_once '../.././utils/paginador.php';
$query = "SELECT * FROM tbl_unidades_medida";

$paginador = new Paginador();
if (isset($_GET['buscar']) && !empty($_GET['buscar'])) {
  $query .= " WHERE nombre LIKE '%" . $_GET['buscar'] . "%'
  OR id_unidad_medida LIKE '%" . $_GET['buscar'] . "%' 
  ";
}
$paginador->query = $query;
$paginador->registros_por_pag = 5;
$paginador->pag_actual = isset($_GET['pa']) ? (int)$_GET['pa'] : 1;
$paginador->destino = 'form_listar.php';
$paginador->crear_paginador();

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ferretería</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../assets/css/listar2.css">
  <!-- ESTILO DEL MENU -->
  <link rel="stylesheet" href="../../assets/css/Estilo.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- ESTILO DEL MENU -->
</head>

<body>
  <!-- INICIO DE CONTENIDO  DEL MENU -->
  <div class="sidebar close">
    <div class="logo-details">
      <i class="bi bi-tools" style="padding-top: 15px;"></i>
      <span class="logo_name">Ferreteria</span>
    </div>
    <ul class="nav-links">
      <li>
        <div class="iocn-link" style="padding-top: 15px;">
          <a href="#">
            <i class="bi bi-person-circle"></i>
            <span class="link_name">Administración</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <a class="link_name" href="#">Administración</a>
          <a href="#"><i class="bi bi-person-fill-add"> Clientes</i></a>
          <a href="#"><i class="bi bi-people-fill"> Usuarios</i></a>
          <a href="#"><i class="bi bi-person-bounding-box"> Proveedores</i></a>
        </ul>
      </li>
      <li>
        <div class="iocn-link" style="padding-top: 15px;">
          <a href="#">
            <i class="bi bi-hammer"></i>
            <span class="link_name">Productos</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <a class="link_name" href="#">Productos</i></a>
          <a href="#"><i class="bi bi-grid-fill"> Categorias</i></a>
          <a href="#"><i class="bi bi-tags-fill"> Marca</i></a>
          <a href="#"><i class="bi bi-inboxes-fill"> Presentaciones</i></a>
          <a href="#"><i class="bi bi-box-seam-fill"> Unidades de Medida</i></a>
          <a href="#"><i class="bi bi-inbox-fill"> Ubicaciones Fisicas</i></a>
        </ul>
      </li>
      <li style="padding-top: 15px;">
        <a href="#">
          <i class="bi bi-cart-check"></i>
          <span class="link_name">Compras</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Compras</a></li>
        </ul>
      </li>
      <li style="padding-top: 15px;">
        <a href="#">
          <i class="bi bi-cash-coin"></i>
          <span class="link_name">Ventas</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Ventas</a></li>
        </ul>
      </li>
      <li style="padding-top: 15px;">
        <a href="#">
          <i class="bi bi-folder-fill"></i>
          <span class="link_name">Documentos Fiscales</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Documentos Fiscales</a></li>
        </ul>
      </li>
      <li style="padding-top: 15px;">
        <a href="#">
          <i class="bi bi-truck"></i>
          <span class="link_name">Servicios</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Servicios</a></li>
        </ul>
      </li>
      <li style="padding-top: 15px;">
        <a href="#">
          <i class="bi bi-gear-fill"></i>
          <span class="link_name">Configuración</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Configuración</a></li>
        </ul>
      </li>
      <li>
        <div class="profile-details">
          <div class="profile-content">
            <img src="../../assets/images/Usuario.png" alt="profileImg">
          </div>
        </div>
      </li>
    </ul>
  </div>
  <!-- FIN DE CONTENIDO  DEL MENU -->

  <section class="home-section">
    <div class="container mt-5">
      <h2 class="list-header">Listado de Unidades de medida</h2>

      <!-- Barra de búsqueda -->
      <form action="" method="get" autocomplete="off">
        <div class="input-group mb-4">
          <input type="text" class="form-control" placeholder="Ingrese una Unidad de medida a buscar" name="buscar" id="buscar" onkeyup="generar_datagrid();"
            aria-label="Buscar Unidad" aria-describedby="button-buscar" value="<?php echo @$_GET['buscar'] ?>">
          <button class="btn btn-primary" type="submit" id="button-buscar"><i class="fas fa-search"></i>
            Buscar</button>
          <button class="btn btn-secondary" style="color: white;" type="button" id="button-buscar"><i
              class="bi bi-x-circle"></i> Limpiar</button>
        </div>
      </form>

      <!-- Botón de agregar Unidad de medida -->
      <div class="mb-4 text-end">
        <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalAgregarUnidad"><i
            class="fas fa-plus-circle"></i> Agregar Unidad Medida</button>
      </div>

      <!-- Tabla de Unidad de medida -->
      <div class="table-container" id="div_datagrid">
      </div>
    </div>

    <!-- Modal para agregar nueva Unidad de medida -->
    <form id="formAgregarUnidad" method="post" action="./proc_agregar.php">
      <div class="modal fade" id="modalAgregarUnidad" tabindex="-1" aria-labelledby="modalAgregarUnidadLabel"
        aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalAgregarUnidadLabel">Agregar Nueva Unidad de Medida</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label for="nombreUnidad" class="form-label">Nombre de la Unidad de Medida</label>
                <input type="text" class="form-control" id="nombreUnidad" name="nombreuni"
                  placeholder="Ingrese el nombre de la Unidad de medida">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary" onclick="agregarUnidad()">Guardar</button>
            </div>
          </div>
        </div>
      </div>
    </form>

    <!-- Modal para ver detalles de la Unidades de medida-->

    <div class="modal fade" id="modalVerDetalles" tabindex="-1" aria-labelledby="modalVerDetallesLabel"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalVerDetallesLabel">Detalles de la Unidad de medida</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p><strong>Id de Unidad de medida:</strong> <span id="detalleIdUnidad"></span></p>
            <p><strong>Nombre de la Unidad de medida:</strong> <span id="detalleNombreUnidad"></span></p>
            <!-- Agrega más detalles aquí si es necesario -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal para editar la Unidad de medida-->
    <form id="formEditarUnidad" action="./proc_editar.php" method="post">
      <div class="modal fade" id="modalEditarUnidad" tabindex="-1" aria-labelledby="modalEditarUnidadLabel"
        aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalEditarUnidadLabel">Editar Unidad</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!-- Campo oculto para el ID de la Unidad de medida-->
              <input type="hidden" id="idUnidad" name="id_unidad_medida">

              <div class="mb-3">
                <label for="nombreUnidadEditar" class="form-label">Nombre de la Unidad de medida</label>
                <input type="text" class="form-control" id="nombreUnidadEditar" name="nombre"
                  placeholder="Ingrese el nuevo nombre de la Unidad">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Guardar
                Cambios</button>
            </div>
          </div>
        </div>
      </div>
    </form>

    <script src="../../assets/js/ajax.parser.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      // Inicializar tooltips
      const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
      const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

      // Función para mostrar detalles de la Unidad de medida en el modal
      function verDetallesUnidad(id, nombre) {
        document.getElementById('detalleIdUnidad').innerText = id;
        document.getElementById('detalleNombreUnidad').innerText = nombre;

        const modalDetalles = new bootstrap.Modal(document.getElementById('modalVerDetalles'));
        modalDetalles.show();
      }

      // Función para mostrar el modal de edición
      function mostrarModalEditar(id, nombre) {
        UnidadEditando = nombre;
        Unidad_id = id;
        document.getElementById('idUnidad').value = id;
        document.getElementById('nombreUnidadEditar').value = nombre;

        const modalEditar = new bootstrap.Modal(document.getElementById('modalEditarUnidad'));
        modalEditar.show();
      }

      function eliminar(id_Unidad_medida) {
        Swal.fire({
          title: '¿Estás seguro?',
          text: "¡No podrás revertir esto!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Sí, eliminarlo!',
          timer: 5000,
          focusCancel: true,
          CancelButtonText: 'Cancelar'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = `./proc_eliminar.php?id=${encodeURIComponent(id_Unidad_medida)}`;;
          }
        });
      }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      // Ejecutar la búsqueda inicial al cargar la página
      window.onload = function() {
        generar_datagrid();
      };

      function generar_datagrid() {
        let buscar = document.getElementById("buscar").value || ''; // Si no hay búsqueda, buscar será vacío
        let pagina = <?php echo $paginador->pag_actual; ?>; // Obtenemos la página actual desde PHP y se la pasamos atravez de la url al form_listar.php de forma asincrona
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "./listado_unidades.php?buscar=" + buscar + "&pa=" + pagina, true); // Incluir número de página
        xhr.onload = function() {
          if (xhr.status === 200) {
            let div_response = document.getElementById("div_datagrid");
            div_response.innerHTML = xhr.responseText; // Inserta el contenido de listado_unidades.php en el div_datagrid
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
        generar_datagrid(); // Volver a cargar todos las Unidades de medida
      }
    </script>
    <script>
      function limpiarbusqueda() {
        window.location.href = 'form_listar.php';
      }
    </script>
  </section>
</body>

</html>