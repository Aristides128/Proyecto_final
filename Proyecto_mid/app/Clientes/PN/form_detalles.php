<?php
// Clase para la conexión
include_once '../../../config/server_connection.php';
// Creación del objeto de conexión
$conn = new ServerConnection();
// Estructura de la consulta para mostrar los detalles del registro
$conn->query = "SELECT * 
FROM tbl_clientes 
WHERE id_cliente = '{$_GET["idcl"]}' ";

// Se obtienen los datos de la consulta
$dt_cliente = $conn->get_records();
?>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Ferretería</title>
  <link rel="shortcut icon" href="../../../assets/images/logo.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../../assets/css/estilo_agregar.css">
</head>

<body>

  <div class="container-fluid" style="padding-top: 10px;">
    <form name="form_detalles" action="" method="post" autocomplete="off">
      <div class="d-flex align-items-center mb-3">
          <h1 class="titulo_bienvenida">Módulo de Clientes</h1>
        
        <div class="ms-auto">
          <a href="./form_listar.php" class="btn btn-outline-primary"><i class="bi bi-arrow-left-square-fill"></i> Regresar</a>
          <a href="./form_editar.php?idcl=<?php echo $_GET['idcl']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Editar</a>
          <a href="#" class="btn btn-danger" onclick="eliminar();"><i class="bi bi-trash3-fill"></i> Eliminar</a>
          <a href="../../index.php" class="btn btn-secondary"><i class="bi bi-arrow-up-left-square-fill"></i> Cerrar</a>
        </div>
      </div>
      <div class="card text-dark bg-light mb-3 card-shadow">
        <div class="card-header"><strong>Detalles de Cliente</strong></div>
        <div class="card-body">

          <div class="row mb-3">
            <label for="nombre" class="col-2 col-form-label">Nombre Completo:</label>
            <div class="col-10">
              <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $dt_cliente[0]["nombre"]; ?>" readonly>
            </div>
          </div>

          <div class="row mb-3">
            <label for="genero" class="col-2 col-form-label">Género:</label>
            <div class="col-10">
              <select name="genero" id="genero" value="<?php echo $dt_cliente[0]["genero"]; ?>">
              <option value="seleccione">Seleccione...</option>
                <option value="m">Masculino</option>
                <option value="f">Femenino</option>
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <label for="direccion" class="col-2 col-form-label">Dirección:</label>
            <div class="col-10">
              <textarea class="form-control" name="direccion" id="direccion"><?php echo $dt_cliente[0]["direccion"]; ?></textarea>
            </div>
          </div>
          <div class="row mb-3">
            <label for="estadocivil" class="col-2 col-form-label">Estado Civil:</label>
            <div class="col-10">
              <select name="estadocivil" id="estadocivil" value="<?php echo $dt_cliente[0]["estadocivil"]; ?>">
                <option value="seleccione">Seleccione...</option>
                <option value="s">Soltero/a</option>
                <option value="c">Casado/a</option>
                <option value="d">Divorciado/a</option>
                <option value="v">Viudo/a</option>
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <label for="telefono" class="col-2 col-form-label">Teléfono:</label>
            <div class="col-10">
              <input type="text" class="form-control" name="telefono" id="telefono" value="<?php echo $dt_cliente[0]["telefono"]; ?>" readonly>
            </div>
          </div>

          <div class="row mb-3">
            <label for="dui" class="col-2 col-form-label">DUI:</label>
            <div class="col-10">
              <input type="text" class="form-control" name="dui" id="dui" value="<?php echo $dt_cliente[0]["dui"]; ?>">
            </div>
          </div>

      </div>
  </div>
  </form>
  </div>

</body>

</html>

<script>
  function eliminar() {
    Swal.fire({
      title: '¿Eliminar Cliente?',
      text: "Esta acción no puede revertirse",
      icon: 'question',
      timer: 5000,
      showCancelButton: true,
      focusCancel: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.replace('./proc_eliminar.php?idcl=<?php echo $_GET["idcl"]; ?>');
      }
    })
  }

  <?php
  if (isset($_GET['msg']) && $_GET['msg'] == "agregado") {
  ?>
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Registro agregado',
      showConfirmButton: true,
      timer: 2000
    })
  <?php } ?>

  <?php
  if (isset($_GET['msg']) && $_GET['msg'] == "actualizado") {
  ?>
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Registro actualizado',
      showConfirmButton: true,
      timer: 2000
    })
  <?php } ?>
</script>