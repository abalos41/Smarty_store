{$javascript}
<!DOCTYPE html>
{*Platilla para visualizar los productos, se invoca desde productos.php*}
<html>
    <head>
        <title>Tienda Online</title>
        <meta charset="UTF-8">
         <link href="./../css/estilos.css" rel="stylesheet" type="text/css">
         <script type="text/javascript">
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
         </script>
    </head>
    <body class="pagproductos">
       {*primero solo visualizaremos que el usuario está conectado*}
       <div id="contenedor">
           <div id="encabezado">
               <h1>Lista de Productos</h1>
           </div>
           <div id="cesta">
                {include file="cesta.tpl"}
           </div>
           <div id="productos">
                {include file="listaProducto.tpl"}
           </div>
       <br class="divisor" />
            <div id="pie">
                <form action='logoff.php' method='post'>
                    <input type='submit' name='desconectar' value='Desconectar usuario {$usuario}'/>
                </form>        
            </div>
        </div>
</div>
       
    </body>
</html>
