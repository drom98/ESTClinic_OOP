<?php

class Hero {
  private $title;
  private $subtitle;
  private $color;
  private $height;

  public function __construct($title, $subtitle, $color, $height = null)
  {
    $this->title = $title;
    $this->subtitle = $subtitle;
    $this->color = $color;
    $this->height = $height;
  }

  public function setTitle($title) {
    return $this->title = $title;
  }

  public function setSubtitle($subtitle) {
    return $this->subtitle = $subtitle;
  }

  public function setColor($color) {
    return $this->color = $color;
  }

  public function setHeight($height) {
    return $this->height = $height;
  }

  public function printHero() {
    echo 
    '<section class="hero is-'.$this->color.' is-'.$this->color.'">
      <div class="hero-body">
        <div class="container">
          <h1 class="title is-size-4">'.$this->title.'</h1>
      <h2 class="subtitle is-size-6">'.$this->subtitle.'</h2>
        </div>
      </div>
    </section>
    ';
  }
}