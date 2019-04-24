<?php
/* Smarty version 3.1.30, created on 2017-02-21 09:16:47
  from "/var/www/tienda_Smarty/vista/template/cesta.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58abf76f43fa98_80069601',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4e4c7c81cea60365a49b99b4c0a594c490783b8a' => 
    array (
      0 => '/var/www/tienda_Smarty/vista/template/cesta.tpl',
      1 => 1487665002,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58abf76f43fa98_80069601 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table>
    <tr>
        <td><img src="./../css/cesta.png" width="60px" height="60px"></td>
        <td><h3> Cesta</h3></td>
    </tr>
</table>
<hr/>
<div id="lpcesta">
<?php if (!$_smarty_tpl->tpl_vars['vacia']->value) {?>
    <h3>Cesta Vacía</h3>
<?php }
if ($_smarty_tpl->tpl_vars['vacia']->value) {?>
        <table>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['producto']->value, 'fila');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['fila']->value) {
?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fila']->value, 'dato');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['dato']->value) {
?>
                    <tr>
                        <td><b><?php echo $_smarty_tpl->tpl_vars['unidades']->value[$_smarty_tpl->tpl_vars['dato']->value->getCod()];?>
 Unidades</b>: </td>
                        <td> <?php echo $_smarty_tpl->tpl_vars['dato']->value->getNombre_corto();?>
<td/>
                        <td><button onclick="borrar('<?php echo $_smarty_tpl->tpl_vars['dato']->value->getCod();?>
')">
                                <img src='./../css/remove.png' width="19px" height="19px"></button></td>
                    </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </table>
        <hr/>
        <b>Total</b>: <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 euros.
    <?php }?>
    </div>
    <hr/>
    <button id="vaciar" onclick="vaciarCesta()">Vaciar Cesta</button>
    <form action="pagar.php" method="POST">
        <input type="submit" id="subCesta" value="Pagar" name="pagar">
    </form>
    
    
<?php }
}
