<main class="" ng-app="app" ng-controller="app-controller">
    <div class="container  pt-4">
        <h3 class="text-capitalize text-center mb-5"><?php echo $title; ?></h3>

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

                        <button class="btn btn-success <?php echo $solicitud->estado != "pendiente" ? "disabled" : ""; ?>" data-bs-toggle="modal" data-bs-target="#modal-aceptacion">Aprobar</button>
                        <a href="<?php echo base_url() . "Reporte/solicitudRequerimiento/" . $id; ?>" class="btn btn-info ms-4" target="_blank">Ver Solitud</a>


                        <?php if ($solicitud->estado == "aprobado") { ?>


                            <a href="<?php echo (isset($orden_de_compra) &&  $orden_de_compra->tipo_documento == "recibo") ? base_url() . "Reporte/recibo/" . $id : base_url() . "Reporte/ordenCompra/" . $id; ?>" class="btn btn-success ms-4" ng-if="orden==true" target="_blank">Ver Orden</a>


                            <button data-bs-toggle="modal" data-bs-target="#modal-orden" class="btn btn-success ms-4" ng-if="orden==false">Crear Orden De Compra</button>

                            <a href="<?php echo base_url() . "Reporte/adjudicacion/" . $id; ?>" target="_blank" rel="noopener noreferrer" ng-if="adjudicacionExist==true" class="btn btn-dark ms-4">Ver
                                Adjudicacion</a>
                            <button ng-if="adjudicacionExist==false" data-bs-toggle="modal" data-bs-target="#modal-adjudicacion" class="btn btn-dark ms-4">Crear Adjudicacion</button>


                            <a href="<?php echo base_url() . "Reporte/recepcion/" . $id; ?>" ng-if="recepcion==true" target="_blank" rel="noopener noreferrer" class="btn btn-primary ms-4">Ver Acta de recepcion</a>
                            <button ng-if="recepcion==false" data-bs-toggle="modal" data-bs-target="#modal-recepcion" class="btn btn-warning ms-4">Crear Acta de recepcion</button>

                            <a href="<?php echo base_url() . "Reporte/declaracion/" . $id; ?>" ng-if="orden==true && adjudicacionExist==true && recepcion==true" target="_blank" rel="noopener noreferrer" class="btn btn-secondary ms-4">Ver declaracion</a>

                        <?php } ?>


                    </div>
                    <div class="card-footer text-muted">
                        <?php echo $solicitud->fecha; ?>
                    </div>
                </div>
            </div>
        </div>

        <!--modal aceptacion o rechazo-->
        <div class="modal fade" id="modal-aceptacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <input type="text" class="form-control" id="proyecto" ng-model="asignacion_presupuestaria.proyecto">
                            </div>
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <label for="message-text" class="col-form-label">Aprobado por solicitud de
                                        modificación presupuestaria N°:</label>
                                    <input type="text" class="form-control" id="numero_solicitud_modificacion" ng-model="asignacion_presupuestaria.numero_solicitud_modificacion" placeholder="Opcional">

                                </div>

                            </div>
                            <div class="row">

                                <div class="mb-3 col-12">
                                    <label for="recipient-name" class="col-form-label">Recibo en presupuesto
                                        por:</label>
                                    <input type="text" class="form-control" id="recibo_en_presupuesto_por" ng-model="asignacion_presupuestaria.recibo_en_presupuesto_por">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="message-text" class="col-form-label">Fuente de financiamiento:</label>
                                    <input type="text" class="form-control" id="fuente_de_financiamiento" ng-model="asignacion_presupuestaria.fuente_de_financiamiento" placeholder="Opcional">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="message-text" class="col-form-label">Cargo:</label>
                                    <input type="text" class="form-control" id="cargo" ng-model="asignacion_presupuestaria.cargo">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="mb-2" for="inputState">Estado</label><br>
                                        <select id="inputState" class="form-select" name="estado" ng-model="asignacion_presupuestaria.estado">
                                            <option value="aprobado">Aprobado</option>
                                            <option value="rechazado">Rechazado</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                    <label class="mb-2" for="fechaJus">Fecha de asignacion(Opcional):</label>
                                    <input type="date" class="form-control" id="fechaJus" ng-model="asignacion_presupuestaria.fecha">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" ng-click="guardar()">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <!--modal orden de compra-->
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

                                <div class="mb-3 col-12">
                                    <label for="message-text" class="col-form-label">Lugar:</label>
                                    <input type="text" class="form-control" id="costo-unitario" ng-model="orden_de_compra.lugar">

                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <div class="form-group">
                                        <label class="mb-2" for="inputState">Proveedores</label>
                                        <select id="inputState" class="form-select" name="" ng-model="orden_de_compra.proveedor_id">
                                            <option value="">Seleccione un proveedor</option>
                                            <option ng-repeat="p in proveedores" value="{{p.proveedor_id}}">{{p.nombre}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 col-6">
                                    <div class="form-group">
                                        <label class="mb-2" for="inputState">Tipo de documento:</label>
                                        <select id="inputState" class="form-select" name="" ng-model="orden_de_compra.tipo_documento">
                                            <option value="">Seleccione un proveedor</option>
                                            <option value="recibo">Recibo</option>
                                            <option value="factura">Factura</option>
                                            <option value="credito_fiscal">Credito fiscal</option>
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
                                    <input type="date" class="form-control" id="fecha_de_entrega" ng-model="orden_de_compra.fecha_de_entrega" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Nombre completo de jefe de
                                    UACI:</label>
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
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" ng-click="guardarOrderCompra()">Agregar</button>
                    </div>
                </div>
            </div>
        </div>

        <!--modal adjudicacion-->
        <div class="modal fade" id="modal-adjudicacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Adjudicacion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">

                                <div class="mb-3 col-12">
                                    <label for="message-text" class="col-form-label">Nombre de administradord de orden
                                        de compra:</label>
                                    <input type="text" class="form-control" id="costo-unitario" ng-model="adjudicacion.administrador_de_contrato_u_orden_de_compra">

                                </div>
                            </div>

                            <div class="row">

                                <div class="mb-3 col-12">
                                    <label for="message-text" class="col-form-label">Cargo administradord de orden
                                        de compra:</label>
                                    <input type="text" class="form-control" id="costo-unitario" ng-model="adjudicacion.cargo_de_administrador_de_contrato">

                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" ng-click="guardarAdjudicacion()">Agregar</button>
                    </div>
                </div>
            </div>
        </div>
        <!--modal acta recepcion-->
        <div class="modal fade" id="modal-recepcion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <label for="message-text" class="col-form-label">Numero de factura:</label>
                                    <input type="text" class="form-control" id="" ng-model="acta_de_recepcion.numero_factura">

                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" ng-click="guardarActaRecepcion()">Agregar</button>
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
        $scope.asignacion_presupuestaria.recibo_en_presupuesto_por="Edith Angelica Martinez Bonilla";


        $scope.asignacion_presupuestaria.solicitud_id = <?php echo $id; ?>;
        $scope.orden;
        $scope.orden_de_compra = {};
        $scope.orden_de_compra.lugar = "Alcaldia Municipal de San Julian Cacaluta";
        $scope.orden_de_compra.correo_alcaldia = "sanjulian.uaci2021@gmail.com"
        $scope.orden_de_compra.telefono_alcaldia = "2461-2904";
        $scope.orden_de_compra.nombre_completo_jefe_uaci = "Lorena Beatriz Romero de Aviles";
        $scope.asignacion_presupuestaria.cargo="Encargada de Presupuesto"
        $scope.orden_de_compra.solicitud_id = <?php echo $id; ?>;
        $scope.adjudicacion = {};
        $scope.adjudicacion.solicitud_id = <?php echo $id; ?>;
        $scope.acta_de_recepcion = {};
        $scope.acta_de_recepcion.solicitud_id = <?php echo $id; ?>;


        $scope.adjudicacionExist;
        $scope.recepcion;

        const aceptacion_rechazo_validacion = () => {
            if ($scope.asignacion_presupuestaria.proyecto==null ||
            //$scope.asignacion_presupuestaria.numero_solicitud_modificacion==null ||
            $scope.asignacion_presupuestaria.recibo_en_presupuesto_por==null ||
            //$scope.asignacion_presupuestaria.fuente_de_financiamiento==null ||
            $scope.asignacion_presupuestaria.cargo==null ||
            $scope.asignacion_presupuestaria.estado==null) {

                alert("LLene todos los campos");
                return false;
            }

        }

        const validar_campos_orden_compra = () => {
            if($scope.orden_de_compra.lugar == null ||
            $scope.orden_de_compra.proveedor_id==null ||
            $scope.orden_de_compra.tipo_documento==null ||
            $scope.orden_de_compra.observaciones==null ||
            $scope.orden_de_compra.fecha_de_entrega==null ||
            $scope.orden_de_compra.nombre_completo_jefe_uaci==null ||
            $scope.orden_de_compra.telefono_alcaldia==null ||
            $scope.orden_de_compra.correo_alcaldia==null){
                alert("Llene todos los campos");
                return false;
            }
        }

        const validar_campos_adjudicacion = () => {
            if($scope.adjudicacion.administrador_de_contrato_u_orden_de_compra==null ||
            $scope.adjudicacion.cargo_de_administrador_de_contrato==null){
                alert("Llene todos los campos");
                return false;
            }
        }

        const validar_campos_acta_de_recepcion = () => {
            if($scope.acta_de_recepcion.hora== null ||
            $scope.acta_de_recepcion.numero_factura==null){
                alert("Llene todos los campos");
                return false;
            }
        }

        $scope.guardarAdjudicacion = function() {
            if(!(validar_campos_adjudicacion()==false)){
                $http({
                    method: 'POST',
                    url: '<?php echo base_url() . "Reporte/insertAdjudicacion/"; ?>',
                    data: $scope.adjudicacion
                }).then(function(response) {
                    alert("Se ha guardado la adjudicacion");
                    $('#modal-adjudicacion').modal('hide');
                    window.location.reload();
                });
            } 
        }

        $scope.guardarActaRecepcion = function() {
            if(!(validar_campos_acta_de_recepcion()==false)){
                $http({
                    method: 'POST',
                    url: '<?php echo base_url() . "Reporte/insertActaRecepcion/"; ?>',
                    data: $scope.acta_de_recepcion
                }).then(function(response) {
                    alert("Se ha guardado la acta de recepcion");
                    $('#modal-recepcion').modal('hide');
                    window.location.reload();
                });
            }  
        }

        $scope.guardarOrderCompra = function() {
            if(!(validar_campos_orden_compra()==false)){
                $http({
                    method: 'POST',
                    url: '<?php echo base_url() . "Reporte/insertOrdenCompra/"; ?>',
                    data: $scope.orden_de_compra
                }).then(function successCallback(response) {
                    console.log(response);

                    $('#modal-orden').modal('hide');
                    window.location.reload();
                }, function errorCallback(response) {
                    console.log(response);
                });
            }
        }



        $scope.guardar = function() {

            if (!(aceptacion_rechazo_validacion() == false)) {

                $http({
                    method: 'POST',
                    url: '<?php echo base_url() . "Reporte/insertAsignacionPresupuestaria/"; ?>',
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

        }

        $scope.existeOrden = function() {
            $http({
                method: 'POST',
                url: '<?php echo base_url() . "Reporte/existOrdenCompra/" . $id; ?>',
            }).then(function successCallback(response) {
                console.log(response);

                if (response.data == "true") {
                    $scope.orden = true;
                } else {
                    $scope.orden = false;
                }
                console.log($scope.orden);
            }, function errorCallback(response) {
                console.log(response);
            });

        }

        $scope.existeOrden();

        $scope.existeAdjudicacion = function() {
            $http({
                method: 'POST',
                url: '<?php echo base_url() . "Reporte/existAdjudicacion/" . $id; ?>',
            }).then(function successCallback(response) {


                if (response.data == "true") {
                    $scope.adjudicacionExist = true;
                } else {
                    $scope.adjudicacionExist = false;
                }
                console.log("adju:" + $scope.adjudicacionExist);
            }, function errorCallback(response) {
                console.log(response);
            });
        }

        $scope.existeAdjudicacion();

        $scope.existActaRecepcion = function() {
            $http({
                method: 'POST',
                url: '<?php echo base_url() . "Reporte/existActaRecepcion/" . $id; ?>',
            }).then(function successCallback(response) {
                console.log(response);

                if (response.data == "true") {
                    $scope.recepcion = true;
                } else {
                    $scope.recepcion = false;
                }
                console.log("acta:" + $scope.recepcion);
            }, function errorCallback(response) {
                console.log(response);
            });
        }

        $scope.existActaRecepcion();



        $scope.proveedores = [];

        function get_proveedores() {
            $http.get("<?php echo base_url(); ?>Proveedor/getProveedores").then(function(response) {
                $scope.proveedores = response.data;

            });
        }

        get_proveedores();

    });
</script>