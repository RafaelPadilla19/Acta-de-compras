<?php
    function convertirNumeroLetra($n){
        $formatterES = new NumberFormatter("es-ES", NumberFormatter::SPELLOUT);
        $izquierda = intval(floor($n));
        $derecha = intval(($n - floor($n)) * 100);
        return $formatterES->format($izquierda) . " punto " . $formatterES->format($derecha);
    }

    function convertirFecha($strFehca)
    {
        $fechaAArray=explode('-',$strFehca);
        $miFecha=mktime(0,0,0,$fechaAArray[1],$fechaAArray[2],$fechaAArray[0]);
        setlocale(LC_TIME, 'es_ES.UTF-8');
        $formatoEsperado=strftime("%d de %B de %Y", $miFecha);
        return $formatoEsperado;
    }
$numeroProductos= count($productos);
//echo "<p>" . $numeroProductos . " productos</p>";

$paginas= ceil($numeroProductos/10);

if(!isset($_GET['pag'])){
    header("Location:" . base_url()."Reporte/ordenCompra/".$acta->solicitud_id."?pag=1");
}
//validar si es mayor a la cantidad de paginas
if($_GET['pag'] > $paginas || $_GET['pag'] < 1){
    header("Location:" . base_url()."Reporte/ordenCompra/".$acta->solicitud_id."?pag=1");
}


//obtenemos los 5 productos de la pagina actual
$productosPagina= array_slice($productos, ($_GET['pag']-1)*10, 10);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ordenCompra.css">

    <title>Orden de compras</title>
    <style>
    /** ocultar los botones al imprimir**/

    @media print {
        .ocultar * {
            display: none;
        }
    }
    </style>
</head>

