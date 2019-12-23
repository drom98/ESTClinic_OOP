<?php

class InfoTabela {
  private $itemL = array();
  private $itemR = array();

  public function __construct($itemL = null, $itemR = null)
  {
    $this->itemL = $itemL;
    $this->itemR = $itemR;  
  }

  public function setItemLeft($item) {
    $this->itemL = $item;
  }

  public function setItemRight($item) {
    $this->itemR = $item;
  }

  public function render() {
    echo '
    <div class="level has-background-light" style="padding: 15px; border-radius: 5px;">
      <div class="level-left">';
          foreach($this->itemL as $item) {
            echo '<div class="level-item">';
            echo $item;
            echo '</div>';
          } 
      echo '</div>
      <div class="level-right">';
        if(isset($this->itemR)):
        foreach($this->itemR as $item) {
          echo '<div class="level-item">';
          echo $item;
          echo '</div>';
        } endif;
      echo '</div>
    </div>';
  }
}