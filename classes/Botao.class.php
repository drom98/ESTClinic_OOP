<?php

class Botao {
  private $id;
  private $url;
  private $params = array();
  private $icon;
  private $tipo;

  public function __construct($id, $url, $icon, $tipo, $params = null)
  {
    $this->id = $id;
    $this->url = $url;
    $this->params = $params;
    $this->icon = $icon;
    $this->tipo = $tipo;
  }

  public function setID($id) {
    $this->id = $id;
  }

  public function setUrl($url) {
    $this->url = $url;
  }

  public function setParams($params) {
    $this->params = $params;
  }

  public function setIcon($icon) {
    $this->icon = $icon;
  }

  public function setTipo($tipo) {
    $this->tipo = $tipo;
  }

  public function display() {
    echo '
    <a href="editar-consulta.php?id='.$id.'&tipo=consulta" class="button is-link is-light is-small is-fullwidth">
    <span class="icon">
      <i class="fas fa-calendar-alt"></i>
    </span>
    <span>Editar consulta</span>
    </a>
    ';
  }

}