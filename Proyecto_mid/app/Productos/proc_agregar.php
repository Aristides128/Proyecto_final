<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<body>

</body>

<?php

require_once '../../config/server_connection.php';



date_default_timezone_set("America/El_Salvador");
$fecha_registro = date("Y-m-d");

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
$imageurl = "";


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
    window.location.href = 'form_listar.php';
    });
    </script>
    ";
    exit();
  }
  $name = "prod_" . date("YmdHis");
  $type = "." . pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
  $newLocation = '../../assets/images/imagen_productos/' . $name . $type;
  if (move_uploaded_file($_FILES['imagen']['tmp_name'], $newLocation)) {
    $imagen = file_get_contents($newLocation);
    $imageurl = $newLocation;
  } else {
    echo "Failed to move uploaded file.";
  }
} else {
  echo "No file was uploaded.";
}
$conexion = new ServerConnection();

$conexion->query = "INSERT INTO tbl_productos 
(nombre, detalles, 
id_marca, id_categoria,
id_ubicacion_fisica, id_presentacion,
id_unidad_medida, existencias_minimas,
precio_venta1, precio_venta2,
precio_venta3, codigo_interno,
codigo_barras, imagen,
fecha_registro, activo
) VALUES 
(
'$nombre', '$detalles',
'$id_marca', '$id_categoria',
'$id_ubicacion_fisica', '$id_presentacion',
'$id_unidad_medida', '$existencias_minimas',
'$precio_venta1', '$precio_venta2',
'$precio_venta3', '$codigo_interno',
'$codigo_barras', '$imageurl',
'$fecha_registro', '$activo'
)";

$conexion->execute_query();