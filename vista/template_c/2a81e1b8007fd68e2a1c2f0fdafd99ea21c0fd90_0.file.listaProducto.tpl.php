<?php
/* Smarty version 3.1.30, created on 2017-02-21 09:00:39
  from "/var/www/tienda_Smarty/vista/template/listaProducto.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58abf3a7764dd0_13320002',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2a81e1b8007fd68e2a1c2f0fdafd99ea21c0fd90' => 
    array (
      0 => '/var/www/tienda_Smarty/vista/template/listaProducto.tpl',
      1 => 1487664014,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58abf3a7764dd0_13320002 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productos']->value, 'fila');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['fila']->value) {
?>
    <p>
        <button onclick="addProducto('<?php echo $_smarty_tpl->tpl_vars['fila']->value->getCod();?>
')">Añadir</button>
        <?php if ($_smarty_tpl->tpl_vars['fila']->value->getFamilia() == "ORDENA") {?>
            <?php echo $_smarty_tpl->tpl_vars['fila']->value->getNombre();?>

            <a href="descripcion.php?cod=<?php echo $_smarty_tpl->tpl_vars['fila']->value->getCod();?>
"><?php echo $_smarty_tpl->tpl_vars['fila']->value->getNombre_corto();?>
: <?php echo $_smarty_tpl->tpl_vars['fila']->value->getPVP();?>
 euros.</a>
        <?php } else { ?>
            <?php echo $_smarty_tpl->tpl_vars['fila']->value->getNombre();?>

            <?php echo $_smarty_tpl->tpl_vars['fila']->value->getNombre_corto();?>
: <?php echo $_smarty_tpl->tpl_vars['fila']->value->getPVP();?>
 euros.
        <?php }?>
    </p>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
}
}
