<?php
session_set_cookie_params(0, "/");
date_default_timezone_set('America/Caracas');
require_once 'core/controlador/dirs.php';
require_once CORES . "/autoload.php";
if (!empty($_GET['mod'])) {
  $modulo = $_GET['mod'];
} else {
  $modulo = MODULO;
}
if (empty($conf[$modulo])) {
  $modulo = MODULO;
}
$path_layout = VISTAS . '/' . $conf[$modulo]['vista'];
$path_modulo = MODULOS . '/' . $conf[$modulo]['archivo'];
$path_control = CONTROLS . '/' . $conf[$modulo]['control'];
if (file_exists($path_control)) {
  include $path_control;
} else {
  die('<b>ATENCION!!!</b>, Ha ocurrido un error al cargar el módulo <b>"' . $modulo . '"</b>, ya que NO existe el archivo <b>"' . $conf[$modulo]['archivo'] . '"</b>');
}
if (file_exists($path_layout) == true) {
  include $path_layout;
} else {
  if (file_exists($path_modulo) == true) {
    include $path_modulo;
  } else {
    die('<b>ATENCION!!!</b>, Ha ocurrido un error al cargar el módulo <b>"' . $modulo . '"</b>, ya que NO existe el archivo <b>"' . $conf[$modulo]['archivo'] . '"</b>');
  }
}
