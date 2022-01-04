<?php
    
   
    function validarItem($item,$length,$i){
        //validar si esta indefinido
        return "a";


    }
    //funcion fecha a letra
    function convertirFecha($strFehca)
    {
        $fechaAArray=explode('-',$strFehca);
        $miFecha=mktime(0,0,0,$fechaAArray[1],$fechaAArray[2],$fechaAArray[0]);
        setlocale(LC_TIME, 'es_ES.UTF-8');
        $formatoEsperado=strftime("%d de %B de %Y", $miFecha);
        return $formatoEsperado;
    }

    $anio_actual = date('Y');
    

    $numeroProductos= count($productos);
    //echo "<p>" . $numeroProductos . " productos</p>";

    $paginas= ceil($numeroProductos/5);

    if(!isset($_GET['pag'])){
        header("Location:" . base_url()."Reporte/solicitudRequerimiento/".$id."?pag=1");
    }
    //validar si es mayor a la cantidad de paginas
    if($_GET['pag'] > $paginas || $_GET['pag'] < 1){
        header("Location:" . base_url()."Reporte/solicitudRequerimiento/".$id."?pag=1");
    }


    //obtenemos los 5 productos de la pagina actual
    $productosPagina= array_slice($productos, ($_GET['pag']-1)*5, 5);

    function valorItem($item){
      $valor = (($_GET['pag'] * 5)-5) + $item;
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
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/solicitud.css">

    <title>Solicitud de requerimiento</title>
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

    <main style="margin: 20px 60px;">
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
        <h6 class="text-center fw-bold" style="margin-top:-7px;font-size: 14px;">
            SOLICITUD DE REQUERIMIENTO DE OBRA , BIEN O SERVICIO
        </h6>
        <table class="m-2 table table-sm table-bordered border-dark text-center txt-table">
            <thead>
                <tr class="border-0">
                    <th class="col-1 border-0"></th>
                    <th class="col-1 border-0"></th>
                    <th class="col-1 border-0"></th>
                    <th class="col-1 border-0"></th>
                    <th class="col-1 border-0"></th>
                    <th class="col-1 border-0"></th>
                    <th class="col-1 border-0"></th>
                    <th class="col-1 border-0"></th>
                    <th colspan="4" class="border-dark border-top">AMSJ-ADJ2021</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-start fw-bold" colspan="3">FECHA: (D-M-A)</td>
                    <td colspan="5" style="margin: 0;"><?php echo convertirFecha($solicitud->fecha);?></td>
                    <td colspan="4"><?php echo $solicitud->amsj;?></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold" colspan="3">NOMBRE DEL SOLICITANTE:</td>
                    <td colspan="5"> <?php echo $solicitud->nombre_solicitante;?></td>
                    <td class=" fw-bold align-middle col-2" rowspan="3">FIRMA DEL SOLICITANTE:</td>
                    <td class="col-2" rowspan="3"></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold" colspan="3">CARGO:</td>
                    <td colspan="5"><?php echo $solicitud->cargo_solicitante;?></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold" colspan="3">DEPENDENCIA:</td>
                    <td colspan="5"><?php echo $solicitud->dependencia_solicitante;?></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold" colspan="3">NOMBRE DEL AUTORIZANTE:</td>
                    <td colspan="5"><?php echo $solicitud->nombre_autorizante;?></td>
                    <td class="col-1 fw-bold align-middle col-2" rowspan="3">FIRMA DEL AUTORIZANTE:</td>
                    <td class="col-2" rowspan="3"></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold" colspan="3">CARGO:</td>
                    <td colspan="5"><?php echo $solicitud->cargo_autorizante;?></td>
                </tr>
                <tr>
                    <td class="text-start fw-bold" colspan="3">DEPENDENCIA:</td>
                    <td colspan="5"><?php echo $solicitud->dependencia_autorizante;?></td>
                </tr>
                <tr style="background-color: #AFE1B4;">
                    <td class="fw-bold align-middle">ÍTEM</td>
                    <td class="fw-bold align-middle">CANT.</td>
                    <td class="fw-bold align-middle">UNIDAD DE MEDIDA</td>
                    <td class="fw-bold align-middle" colspan="5">OBRA, BIEN O SEVICIO SOLICITADO</td>
                    <td class="fw-bold align-middle" colspan="2">Cifra presupuestaria</td>
                </tr>
                <?php for($i=0; $i<5; $i++):   ?>
                <tr>
                    <td class="col-1 col-md-1 align-middle fw-bold"><?php echo valorItem($i+1) ?></td>
                    <td class="col-1 col-md-1 align-middle"><?php echo (isset($productosPagina[$i]->cantidad))?$productosPagina[$i]->cantidad:""; ?></td>
                    <td class="col-1 col-md-1 align-middle"><?php echo (isset($productosPagina[$i]->unidad_medida))?$productosPagina[$i]->unidad_medida:""; ?></td>
                    <td class="align-middle" colspan="5"><?php echo (isset($productosPagina[$i]->nombre_producto))?$productosPagina[$i]->nombre_producto:""; ?></td>
                    <td class="align-middle" colspan="2"><?php echo (isset($productosPagina[$i]->cifra_presupuestada))?$productosPagina[$i]->cifra_presupuestada:""; ?></td>
                </tr>
                <?php endfor; ?>

                <tr>
                    <td colspan="12"></td>
                </tr>
                <tr>
                    <td class="fw-bold" colspan="3">VALOR ESTIMADO DE LA COMPRA:</td>
                    <td colspan="2"><?php //echo $solicitud->valor_compra;?></td>
                    <td class="fw-bold" colspan="3">FORMA DE ENTREGA</td>
                    <td colspan="3"><?php echo $solicitud->forma_entrega;?></td>
                </tr>
                <tr>
                    <td class="fw-bold" colspan="3">LUGAR DE ENTREGA:</td>
                    <td colspan="9"><?php echo $solicitud->lugar_entrega;?></td>
                </tr>
                <tr>
                    <td class="fw-bold" colspan="12">JUSTIFICACIÓN O DESTINO DEL BIEN:</td>
                </tr>
                <tr>
                    <td class="align-middle" colspan="12"><?php echo $solicitud->destino_de_bien;?></td>
                </tr>
                <tr>
                    <th colspan="3" rowspan="2">PROPUESTA DE ADMINISTRADOR DE CONTRATO U ORDEN DE COMPRA</th>
                    <th colspan="3">NOMBRE:</th>
                    <th colspan="2">CARGO:</th>
                    <th colspan="4">DEPENDENCIA:</th>
                </tr>
                <tr style="height: 23px;">
                    <td colspan="3"><?php echo $propuesta->nombre_administrador_contrato;?></td>
                    <td colspan="2"><?php echo $propuesta->cargo_administrador_contrato;?></td>
                    <td colspan="4"><?php echo $propuesta->dependencia;?></td>
                </tr>
                <tr style="height: 23px;">
                    <td colspan="3" class="fw-bold">RECIBIDO EN UACI POR:</td>
                    <td colspan="3"><?php echo $propuesta->nombre_recibido_por;?></td>
                    <td colspan="6" rowspan="3"></td>
                </tr>
                <tr style="height: 23px;">
                    <td colspan="3" class="fw-bold">CARGO:</td>
                    <td colspan="3"><?php echo $propuesta->cargo_de_recibido;?></td>
                </tr>
                <tr style="height: 23px;">
                    <td colspan="3" class="fw-bold">FECHA</td>
                    <td colspan="3"><?php echo convertirFecha($solicitud->fecha);?></td>
                </tr>
                
                <?php if(!empty($asignacion)) {?>
                <tr>
                    <td class="fw-bold" colspan="12">ASIGNACION PRESUPUESTARIA</td>
                </tr>
                <tr>
                    <td colspan="12" class="text-start">
                        En atención al articulo 10 inciso e) y 11 de la Ley de adquisiciones y contratación de la
                        administración pública de la (LACAP),
                        solicito su colaboración en el sentido de verificar la asignación presupuestaria para dar inicio
                        a los procesos de compras siguientes:
                    </td>
                </tr>
                <tr>
                    <td class="fw-bold" colspan="3">PROYECTO O PROGRAMA:</td>
                    <td colspan="9"><?php echo $asignacion->proyecto;?></td>
                </tr>
                <tr>
                    <td colspan="3">ESTADO:</td>
                    <td colspan="2"><?php echo $asignacion->estado=="aprobado"? "X":"" ?></td>
                    <td colspan="2">APROBADO</td>
                    <td colspan="2"><?php echo $asignacion->estado=="rechazado"? "X":"" ?></td>
                    <td colspan="3">RECHAZADO</td>
                </tr>
                <tr>
                    <td class="fw-bold" colspan="7">APROBADO POR SOLICITUD DE MODIFICACIÓN PRESUPUESTARIA N°:</td>
                    <td colspan="5"><?php echo $asignacion->numero_solicitud_modificacion;?></td>
                </tr>
                <tr>
                    <td class="fw-bold" colspan="3">FUENTE DE FINANCIAMIENTO:</td>
                    <td colspan="9"><?php echo $asignacion->fuente_de_financiamiento;?></td>
                </tr>
                <tr>
                    <td class="fw-bold" colspan="3">RECIBIDO EN PRESUPUESTO POR:</td>
                    <td colspan="4"><?php echo $asignacion->recibo_en_presupuesto_por;?></td>
                    <td colspan="5" rowspan="3"></td>
                </tr>
                <tr>
                    <td class="fw-bold" colspan="3">CARGO:</td>
                    <td colspan="4"><?php echo $asignacion->cargo;?></td>
                </tr>
                <tr>
                    <td class="fw-bold" colspan="3">FECHA:</td>
                    <td colspan="4"><?php echo convertirFecha($solicitud->fecha);?></td>
                </tr>
                <?php } ?>
            
            </tbody>
        </table>
        <div class="ocultar d-flex justify-content-center my-3">
            <button id="imprimir" name="imprimir" class="btn btn-primary me-3">Imprimir</button>
            <a class="btn btn-primary" href="<?php echo base_url()."Reporte/documentacionCompra/".$id; ?>">Volver</a>
        </div>
        <nav aria-label="Page navigation example" class="ocultar mb-4">
            <ul class="pagination justify-content-center">
                <li class="page-item 
                    <?php echo $_GET['pag']<=1 ? 'disabled':'' ?>">


                    <a class="page-link"
                        href="<?php echo base_url()."Reporte/solicitudRequerimiento/".$id."?pag=".((int)$_GET["pag"]-1);?>" tabindex="-1" aria-disabled="true">Anterior</a> 
                </li>

                <?php for ($i = 1; $i <= $paginas; $i++) { ?>
                <li class="page-item <?php echo $_GET['pag']==$i ? 'active':'' ?>"><a class="page-link"
                        href="<?php echo base_url()."Reporte/solicitudRequerimiento/".$id."?pag=".$i ?>"><?php echo $i ?></a>
                </li>
                <?php } ?>

                <li class="page-item 
                    <?php echo $_GET['pag']>=$paginas ? 'disabled':'' ?>">

                    <a class="page-link"
                        href="<?php echo base_url()."Reporte/solicitudRequerimiento/".$id."?pag=".((int)$_GET["pag"]+1) ?>"
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