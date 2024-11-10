<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>

</body>
<?php
require_once '../../config/server_connection.php';

date_default_timezone_set("America/El_Salvador");
$fecha_registro = date("Y-m-d");


$nombre = @$_REQUEST['nombre'];
$direccion = @$_REQUEST['direccion'];
$telefono = @$_REQUEST['telefono'];
$dui = @$_REQUEST['dui'];
$genero = @$_REQUEST['genero'];
$estado_civil = @$_REQUEST['estado_civil'];
$tipo_cliente = "Consumidor final";


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
  title: 'Error al registrar',
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

$conexion->query = "INSERT INTO tbl_clientes(
  nombre, tipo_cliente,
  direccion, telefono,
  dui, nit,
  nrc, giro,
  fecha_registro,
  genero, estado_civil
  ) VALUES (
  '{$nombre}', '{$tipo_cliente}',
  '{$direccion}', '{$telefono}',
  '{$dui}', NULL,
  NULL, NULL,
  '{$fecha_registro}','{$genero}', '{$estado_civil}'
  )";

$conexion->execute_query();


echo "<script>
Swal.fire({
title: 'Consumidor registrado',
text: 'El Consumidor final ha sido registrado con éxito',
icon: 'success',
confirmButtonText: 'Aceptar',
timer: 3000
}).then(() => {
window.location.href = 'form_listar_todos';
});
</script>";

?>