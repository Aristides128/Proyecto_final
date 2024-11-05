<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<body>

</body>

<?php
require_once '../../config/server_connection.php';

$id_servicio = @$_REQUEST['id_servicio'];
$nombre = @$_REQUEST['nombre'];
$precio_venta1 = @$_REQUEST['precio_venta1'];
$precio_venta2 = @$_REQUEST['precio_venta2'];
$precio_venta3 = @$_REQUEST['precio_venta3'];

$arreglo = [$nombre, $precio_venta1, $precio_venta2, $precio_venta3,];

if ($arreglo == ' ') {
  echo "<script>
  Swal.fire({
  title: 'Error al editar',
  text: 'El campo de editar no puede ir vacio',
  icon: 'error',
  confirmButtonText: 'Aceptar',
  timer: 3000
  }).then(() => {
  window.location.href = 'form_listar.php';
  });
  </script>
  ";
  exit();
}

$conexion = new ServerConnection();
$conexion->query = "UPDATE tbl_servicios SET
nombre = '{$nombre}',
precio_venta1 = '{$precio_venta1}',
precio_venta2 = '{$precio_venta2}',
precio_venta3 = '{$precio_venta3}'
WHERE id_servicios = '{$id_servicio}'
";

$conexion->execute_query();

echo "<script>
Swal.fire({
title: 'Servicio editado',
text: 'El servicio ha sido editado con éxito',
icon: 'success',
confirmButtonText: 'Aceptar',
timer: 3000
}).then(() => {
window.location.href = 'form_listar.php';
});
</script>";

?>