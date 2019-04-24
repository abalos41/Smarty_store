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
                        {$n=1}
                    {foreach from=$productos item=fila }
                        {foreach from=$fila item=dato }
                        <tr>
                            <td>{$dato->getNombre_corto()}</td>
                            <td id="estilo">{$unidades[$dato->getCod()]}</td>
                            <td id="estilo">{$dato->getPVP()} €</td>
                            <td id="estilo">{$unidades[$dato->getCod()]*$dato->getPVP()} €</td>
                            <input type="hidden" name="item_name_{$n}" value="{$dato->getNombre_corto()}" />
                            <input type="hidden" name="amount_{$n}" value="{$dato->getPVP()}" />
                            <input type="hidden" name="item_number_{$n}" value="{$dato->getCod()}" />
                            <input type="hidden" name="quantity_{$n++}" value="{$unidades[$dato->getCod()]}" />
                        </tr>
                        {/foreach}
                    {/foreach}
                        <tr>
                            <td colspan="3">Total</td>
                            <td>{$total} €</td>
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
            <input type="hidden" name="producto[]" value={$productos} >
        </form>   
        <div id="pie">
            <form action='logoff.php' method='post'>
                <input type='submit' name='desconectar' value='Desconectar usuario {$usuario}'/>
            </form>        
        </div>
    </body>
</html>