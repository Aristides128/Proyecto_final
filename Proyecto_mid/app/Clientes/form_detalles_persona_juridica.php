<?php

$id = @$_GET['id'];
include_once "../../config/server_connection.php";
$con = new ServerConnection();
$con->query = "SELECT * FROM tbl_clientes WHERE id_cliente = $id";
$dt_cliente = $con->get_records();
$nombre = @$dt_cliente[0]['nombre'];
$direccion = @$dt_cliente[0]['direccion'];
$telefono = @$dt_cliente[0]['telefono'];
$nit = @$dt_cliente[0]['nit'];
$giro = @$dt_cliente[0]['giro'];
$nrc = @$dt_cliente[0]['nrc'];
$dui = @$dt_cliente[0]['dui'];
$tipo_cliente  = @$_REQUEST['tipo_cliente'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Formulario detalles personas Juridicas</title>
  <link rel="shortcut icon" href="../../assets/images/logo.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../../assets/css/estilo_formularios.css">
</head>

<body>
  <div class="container mt-5">

      <div class="d-flex align-items-center mb-4">
        <h1 class="fw-bold" style="font-size: 28px; color: #495057; border-bottom: 2px solid #495057;">Módulo De detalles Personas Juridicas</h1>
        <div class="ms-auto">
          <button type="submit" class="btn btn-agregar me-2"><i class="bi bi-floppy-fill"></i> Guardar</button>
          <a href="./form_listar_todos.php" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas cancelar?')"><i class="bi bi-x-square-fill"></i> Cancelar</a>
        </div>
      </div>

      <div class="card card-custom p-4">
        <div class="form-section">
          <div class="form-section-title">Información Personal</div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" value="<?php echo $nombre ?>" id="nombre" disabled name="nombre" placeholder="Nombre Completo" required>
                <label for="nombre"><i class="bi bi-person-fill me-2"></i>Nombre Completo</label>
              </div>
            </div>
          </div>
        </div>

        <!-- Sección Contacto -->
        <div class="form-section highlight">
          <div class="form-section-title">Información de Contacto</div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="form-floating">
                <textarea class="form-control" id="direccion" name="direccion" placeholder="Dirección"  disabled style="height: 100px;" value="" required><?php echo $direccion ?></textarea>
                <label for="direccion"><i class="bi bi-geo-alt-fill me-2"></i>Dirección</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Teléfono"  disabled value="<?php echo $telefono ?>" required pattern="^[0-9]{8}$">
                <label for="telefono"><i class="bi bi-telephone-fill me-2"></i>Teléfono</label>
              </div>
            </div>
          </div>
        </div>

        <!-- Sección Documentación -->
        <div class="form-section">
          <div class="form-section-title">Documentación</div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" id="dui" name="dui" placeholder="DUI" required maxlength="10" disabled value="<?php echo $dui ?>">
                <label for="dui"><i class="bi bi-credit-card-2-front-fill me-2"></i>DUI</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" id="nit" name="nit" placeholder="NIT" value="<?php echo $nit ?>" disabled required maxlength="17">
                <label for="nit"><i class="bi bi-file-earmark-text-fill me-2"></i>NIT</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" id="nrc" name="nrc" placeholder="NRC" value="<?php echo $nrc ?>" disabled required>
                <label for="nrc"><i class="bi bi-briefcase-fill me-2"></i>NRC</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" id="giro" name="giro" placeholder="Giro" value="<?php echo $giro ?>" disabled required>
                <label for="giro"><i class="bi bi-building me-2"></i>Giro</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" id="tipo_cliente" name="tipo_cliente" placeholder="tipo_cliente" value="<?php echo $tipo_cliente ?>" disabled required>
                <label for="giro"><i class="bi bi-building me-2"></i></label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>