<body>

    <main style="margin: 40px 60px;">
        <div class="d-flex justify-content-startrow g-0 text-center">
            <div class="col-2 col-md-2">
                <img src="<?php echo base_url();?>assets/img/escudo.jpeg" style="width: 80px;" alt="" class="mt-3">
            </div>
            <div class="col-8 col-md-8">
                <h6 class="m-2 text-center fw-bold txt-table">
                    ALCALDÍA MUNICIPAL DE SAN JULIÁN CACALUTA
                </h6>
                <h6 class="m-2 text-center fw-bold txt">
                    DEPARTAMENTO DE SONSONATE
                </h6>
                <h6 class="m-2 text-center fw-bold txt">
                    Dirección: Entre 1a y 3a Calle Poniente, Barrio el Centro.
                </h6>
                <h6 class="m-2 text-center mb-2 fw-bold txt">
                    Tel: 2461-2904 Correo: sanjulian.uaci@gmail.com
                </h6>
            </div>
            <div class="col-2 col-md-2">
                <img src="<?php echo base_url();?>assets/img/logo.jpeg" style="width: 100px;" alt="">
            </div>
        </div>
        <h6 class="text-center fw-bold" style="font-size: 14px;">
            ORDEN DE COMPRAS, BIENES O SERVICIOS
        </h6>
        <table class="table table-sm table-bordered border-dark text-center txt-table mb-2">
            <tr>
                <th class="border border-white border-bottom-0"></th>
                <th class="border border-white border-bottom-0 border-end-0"></th>
                <th>AMSJ-ADJ2021</th>
            </tr>
            <tbody>
                <tr>
                    <td>FECHA</td>
                    <td><?php echo convertirFecha($solicitud->fecha);?></td>
                    <td><?php echo $solicitud->amsj;?></td>
                </tr>
            </tbody>
        </table>
        <div class="table-responsive">
            <table class="table table-sm border-dark table-bordered txt-table text-center">
                <thead>
                    <tr>
                        <th>OFERENTE</th>
                        <th>MONTO</th>
                        <th>CANTIDAD DE LETRAS</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $solicitud->nombre?></td>
                        <td>$ <?php echo $solicitud->valor_compra?></td>
                        <td><?php echo strtoupper(convertirNumeroLetra($solicitud->valor_compra)); ?> DÓLARES DE LOS ESTADOS UNIDOS</td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-sm border-dark table-bordered txt-table text-center">
                <thead>
                    <tr>
                        <th>LUGAR</th>
                        <td><?php echo $solicitud->lugar?></td>
                        <th>NIT</th>
                        <td><?php echo $solicitud->nit?></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">NOMBRE</th>
                        <td><?php echo $solicitud->nombre?></td>
                        <th>NCR O DUI</td>
                        <td><?php echo $solicitud->ncr_dui?></td>
                    </tr>
                    <tr>
                        <th scope="row">DIRECCIÓN</th>
                        <td colspan="3"><?php echo $solicitud->direccion?></td>
                    </tr>
                </tbody>
            </table>
            <div class="table-responsive">
                <table class="table border-dark table-sm table-bordered text-center txt-table">
                    <thead>
                        <tr>
                            <th scope="col" class="border-end-0">PROYECTO PROGRAMA</th>
                            <td colspan="5" class="border-start-0"><?php echo $asignacion->proyecto?></td>
                        </tr>
                        <tr>
                            <th scope="row" colspan="5"></th>
                        </tr>
                        <tr>
                            <th>CANTIDAD</th>
                            <th>UNIDAD DE MEDIDA</th>
                            <th>DESCRIPCIÓN</th>
                            <th>PRECIO</th>
                            <th>VALOR TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($productosPagina as $item):   ?>
                        <tr>
                            <td scope="row"><?php echo $item->cantidad ?></td>
                            <td><?php echo $item->unidad_medida ?></td>
                            <td><?php echo $item->descripcion ?></td>
                            <td><?php echo $item->costo_unitario?></td>
                            <td><?php echo $item->total?></td>
                        </tr>
                        <?php endforeach; ?>
                            <th>SON:</th>
                            <th colspan="4"><?php echo strtoupper(convertirNumeroLetra($solicitud->valor_compra)); ?> DÓLARES DE LOS ESTADOS UNIDOS</th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <table class="table border-dark table-sm table-bordered text-center txt-table mb-3">
                <tr>
                    <th class="col-4">OBSERVACIONES: </th>
                    <td class="col-8">Ninguna</td>
                </tr>
                <tr>
                    <th class="col-4">LUGAR DE ENTREGA: </th>
                    <td class="col-8"><?php echo $solicitud->lugar_entrega?></td>
                </tr>
                <tr>
                    <th class="col-4">FECHA DE ENTREGA: </th>
                    <td class="col-8"><?php echo convertirFecha($orden->fecha_de_entrega)?></td>
                </tr>
            </table>
            <div class="centrado txt pt-1">
                <p>
                <div class="linea"></div>
                <div>Lic. Lorena Beatriz Romero de Aviles</div>
                <div>Jefe UACI</div>
                </p>
            </div>
            <table class="table border-dark table-sm table-bordered text-center txt-table">
                <tr>
                    <th>SOLICITANTE: </th>
                    <td><?php echo $solicitud->nombre_solicitante?></td>
                    <td>AMSJ 2021</td>
                    <td><?php echo $solicitud->amsj?></td>
                </tr>
                <tr>
                    <th>CARGO: </th>
                    <td><?php echo $solicitud->cargo_solicitante?></td>
                    <td>AMSJ-ADJ2021</td>
                    <td><?php echo $solicitud->amsj?></td>
                </tr>
                <tr>
                    <th>FUENTE DE FINANCIMIENTO: </th>
                    <th colspan="3"><?php echo $asignacion->fuente_de_financiamiento?></th>
                </tr>
                <tr>
                    <th>TELÉFONO: </th>
                    <td><?php echo $orden->telefono_alcaldia?></td>
                    <td>CORREO ELECTRONICO</td>
                    <td class="text-primary"><?php echo $orden->correo_alcaldia?></td>
                </tr>
            </table>
        </div>
        <div class="ocultar d-flex justify-content-center my-3">
            <button id="imprimir" name="imprimir" class="btn btn-primary me-3">Imprimir</button>
            <a class="btn btn-primary" href="<?php echo base_url(); ?>">Volver</a>
        </div>
        <nav aria-label="Page navigation example" class="ocultar mb-4">
                <ul class="pagination justify-content-center">
                    <li class="page-item 
                    <?php echo $_GET['pag']<=1 ? 'disabled':'' ?>">
                    
                    
                        <a class="page-link" href="<?php echo base_url()."Reporte/ordenCompra/".$acta->solicitud_id."?pag=".$_GET["pag"]-1 ?>" tabindex="-1" aria-disabled="true">Anterior</a>
                    </li>

                    <?php for ($i = 1; $i <= $paginas; $i++) { ?>
                        <li class="page-item <?php echo $_GET['pag']==$i ? 'active':'' ?>"><a class="page-link" href="<?php echo base_url()."Reporte/ordenCompra/".$acta->solicitud_id."?pag=".$i ?>"><?php echo $i ?></a></li>
                    <?php } ?>
                   
                    <li class="page-item 
                    <?php echo $_GET['pag']>=$paginas ? 'disabled':'' ?>">
                    
                        <a class="page-link" href="<?php echo base_url()."Reporte/ordenCompra/".$acta->solicitud_id."?pag=".$_GET["pag"]+1 ?>" tabindex="-1" aria-disabled="true">Siguiente</a>
                    </li>
                </ul>
            </nav>
    </main>
    <script>
    //imprimir
    document.getElementById('imprimir').onclick = function() {
        window.print();
    }
    </script>
</body>

</html>