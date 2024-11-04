<?php
class Paginador extends ServerConnection
{
  public $registros_por_pag;
  public $pag_actual;
  public $destino;
  public $registros_pagina;
  public $variables_url;
  public $total_filas;
  private $controles_navegacion;

  public function crear_paginador()
  {
    $total_filas = new ServerConnection();
    $total_filas->query = $this->query;
    $total_filas->get_records();

    $this->total_filas = $total_filas->record_count; //CANT TOTAL DE FILAS DE LA CONSULTA
    $pg_filas_pagina = $this->registros_por_pag; // ESTA LÍNEA ES PARA DEFINIR CUANTOS REGISTROS QUEREMOS POR PÁGINA
    $pg_ultimo = ceil($this->total_filas / $pg_filas_pagina);
    if ($pg_ultimo < 1) {
      $pg_ultimo = 1;
    }
    $pg_num_pagina = 1;
    if ($this->pag_actual != '') {
      $pg_num_pagina = preg_replace('#[^0-9]#', '', $this->pag_actual);
    }
    if ($pg_num_pagina < 1) {
      $pg_num_pagina = 1;
    } else if ($pg_num_pagina > $pg_ultimo) {
      $pg_num_pagina = $pg_ultimo;
    }
    $pg_Limite = " LIMIT " . ($pg_num_pagina - 1) * $pg_filas_pagina . ", " . $pg_filas_pagina;

    //ESTA LÍNEA ES PARA EJECUTAR LA CONSULTA CON LA SEPARACIÓN DE LA CLÁUSULA 'LIMIT' DE SQL
    $record_page = new ServerConnection();
    $record_page->query = $this->query . " $pg_Limite";
    $this->registros_pagina = $record_page->get_records();

    $this->controles_navegacion = '';
    if ($pg_ultimo != 1) {
      if ($pg_num_pagina > 1) {
        $pg_anterior = $pg_num_pagina - 1;
        $this->controles_navegacion .= "<input type='button' onclick='javascript:CambiarPagina(" . $pg_anterior . ");' id='btn_pag' value='Anterior'>";
        for ($i = $pg_num_pagina - 4; $i < $pg_num_pagina; $i++) {
          if ($i > 0) {
            $this->controles_navegacion .= "<input type='button' onclick='javascript:CambiarPagina(" . $i . ");' id='btn_pag' value='" . $i . "'>";
          }
        }
      }
      $this->controles_navegacion .= "<input type='button' id='pag_act' value='" . $pg_num_pagina . "'>";
      for ($i = $pg_num_pagina + 1; $i <= $pg_ultimo; $i++) {
        $this->controles_navegacion .= "<input type='button'  onclick='javascript:CambiarPagina(" . $i . ");' id='btn_pag' value='" . $i . "'>";
        if ($i >= $pg_num_pagina + 4) {
          break;
        }
      }
      if ($pg_num_pagina != $pg_ultimo) {
        $pg_siguiente = $pg_num_pagina + 1;
        $this->controles_navegacion .= "<input type='button' onclick='javascript:CambiarPagina(" . $pg_siguiente . ");' id='btn_pag' value='Siguiente'>";
      }
    }
?>
    <link rel="stylesheet" type="text/css" href="../../assets/css/paginador.css" media="all">
    <!-- ESTE ES EL FIN DEL CÓDIGO PARA EL PAGINADOR -->

    <script type="text/javascript">
      //Función AJAX para cambiar de página	
      function CambiarPagina(pag_act) {
        location.replace('<?php echo $this->destino . '?pa='; ?>' + pag_act + '&<?php echo $this->variables_url; ?>');
      }
    </script>
  <?php
  }

  public function mostrar_paginador()
  {
  ?>
    <div id="pagination_controls"><?php echo $this->controles_navegacion; ?></div>
<?php
  }
}
?>