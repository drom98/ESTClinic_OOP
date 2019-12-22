<?php

$consultas = new Consulta;
$todas = $consultas->getConsultasMarcadas();

var_dump($todas);