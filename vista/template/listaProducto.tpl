{foreach from=$productos item=fila }
    <p>
        <button onclick="addProducto('{$fila->getCod()}')">Añadir</button>
        {if $fila->getFamilia() == "ORDENA"}
            {$fila->getNombre()}
            <a href="descripcion.php?cod={$fila->getCod()}">{$fila->getNombre_corto()}: {$fila->getPVP()} euros.</a>
        {else}
            {$fila->getNombre()}
            {$fila->getNombre_corto()}: {$fila->getPVP()} euros.
        {/if}
    </p>
{/foreach}