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
//funcion fecha a letra
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
/* 
    $numeroProductos= count($productos);
    //echo "<p>" . $numeroProductos . " productos</p>";

    $paginas= ceil($numeroProductos/5);

    if(!isset($_GET['pag'])){
        header("Location:" . base_url()."Reporte/adjudicacion/".$id."?pag=1");
    }
    //validar si es mayor a la cantidad de paginas
    if($_GET['pag'] > $paginas || $_GET['pag'] < 1){
        header("Location:" . base_url()."Reporte/adjudicacion/".$id."?pag=1");
    }


    //obtenemos los 5 productos de la pagina actual
    $productosPagina= array_slice($productos, ($_GET['pag']-1)*4, 4);

    function valorItem($item){
      $valor = (($_GET['pag'] * 4)-4) + $item;
        return $valor;
    }

     */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/adjudicacion.css">

    <title>adjudicacion</title>
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
    <main style="margin: 5px 40px;">
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

        <h6 class="m-2 text-center mb-2 fw-bold">
            ADJUDICACI??N
        </h6>
        <table class="m-2 table table-sm table-bordered border-dark text-center txt-table mb-3">
            <tr>
                <th class="border border-white border-bottom-0"></th>
                <th class="border border-white border-bottom-0 border-end-0"></th>
                <th>AMSJ-ADJ2021</th>
            </tr>
            <tbody>
                <tr>
                    <td>FECHA</td>
                    <td><?php echo (convertirFecha($adjudicacion->fecha)!==null)?convertirFecha($adjudicacion->fecha):"";?></td>
                    <td><?php echo $acta->amsj;?></td>
                </tr>
            </tbody>
        </table>
        <table class="m-2 table table-sm table-bordered border-dark text-center txt-table mb-2">
            <tbody>
                <tr>
                    <td class="col-3">PROYECTO PROGRAMA</td>
                    <td><?php echo $asignacion->proyecto;?></td>
                </tr>
            </tbody>
        </table>
        <p class="mb-2 txt">
            La unida de Adquisiciones y Contrataciones Institucionales UACI, de la Alcald??a Municipal de San Juli??n
            Departamento de Sonsonate, con base en el
            requerimiento n?? 205 presentada por la unidad solicitante: <span class="fw-bold"><?php echo $acta->departamento_solicitante;?></span> cumpliendo con lo
            establecido
            en el art. 10 inciso "e" de la LACAP, presentando el /los oferentes para dicha adquisici??n o contrataci??n.
        </p>
        <div class="table-responsive mb-1">
            <table class="table border-dark table-sm table-bordered text-center txt-table">
                <thead>
                    <tr>
                        <th>N??</th>
                        <th>NIT</th>
                        <th>OFERENTE</th>
                        <th>MONTO OFERTADO</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td><?php echo $acta->nit?></td>
                        <td><?php echo $acta->nombre?></td>
                        <td><?php echo $orden->total?></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

        </div>
        <p class="text-word txt">
            Habiendo analizada(as) y evaluda(as) las oferta(as) recibida(as) por la UACI las cuales cumplen las
            condiciones legales, t??cnico
            administrativas en base a la LACAP y RELACAP, la oferta m??s recomendada es la de:
        </p>
        <div class="table-responsive mb-2">
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
                        <td><?php echo $acta->nombre;?></td>
                        <td><?php echo $orden->total?></td>
                        <td><?php echo strtoupper(convertirNumeroLetra($orden->total))." ". convertDecimal($orden->total) ; ?> D??LARES DE LOS ESTADOS UNIDOS</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p class="text-word txt">
            Por tanto en base a las facultades que me ha otorgado el Consejo Municipal en uso de las facultades legales
            que les confiere el C??digo Municipal
            y en conformidad con el Articulo 18 de la ley de Adquisiciones y Contrataciones de la Administraci??n
            p??blica. ADJUDIQUESE.
        </p>
        <p class="text-start txt">
            El requerimiento AMSJ <span class="fw-bold"><?php echo $acta->amsj;?></span> con un monto de <span class="fw-bold">$ <?php echo $orden->total?></span>
        </p>
        <p class="text-start txt px-4 ms-1">
        <?php echo strtoupper(convertirNumeroLetra($orden->total))." ". convertDecimal($orden->total) ; ?> D??LARES DE LOS ESTADOS UNIDOS
        </p>
        <p class="text-start txt">
            A la persona natural: <span class="fw-bold ms-1"> <?php echo $acta->nombre?></span>
        </p>
        <p class="text-start txt">
            NIT: <span class="fw-bold"><ins style="margin-right:20px;"><?php echo $acta->nit?></ins></span> NCR O DUI: <span
                class="fw-bold"><ins><ins><?php echo $acta->ncr_dui?></ins></span>
        </p>
        <div class="d-flex justify-content-startrow pt-2">
            <div class="centrado txt">
                <div class="linea"></div>
                <p>
                    <!-- <div>//Fredy Alberto Perez</div> -->
                    <div><?php echo $adjudicacion->administrador_de_contrato_u_orden_de_compra?></div>
                    <div>Administrador de Contrato u Orden de Compra</div>
                </p>
            </div>
            <div class="centrado txt col-6">
                <div class="linea"></div>
                <p>
                <div><?php echo $adjudicacion->representante_de_alcaldia?></div>
                <div><?php echo $adjudicacion->cargo_de_representante?></div>
                </p>
            </div>


        </div>
        <div class="ocultar d-flex justify-content-center my-3">
            <button id="imprimir" name="imprimir" class="btn btn-primary me-3">Imprimir</button>
            <a class="btn btn-primary" href="<?php echo base_url(); ?>">Volver</a>
        </div>

     <!--    <nav aria-label="Page navigation example" class="ocultar mb-4">
            <ul class="pagination justify-content-center">
                <li class="page-item 
                    <?php echo $_GET['pag']<=1 ? 'disabled':'' ?>">


                    <a class="page-link"
                        href="<?php echo base_url()."Reporte/adjudicacion/".$id."?pag=".$_GET["pag"]-1 ?>"
                        tabindex="-1" aria-disabled="true">Anterior</a>
                </li>

                <?php for ($i = 1; $i <= $paginas; $i++) { ?>
                <li class="page-item <?php echo $_GET['pag']==$i ? 'active':'' ?>"><a class="page-link"
                        href="<?php echo base_url()."Reporte/adjudicacion/".$id."?pag=".$i ?>"><?php echo $i ?></a>
                </li>
                <?php } ?>

                <li class="page-item 
                    <?php echo $_GET['pag']>=$paginas ? 'disabled':'' ?>">

                    <a class="page-link"
                        href="<?php echo base_url()."Reporte/adjudicacion/".$id."?pag=".$_GET["pag"]+1 ?>"
                        tabindex="-1" aria-disabled="true">Siguiente</a>
                </li>
            </ul>
        </nav> -->

    </main>
    <script>
    //imprimir
    document.getElementById('imprimir').onclick = function() {
        window.print();
    }
    </script>
</body>

</html>