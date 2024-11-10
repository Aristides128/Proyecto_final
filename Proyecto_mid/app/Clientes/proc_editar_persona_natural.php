<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>

</body>

<?php
require_once '../../config/server_connection.php';

date_default_timezone_set("America/El_Salvador");
$fecha_registro = date("Y-m-d");

// Captura de variables
$id_cliente = @$_REQUEST['id'];
$nombre = @$_REQUEST['nombre'];
$tipo_cliente = "Persona natural";
$direccion = @$_REQUEST['direccion'];
$telefono = @$_REQUEST['telefono'];
$dui = @$_REQUEST['dui'];
$genero = @$_REQUEST['genero'];
$estado_civil = @$_REQUEST['estado_civil'];

// Verificación de campos obligatorios
$campos = [
  $nombre,
  $direccion,
  $telefono,
  $dui,
  $genero,
  $estado_civil,
];

foreach ($campos as $variables) {
  if (empty($variables)) {
    echo "<script>
      Swal.fire({
        title: 'Error al editar',
        text: 'Todos los campos son obligatorios',
        icon: 'error',
        confirmButtonText: 'Aceptar'
      }).then(() => {
        window.location.href = 'form_editar_persona_natural.php';
      });
    </script>";
    exit();
  }
}

// Conexión y ejecución de consulta sin inyecciones
$conexion = new ServerConnection();

$conexion->query = ("UPDATE tbl_clientes SET
    nombre = '{$nombre}',
    tipo_cliente = '{$tipo_cliente}',
    direccion = '{$direccion}', 
    telefono = '{$telefono}',
    dui = '{$dui}', 
    nit = NULL,
    nrc = NULL, 
    giro = NULL,
    genero = '{$genero}',
    estado_civil = '{$estado_civil}',
    fecha_registro = '{$fecha_registro}'
    WHERE id_cliente = '{$id_cliente}'");

// Ejecutar la consulta
if ($conexion->execute_query()) {
  echo "<script>
    Swal.fire({
      title: 'Persona natural editada',
      text: 'La persona natural ha sido editada con éxito',
      icon: 'success',
      confirmButtonText: 'Aceptar',
      timer: 3000
    }).then(() => {
      window.location.href = 'form_listar_todos.php';
    });
    </script>";
} else {
  echo "<script>
    Swal.fire({
      title: 'Error',
      text: 'No se pudo editar la persona natural.',
      icon: 'error',
      confirmButtonText: 'Aceptar'
    });
    </script>";
}
?>