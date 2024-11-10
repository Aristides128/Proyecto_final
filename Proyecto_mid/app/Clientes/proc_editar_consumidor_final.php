<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>

</body>
<?php

require_once '../../config/server_connection.php';

date_default_timezone_set("America/El_Salvador");
$fecha_registro = date("Y-m-d");

$id_cliente = @$_REQUEST['id'];
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
$conexion->execute_query();

echo "<script>
Swal.fire({
title: 'Consumidor editado',
text: 'El consumidor ha sido editado con éxito',
icon: 'success',
confirmButtonText: 'Aceptar',
timer: 3000
}).then(() => {
window.location.href = './form_listar_todos.php';
});
</script>";


?>