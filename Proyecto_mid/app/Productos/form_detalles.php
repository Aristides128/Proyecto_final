<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalles del Producto</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="../../assets/css/custom.css">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Arial', sans-serif;
    }

    .sidebar {
      background-color: #343a40;
      height: 100vh;
      padding: 20px;
      color: white;
    }

    .sidebar .logo-details {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .sidebar .nav-links {
      list-style-type: none;
      padding: 0;
    }

    .sidebar .nav-links li {
      margin: 10px 0;
    }

    .sidebar .nav-links a {
      color: white;
      text-decoration: none;
      font-size: 16px;
      transition: color 0.3s;
    }

    .sidebar .nav-links a:hover {
      color: #dc3545;
    }

    .details-container {
      background-color: white;
      border-radius: 15px;
      padding: 30px;

      margin-top: 30px;

    }

    .product-image {
      max-width: 100%;
      height: auto;
      border-radius: 15px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
      transition: transform 0.3s;
    }

    .product-image:hover {
      transform: scale(1.05);
    }

    h2.edit-header {
      margin-bottom: 20px;
      font-size: 2rem;
      color: #343a40;
      text-align: center;
      border-bottom: 2px solid #dc3545;
      padding-bottom: 10px;
    }

    h4 {
      color: #555;
      margin-bottom: 10px;
      font-size: 1.3rem;
    }

    p {
      margin-bottom: 15px;
      color: #666;
    }

    .btn-danger {
      background-color: #dc3545;
      border-color: #dc3545;
      transition: background-color 0.3s, transform 0.2s;
    }

    .btn-danger:hover {
      background-color: #c82333;
      border-color: #bd2130;
      transform: scale(1.05);
    }

    .mt-4 {
      margin-top: 2rem !important;
    }

    .section-title {
      border-bottom: 2px solid #dc3545;
      padding-bottom: 10px;
      margin-bottom: 20px;
      color: #dc3545;
      font-weight: bold;
    }

    .product-detail {
      background-color: #e9ecef;
      padding: 15px;
      border-radius: 10px;
      transition: background-color 0.3s;
    }

    .product-detail:hover {
      background-color: #d3d3d3;
    }

    /* Responsive styles */
    @media (max-width: 768px) {
      .edit-header {
        font-size: 1.5rem;
      }

      .section-title {
        font-size: 1.2rem;
      }

      .product-detail {
        padding: 10px;
      }
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="details-container">
      <h2 class="edit-header">Detalles del Producto</h2>
      <div class="row">
        <div class="col-md-6">
          <h4 class="section-title">Información del Producto</h4>
          <div class="product-detail">
            <h4>Nombre del Producto</h4>
            <p id="nombre">Nombre del Producto Ejemplo</p>

            <h4>Marca</h4>
            <p id="marca">Marca Ejemplo</p>

            <h4>Categoría</h4>
            <p id="categoria">Categoría Ejemplo</p>

            <h4>Detalles</h4>
            <p id="detalles">Detalles del producto aquí.</p>
          </div>
        </div>
        <div class="col-md-6 text-center">
          <img src="../../tiger-jpg.jpg" alt="Imagen del Producto" class="product-image">
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-md-4">
          <h4 class="section-title">Precios de Venta</h4>
          <div class="product-detail">
            <p id="precio1">Precio 1: $10.00</p>
            <p id="precio2">Precio 2: $15.00</p>
            <p id="precio3">Precio 3: $20.00</p>
          </div>
        </div>
        <div class="col-md-4">
          <h4 class="section-title">Existencias</h4>
          <div class="product-detail">
            <p id="existencias_minimas">Existencias Mínimas: 5</p>
            <p id="codigo_interno">Código Interno: 12345</p>
            <p id="codigo_barras">Código de Barras: 67890</p>
          </div>
        </div>
        <div class="col-md-4">
          <h4 class="section-title">Estado</h4>
          <div class="product-detail">
            <p id="estado">Activo</p>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-end mt-4">
        <a href="index.html" class="btn btn-danger">Cancelar</a>
      </div>
    </div>
  </div>
</body>

</html>