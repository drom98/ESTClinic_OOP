<?php 
//Importar Basedados.h
require_once 'basedados.h';

//Autoload automático das classes
function __autoload($class_name) {
  require_once '../classes/' . $class_name . '.class.php';
}