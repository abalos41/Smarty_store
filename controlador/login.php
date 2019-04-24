<?php

require_once('DB.php');
// Cargamos la librería de Smarty
require_once('Smarty.class.php');
$smarty = new Smarty;
$smarty->template_dir = '../vista/template/';
$smarty->compile_dir = '../vista/template_c/';
$smarty->config_dir = '../vista/configs/';
$smarty->cache_dir = '../vista/cache/';
// Verificamos si queremos validar los datos del formulario o solo visualizar el formulario (login.tpl)
if (isset($_POST['enviar'])) {
    $usuario = $_POST['usuario'];
    $pass = $_POST['password'];
    if ((empty($usuario)) || (empty($pass)))
        $smarty->assign('error', 'Debes introducir un nombre de usuario y una contraseña');
    else {
        // Comprobamos las credenciales con la base de datos
        if (DB::verificaCliente($usuario, $pass)) {
            session_start();
            $_SESSION['usuario'] = $usuario;
            header("Location: producto.php");
            exit();
        } else {
            // Si las credenciales no son válidas, se vuelven a pedir
            $smarty->assign('error', 'Usuario o contraseña no válidos!');
        }
    }
}
// Mostramos la plantilla
$smarty->display('login.tpl');
?>
