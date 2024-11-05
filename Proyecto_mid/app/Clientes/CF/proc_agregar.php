<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>

</body>
<?php

require_once '../../config/server_connection.php';

date_default_timezone_set("America/El_Salvador");
$fecha_registro = date("Y-m-d");


$nombre = @$_REQUEST['nombre'];
$tipo_cliente = @$_REQUEST['tipo_cliente'];
$direccion = @$_REQUEST['direccion'];
$telefono = @$_REQUEST['telefono'];
$dui = @$_REQUEST['dui'];

$campos = [
  $nombre,
  $tipo_cliente,
  $direccion,
  $telefono,
  $dui,
];

foreach ($campos as $variables) {
  if (empty($variables)) {
    echo "<script>
  Swal.fire({
  title: 'Error al registrar',
  text: 'Todos los campos son obligatorios',
  icon: 'error',
  confirmButtonText: 'Aceptar',
  }).then(() => {
  window.location.href = 'form_nuevo_producto.php';
  });
  </script>
  ";
    exit();
  }
}
$conexion = new ServerConnection();

$conexion->query = "INSERT INTO tbl_clientes(
nombre, tipo_cliente,
direccion, telefono,
dui, nit,
nrc, giro,
fecha_registro
) VALUES (
$nombre, $tipo_cliente,
$direccion, $telefono,
$dui, $nit,
$nrc, $giro,
$fecha_registro
)";
$conexion->execute_query();


echo "<script>
Swal.fire({
title: 'Cliente registrado',
text: 'El cliente ha sido registrado con éxito',
icon: 'success',
confirmButtonText: 'Aceptar',
timer: 3000
}).then(() => {
window.location.href = 'form_listar.php';
});
</script>";


?>