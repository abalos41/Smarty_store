<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Descripcion</title>
        <link href="./../css/estilos.css" rel="stylesheet" type="text/css">
    </head>
    <body class="pagproductos">
        <div id="contenedor">
            {foreach from=$producto item=filaPro }
                <div id="encabezado">
                    <h1>{$filaPro->getNombre_Corto()}</h1>
                    Código: {$filaPro->getCod()}
                </div>
                <div style="padding: 15px; border: 1px solid">
                    <h3>Características:</h3>
                        <ul>
                        {foreach from=$descrip item=filaDes }
                            <li>Procesador: {$filaDes->getProcesador()}</li>
                            <li>RAM: {$filaDes->getRAM()}</li>
                            <li>Tarjeta Gráfica: {$filaDes->getGrafica()}</li>
                            <li>Unidad Óptica: {$filaDes->getUnidadOptica()}</li>
                            <li>Sistema Operativo: {$filaDes->getSO()}</li>
                            <li>Otros: {$filaDes->getOtros()}</li>
                            <li>PVP: {$filaPro->getPVP()}</li>
                        {/foreach}
                        </ul>
                    <h3>Descripción:</h3>
                    {$filaPro->getDescripcion()}
                </div>
           {/foreach}
       </div>
    </body>
</html>