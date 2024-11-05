<?php
require_once '../.././config/server_connection.php';
require_once '../.././utils/paginador.php';
$query = "SELECT * FROM tbl_ubicaciones_fisicas";

$paginador = new Paginador();
if (isset($_GET['buscar']) && !empty($_GET['buscar'])) {
  $query .= " WHERE nombre LIKE '%" . $_GET['buscar'] . "%'
  OR id_ubicacion_fisica LIKE '%" . $_GET['buscar'] . "%' 
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
</head>

<body>
  <div class="container mt-5">
    <h2 class="list-header">Listado de Ubicaciones</h2>

    <!-- Barra de búsqueda -->
    <form action="" method="get" autocomplete="off">
      <div class="input-group mb-4">
        <input type="text" class="form-control" placeholder="Ingrese una Ubicacion fisica a buscar" name="buscar" id="buscar" onkeyup="generar_datagrid();"
          aria-label="Buscar Ubicacion" aria-describedby="button-buscar" value="<?php echo @$_GET['buscar'] ?>">
        <button class="btn btn-primary" type="submit" id="button-buscar"><i class="fas fa-search"></i>
          Buscar</button>
        <button class="btn btn-secondary" style="color: white;" type="button" id="button-buscar"><i
            class="bi bi-x-circle"></i> Limpiar</button>
      </div>
    </form>

    <!-- Botón de agregar Ubicacion fisica -->
    <div class="mb-4 text-end">
      <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalAgregarUbicacion"><i
          class="fas fa-plus-circle"></i> Agregar Ubicacion fisica</button>
    </div>

    <!-- Tabla de Ubicacion fisica -->
    <div class="table-container" id="div_datagrid">
    </div>
  </div>

  <!-- Modal para agregar nueva Ubicacion fisica -->
  <form id="formAgregarUbicacion" method="post" action="./proc_agregar.php">
    <div class="modal fade" id="modalAgregarUbicacion" tabindex="-1" aria-labelledby="modalAgregarUbicacionLabel"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAgregarUbicacionLabel">Agregar Nueva Ubicacion fisica</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="nombreUbicacion" class="form-label">Nombre de la Ubicacion</label>
              <input type="text" class="form-control" id="nombreUbicacion" name="nombreubi"
                placeholder="Ingrese el nombre de la Ubicacion fisica">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary" onclick="agregarUbicacion()">Guardar</button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <!-- Modal para ver detalles de la Ubicacion fisica-->

  <div class="modal fade" id="modalVerDetalles" tabindex="-1" aria-labelledby="modalVerDetallesLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalVerDetallesLabel">Detalles de la Ubicacion fisica</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p><strong>Id de Ubicacion fisica:</strong> <span id="detalleIdUbicacion"></span></p>
          <p><strong>Nombre de la Ubicacion fisica:</strong> <span id="detalleNombreUbicacion"></span></p>
          <!-- Agrega más detalles aquí si es necesario -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal para editar la Ubicacion fisica -->
  <form id="formEditarUbicacion" action="./proc_editar.php" method="post">
    <div class="modal fade" id="modalEditarUbicacion" tabindex="-1" aria-labelledby="modalEditarUbicacionLabel"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalEditarUbicacionLabel">Editar Ubicacion</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Campo oculto para el ID de la Ubicacion fisica-->
            <input type="hidden" id="idUbicacion" name="id_ubicacion_fisica">

            <div class="mb-3">
              <label for="nombreUbicacionEditar" class="form-label">Nombre de la Ubicacion fisica</label>
              <input type="text" class="form-control" id="nombreUbicacionEditar" name="nombre"
                placeholder="Ingrese el nuevo nombre de la Ubicacion">
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

    // Función para mostrar detalles de la Ubicacion en el modal
    function verDetallesUbicacion(id, nombre) {
      document.getElementById('detalleIdUbicacion').innerText = id;
      document.getElementById('detalleNombreUbicacion').innerText = nombre;

      const modalDetalles = new bootstrap.Modal(document.getElementById('modalVerDetalles'));
      modalDetalles.show();
    }

    // Función para mostrar el modal de edición
    function mostrarModalEditar(id, nombre) {
      UbicacionEditando = nombre;
      Ubicacion_id = id;
      document.getElementById('idUbicacion').value = id;
      document.getElementById('nombreUbicacionEditar').value = nombre;

      const modalEditar = new bootstrap.Modal(document.getElementById('modalEditarUbicacion'));
      modalEditar.show();
    }

    function eliminar(id_Ubicacion_fisica) {
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
          window.location.href = `./proc_eliminar.php?id=${encodeURIComponent(id_Ubicacion_fisica)}`;;
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
      xhr.open("GET", "./listado_ubicaciones.php?buscar=" + buscar + "&pa=" + pagina, true); // Incluir número de página
      xhr.onload = function() {
        if (xhr.status === 200) {
          let div_response = document.getElementById("div_datagrid");
          div_response.innerHTML = xhr.responseText; // Inserta el contenido de listado_ubicaciones.php en el div_datagrid
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
      generar_datagrid(); // Volver a cargar todos las Ubicaciones fisicas
    }
  </script>
  <script>
    function limpiarbusqueda() {
      window.location.href = 'form_listar.php';
    }
  </script>
</body>

</html>