<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>

</body>

<?php

require_once '../../config/server_connection.php';

date_default_timezone_set("America/El_Salvador");
$fecha_registro = date("Y-m-d");

$id_producto = @$_REQUEST['id'];
$nombre = @$_REQUEST['nombre'];
$detalles = @$_REQUEST['detalles'];
$id_marca = @$_REQUEST['id_marca'];
$id_categoria = @$_REQUEST['id_categoria'];
$id_ubicacion_fisica = @$_REQUEST['id_ubicacion_fisica'];
$id_presentacion = @$_REQUEST['id_presentacion'];
$id_unidad_medida = @$_REQUEST['id_unidad_medida'];
$existencias_minimas = @$_REQUEST['existencias_minimas'];
$precio_venta1 = @$_REQUEST['precio_venta1'];
$precio_venta2 = @$_REQUEST['precio_venta2'];
$precio_venta3 = @$_REQUEST['precio_venta3'];
$codigo_interno = @$_REQUEST['codigo_interno'];
$codigo_barras = @$_REQUEST['codigo_barras'];
$imagen = @$_REQUEST['imagen'];
$activo = @$_REQUEST['activo'];


// $campos = [
//   $id_producto,
//   $nombre,
//   $detalles,
//   $id_marca,
//   $id_categoria,
//   $id_ubicacion_fisica,
//   $id_presentacion,
//   $id_unidad_medida,
//   $existencias_minimas,
//   $precio_venta1,
//   $precio_venta2,
//   $precio_venta3,
//   $codigo_interno,
// ];

// foreach ($campos as $variables) {
//   if (empty($variables)) {
//     echo "<script>
//     Swal.fire({
//     title: 'Error al actualizar',
//     text: 'Todos los campos son obligatorios',
//     icon: 'error',
//     confirmButtonText: 'Aceptar',
//     }).then(() => {
//     window.location.href = 'form_listar.php';
//     });
// </script>
//     ";
//     exit();
//   }
// }
if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
  $valid = getimagesize($_FILES['imagen']['tmp_name']);

  if (!$valid) {
    echo "<script>
    Swal.fire({
    title: 'Error al registrar',
    text: 'El archivo seleccionado no es una imagen',
    icon: 'error',
    confirmButtonText: 'Aceptar',
    }).then(() => {
    window.location.href = 'form_nuevo.php';
    });
    </script>";
    exit();
  }

  $name = "prod_" . date("YmdHis");
  $type = "." . pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
  $newLocation = '../../assets/images/imagen_productos/' . $name . $type;

  if (move_uploaded_file($_FILES['imagen']['tmp_name'], $newLocation)) {
    $imageurl = file_get_contents($newLocation);
    $imagen = $newLocation;
  } else {
    echo "Failed to move uploaded file.";
  }
}

$conexion = new ServerConnection();
$conexion->query =("UPDATE tbl_productos SET
    nombre = '{$nombre}', 
    detalles = '{$detalles}', 
    id_marca = '{$id_marca}',
    id_categoria = '{$id_categoria}',
    id_ubicacion_fisica = '{$id_ubicacion_fisica}', 
    id_presentacion = '{$id_presentacion}',
    id_unidad_medida = '{$id_unidad_medida}', 
    existencias_minimas = '{$existencias_minimas}',
    precio_venta1 = '{$precio_venta1}', 
    precio_venta2 = '{$precio_venta2}',
    precio_venta3 = '{$precio_venta3}', 
    codigo_interno = '{$codigo_interno}',
    codigo_barras = '{$codigo_barras}', 
    imagen = '{$imagen}',
    fecha_registro = '{$fecha_registro}', 
    activo = '{$activo}'
WHERE id_producto = '{$id_producto}'");

$conexion->execute_query();

echo "<script>
Swal.fire({
title: 'Producto actualizado',
text: 'El producto ha sido actualizado con éxito',
icon: 'success',
confirmButtonText: 'Aceptar',
timer: 3000
}).then(() => {
window.location.href = 'form_listar.php';
});
</script>";
