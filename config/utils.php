<?php

$user = new Utilizador;

function protegerPagina($tipoUtilizador) {
  if(isset($_SESSION)) {
    switch($tipoUtilizador) {
      
    }
  } else {
    //sem sessão
  }
}