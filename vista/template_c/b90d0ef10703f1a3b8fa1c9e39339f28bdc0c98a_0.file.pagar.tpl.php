<?php
/* Smarty version 3.1.30, created on 2017-02-21 08:56:38
  from "/var/www/tienda_Smarty/vista/template/pagar.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58abf2b6c819f0_33228402',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b90d0ef10703f1a3b8fa1c9e39339f28bdc0c98a' => 
    array (
      0 => '/var/www/tienda_Smarty/vista/template/pagar.tpl',
      1 => 1487663792,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58abf2b6c819f0_33228402 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Confirmar Pago</title>
    </head>
    <body>
        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
            <div id="contenedor">
                <div id="encabezado">
                    <h1>Confirmar Pago</h1>
                </div>
                <table>
                    <tr>
                        <td>Nombre</td>
                        <td id="estilo">Unidades</td>
                        <td id="estilo">Precio</td>
                        <td id="estilo">Total Producto</td>
                    </tr>
                        <input type="hidden" name="cmd" value="_cart"/>
                        <input type="hidden" name="business" value="akc93@hotmail.com" />
                        <input name="shopping_url" type="hidden" value="http://localhost/tienda_Smarty/controlador/pagar.php" />
                        <input name="currency_code" type="hidden" value="EUR" />
                        <input name="return" type="hidden" value="http://localhost/tienda_Smarty/controlador/pago_realizado.php" />
                        <input name="notify_url" type="hidden" value="http://manuel.infenlaces.com/dwes/TiendaPagar/paypal_ipn.php" />
                        <input name="rm" type="hidden" value="2" />
                        <input name="upload" type="hidden" value="1" />
                        <?php $_smarty_tpl->_assignInScope('n', 1);
?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productos']->value, 'fila');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['fila']->value) {
?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fila']->value, 'dato');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['dato']->value) {
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['dato']->value->getNombre_corto();?>
</td>
                            <td id="estilo"><?php echo $_smarty_tpl->tpl_vars['unidades']->value[$_smarty_tpl->tpl_vars['dato']->value->getCod()];?>
</td>
                            <td id="estilo"><?php echo $_smarty_tpl->tpl_vars['dato']->value->getPVP();?>
 €</td>
                            <td id="estilo"><?php echo $_smarty_tpl->tpl_vars['unidades']->value[$_smarty_tpl->tpl_vars['dato']->value->getCod()]*$_smarty_tpl->tpl_vars['dato']->value->getPVP();?>
 €</td>
                            <input type="hidden" name="item_name_<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['dato']->value->getNombre_corto();?>
" />
                            <input type="hidden" name="amount_<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['dato']->value->getPVP();?>
" />
                            <input type="hidden" name="item_number_<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['dato']->value->getCod();?>
" />
                            <input type="hidden" name="quantity_<?php echo $_smarty_tpl->tpl_vars['n']->value++;?>
" value="<?php echo $_smarty_tpl->tpl_vars['unidades']->value[$_smarty_tpl->tpl_vars['dato']->value->getCod()];?>
" />
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

                        <tr>
                            <td colspan="3">Total</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 €</td>
                        </tr>
                </table>
            </div>
        
            <br/>
            <input type="image" 
                   src="http://www.paypal.com/es_ES/i/btn/x-click-but01.gif" border="0" name="submit" 
                   alt="Realice pagos con PayPal: es rápido, gratis y seguro" />
        </form>
        <form action="pdf.php" method="POST">
            <input id="pdf" type="submit" value="Imprimir Compra">
            <input type="hidden" name="producto[]" value=<?php echo $_smarty_tpl->tpl_vars['productos']->value;?>
 >
        </form>   
        <div id="pie">
            <form action='logoff.php' method='post'>
                <input type='submit' name='desconectar' value='Desconectar usuario <?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
'/>
            </form>        
        </div>
    </body>
</html><?php }
}
