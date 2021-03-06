<?php
    //covertir decimal del dinero a fraccion ejemplo 110.50 a 50/100
    function convertDecimal($number){
        $numerEntero=floor($number);
        $numerDecimal=$number-$numerEntero;
        $numerDecimal=round($numerDecimal*100);
        if($numerDecimal==0){
            $numerDecimal="00";
        }
        if($numerDecimal<10 && $numerDecimal>0){
            $numerDecimal="0".$numerDecimal;
        }
        return $numerDecimal.'/100';
    }

    function convertirFecha($strFehca)
    {
        //validar si la fecha es null
        if ($strFehca == null || $strFehca=='0000-00-00') {
            return null;
        }
        $fechaAArray = explode('-', $strFehca);
        $miFecha = mktime(0, 0, 0, $fechaAArray[1], $fechaAArray[2], $fechaAArray[0]);
        setlocale(LC_TIME, 'es_ES.UTF-8');
        $formatoEsperado = strftime("%d de %B de %Y", $miFecha);
        return $formatoEsperado;
    }

    
    function convertirNumeroLetra($n){
        $formatterES = new NumberFormatter("es-ES", NumberFormatter::SPELLOUT);
        $izquierda = intval(floor($n));
        $derecha = intval(($n - floor($n)) * 100);
        //return $formatterES->format($izquierda) . " punto " . $formatterES->format($derecha);
        return $formatterES->format($izquierda);
    }

$numeroProductos= count($productos);
//echo "<p>" . $numeroProductos . " productos</p>";

$paginas= ceil($numeroProductos/8);

if(!isset($_GET['pag'])){
    header("Location:" . base_url()."Reporte/ordenCompra/".$acta->solicitud_id."?pag=1");
}
//validar si es mayor a la cantidad de paginas
if($_GET['pag'] > $paginas || $_GET['pag'] < 1){
    header("Location:" . base_url()."Reporte/ordenCompra/".$acta->solicitud_id."?pag=1");
}


//obtenemos los 5 productos de la pagina actual
$productosPagina= array_slice($productos, ($_GET['pag']-1)*8, 8);
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

    <main style="margin: 10px 40px;">
        <div class="d-flex justify-content-startrow g-0 text-center">
            <div class="col-2 col-md-2">
                <img src="<?php echo base_url();?>assets/img/escudo.jpeg" style="width: 80px;" alt="" class="mt-3">
            </div>
            <div class="col-8 col-md-8">
                <h6 class="m-2 text-center fw-bold txt-table">
                    ALCALD??A MUNICIPAL DE SAN JULI??N CACALUTA
                </h6>
                <h6 class="m-2 text-center fw-bold txt">
                    DEPARTAMENTO DE SONSONATE
                </h6>
                <h6 class="m-2 text-center fw-bold txt">
                    Direcci??n: Entre 1a y 3a Calle Poniente, Barrio el Centro.
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
                        <th scope="row">DIRECCI??N</th>
                        <td colspan="3"><?php echo $solicitud->direccion?></td>
                    </tr>
                </tbody>
            </table>
            <div class="table-responsive">
                <table class="table border-dark table-sm table-bordered text-center txt-table">
                    <thead>
                        <tr>
                            <th scope="col" class="border-end-0">PROYECTO PROGRAMA</th>
                            <td colspan="5" class="border-start-0 align-middle"><?php echo $asignacion->proyecto?></td>
                        </tr>
                        <tr>
                            <th scope="row" colspan="5"></th>
                        </tr>
                        <tr>
                            <th class="col-1 col-md-1">CANTIDAD</th>
                            <th class="col-2 col-md-2">UNIDAD DE MEDIDA</th>
                            <th class="col-5 col-md-5">DESCRIPCI??N</th>
                            <th class="col-2 col-md-2">PRECIO</th>
                            <th class="col-2 col-md-2">VALOR TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i=0; $i<8;$i++):   ?>
                        <tr>
                            <td scope="row"><?php echo (isset($productosPagina[$i]->cantidad))?$productosPagina[$i]->cantidad:"<p></p>"; ?></td>
                            <td><?php echo (isset($productosPagina[$i]->unidad_medida))?$productosPagina[$i]->unidad_medida:""; ?></td>
                            <td><?php echo (isset($productosPagina[$i]->nombre_producto))?$productosPagina[$i]->nombre_producto:""; ?></td>
                            <td><?php echo (isset($productosPagina[$i]->costo_unitario))?$productosPagina[$i]->costo_unitario:""; ?></td>
                            <td><?php echo (isset($productosPagina[$i]->total))?$productosPagina[$i]->total:""; ?></td>
                        </tr>
                        <?php endfor; ?>
                        <tr>
                            <td colspan="3"></td>
                            <td class="fw-bold">Total</td>
                            <td><?php echo $orden->total?></td>
                        </tr>
                            <th>SON:</th>
                            <th colspan="4"><?php echo strtoupper(convertirNumeroLetra($orden->total))." ". convertDecimal($orden->total) ; ?> D??LARES DE LOS ESTADOS UNIDOS</th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <table class="table border-dark table-sm table-bordered text-center txt-table mb-3">
                <tr>
                    <th class="col-4">OBSERVACIONES: </th>
                    <td class="col-8"><?php echo $orden->observaciones?></td>
                </tr>
                <tr>
                    <th class="col-4">LUGAR DE ENTREGA: </th>
                    <td class="col-8"><?php echo $solicitud->lugar_entrega?></td>
                </tr>
                <tr>
                    <th class="col-4">FECHA DE ENTREGA: </th>
                    <td class="col-8"><?php echo (convertirFecha($orden->fecha_de_entrega)!==null)?convertirFecha($orden->fecha_de_entrega):"";?></td>
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
                    <th>TEL??FONO: </th>
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
                    
                    
                        <a class="page-link" href="<?php echo base_url()."Reporte/ordenCompra/".$acta->solicitud_id."?pag=".((int)$_GET["pag"]-1); ?>" tabindex="-1" aria-disabled="true">Anterior</a>
                    </li>

                    <?php for ($i = 1; $i <= $paginas; $i++) { ?>
                        <li class="page-item <?php echo $_GET['pag']==$i ? 'active':'' ?>"><a class="page-link" href="<?php echo base_url()."Reporte/ordenCompra/".$acta->solicitud_id."?pag=".$i ?>"><?php echo $i ?></a></li>
                    <?php } ?>
                   
                    <li class="page-item 
                    <?php echo $_GET['pag']>=$paginas ? 'disabled':'' ?>">
                    
                        <a class="page-link" href="<?php echo base_url()."Reporte/ordenCompra/".$acta->solicitud_id."?pag=".((int)$_GET["pag"]+1); ?>" tabindex="-1" aria-disabled="true">Siguiente</a>
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