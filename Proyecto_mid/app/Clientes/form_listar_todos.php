<?php
require_once '../../config/server_connection.php';
require_once '../../utils/paginador.php';

$query = "SELECT * FROM tbl_clientes";

$paginador = new Paginador();
if (isset($_GET['buscar']) && !empty($_GET['buscar'])) {
  $query .= " WHERE nombre LIKE '%" . $_GET['buscar'] . "%'
  OR tipo_cliente LIKE '%" . $_GET['buscar'] . "%' 
  OR direccion LIKE '%" . $_GET['buscar'] . "%'
  OR telefono LIKE '%" . $_GET['buscar'] . "%' 
  OR dui LIKE '%" . $_GET['buscar'] . "%' 
  OR nit LIKE '%" . $_GET['buscar'] . "%' 
  OR giro LIKE '%" . $_GET['buscar'] . "%' 
  OR fecha_registro LIKE '%" . $_GET['buscar'] . "%' 
  ";
}
$paginador->query = $query;
$paginador->registros_por_pag = 5;
$paginador->pag_actual = isset($_GET['pa']) ? (int)$_GET['pa'] : 1;
$paginador->destino = 'form_listar_todos.php';
$paginador->crear_paginador();

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ferretería</title>
  <link rel="shortcut icon" href="../../../assets/images/logo.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="../../assets/css/listar2.css">
</head>
<!-- CSS para mejorar el estilo de los selectores -->
<style>
  .custom-select {
    border-radius: 8px;
    /* Bordes redondeados */
    padding: 0.5rem 1rem;
    /* Relleno interior */
    background-color: #f8f9fa;
    /* Color de fondo claro */
    border: 2px solid #007bff;
    /* Borde azul */
    transition: all 0.3s ease;
    /* Transición suave para el cambio de color */
  }

  .custom-select:hover {
    border-color: #0056b3;
    /* Cambio de color en hover */
    background-color: #e9ecef;
    /* Fondo ligeramente más oscuro */
  }

  .custom-select:focus {
    border-color: #28a745;
    /* Borde verde cuando tiene el foco */
    box-shadow: 0 0 5px rgba(40, 167, 69, 0.5);
    /* Sombra sutil */
  }

  /* Estilo para las opciones dentro del select */
  .custom-select option {
    padding: 0.5rem;
    /* Relleno en las opciones */
  }
</style>

<body>
  <div class="container mt-5">
    <h2 class="list-header">Listado de Clientes</h2>

    <!-- Barra de búsqueda -->
    <form action="" method="get" autocomplete="off">
      <div class="input-group mb-4">
        <input type="text" class="form-control" placeholder="Ingrese un cliente a buscar" name="buscar" id="buscar" onkeyup="ejecutarFuncion();"
          aria-label="Buscar Cliente" aria-describedby="button-buscar" value="">
        <button class="btn btn-primary" onkeyup="ejecutarFuncion();" type="submit" id="button-buscar"><i class="fas fa-search"></i>
          Buscar</button>
        <button class="btn btn-secondary" style="color: white;" type="button" id="button-buscar"><i
            class="bi bi-x-circle"></i> Limpiar</button>
      </div>
    </form>

    <div class="mb-4 d-flex align-items-center justify-content-end gap-3">
      <!-- Selector de tipo de cliente  -->
      <select id="select-funcion" class="form-select form-select-sm custom-select select-with-icons" style="max-width: 200px;" onchange="cambiarFuncion();">
        <option value="Todos_clientes" data-icon="fas fa-users">Todos los clientes</option>
        <option value="Personas_naturales" data-icon="fas fa-user">Persona natural</option>
        <option value="Personas_juridicas" data-icon="fas fa-building">Persona jurídica</option>
        <option value="Consumidores_finales" data-icon="fas fa-user-tag">Consumidores finales</option>
      </select>

      <!-- Selector de nuevo cliente -->
      <select id="nuevo-cliente" class="form-select form-select-sm custom-select select-with-icons" style="max-width: 200px;" onchange="if (this.value) window.location.href=this.value;">
        <option disabled selected>Seleccione</option>
        <option value="./form_nuevo_persona_natural.php" data-icon="fas fa-user-plus">Nueva Persona natural</option>
        <option value="./form_nuevo_persona_juridica.php" data-icon="fas fa-building">Nuevo Persona jurídica</option>
        <option value="./form_nuevo_Consumidor_final.php" data-icon="fas fa-user-check">Nuevo Consumidor final</option>
      </select>
    </div>

    <!-- Tabla de Clientes -->
    <div class="table-container" id="div_datagrid">

    </div>
  </div>

</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
  // Inicializar tooltips
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
  const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
</script>

<script>
  function limpiarbusqueda() {
    window.location.href = 'form_listar.php';
  }
