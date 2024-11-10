<?php

$id = @$_GET['id'];
include_once "../../config/server_connection.php";
$con = new ServerConnection();
$con->query = "SELECT * FROM tbl_clientes WHERE id_cliente = $id";
$dt_cliente = $con->get_records();
$nombre = @$dt_cliente[0]['nombre'];
$genero = @$dt_cliente[0]['genero'];
$direccion = @$dt_cliente[0]['direccion'];
$telefono = @$dt_cliente[0]['telefono'];
$estado_civil = @$dt_cliente[0]['estado_civil'];
$dui = @$dt_cliente[0]['dui'];


?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Formulario editar personas naturales</title>
  <link rel="shortcut icon" href="../../assets/images/logo.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../../assets/css/estilo_formularios.css">
</head>

<body>
  <div class="container mt-5">
    <form name="form_nuevo" action="./proc_editar_persona_natural.php?id= <?php echo $id ?> " method="post" autocomplete="off">
      <div class="d-flex align-items-center mb-4">
        <h1 class="fw-bold" style="font-size: 28px; color: #495057; border-bottom: 2px solid #495057;">Módulo De Editar Personas Naturales</h1>
        <div class="ms-auto">
          <button type="submit" class="btn btn-agregar me-2"><i class="bi bi-floppy-fill"></i> Guardar</button>
          <a href="./form_listar_todos.php" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas cancelar?')"><i class="bi bi-x-square-fill"></i> Cancelar</a>
        </div>
      </div>

      <div class="card card-custom p-4">
        <!-- Sección Información Personal -->
        <div class="form-section">
          <div class="form-section-title">Información Personal</div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre Completo" value="<?php echo $nombre ?>" required>
                <label for="nombre"><i class="bi bi-person-fill me-2"></i>Nombre Completo</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <select class="form-control" id="genero" name="genero" required>
                  <option disabled selected>Seleccione</option>
                  <option value="Masculino" <?php echo ($genero == 'Masculino') ? 'selected' : '' ?>>Masculino</option>
                  <option value="Femenino" <?php echo ($genero == 'Femenino') ? 'selected' : '' ?>>Femenino</option>
                  <option value="No binario" <?php echo ($genero == 'No binario') ? 'selected' : '' ?>>Otro</option>
                </select>
                <label for="genero"><i class="bi bi-gender-ambiguous me-2"></i>Género</label>
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
                <textarea class="form-control" id="direccion" name="direccion" placeholder="Dirección" style="height: 100px;" required><?php echo $direccion ?></textarea>
                <label for="direccion"><i class="bi bi-geo-alt-fill me-2"></i>Dirección</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <select class="form-control" value="<?php echo $estado_civil ?>" id="estado_civil" name="estado_civil" required>
                  <option disabled selected>Seleccione</option>
                  <option value="Soltero" <?php echo ($estado_civil == 'Soltero') ? 'selected' : '' ?>>Soltero</option>
                  <option value="Casado" <?php echo ($estado_civil == 'Casado') ? 'selected' : '' ?>>Casado</option>
                  <option value="Divorciado" <?php echo ($estado_civil == 'Divorciado') ? 'selected' : '' ?>>Divorciado</option>
                  <option value="Viudo" <?php echo ($estado_civil == 'Viudo') ? 'selected' : '' ?>>Viudo</option>
                </select>
                <label for="estado_civil"><i class="bi bi-heart-fill me-2"></i>Estado Civil</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" required pattern="^[0-9]{8}$" value="<?php echo $telefono ?>">
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
                <input type="text" class="form-control" id="dui" name="dui" placeholder="DUI" required maxlength="10" value="<?php echo $dui ?>">
                <label for="dui"><i class="bi bi-credit-card-2-front-fill me-2"></i>DUI</label>
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