<?php 

class Mensagem {
  private $mensagem;
  private $submensagem;
  private $tipo;

  public function __construct($mensagem, $tipo, $submensagem = null)
  {
    $this->mensagem = $mensagem;
    $this->submensagem = $submensagem;
    $this->tipo = $tipo;
  }

  public function setMensagem($mensagem)
  {
    return $this->mensagem = $mensagem;
  }

  public function setSubMensagem($submensagem)
  {
    return $this->submensagem = $submensagem;
  }

  public function setTipo($tipo)
  {
    return $this->tipo = $tipo;
  }

  public function render()
  {
    echo 
    '<article class="message is-'.$this->tipo.'">
      <div class="message-body">
        <strong>'.$this->mensagem.'</strong> <br>'.$this->submensagem.'
      </div>
    </article>
    ';
  }
}