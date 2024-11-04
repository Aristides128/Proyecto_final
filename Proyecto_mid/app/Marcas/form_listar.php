<?php
require_once '../.././config/server_connection.php';
require_once '../.././utils/paginador.php';
$query = "SELECT * FROM tbl_marcas";

$paginador = new Paginador();
if (isset($_GET['buscar']) && !empty($_GET['buscar'])) {
  $query .= " WHERE nombre LIKE '%" . $_GET['buscar'] . "%'
  OR id_marcaLIKE '%" . $_GET['buscar'] . "%' 
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
  <title>Módulo de Listado de Marcas</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../assets/css/listar2.css">
</head>

<body>
  <div class="container mt-5">
    <h2 class="list-header">Módulo de Listado de Marcas</h2>

    <!-- Barra de búsqueda -->
    <form action="" method="get" autocomplete="off">
      <div class="input-group mb-4">
        <input type="text" class="form-control" placeholder="Ingrese una marca a buscar" name="buscar" id="buscar" onkeyup="generar_datagrid();"
          aria-label="Buscar marca" aria-describedby="button-buscar" value="<?php echo @$_GET['buscar'] ?>">
        <button class="btn btn-primary" type="submit" id="button-buscar"><i class="fas fa-search"></i>
          Buscar</button>
        <button class="btn btn-info" style="color: white;" type="button" id="button-buscar"><i
            class="bi bi-x-circle"></i> Limpiar busqueda</button>
      </div>
    </form>

    <!-- Botón de agregar marca -->
    <div class="mb-4 text-end">
      <button class="btn btn-agregar" data-bs-toggle="modal" data-bs-target="#modalAgregarMarca"><i
          class="fas fa-plus-circle"></i> Agregar Marca</button>
    </div>

    <!-- Tabla de marca -->
    <div class="table-container" id="div_datagrid">
    </div>
  </div>

  <!-- Modal para agregar nueva marca -->
  <form id="formAgregarMarca" method="post" action="./proc_agregar.php">
    <div class="modal fade" id="modalAgregarMarca" tabindex="-1" aria-labelledby="modalAgregarMarcaLabel"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAgregarMarcaLabel">Agregar Nueva Marca</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="nombreMarca" class="form-label">Nombre de la Marca</label>
              <input type="text" class="form-control" id="nombreMarca" name="nombrema"
                placeholder="Ingrese el nombre de la marca">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary" onclick="agregarMarca()">Guardar</button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <!-- Modal para ver detalles de la Marca -->

  <div class="modal fade" id="modalVerDetalles" tabindex="-1" aria-labelledby="modalVerDetallesLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalVerDetallesLabel">Detalles de la Marca</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p><strong>Id de Marca:</strong> <span id="detalleIdMarca"></span></p>
          <p><strong>Nombre de la Marca:</strong> <span id="detalleNombreMarca"></span></p>
          <!-- Agrega más detalles aquí si es necesario -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal para editar la Marca -->
  <form id="formEditarMarca" action="./proc_editar.php" method="post">
    <div class="modal fade" id="modalEditarMarca" tabindex="-1" aria-labelledby="modalEditarMarcaLabel"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalEditarMarcaLabel">Editar Marca</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Campo oculto para el ID de la Marca -->
            <input type="hidden" id="idMarca" name="id_marca">

            <div class="mb-3">
              <label for="nombreMarcaEditar" class="form-label">Nombre de la Marca</label>
              <input type="text" class="form-control" id="nombreMarcaEditar" name="nombre"
                placeholder="Ingrese el nuevo nombre de la Marca">
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

    // Función para mostrar detalles de la Marca en el modal
    function verDetallesMarca(id, nombre) {
      document.getElementById('detalleIdMarca').innerText = id;
      document.getElementById('detalleNombreMarca').innerText = nombre;

      const modalDetalles = new bootstrap.Modal(document.getElementById('modalVerDetalles'));
      modalDetalles.show();
    }

    // Función para mostrar el modal de edición
    function mostrarModalEditar(id, nombre) {
      MarcaEditando = nombre;
      Marca_id = id;
      document.getElementById('idMarca').value = id;
      document.getElementById('nombreMarcaEditar').value = nombre;

      const modalEditar = new bootstrap.Modal(document.getElementById('modalEditarMarca'));
      modalEditar.show();
    }

    function eliminar(id_Marca) {
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
          window.location.href = `./proc_eliminar.php?id=${encodeURIComponent(id_Marca)}`;;
        }
      });
    }

    function editar(id_Marca) {
      Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, editar!',
        timer: 5000,
        focusCancel: true,
        CancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = `./proc_editar.php?id=${encodeURIComponent(id_Marca)}`;;
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
      xhr.open("GET", "./listado_marcas.php?buscar=" + buscar + "&pa=" + pagina, true); // Incluir número de página
      xhr.onload = function() {
        if (xhr.status === 200) {
          let div_response = document.getElementById("div_datagrid");
          div_response.innerHTML = xhr.responseText; // Inserta el contenido de listado_marcas.php en el div_datagrid
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
      generar_datagrid(); // Volver a cargar todos las categorias
    }
  </script>
  <script>
    function limpiarbusqueda() {
      window.location.href = 'form_listar.php';
    }
  </script>
</body>

</html>