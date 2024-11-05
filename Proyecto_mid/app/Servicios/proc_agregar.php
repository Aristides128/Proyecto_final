<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<body>

</body>

<?php
require_once '../../config/server_connection.php';

$nombre = @$_REQUEST['nombre'];
$precio_venta1 = @$_REQUEST['precio_venta1'];
$precio_venta2 = @$_REQUEST['precio_venta2'];
$precio_venta3 = @$_REQUEST['precio_venta3'];

$arreglo = [$nombre, $precio_venta1, $precio_venta2, $precio_venta3,];

if ($arreglo == ' ') {
  echo "<script>
  Swal.fire({
  title: 'Error al agregar',
  text: 'El campo de agregar no puede ir vacio',
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
$conexion->query = "INSERT INTO tbl_servicios (
nombre,
precio_venta1,
precio_venta2,
precio_venta3
)
VALUES (
'{$nombre}',
'{$precio_venta1}',
'{$precio_venta2}',
'{$precio_venta3}'
)";

$conexion->execute_query();

echo "<script>
Swal.fire({
title: 'Servicio ingresada',
text: 'El servicio ha sido ingresada con éxito',
icon: 'success',
confirmButtonText: 'Aceptar',
timer: 3000
}).then(() => {
window.location.href = 'form_listar.php';
});
</script>";

?>