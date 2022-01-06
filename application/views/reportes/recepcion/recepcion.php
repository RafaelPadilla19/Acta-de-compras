<?php
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

    $paginas= ceil($numeroProductos/8);

    if(!isset($_GET['pag'])){
        header("Location:" . base_url()."Reporte/recepcion/".$acta->solicitud_id."?pag=1");
    }
    //validar si es mayor a la cantidad de paginas
    if($_GET['pag'] > $paginas || $_GET['pag'] < 1){
        header("Location:" . base_url()."Reporte/recepcion/".$acta->solicitud_id."?pag=1");
    }


    //obtenemos los 5 productos de la pagina actual
    $productosPagina= array_slice($productos, ($_GET['pag']-1)*8, 8);

    function valorItem($item){
      $valor = (($_GET['pag'] * 8)-8) + $item;
        return $valor;
    }

    
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/recepcion.css">

    <title>Acta de recepcion</title>
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

    <main style="margin: 25px 60px;">
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
        <h6 class="text-center mb-2 fw-bold" style="font-size: 14px;">
            ACTA DE RECEPCIÓN DE BIENES Y SERVICIOS
        </h6>
        <div class="table-responsive mb-1">
            <table class="table border-dark table-sm table-bordered text-center txt-table">
                <thead>
                    <tr>
                        <th class="col-1">FECHA</th>
                        <td class="col-4"><?php echo convertirFecha($acta->fecha);?></td>
                        <th>AMSJ-AR2021</th>
                        <td><?php echo $acta->amsj;?></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="col-3" >PROYECTO PROGRAMA</th>
                        <td colspan="3" ><?php echo $asignacion->proyecto;?></td>
                    </tr>
                    <tr>
                        <th scope="row" colspan="4" style="height: 15px;"></th>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-start txt">
                            <p class="txt">
                                En la Alcaldía Municipal de San Julián, ubicada entre 1a y 3a Calle Poniente, Barrio el
                                Centro, Municipio de San Julián,
                                Departamento de Sonsonate A las: <span
                                    class="fw-bold text-decoration-underline"><?php echo substr(($recepcion->hora),11);?></span> del día: <span
                                    class="fw-bold text-decoration-underline"><?php echo convertirFecha($acta->fecha);?></span>
                            </p>
                            <p>
                                Reunidos con el proposito de hacer entrega formal por parte del proveedor: <span
                                    class="fw-bold text-decoration-underline"><?php echo $acta->nombre?></span>
                            </p>
                            <p>
                                De los bienes o servicios prestados, correspondiente a la forma de contratación por
                                Libre Gestión por medio de:
                            </p>
                            <div class="d-flex justify-content-startrow g-0">
                                <div class="col-6 col-md-6">
                                    <p>
                                        Factura o Recibo presentado N°
                                    </p>
                                </div>
                                <div class="col-6 col-md-6">
                                    <div class="linea"></div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-startrow g-0" style="margin-top: -10px;">
                                <div class="col-6 col-md-6">
                                    <p>
                                        De conformidad a la Orden de Compra
                                    </p>
                                </div>
                                <div class="col-3 col-md-3">
                                    <p class="text-center fw-bold"><?php echo $acta->amsj;?> AMSJ-OC2021
                                    <div class="linea" style="max-width: 80%;margin-top: -10px;"></div>
                                    </p>
                                </div>
                                <p class="col-1 col-md-">
                                    de fecha:
                                </p>
                                <div class="col-2 col-md-2">
                                    <p class="text-center fw-bold"><?php echo $acta->fecha;?>
                                    <div class="linea" style="max-width: 90%;margin-top: -10px;"></div>
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-startrow g-0" style="margin-top: -10px;">
                                <div class="col-6 col-md-6">
                                    <p>
                                        Estando presentes los señores por parte del proveedor:
                                    </p>
                                </div>
                                <div class="col-6 col-md-6">
                                    <p class="text-center fw-bold"><?php echo $acta->nombre?>
                                    <div class="linea" style="margin-top: -10px;"></div>
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-startrow g-0" style="margin-top: -10px;">
                                <div class="col-6 col-md-6">
                                    <p>
                                        Por parte de la municipalidad de San Julián:
                                    </p>
                                </div>
                                <div class="col-6 col-md-6">
                                    <p class="text-center fw-bold"><?php echo $adjudicacion->administrador_de_contrato_u_orden_de_compra;?>
                                    <div class="linea" style="margin-top: -10px;"></div>
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-startrow g-0" style="margin-top: -10px;">
                                <div class="col-6 col-md-6">
                                    <p>
                                        Departamento Solicitante:
                                    </p>
                                </div>
                                <div class="col-6 col-md-6">
                                    <p class="text-center fw-bold"><?php echo $acta->departamento_solicitante;?>
                                    <div class="linea" style="margin-top: -10px;"></div>
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-startrow g-0" style="margin-top: -10px;">
                                <div class="col-6 col-md-6">
                                    <p>
                                        Administrador de Contrato u compras:
                                    </p>
                                </div>
                                <div class="col-6 col-md-6">
                                    <p class="text-center fw-bold"><?php echo $adjudicacion->administrador_de_contrato_u_orden_de_compra;?>
                                    <div class="linea" style="margin-top: -10px;"></div>
                                    </p>
                                </div>
                            </div>
                            <p style="margin-bottom: -3px;">Se hace constar que el bien o servicio recibido cumple con
                                las condiciones y especificaciones técnicas, y previamente definidas
                                con el contrato u orden de compra, las cuales se detllam a continuación:
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" colspan="4" style="height: 15px;"></th>
                    </tr>
                    <tr>
                        <td scope="row" class="col-1 col-md-1">ITEM</td>
                        <td class="col-1 col-md-1">CANTIDAD</td>
                        <td class="col-2 col-md-2">UNIDAD DE MEDIDA</td>
                        <td class="col-6 col-md-8">DESCRIPCIÓN</td>
                    </tr>
                    <tr>
                    <?php foreach($productosPagina as $clave=>$item ):   ?>
                        <th scope="row"><?php echo valorItem($clave+1) ?></th>
                        <td><?php echo $item->cantidad; ?></td>
                        <td><?php echo $item->unidad_medida; ?></td>
                        <td><?php echo $item->descripcion; ?></td>
                    </tr>
                    <?php endforeach; ?>
                    
                    <tr>
                        <td scope="row" colspan="4">En cumplimiento a los Arts. 82 Bis literal e), y 77 RELACAP y no
                            habiendo más que hacer constar, firmamos y
                            ratificamos la presente acta.
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-start txt">
                            <div class="d-flex justify-content-startrow g-0 text-center">
                                <div class="col-6 col-md-6">
                                    <p class="fw-bold">ENTREGA PROVEEDOR</p>
                                </div>
                                <div class="col-6 col-md-6">
                                    <p class="fw-bold">RECEPCIONA</p>
                                </div>
                            </div>

                            <div class="d-flex justify-content-startrow g-0 text-start fw-bold">
                                <div class="col-1 col-md-1">
                                    <p>
                                    <div class="linea" style="border-top:white;padding-top: 13px;"></div>
                                    <div>NOMBRE</div>
                                    <div>DUI</div>
                                    <div>NIT</div>
                                    <div>NCR</div>
                                    </p>
                                </div>
                                <div class="col-5 col-md-5">
                                    <div class="linea" style="margin-left: 0;"></div>
                                    <p>
                                    <div><?php echo $acta->nombre?></div>
                                    <div><?php echo $acta->ncr_dui?></div>
                                    <div><?php echo $acta->nit?></div>
                                    </p>
                                </div>
                                <div class="col-1 col-md-1">
                                    <p>
                                    <div class="linea" style="border-top:white;padding-top: 13px;"></div>
                                    <div>NOMBRE</div>
                                    <div>CARGO</div>
                                    </p>
                                </div>
                                <div class="col-5 col-md-5">
                                    <div class="linea" style="margin-left: 0;"></div>
                                        <p>
                                            <div><?php echo $adjudicacion->administrador_de_contrato_u_orden_de_compra?></div>
                                            <div><?php echo $adjudicacion->cargo_de_administrador_de_contrato?></div>
                                            <div>Administrador de Contrato u Orden de Compra</div>
                                            <div>Conforme Al Solicitante</div>
                                        </p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-startrow g-0 text-start fw-bold ">
                                <div class="col-6"></div>
                                <div class="col-1 fw-bold">NOMBRE:</div>                               
                                <div class="col-5 col-md-5">
                                    <div class="linea" style="margin-left: 0;"></div>
                                    <p>
                                        <?php echo $acta->nombre_solicitante?>
                                    </p>
                                </div>                                
                            </div>
                        </td>
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
                    
                    
                        <a class="page-link" href="<?php echo base_url()."Reporte/recepcion/".$acta->solicitud_id."?pag=".((int)$_GET["pag"]-1); ?>" tabindex="-1" aria-disabled="true">Anterior</a>
                    </li>

                    <?php for ($i = 1; $i <= $paginas; $i++) { ?>
                        <li class="page-item <?php echo $_GET['pag']==$i ? 'active':'' ?>"><a class="page-link" href="<?php echo base_url()."Reporte/recepcion/".$acta->solicitud_id."?pag=".$i ?>"><?php echo $i ?></a></li>
                    <?php } ?>
                   
                    <li class="page-item 
                    <?php echo $_GET['pag']>=$paginas ? 'disabled':'' ?>">
                    
                        <a class="page-link" href="<?php echo base_url()."Reporte/recepcion/".$acta->solicitud_id."?pag=".((int)$_GET["pag"]+1); ?>" tabindex="-1" aria-disabled="true">Siguiente</a>
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