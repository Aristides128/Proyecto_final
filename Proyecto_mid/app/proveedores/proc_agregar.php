<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>

</body>
<?php
require_once '../../config/server_connection.php';

date_default_timezone_set("America/El_Salvador");
$fecha_registro = date("Y-m-d");

$nombre = @$_REQUEST['nombre'];
$tipo_proveedor = @$_REQUEST['tipo_proveedor'];
$direccion = @$_REQUEST['direccion'];
$telefono = @$_REQUEST['telefono'];
$dui = @$_REQUEST['dui'];
$nit = @$_REQUEST['nit'];
$nrc = @$_REQUEST['nrc'];
$giro = @$_REQUEST['Giro'];
$tiene_percepcion = @$_REQUEST['tiene_percepcion'];

$campos = [
  $nombre,
  $tipo_proveedor,
  $direccion,
  $telefono,
  $dui,
  $nrc,
  $giro,
  $tiene_percepcion,
];

foreach ($campos as $variables) {
  if ($variables === ' ') {
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

$conexion->query = ("INSERT INTO tbl_proveedores (
nombre,
tipo_proveedor,
direccion,
telefono,
dui,
nit,
nrc,
giro,
tiene_percepcion,
fecha_registro
)
 VALUES(
 '{$nombre}',
 '{$tipo_proveedor}',
 '{$direccion}',
 '{$telefono}',
 '{$dui}',
 '{$nit}',
 '{$nrc}',
 '{$giro}',
 '{$tiene_percepcion}',
 '{$fecha_registro}'
 )");

$conexion->execute_query();

echo "<script>
Swal.fire({
title: 'Proveedor registrado',
text: 'El proveedor ha sido registrado con éxito',
icon: 'success',
confirmButtonText: 'Aceptar',
timer: 3000
}).then(() => {
window.location.href = 'form_listar.php';
});
</script>";
