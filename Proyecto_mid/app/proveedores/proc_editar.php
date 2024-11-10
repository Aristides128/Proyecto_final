<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<body>

</body>
<?php
require_once '../../config/server_connection.php';


date_default_timezone_set("America/El_Salvador");
$fecha_registro = date("Y-m-d");


$id_proveedor = @$_REQUEST['id'];
$nombre = @$_REQUEST['nombre'];
$tipo_proveedor = @$_REQUEST['tipo_proveedor'];
$direccion = @$_REQUEST['direccion'];
$telefono = @$_REQUEST['telefono'];
$dui = @$_REQUEST['dui'];
$nrc = @$_REQUEST['nrc'];
$nit = @$_REQUEST['nit'];
$giro = @$_REQUEST['giro'];
$tiene_percepcion = @$_REQUEST['tiene_percepcion'];

$campos = [
  $nombre,
  $tipo_proveedor,
  $direccion,
  $telefono,
  $nit,
  $dui,
  $nrc,
  $giro,
  $tiene_percepcion,
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

$conexion->query = "UPDATE tbl_proveedores SET
nombre = '{$nombre}',
tipo_proveedor  = '{$tipo_proveedor}',
direccion = '{$direccion}',
telefono = '{$telefono}',
dui = '{$dui}',
nit = '{$nit}',
nrc = '{$nrc}',
giro = '{$giro}',
tiene_percepcion = '{$tiene_percepcion}',
fecha_registro = '{$fecha_registro}'
WHERE id_proveedor = '{$id_proveedor}'";

$conexion->execute_query();

echo "<script>
Swal.fire({
title: 'Proveedor editado',
text: 'El proveedor ha sido editado con éxito',
icon: 'success',
confirmButtonText: 'Aceptar',
timer: 3000
}).then(() => {
window.location.href = 'form_listar.php';
});
</script>";
