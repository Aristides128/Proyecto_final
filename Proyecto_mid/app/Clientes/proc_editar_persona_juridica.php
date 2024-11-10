<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>

</body>
<?php

require_once '../../config/server_connection.php';

date_default_timezone_set("America/El_Salvador");
$fecha_registro = date("Y-m-d");


$id = @$_REQUEST['id'];
$nombre = @$_REQUEST['nombre'];
$direccion = @$_REQUEST['direccion'];
$telefono = @$_REQUEST['telefono'];
$nit = @$_REQUEST['nit'];
$nrc = @$_REQUEST['nrc'];
$giro = @$_REQUEST['giro'];
$tipo_cliente = "Persona juridica";

$campos = [
  $nombre,
  $direccion,
  $telefono,
  $nit,
  $nrc,
  $giro,
];

foreach ($campos as $variables) {
  if (empty($variables)) {
    echo "<script>
  Swal.fire({
  title: 'Error al editar',
  text: 'Todos los campos son obligatorios',
  icon: 'error',
  confirmButtonText: 'Aceptar',
  }).then(() => {
  window.location.href = 'form_listar.php';
  });
  </script>
  ";
    exit();
  }
}


$conexion = new ServerConnection();

$conexion->query =("UPDATE tbl_clientes SET
    nombre = '{$nombre}',
    tipo_cliente = '{$tipo_cliente}',
    direccion = '{$direccion}', 
    telefono = '{$telefono}', 
    nit = '{$nit}',
    nrc = '{$nrc}', 
    giro = '{$giro}',
    fecha_registro = '{$fecha_registro}'
    WHERE id_cliente = '{$id}'");
$conexion->execute_query();

echo "<script>
Swal.fire({
title: 'Cliente editado',
text: 'El cliente ha sido editado con éxito',
icon: 'success',
confirmButtonText: 'Aceptar',
timer: 3000
}).then(() => {
window.location.href = 'form_listar_todos.php';
});
</script>";


?>