<?php
/* Smarty version 3.1.30, created on 2017-02-21 08:56:35
  from "/var/www/tienda_Smarty/vista/template/producto.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58abf2b39eaff4_35797350',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '712678be0462a7bea5301900270414bfb16eae43' => 
    array (
      0 => '/var/www/tienda_Smarty/vista/template/producto.tpl',
      1 => 1487663776,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:cesta.tpl' => 1,
    'file:listaProducto.tpl' => 1,
  ),
),false)) {
function content_58abf2b39eaff4_35797350 (Smarty_Internal_Template $_smarty_tpl) {
echo $_smarty_tpl->tpl_vars['javascript']->value;?>

<!DOCTYPE html>

<html>
    <head>
        <title>Tienda Online</title>
        <meta charset="UTF-8">
         <link href="./../css/estilos.css" rel="stylesheet" type="text/css">
         <?php echo '<script'; ?>
 type="text/javascript">
             function addProducto(codigo){
                 xajax_addProducto(codigo);
                 return false;
             }
             function borrar(codigo){
                 xajax_borrar(codigo);
                 return false;
             }
             function vaciarCesta(){
                 xajax_vaciarCesta();
                 return false;
             }
         <?php echo '</script'; ?>
>
    </head>
    <body class="pagproductos">
       
       <div id="contenedor">
           <div id="encabezado">
               <h1>Lista de Productos</h1>
           </div>
           <div id="cesta">
                <?php $_smarty_tpl->_subTemplateRender("file:cesta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

           </div>
           <div id="productos">
                <?php $_smarty_tpl->_subTemplateRender("file:listaProducto.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

           </div>
       <br class="divisor" />
            <div id="pie">
                <form action='logoff.php' method='post'>
                    <input type='submit' name='desconectar' value='Desconectar usuario <?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
'/>
                </form>        
            </div>
        </div>
</div>
       
    </body>
</html>
<?php }
}
