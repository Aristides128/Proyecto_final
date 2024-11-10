<?php

require_once '../../config/server_connection.php';

$id_usuario = @$_REQUEST['id'];
$conexion = new ServerConnection();

$conexion->query = "SELECT * FROM tbl_usuarios WHERE id_usuario = '{$id_usuario}'";
$dt_usuarios = $conexion->get_records();

$nombre_completo = $dt_usuarios[0]['nombre_completo'];
$usuario = $dt_usuarios[0]['usuario'];
$contrasena =  $dt_usuarios[0]['contrasena'];
$tipo_perfil = $dt_usuarios[0]['tipo_perfil'];

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ferretería - Módulo de ver Usuarios</title>
  <link rel="shortcut icon" href="../../assets/images/logo.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <style>
    body {
      background-color: #f1f3f5;
      font-family: 'Arial', sans-serif;
      color: #495057;
    }

    .card-custom {
      border-radius: 12px;
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
      background-color: #ffffff;
      border: none;
    }

    .form-section {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 10px;
      margin-bottom: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .form-section-title {
      font-size: 1.2rem;
      font-weight: bold;
      color: #495057;
      margin-bottom: 10px;
    }

    .form-control {
      border-radius: 8px;
      border: 1px solid #e0e0e0;
      background-color: #fafafa;
      transition: border-color 0.3s ease;
    }

    label {
      font-size: 0.9rem;
      color: #7f8c8d;
    }

    .btn-agregar {
      background-color: #198754;
      color: #ffffff;
      font-weight: bold;
      border-radius: 12px;
      transition: background-color 0.3s ease;
    }

    .btn-agregar:hover {
      background-color: #157347;
    }

    .btn-danger {
      background-color: #e74c3c;
      color: white;
      border-radius: 12px;
    }

    .btn-danger:hover {
      background-color: #c0392b;
    }

    .form-control:focus {
      border-color: #198754;
      box-shadow: 0 0 5px rgba(25, 135, 84, 0.5);
    }
  </style>
</head>

<body>
  <div class="container mt-5">
    <form name="form_usuario" action="./proc_editar.php?id= <?php echo $id_usuario ?>" method="post" autocomplete="off">
      <div class="d-flex align-items-center mb-4">
        <h1 class="fw-bold" style="font-size: 28px; color: #495057; border-bottom: 2px solid #495057;">Módulo de editar Usuarios</h1>
        <div class="ms-auto">
          <button type="submit" class="btn btn-agregar me-2"><i class="bi bi-floppy-fill"></i> Guardar</button>
          <a href="form_listar.php" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas cancelar?')"><i class="bi bi-x-square-fill"></i> Cancelar</a>
        </div>
      </div>

      <div class="card card-custom p-4">
        <!-- Sección Información de Usuario -->
        <div class="form-section">
          <div class="form-section-title">Información de Usuario</div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" disabled value="<?php echo $nombre_completo ?>" id="nombre_completo" name="nombre_completo" placeholder="Nombre Completo" required>
                <label for="nombre_completo"><i class="bi bi-person me-2"></i>Nombre Completo</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" disabled value="<?php echo $usuario ?>" id="usuario" name="usuario" placeholder="Nombre de Usuario" required>
                <label for="usuario"><i class="bi bi-person-badge me-2"></i>Usuario</label>
              </div>
            </div>
          </div>
        </div>

        <!-- Sección Contraseña y Tipo de Perfil -->
        <div class="form-section">
          <div class="form-section-title">Detalles de Acceso</div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="form-floating">
                <input type="password" value="<?php echo $contrasena ?>" disabled class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña" required>
                <label for="contrasena"><i class="bi bi-key me-2"></i>Contraseña</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <select class="form-control" disabled id="tipo_perfil" name="tipo_perfil" required>
                  <option value="">Seleccionar Tipo de Perfil</option>
                  <option value="Administrador" <?php echo ($tipo_perfil == 'Administrador') ? 'selected' : '' ?>>Administrador</option>
                  <option value="Usuario" <?php echo ($tipo_perfil == 'Usuario') ? 'selected' : '' ?>>Usuario</option>
                  <!-- Agregar más opciones si es necesario -->
                </select>
                <label for="tipo_perfil"><i class="bi bi-person-check me-2"></i>Tipo de Perfil</label>
              </div>
            </div>
          </div>
        </div>

        <!-- Estado Activo -->
        <div class="form-section">
          <div class="form-check">
            <input class="form-check-input" disabled value="Activo" type="checkbox" id="activo" name="activo" checked>
            <label class="form-check-label" for="activo">
              <i class="bi bi-check-circle me-2"></i>Usuario Activo
            </label>
          </div>
        </div>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>