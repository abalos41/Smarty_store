<?php
/* Smarty version 3.1.30, created on 2017-02-20 11:01:59
  from "/var/www/tienda_Smarty/vista/template/descripcion.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58aabe97351a71_42124711',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f9b353b32653ed9fd7cc2a189ccaa70857afa7ce' => 
    array (
      0 => '/var/www/tienda_Smarty/vista/template/descripcion.tpl',
      1 => 1487582869,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58aabe97351a71_42124711 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Descripcion</title>
        <link href="./../css/estilos.css" rel="stylesheet" type="text/css">
    </head>
    <body class="pagproductos">
        <div id="contenedor">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['producto']->value, 'filaPro');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['filaPro']->value) {
?>
                <div id="encabezado">
                    <h1><?php echo $_smarty_tpl->tpl_vars['filaPro']->value->getNombre_Corto();?>
</h1>
                    Código: <?php echo $_smarty_tpl->tpl_vars['filaPro']->value->getCod();?>

                </div>
                <div style="padding: 15px; border: 1px solid">
                    <h3>Características:</h3>
                        <ul>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['descrip']->value, 'filaDes');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['filaDes']->value) {
?>
                            <li>Procesador: <?php echo $_smarty_tpl->tpl_vars['filaDes']->value->getProcesador();?>
</li>
                            <li>RAM: <?php echo $_smarty_tpl->tpl_vars['filaDes']->value->getRAM();?>
</li>
                            <li>Tarjeta Gráfica: <?php echo $_smarty_tpl->tpl_vars['filaDes']->value->getGrafica();?>
</li>
                            <li>Unidad Óptica: <?php echo $_smarty_tpl->tpl_vars['filaDes']->value->getUnidadOptica();?>
</li>
                            <li>Sistema Operativo: <?php echo $_smarty_tpl->tpl_vars['filaDes']->value->getSO();?>
</li>
                            <li>Otros: <?php echo $_smarty_tpl->tpl_vars['filaDes']->value->getOtros();?>
</li>
                            <li>PVP: <?php echo $_smarty_tpl->tpl_vars['filaPro']->value->getPVP();?>
</li>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        </ul>
                    <h3>Descripción:</h3>
                    <?php echo $_smarty_tpl->tpl_vars['filaPro']->value->getDescripcion();?>

                </div>
           <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

       </div>
    </body>
</html><?php }
}
