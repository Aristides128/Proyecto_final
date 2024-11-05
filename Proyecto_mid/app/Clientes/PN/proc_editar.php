<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>

</body>
<?php

require_once '../../config/server_connection.php';

date_default_timezone_set("America/El_Salvador");
$fecha_registro = date("Y-m-d");

$id_cliente = @$_REQUEST['id_cliente'];
$nombre = @$_REQUEST['nombre'];
$tipo_cliente = @$_REQUEST['tipo_cliente'];
$direccion = @$_REQUEST['direccion'];
$telefono = @$_REQUEST['telefono'];
$dui = @$_REQUEST['dui'];
$nit = @$_REQUEST['nit'];
$nrc = @$_REQUEST['nrc'];
$giro = @$_REQUEST['giro'];

$campos = [
  $nombre,
  $tipo_cliente,
  $direccion,
  $telefono,
  $dui,
  $nit,
  $nrc,
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

$conexion->query = "UPDATE tbl_clientes SET
nombre = '{$nombre}',
tipo_cliente = '{$tipo_cliente}',
direccion = '{$direccion}', 
telefono = '{$telefono}',
dui = '{$dui}', 
nit = '{$nit}',
nrc = '{$nrc}', 
giro = '{$giro}',
fecha_registro = '{$fecha_registro}'
";

$conexion->execute_query();

echo "<script>
Swal.fire({
title: 'Cliente editado',
text: 'El cliente ha sido editado con éxito',
icon: 'success',
confirmButtonText: 'Aceptar',
timer: 3000
}).then(() => {
window.location.href = 'form_listar.php';
});
</script>";


?>