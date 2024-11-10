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
  title: 'Error al registrar',
  text: 'Todos los campos son obligatorios',
  icon: 'error',
  confirmButtonText: 'Aceptar',
  }).then(() => {
  window.location.href = 'form_nuevo_persona_juridica.php';
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
  nit,
  nrc, giro,
  fecha_registro,
  genero, estado_civil
  ) VALUES (
  '{$nombre}', '{$tipo_cliente}',
  '{$direccion}', '{$telefono}',
   '{$nit}',
  '{$nrc}', '{$giro}',
  '{$fecha_registro}', NULL, NULL
  )";

$conexion->execute_query();

echo "<script>
Swal.fire({
title: 'Persona juridica registrado',
text: 'La persona juridica ha sido registrado con éxito',
icon: 'success',
confirmButtonText: 'Aceptar',
timer: 3000
}).then(() => {
window.location.href = 'form_nuevo_persona_juridica.php';
});
</script>";


?>