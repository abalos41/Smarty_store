<?php

require_once('DB.php');
require_once('cesta.php');
require_once('Smarty.class.php');
// Recuperamos la información de la sesión
session_start();
// Y comprobamos que el usuario se haya autentificado, para evitar que puedan acceder directamente
//a esta pagina sin pasar por el login
if (!isset($_SESSION['usuario']))
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");
// Cargamos la librería de Smarty
$smarty = new Smarty;
$a = new cesta();

$smarty->template_dir = '../vista/template/';
$smarty->compile_dir = '../vista/template_c/';
$smarty->config_dir = '../vista/configs/';
$smarty->cache_dir = '../vista/cache/';

$a->carga_cesta();
$total = $a->coste();
$unidades = $_SESSION["unidades"];
$productos = $_SESSION["cesta"];
$smarty->assign("unidades", $unidades);
$smarty->assign("productos", $productos);
$smarty->assign("total", $total);
$smarty->assign("usuario", $_SESSION['usuario']);

$smarty->display("pagar.tpl");
?>