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
    function convertirNumeroLetra($n){
        $formatterES = new NumberFormatter("es-ES", NumberFormatter::SPELLOUT);
        $izquierda = intval(floor($n));
        $derecha = intval(($n - floor($n)) * 100);
        //return $formatterES->format($izquierda) . " punto " . $formatterES->format($derecha);
        return $formatterES->format($izquierda);
    }

    function convertirFecha($strFehca)
    {
        $fechaAArray=explode('-',$strFehca);
        $miFecha=mktime(0,0,0,$fechaAArray[1],$fechaAArray[2],$fechaAArray[0]);
        setlocale(LC_TIME, 'spanish');
        $formatoEsperado=strftime("%d de %B de %Y", $miFecha);
        return $formatoEsperado;
    }
    $numeroProductos= count($productos);
    //echo "<p>" . $numeroProductos . " productos</p>";

    $paginas= ceil($numeroProductos/8);

    if(!isset($_GET['pag'])){
        header("Location:" . base_url()."Reporte/recibo/".$id."?pag=1");
    }
    //validar si es mayor a la cantidad de paginas
    if($_GET['pag'] > $paginas || $_GET['pag'] < 1){
        header("Location:" . base_url()."Reporte/recibo/".$id."?pag=1");
    }


    //obtenemos los 5 productos de la pagina actual
    $productosPagina= array_slice($productos, ($_GET['pag']-1)*8, 8);

    $productosPagina= array_slice($productos, ($_GET['pag']-1)*8, 8);
    function valorItem($item){
        $valor = (($_GET['pag'] * 8)-8) + $item;
        return $valor;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/resibo.css">
    
    <title>Recibo</title>
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
<main style="margin: 4px 35px;">
    <div class="d-flex justify-content-startrow g-0 text-center border">
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
    <div class="d-flex justify-content-startrow g-0 text-center txt">
        <div class="col-4 col-md-4">
            <h6 class="m-2 mb-2 fw-bold txt">
                RECIBO
            </h6>
        </div>
        <div class="col-4 col-md-4">
            <h6 class="m-2 mb-2 fw-bold txt">
                POR
            </h6>
        </div>
        <div class="col-2 col-md-2">
            <h6 class="m-2 mb-2 fw-bold txt">
                $
            </h6>
        </div>
        <div class="col-2 col-md-2">
            <h6 class="m-2 mb-2 fw-bold txt">
            <?php echo $orden->total?>
            </h6>
        </div>
    </div>
    <p class="txt">
        Recibí de la Tesorería de San Julián, Departamento de Sonsonate, la cantidad de 
        <span class="fw-bold text-uppercase"><?php echo strtoupper(convertirNumeroLetra($solicitud->total))." ". convertDecimal($solicitud->total) ; ?> dolares de los estados unidos de america</span>
        en concepto de:
    </p>
    <div class="table-responsive mb-1">
        <table class="table border-dark table-sm table-bordered text-center txt-table align-middle">
            <thead>
                <tr class="table-warning border-dark mx-auto align-middle">
                    <th>CAT</th>
                    <th class="col-1">UNIDAD DE MEDIDA</th>
                    <th class="col-7">DESCRIPCIÓN</th>
                    <th class="col-1">PRECIO</th>
                    <th class="col-2">VALOR TOTAL</th>
                </tr>
            </thead>
            <tbody>
            <?php for($i=0; $i<8;$i++):   ?>
                <tr>
                    <th scope="row"><?php echo (isset($productosPagina[$i]->cantidad))?$productosPagina[$i]->cantidad:"<p></p>"; ?></th>
                    <td><?php echo (isset($productosPagina[$i]->unidad_medida))?$productosPagina[$i]->unidad_medida:""; ?></td>
                    <td><?php echo (isset($productosPagina[$i]->nombre_producto))?$productosPagina[$i]->nombre_producto:""; ?></td>
                    <td><?php echo (isset($productosPagina[$i]->costo_unitario))?"$ ".$productosPagina[$i]->costo_unitario:""; ?></td>
                    <td><?php echo (isset($productosPagina[$i]->total))?"$ ".$productosPagina[$i]->total:""; ?></td>
                </tr>
                <?php endfor; ?>
               
                <tr>
                    <th scope="row" class="col-2" colspan="2"></th>
                    <th class="">Renta 10%</th>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row" class="col-2" colspan="2"></th>
                    <td rowspan="2" class="fw-bold">LIQUIDO A PAGAR</td>
                    <td></td>
                    <td><?php echo "$ ".$orden->total?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="table-responsive">
        <table class="table border-dark table-bordered text-center txt-table">
            <tbody class="aling">
                <tr>
                    <th scope="row" style="padding: 10px 0 10px 0;">JUSTIFICACIÓN</th>
                    <td class="align-middle"><?php echo $solicitud->destino_de_bien?></td>
                </tr>
                <tr>
                    <th scope="row" style="padding: 10px 0 10px 0;">PROYECTO O PROGRAMA</th>
                    <td class="align-middle"><?php echo $asignacion->proyecto?></td>
                </tr>
            </tbody>
        </table>
        <p class="txt text-end">San Julián, <?php echo convertirFecha($solicitud->fecha);?></p>
    </div>
    <div class="d-flex justify-content-startrow g-0 text-center" style="margin-top:-24px;">
        <div class="col-4 col-md-4">
            <div class="centrado txt text-start">     
                <p>
                    <div class="linea" style="border-top: 1px solid white"></div>
                    <div>NOMBRE:</div>
                    <div>DIRECCIÓN:</div>
                    <div>NIT:</div>
                    <div>NCR O DUI:</div>
                </p>
            </div>
        </div>
        <div class="col-6 col-md-6">
            <div class="centrado txt">     
                <p style="width: 999px;">
                    <div class="linea"></div>
                    <div><?php echo $solicitud->nombre?></div>
                    <div><?php echo $solicitud->direccion?></div>
                    <div><?php echo $solicitud->nit?></div>
                    <div><?php echo $solicitud->ncr_dui?></div>
                </p>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-startrow g-0 text-center" style="margin-top:-10px;">
        <div class="col-4 col-md-4">        
            <div class="centrado txt">     
                <p>
                    <p class="txt text-start">DESE</p>
                    <div class="lineas"></div>
                    <div>Gabriel Omón Serrano Hernandez</div>
                    <div>Alcalde</div>
                </p>
            </div>
        </div>
        <div class="col-4 col-md-4">
            <div class="centrado txt">     
                <p>
                    <p class="txt text-start">Vo. Bo.</p>
                    <div class="lineas"></div>
                    <div>Mario Alexander Ramos Hernandez</div>
                    <div>Sindico</div>
                </p>
            </div>
        </div>
        <div class="col-4 col-md-4">
            <div class="centrado txt">     
                <p>
                    <p class="txt text-start">PAGUESE</p>
                    <div class="lineas"></div>
                    <div>Dario Josué Zeceña Sosa</div>
                    <div>Tesorero</div>
                </p>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table border-dark table-sm table-bordered text-center txt-table align-middle">
            <thead>
                <tr class="border-dark mx-auto" style="padding: 30px 0 30px 0;">
                    <th class="">AM5J-ADI2021-</th>
                    <td class=""><?php echo $solicitud->amsj?></td>
                    <td class="col-7" colspan="7"></td>
                    <th class="">AM5J-ADI2021-</th>
                    <td class=""><?php echo $solicitud->amsj?></td>
                </tr>
            </thead>
            <tbody>
                <tr class="text-start">
                    <th scope="row" class="col-1">SP</th>
                    <td class="col-1"></td>
                    <th>FF</th>
                    <td class="col-1"></td>
                    <th class="col-1">FD</th>
                    <td class="col-1"></td>
                    <th class="col-1">PROY</th>
                    <td class="col-1"></td>
                    <th class="col-1">CP</th>
                    <td class="col-1"></td>
                    <th class="col-2">F</th>
                </tr>
                <tr>
                    <th scope="row" colspan="3">ACTA</th>
                    <td></td>
                    <th colspan="2">ACUERDO</th>
                    <td></td>
                    <th colspan="2">FECHA</th>
                    <td></td>
                    <th class="text-start">F</th>
                </tr>
                <tr>
                    <th scope="row">CB</th>
                    <td colspan="5"></td>
                    <th>JP</th>
                    <td></td>
                    <th>DF</th>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <th scope="row">CC</th>
                    <td colspan="9"></td>
                    <th class="text-start">F</th>
                </tr>
            </tbody>
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


                <a class="page-link"
                    href="<?php echo base_url()."Reporte/recibo/".$id."?pag=".((int)$_GET["pag"]-1); ?>"
                    tabindex="-1" aria-disabled="true">Anterior</a>
            </li>

            <?php for ($i = 1; $i <= $paginas; $i++) { ?>
            <li class="page-item <?php echo $_GET['pag']==$i ? 'active':'' ?>"><a class="page-link"
                    href="<?php echo base_url()."Reporte/recibo/".$id."?pag=".$i ?>"><?php echo $i ?></a>
            </li>
            <?php } ?>

            <li class="page-item 
                <?php echo $_GET['pag']>=$paginas ? 'disabled':'' ?>">

                <a class="page-link"
                    href="<?php echo base_url()."Reporte/recibo/".$id."?pag=".((int)$_GET["pag"]+1); ?>"
                    tabindex="-1" aria-disabled="true">Siguiente</a>
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