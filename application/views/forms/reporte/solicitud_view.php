<main class="" ng-app="app" ng-controller="app-controller">
    <div class="container  pt-4">
        <h3 class="text-capitalize text-center mb-5"><?php echo $title;?></h3>

        <div class="row">
            <div class="col-12">
                <div class="card text-center">
                    <div class="card-header">
                        Solicitud de compra
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Solicitante: <?php echo $solicitud->nombre_solicitante ?></h5>
                        <p class="card-text">Estado: <?php echo $solicitud->estado ?>.</p>
                        <p class="card-text">Justificacion: <?php echo $solicitud->destino_de_bien ?>.</p>
                        <button class="btn btn-success <?php echo $solicitud->estado!="pendiente"? "disabled":"";?>"
                            data-bs-toggle="modal" data-bs-target="#modal-recepcion">Aprobar</button>
                        <a href="<?php echo base_url()."Reporte/solicitudRequerimiento/".$id; ?>"
                            class="btn btn-info ms-4" target="_blank">Ver</a>


                        <?php if($solicitud->estado=="aprobado"){ ?>
                            <button class="btn btn-success ms-4" ng-if="orden==true" >Ver Orden</button>
                            <button data-bs-toggle="modal" data-bs-target="#modal-orden" class="btn btn-success ms-4" ng-if="orden==false">Crear Orden De Compra</button>
                        <?php } ?>


                    </div>
                    <div class="card-footer text-muted">
                        <?php echo $solicitud->fecha;?>
                    </div>
                </div>
            </div>
        </div>

        <!--modal aceptacio o rechazo-->
        <div class="modal fade" id="modal-recepcion" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Asignación presupuestaria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Proyecto o programa:</label>
                                <input type="text" class="form-control" id="proyecto"
                                    ng-model="asignacion_presupuestaria.proyecto">
                            </div>
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <label for="message-text" class="col-form-label">Aprobado por solicitud de
                                        modificación presupuestaria N°:</label>
                                    <input type="text" class="form-control" id="numero_solicitud_modificacion"
                                        ng-model="asignacion_presupuestaria.numero_solicitud_modificacion">

                                </div>

                            </div>
                            <div class="row">

                                <div class="mb-3 col-12">
                                    <label for="recipient-name" class="col-form-label">Recibo en presupuesto
                                        por:</label>
                                    <input type="text" class="form-control" id="recibo_en_presupuesto_por"
                                        ng-model="asignacion_presupuestaria.recibo_en_presupuesto_por">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="message-text" class="col-form-label">Fuente de financiamiento:</label>
                                    <input type="text" class="form-control" id="fuente_de_financiamiento"
                                        ng-model="asignacion_presupuestaria.fuente_de_financiamiento">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="message-text" class="col-form-label">Cargo:</label>
                                    <input type="text" class="form-control" id="cargo"
                                        ng-model="asignacion_presupuestaria.cargo">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="mb-2" for="inputState">Estado</label>
                                        <select id="inputState" class="form-select" name="estado"
                                            ng-model="asignacion_presupuestaria.estado">
                                            <option value="aprobado">Aprobado</option>
                                            <option value="rechazado">Rechazado</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="fecha" class="form-label">Fecha</label>
                                    <input type="date" class="form-control" value="09-09-2019" id="fecha"
                                        ng-model="asignacion_presupuestaria.fecha" required>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" ng-click="guardar()">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-orden" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Orden de compra</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="fecha" class="form-label">Fecha de orden</label>
                                <input type="date" class="form-control" id="fecha"
                                    ng-model="orden_de_compra.fecha" required>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="message-text" class="col-form-label">Lugar:</label>
                                <input type="text" class="form-control" id="costo-unitario" ng-model="orden_de_compra.lugar">

                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <div class="form-group">
                                    <label class="mb-2" for="inputState">proveedor_id</label>
                                    <select id="inputState" class="form-select" name=""
                                        ng-model="orden_de_compra.proveedorid">
                                        <option value="">,,,</option>
                                        <option value="">...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 col-6">
                                <div class="form-group">
                                    <label class="mb-2" for="inputState">solicitud_id</label>
                                    <select id="inputState" class="form-select" name=""
                                        ng-model="orden_de_compra.solicitud_id">
                                        <option value="">...</option>
                                        <option value="">,,,</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="recipient-name" class="col-form-label">Observaciones:</label>
                                <input type="text" class="form-control" id="observaciones" ng-model="orden_de_compra.observaciones">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="fecha_de_entrega" class="form-label">Fecha de entrega</label>
                                <input type="date" class="form-control" id="fecha_de_entrega"
                                    ng-model="orden_de_compra.fecha_de_entrega" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nombre completo de jefe de UACI:</label>
                            <input type="text" class="form-control" id="nombre_completo_jefe_uaci" ng-model="orden_de_compra.nombre_completo_jefe_uaci">
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="recipient-name" class="col-form-label">Telefono de Alcaldia:</label>
                                <input type="text" class="form-control" id="telefono_alcaldia" ng-model="orden_de_compra.telefono_alcaldia">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="recipient-name" class="col-form-label">Correo de Alcaldia:</label>
                                <input type="text" class="form-control" id="correo_alcaldia" ng-model="orden_de_compra.correo_alcaldia">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Tipo de documento:</label>
                            <input type="text" class="form-control" id="tipo_documento" ng-model="orden_de_compra.tipo_documento">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" ng-click="agregarOrdenCompra()">Agregar</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>
<script>
angular.module("app", []).controller("app-controller", function($scope, $http, $compile) {


    $scope.asignacion_presupuestaria = {};
    $scope.asignacion_presupuestaria.estado = "aprobado";
    $scope.asignacion_presupuestaria.solicitud_id = <?php echo $id;?>;
    $scope.orden;
    

    $scope.guardar = function() {
        $http({
            method: 'POST',
            url: '<?php echo base_url()."Reporte/insertAsignacionPresupuestaria/"; ?>',
            data: $scope.asignacion_presupuestaria
        }).then(function successCallback(response) {
            console.log(response);
            $('#modal-recepcion').modal('hide');
            //recargar 
            location.reload();

        }, function errorCallback(response) {
            console.log(response);
        });
    }

    $scope.existeOrden = function() {
        $http({
            method: 'POST',
            url: '<?php echo base_url()."Reporte/existOrdenCompra/".$id; ?>',
        }).then(function successCallback(response) {
            console.log(response);
            
            if (response.data=="true") {
                $scope.orden=true;
            } else {
                $scope.orden=false;
            }
            console.log($scope.orden);
        }, function errorCallback(response) {
            console.log(response);
        });
        
    }

    $scope.existeOrden();

});
</script>