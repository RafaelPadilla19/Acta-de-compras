<?php

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
    <script src="<?php echo base_url(); ?>assets/js/angular.min.js"></script>
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

<body ng-app="app" ng-controller="app-controller">

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
                        <th class="col-3">FECHA</th>
                        <td class="col-4">
                            <?php echo (convertirFecha($recepcion->fecha)!==null)?convertirFecha($recepcion->fecha):"";?>
                        </td>
                        <th class="col-3">AMSJ-AR2021</th>
                        <td class="col-2"><?php echo $acta->amsj;?></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="col-3">PROYECTO PROGRAMA</th>
                        <td colspan="9"><?php echo $asignacion->proyecto;?></td>
                    </tr>
                    <tr>
                        <th scope="row" colspan="12" style="height: 15px;"></th>
                    </tr>
                    <tr>
                        <td colspan="12" class="text-start txt">
                            <p class="txt">
                                En la Alcaldía Municipal de San Julián, ubicada entre 1a y 3a Calle Poniente, Barrio el
                                Centro, Municipio de San Julián,
                                Departamento de Sonsonate A las: <span
                                    class="fw-bold text-decoration-underline"><?php echo substr(($recepcion->hora),11);?></span>
                                del día: <span
                                    class="fw-bold text-decoration-underline"><?php echo (convertirFecha($recepcion->fecha)!==null)?convertirFecha($recepcion->fecha):"";?></span>
                            </p>
                            <p>
                                Reunidos con el proposito de hacer entrega formal por parte del proveedor: <span
                                    class="fw-bold text-decoration-underline"><?php echo $acta->nombre?></span>
                            </p>
                            <p>
                                De los bienes o servicios prestados, correspondiente a la forma de contratación por
                                Libre Gestión por medio de:
                            </p>
                            <div class="d-flex justify-content-startrow g-0 ">
                                <div class="col-6 col-md-6">
                                    <p>
                                        Factura o Recibo presentado N°: <span
                                            class="fw-bold text-decoration-underline"><?php //echo $recepcion->numero_factura;?></span>
                                    </p>
                                </div>
                                <div class="col-6 col-md-6">
                                    <p class="text-center fw-bold"><?php echo $recepcion->numero_factura;?>
                                    <div class="linea" style="margin-top: -7px;"></div>
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-startrow g-0" style="margin-top: -10px;">
                                <div class="col-6 col-md-6">
                                    <p class="">
                                        De conformidad a la Orden de Compra
                                    </p>
                                </div>
                                <div class="col-3 col-md-3">
                                    <p class="text-center fw-bold"><?php echo $acta->amsj;?> AMSJ-OC2021
                                    <div class="linea" style="max-width: 80%;margin-top: -10px;"></div>
                                    </p>
                                </div>
                                <p class="col-1 col-md-1">
                                    de fecha:
                                </p>
                                <div class="col-2 col-md-2">
                                    <p class="text-center fw-bold">
                                        <?php echo $recepcion->fecha!==null?$recepcion->fecha:"";?>
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
                                    <p class="text-center fw-bold">
                                        <?php echo $adjudicacion->administrador_de_contrato_u_orden_de_compra;?>
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
                                    <p class="text-center fw-bold">
                                        <?php echo $adjudicacion->administrador_de_contrato_u_orden_de_compra;?>
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
                        <th scope="row" colspan="12" style="height: 15px;"></th>
                    </tr>
                    <tr class="col-12">
                        <th>ITEM</th>
                        <th>CANTIDAD</th>
                        <th>UNIDAD DE MEDIDA</th>
                        <th>DESCRIPCIÓN</th>
                    </tr>
                    <tr>
                        <?php foreach($productosPagina as $clave=>$item ):   ?>
                        <th scope="row"><?php echo valorItem($clave+1) ?></th>
                        <td><?php echo $item->cantidad; ?></td>
                        <td><?php echo $item->unidad_medida; ?></td>
                        <td><?php echo $item->nombre_producto; ?></td>
                    </tr>
                    <?php endforeach; ?>

                    <tr>
                        <td scope="row" colspan="12">En cumplimiento a los Arts. 82 Bis literal e), y 77 RELACAP y no
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
                                    <p>
                                        Solicitante
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
            <a class="btn btn-primary me-3" href="<?php echo base_url(); ?>">Volver</a>
            <button data-bs-toggle="modal" data-bs-target="#modal-recepcion"
                class="btn btn-primary ">Actualizar</button>
        </div>
        <nav aria-label="Page navigation example" class="ocultar mb-4">
            <ul class="pagination justify-content-center">
                <li class="page-item 
                    <?php echo $_GET['pag']<=1 ? 'disabled':'' ?>">


                    <a class="page-link"
                        href="<?php echo base_url()."Reporte/recepcion/".$acta->solicitud_id."?pag=".((int)$_GET["pag"]-1); ?>"
                        tabindex="-1" aria-disabled="true">Anterior</a>
                </li>

                <?php for ($i = 1; $i <= $paginas; $i++) { ?>
                <li class="page-item <?php echo $_GET['pag']==$i ? 'active':'' ?>"><a class="page-link"
                        href="<?php echo base_url()."Reporte/recepcion/".$acta->solicitud_id."?pag=".$i ?>"><?php echo $i ?></a>
                </li>
                <?php } ?>

                <li class="page-item 
                    <?php echo $_GET['pag']>=$paginas ? 'disabled':'' ?>">

                    <a class="page-link"
                        href="<?php echo base_url()."Reporte/recepcion/".$acta->solicitud_id."?pag=".((int)$_GET["pag"]+1); ?>"
                        tabindex="-1" aria-disabled="true">Siguiente</a>
                </li>
            </ul>
        </nav>
        <!--modal acta recepcion-->
        <div class="modal fade" id="modal-recepcion" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Acta de recepcion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">

                                <div class="mb-3 col-12">
                                    <label for="message-text" class="col-form-label">Hora:</label>
                                    <input type="time" class="form-control" id="" ng-model="acta_de_recepcion.hora">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <label for="fecha" class="form-label">Fecha</label>
                                    <input type="date" class="form-control" id="fecha"
                                        ng-model="acta_de_recepcion.fecha" required>
                                </div>
                            </div>

                            <div class="row">

                                <div class="mb-3 col-12">
                                    <label for="message-text" class="col-form-label">Numero de factura:</label>
                                    <input type="text" class="form-control" id=""
                                        ng-model="acta_de_recepcion.numero_factura">

                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" ng-click="actualizarActa()">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>
        <!--fin modal-->
    </main>
    <script>
    angular.module("app", []).controller("app-controller", function($scope, $http, $compile) {
        //imprimir

        
        document.getElementById('imprimir').onclick = function() {
            window.print();
        }

        $scope.acta_de_recepcion = {};

        (function() {
            $http({
                method: 'GET',
                url: '<?php echo base_url().'/Reporte/getActaDeRecepcion/'.$id; ?>'
            }).then(function successCallback(response) {
                $scope.acta_de_recepcion = response.data;
                //convertir a input time
                $scope.acta_de_recepcion.hora = $scope.acta_de_recepcion.hora.split("T");
                $scope.acta_de_recepcion.hora = new Date(1970, 0, 1, $scope.acta_de_recepcion.hora[1].split(":")[0], $scope.acta_de_recepcion.hora[1].split(":")[1], 0, 0);
                

                $scope.acta_de_recepcion.fecha= new Date($scope.acta_de_recepcion.fecha);
                console.log($scope.acta_de_recepcion);
            }, function errorCallback(response) {
                console.log(response);
            })
        })();

        $scope.actualizarActa= ()=>{
            $http({
                method: 'POST',
                url: '<?php echo base_url().'/Reporte/actualizarActaRecepcion'; ?>',
                data: $scope.acta_de_recepcion
            }).then(function successCallback(response) {

                console.log( $scope.acta_de_recepcion);
                
                window.location.reload();
            }, function errorCallback(response) {
                console.log(response);
            })
        }

    });
    </script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>