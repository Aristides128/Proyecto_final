<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>

</body>

<?php
require_once '../../config/server_connection.php';

$nombre = @$_REQUEST['nombrema'];

if ($nombre == '') {
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
$conexion->query = "INSERT INTO tbl_marcas (nombre) 
    VALUES (
        '$nombre')";

$conexion->execute_query();

echo "<script>
    Swal.fire({
    title: 'Marca ingresada',
    text: 'La Marca ha sido ingresada con éxito',
    icon: 'success',
    confirmButtonText: 'Aceptar',
    timer: 3000
    }).then(() => {
    window.location.href = 'form_listar.php';
    });
</script>";

?>