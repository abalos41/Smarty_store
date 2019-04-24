<?php

require_once ('./xajax_core/xajax.inc.php');
require_once('DB.php');
require_once('cesta.php');
require_once('Smarty.class.php');
require_once("Producto.php");
// Recuperamos la información de la sesión
session_start();
// Y comprobamos que el usuario se haya autentificado, para evitar que puedan acceder directamente
//a esta pagina sin pasar por el login
if (!isset($_SESSION['usuario']))
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");
// Cargamos la librería de Smarty
$smarty = new Smarty;

$smarty->template_dir = '../vista/template/';
$smarty->compile_dir = '../vista/template_c/';
$smarty->config_dir = '../vista/configs/';
$smarty->cache_dir = '../vista/cache/';
//De momento solo visualizamos que el usuario
$smarty->assign("usuario", $_SESSION['usuario']);
$smarty->assign("productos", DB::obtieneProductos());
//Ahora mostramos la plantilla
//Creando AJAX
$ajax = new xajax();
$ajax->register(XAJAX_FUNCTION, "addProducto");
$ajax->register(XAJAX_FUNCTION, "borrar");
$ajax->register(XAJAX_FUNCTION, "vaciarCesta");
$ajax->processRequest();
$smarty->assign("javascript", $ajax->getJavascript());

function borrar($codigo) {
    $respuesta = new xajaxResponse();
    $a = new cesta();
    $a->carga_cesta();
    $a->borrar_articulo($codigo);
    $a->guarda_cesta();
    $textoHTML = generar_HTML_Producto($a);
    $respuesta->assign("lpcesta", "innerHTML", $textoHTML);
    return $respuesta;
}

function addProducto($codigo) {
    $respuesta = new xajaxResponse();
    $a = new cesta();
    $a->carga_cesta();
    $a->nuevo_articulo($codigo);
    $a->guarda_cesta();
    $textoHTML = generar_HTML_Producto($a);
    $respuesta->assign("lpcesta", "innerHTML", $textoHTML);
    return $respuesta;
}

function vaciarCesta() {
    $respuesta = new xajaxResponse();
    $a = new cesta();
    //$a->carga_cesta();
    unset($_SESSION["cesta"]);
    unset($_SESSION["unidades"]);
    //$a->guarda_cesta();
    $textoHTML = generar_HTML_Producto($a);
    $respuesta->assign("lpcesta", "innerHTML", $textoHTML);
    return $respuesta;
}

function generar_HTML_Producto($cesta) {
    if (!$cesta->vacia()) {
        $respuesta = "<h3>Cesta Vacía</h3>";
    } else {
        $respuesta = "<table border=0>";
        $unidades = $cesta->get_unidades();

        foreach ($cesta->get_productos() as $producto) {
            foreach ($producto as $dato) {
                $unidad = $unidades[$dato->getCod()];
                $respuesta.="<tr>
                <td><span class='unidades'><b>" . $unidad . " Unidades</b>: </span></td>
                <td><span class='nombre'>" . $dato->getNombre_corto() . "</span></td>
                <td><button id='eliminar' onclick=borrar('" . $dato->getCod() . "')>
                    <img src='./../css/remove.png' width='19px' height='19px'></button></td>
                </tr>";
            }
        }
        $respuesta.="</table><hr/><b>Total</b>: " . $cesta->coste() . " euros.";
    }

    return $respuesta;
}

$a = new cesta();
$a->carga_cesta();

$total = $a->coste();
$smarty->assign("total", $total);
$smarty->assign("vacia", $a->vacia());
$smarty->assign("producto", $a->get_productos());
$smarty->assign("unidades", $a->get_unidades());
$a->guarda_cesta();

$smarty->display("producto.tpl");
?>