</script>
<script>
  let funcionSeleccionada = "Todos_clientes"; // Función por defecto

  // función a ejecutar según la opción seleccionada
  function cambiarFuncion() {
    const select = document.getElementById("select-funcion");
    funcionSeleccionada = select.value;
  }

  // Ejecutar la función correspondiente en el evento keyup del input
  function ejecutarFuncion() {
    switch (funcionSeleccionada) {
      case "Todos_clientes":
        Buscar_todos_clientes();
        break;
      case "Personas_naturales":
        Personas_naturales();
        break;
      case "Personas_juridicas":
        Personas_juridicas();
        break;
      case "Consumidores_finales":
        Clientesfinales();
        break;
      default:
    }
  }

  // Función para buscar todos los clientes
  function Buscar_todos_clientes() {
    generar_datagrid();
  }

  // Ejecutar la búsqueda inicial al cargar la página
  window.onload = function() {
    generar_datagrid();
   
  };

  function generar_datagrid() {
    let buscar = document.getElementById("buscar").value || ''; // Si no hay búsqueda, buscar será vacío
    let pagina = <?php echo $paginador->pag_actual; ?>; // Obtenemos la página actual desde PHP y se la pasamos atravez de la url al form_listar.php de forma asincrona
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "./listado_todos_clientes.php?buscar=" + buscar + "&pa=" + pagina, true); // Incluir número de página
    xhr.onload = function() {
      if (xhr.status === 200) {
        let div_response = document.getElementById("div_datagrid");
        div_response.innerHTML = xhr.responseText; // Inserta el contenido de todos los clientes listado_clientes.php en el div_datagrid
      } else {
        console.error("Error en la solicitud: " + xhr.statusText);
      }
    };
    xhr.onerror = function() {
      console.error("Error en la conexión.");
    };
    xhr.send();
  }

  // Función para buscar clientes finales
  function Clientesfinales() {
    generar_datagrid2();
  }

  function generar_datagrid2() {
    let buscar = document.getElementById("buscar").value || ''; // Si no hay búsqueda, buscar será vacío
    let pagina = <?php echo $paginador->pag_actual; ?>; // Obtenemos la página actual desde PHP y se la pasamos atravez de la url al form_listar.php de forma asincrona
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "./listado_consumidor_final.php?buscar=" + buscar + "&pa=" + pagina, true); // Incluir número de página
    xhr.onload = function() {
      if (xhr.status === 200) {
        let div_response = document.getElementById("div_datagrid");
        div_response.innerHTML = xhr.responseText; // Inserta el contenido de Clientes finales listado_clientes.php en el div_datagrid
      } else {
        console.error("Error en la solicitud: " + xhr.statusText);
      }
    };
    xhr.onerror = function() {
      console.error("Error en la conexión.");
    };
    xhr.send();
  }

  // Función para buscar Personas naturales
  function Personas_naturales() {
    generar_datagrid3();
  }

  function generar_datagrid3() {
    let buscar = document.getElementById("buscar").value || ''; // Si no hay búsqueda, buscar será vacío
    let pagina = <?php echo $paginador->pag_actual; ?>; // Obtenemos la página actual desde PHP y se la pasamos atravez de la url al form_listar.php de forma asincrona
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "./listado_persona_naturales.php?buscar=" + buscar + "&pa=" + pagina, true); // Incluir número de página
    xhr.onload = function() {
      if (xhr.status === 200) {
        let div_response = document.getElementById("div_datagrid");
        div_response.innerHTML = xhr.responseText; // Inserta el contenido de personas naturales en listado_clientes.php en el div_datagrid
      } else {
        console.error("Error en la solicitud: " + xhr.statusText);
      }
    };
    xhr.onerror = function() {
      console.error("Error en la conexión.");
    };
    xhr.send();
  }

  function Personas_juridicas() {
    generar_datagrid4();
  }

  function generar_datagrid4() {
    let buscar = document.getElementById("buscar").value || ''; // Si no hay búsqueda, buscar será vacío
    let pagina = <?php echo $paginador->pag_actual; ?>; // Obtenemos la página actual desde PHP y se la pasamos atravez de la url al form_listar.php de forma asincrona
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "./listado_persona_juridica.php?buscar=" + buscar + "&pa=" + pagina, true); // Incluir número de página
    xhr.onload = function() {
      if (xhr.status === 200) {
        let div_response = document.getElementById("div_datagrid");
        div_response.innerHTML = xhr.responseText; // Inserta el contenido de personas juridicas en listado_clientes.php en el div_datagrid
      } else {
        console.error("Error en la solicitud: " + xhr.statusText);
      }
    };
    xhr.onerror = function() {
      console.error("Error en la conexión.");
    };
    xhr.send();
  }
</script>
<script>
  function eliminar(id) {
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
        window.location.href = `./proc_eliminar.php?id=${encodeURIComponent(id)}`;;
      }
    });
  }
</script>