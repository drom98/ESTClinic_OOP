<?php

class InfoTabela {
  private $itemLeft = array();
  private $itemRight = array();

  public function __construct($itemLeft = null, $itemRight = null)
  {
    $this->itemLeft = $itemLeft;
    $this->itemRight = $itemRight; 
    $this->render(); 
  }

  public function setItemLeft($item) {
    $this->itemLeft = $item;
  }

  public function setItemRight($item) {
    $this->itemRight = $item;
  }

  public function render() {
    echo '
    <div class="level has-background-light" style="padding: 15px; border-radius: 5px;">
      <div class="level-left">';
          foreach($this->itemLeft as $item) {
            echo '<div class="level-item">';
            echo $item;
            echo '</div>';
          } 
      echo '</div>
      <div class="level-right">';
        if(isset($this->itemRight)):
        foreach($this->itemRight as $item) {
          echo '<div class="level-item">';
          echo $item;
          echo '</div>';
        } endif;
      echo '</div>
    </div>';
  }
}