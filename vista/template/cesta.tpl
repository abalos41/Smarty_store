<table>
    <tr>
        <td><img src="./../css/cesta.png" width="60px" height="60px"></td>
        <td><h3> Cesta</h3></td>
    </tr>
</table>
<hr/>
<div id="lpcesta">
{if !$vacia}
    <h3>Cesta Vacía</h3>
{/if}
{if $vacia}
        <table>
            {foreach from=$producto item=fila}
                {foreach from=$fila item=dato}
                    <tr>
                        <td><b>{$unidades[$dato->getCod()]} Unidades</b>: </td>
                        <td> {$dato->getNombre_corto()}<td/>
                        <td><button onclick="borrar('{$dato->getCod()}')">
                                <img src='./../css/remove.png' width="19px" height="19px"></button></td>
                    </tr>
                {/foreach}
            {/foreach}
        </table>
        <hr/>
        <b>Total</b>: {$total} euros.
    {/if}
    </div>
    <hr/>
    <button id="vaciar" onclick="vaciarCesta()">Vaciar Cesta</button>
    <form action="pagar.php" method="POST">
        <input type="submit" id="subCesta" value="Pagar" name="pagar">
    </form>
    
    
