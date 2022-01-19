<?php
$year_actual = new DateTime();
$year_actual = $year_actual->format('Y');

?>
<main class="bg-light mb-5" ng-app="app" ng-controller="app-controller">
    <div class="container  pt-4">
        <h2 class="text-capitalize text-center mb-3">Actualizar Datos de Orden de compra</h2>
        <hr>
        <form>
            <div class="row">
                <div class="mb-3 col-4">
                    <label for="fecha" class="form-label">Fecha de solicitud</label>
                    <input type="date" class="form-control" id="fecha" ng-model="solicitud_requerimientos.fecha"
                        required>
                </div>
                <div class="mb-3 col-4">
                    <label for="" class="form-label">AMSJ<?php echo $year_actual ?></label>
                    <input type="text" class="form-control" ng-model="solicitud_requerimientos.amsj" required>
                </div>
                <div class="mb-3 col-4">
                    <label for="" class="form-label">Departamento del solicitante</label>
                    <input type="text" class="form-control" ng-model="solicitud_requerimientos.departamento_solicitante"
                        required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-4">
                    <label for="nombre_solicitante" class="form-label">Nombre del solicitante</label>
                    <input type="text" class="form-control" id="nombre_solicitante"
                        ng-model="solicitud_requerimientos.nombre_solicitante"
                        placeholder="Ingrese el nombre del solicitante" required>
                </div>
                <div class="mb-3 col-4">
                    <label for="dependencia_solicitante" class="form-label">Dependencia del solicitante</label>
                    <input type="text" class="form-control" id="dependencia_solicitante"
                        ng-model="solicitud_requerimientos.dependencia_solicitante"
                        placeholder="Ingrese la dependencia del solicitante" required>
                </div>
                <div class="mb-3 col-4">
                    <label for="cargo_solicitante" class="form-label">Cargo del solicitante</label>
                    <input type="text" class="form-control" id="cargo_solicitante"
                        ng-model="solicitud_requerimientos.cargo_solicitante"
                        placeholder="Ingrese el cargo del solicitante" required>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="mb-3 col-4">
                    <label for="nombre_autorizante" class="form-label">Nombre del autorizante</label>
                    <input type="text" class="form-control" id="nombre_autorizante"
                        ng-model="solicitud_requerimientos.nombre_autorizante"
                        placeholder="Ingrese el nombre del autorizante" readonly>
                </div>
                <div class="mb-3 col-4">
                    <label for="dependencia_autorizante" class="form-label">Dependencia del autorizante</label>
                    <input type="text" class="form-control" id="dependencia_autorizante"
                        ng-model="solicitud_requerimientos.dependencia_autorizante"
                        placeholder="Ingrese la dependencia del autorizante" readonly>
                </div>
                <div class="mb-3 col-4">
                    <label for="cargo_autorizante" class="form-label">Cargo del autorizante</label>
                    <input type="text" class="form-control" id="cargo_autorizante"
                        ng-model="solicitud_requerimientos.cargo_autorizante"
                        placeholder="Ingrese el cargo del autorizante" readonly>
                </div>
            </div>
            <hr>
            <div class="row mb-3">
                <div class="mb-3 col-2">
                    <label for="valor_compra" class="form-label">Valor de la compra</label>
                    <input type="text" required class="form-control" id="valor_compra"
                        ng-model="solicitud_requerimientos.valor_compra" readonly>
                </div>
                <div class="mb-3 col-3">
                    <label for="forma_entrega" class="form-label">Forma de entrega</label>
                    <input type="text" class="form-control" id="forma_entrega"
                        ng-model="solicitud_requerimientos.forma_entrega" placeholder="Opcional" required>
                </div>
                <div class="mb-3 col-3">
                    <label for="lugar_entrega" class="form-label">Lugar de entrega</label>
                    <input type="text" class="form-control" id="lugar_entrega"
                        ng-model="solicitud_requerimientos.lugar_entrega" placeholder="Ingrese el lugar de entrega"
                        readonly>
                </div>
                <div class="mb-3 col-4">
                    <label for="destino_de_bien" class="form-label">Destino de bien</label>
                    <input type="text" class="form-control" id="destino_de_bien"
                        ng-model="solicitud_requerimientos.destino_de_bien" placeholder="Ingrese el destino del bien"
                        required>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="mb-3 col-4">
                    <label for="nombre_administrador_contrato" class="form-label">Nombre del administrador del
                        contrato</label>
                    <input type="text" class="form-control" id="nombre_administrador_contrato"
                        ng-model="propuesta_orden_de_compras.nombre_administrador_contrato"
                        placeholder="Ingrese el nombre" required>
                </div>
                <div class="mb-3 col-4">
                    <label for="cargo_administrador_contrato" class="form-label">Cargo del administrador del
                        contrato</label>
                    <input type="text" class="form-control" id="cargo_administrador_contrato"
                        ng-model="propuesta_orden_de_compras.cargo_administrador_contrato"
                        placeholder="Ingrese el cargo" required>
                </div>
                <div class="mb-3 col-4">
                    <label for="dependencia" class="form-label">Dependencia del administrador del contrato</label>
                    <input type="text" class="form-control" id="dependencia"
                        ng-model="propuesta_orden_de_compras.dependencia" placeholder="Ingrese la dependencia" required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-4">
                    <label for="nombre_recibido_por" class="form-label">Recibido en UACI Por:</label>
                    <input type="text" class="form-control" id="nombre_recibido_por"
                        ng-model="propuesta_orden_de_compras.nombre_recibido_por"
                        placeholder="Ingrese el nombre de quien lo recibe" readonly>
                </div>
                <div class="mb-3 col-4">
                    <label for="cargo_de_recibido" class="form-label">Cargo de quien lo recibe:</label>
                    <input type="text" class="form-control" id="cargo_de_recibido"
                        ng-model="propuesta_orden_de_compras.cargo_de_recibido"
                        placeholder="Ingrese el cargo de quien lo recibe" readonly>
                </div>
                <div class="mb-3 col-4">
                    <label for="cargo_de_recibido" class="form-label">Fecha que recibe (Opcional):</label>
                    <input type="date" class="form-control" id="fecha_recibido"
                        ng-model="propuesta_orden_de_compras.fecha_recibido">
                </div>
            </div>
            <hr>

            <hr>
            <!--Asiganacion-->

            <div class="mb-3 row">
                <div class="col-6">
                    <label for="recipient-name" class="col-form-label">Proyecto o programa:</label>
                    <input type="text" class="form-control" id="proyecto" ng-model="asignacion_presupuestaria.proyecto">
                </div>
                <div class="mb-3 col-6">
                    <label for="message-text" class="col-form-label">Aprobado por solicitud de
                        modificación presupuestaria N°:</label>
                    <input type="text" class="form-control" id="numero_solicitud_modificacion"
                        ng-model="asignacion_presupuestaria.numero_solicitud_modificacion" placeholder="Opcional">
                </div>
            </div>
       
            <div class="row">

                <div class="mb-3 col-6">
                    <label for="recipient-name" class="col-form-label">Recibo en presupuesto
                        por:</label>
                    <input type="text" class="form-control" id="recibo_en_presupuesto_por"
                        ng-model="asignacion_presupuestaria.recibo_en_presupuesto_por">
                </div>
                <div class="mb-3 col-6">
                    <label for="message-text" class="col-form-label">Cargo:</label>
                    <input type="text" class="form-control" id="cargo" ng-model="asignacion_presupuestaria.cargo">
                </div>
            </div>
        
            <div class="row">
            <div class="mb-3 col-4">
                    <label for="message-text" class="col-form-label">Fuente de financiamiento:</label>
                    <input type="text" class="form-control" id="fuente_de_financiamiento"
                        ng-model="asignacion_presupuestaria.fuente_de_financiamiento" placeholder="Opcional">
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="mb-2" for="inputState">Estado</label><br>
                        <select id="inputState" class="form-select" name="estado"
                            ng-model="asignacion_presupuestaria.estado">
                            <option value="aprobado">Aprobado</option>
                            <option value="rechazado">Rechazado</option>
                        </select>
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <label class="mb-2" for="fechaJus">Fecha de asignacion(Opcional):</label>
                        <input type="date" class="form-control" id="fechaJus"
                            ng-model="asignacion_presupuestaria.fecha">
                    </div>
                </div>
            </div>
            <div class="row">
                <!---Boton Guardar orden de compre alineado hacia abajo-->
                <div class="mb-3 col-2 mt-4">
                    <button type="button" class="btn btn-primary" ng-click="guardarOrden()">Guardar</button>
                </div>
            </div>
            <hr>



            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Unidad</th>




                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="p in productos">
                            <td>{{p.nombre_producto}}</td>
                            <td>{{p.cantidad}}</td>
                            <td>{{p.unidad_medida}}</td>


                            <td>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#modal-prod"
                                    class="btn btn-primary" ng-click="editar(p)">
                                    <i class="fas fa-refresh"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </form>
    </div>

    <!--modal-->

    <div class="modal fade" id="modal-prod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nombre Producto:</label>
                            <input type="text" class="form-control" id="nombre-producto"
                                ng-model="producto.nombre_producto">
                        </div>

                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="message-text" class="col-form-label">Cantidad:</label>
                                <input type="number" class="form-control" id="cantidad-producto"
                                    ng-model="producto.cantidad">

                            </div>
                            <div class="mb-3 col-6">
                                <label for="recipient-name" class="col-form-label">Unidad de medida:</label>
                                <input type="text" class="form-control" id="unidad-medida"
                                    ng-model="producto.unidad_medida">
                            </div>

                        </div>


                        <!-- <div class="mb-3">
                            <label for="message-text" class="col-form-label">Total:</label>
                            <input type="number" class="form-control" id="total-producto" ng-model="producto.total" disabled>
                        </div> -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" ng-click="actualizarProducto()">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
angular.module("app", []).controller("app-controller", function($scope, $http, $compile) {

    $scope.productos = [];
    $scope.producto = {};
    $scope.solicitud_requerimientos = {};
    $scope.solicitud_requerimientos.solicitud_id = <?php echo $id; ?>;



    $scope.asignacion_presupuestaria = {};
 
    $scope.asignacion_presupuestaria.solicitud_id = <?php echo $id; ?>;


    $scope.propuesta_orden_de_compras = {};
    $scope.propuesta_orden_de_compras.solicitud_id = <?php echo $id; ?>;
    $scope.propuesta_orden_de_compras.nombre_recibido_por = "Lcda. Lorena Beatriz Romero de Aviles";
    $scope.propuesta_orden_de_compras.cargo_de_recibido = "Jefe de UACI";


    $scope.solicitud_requerimientos.nombre_autorizante = "Lcdo. Juan Carlos Cárcamo Quijano";
    $scope.solicitud_requerimientos.cargo_autorizante = "Secretario Municipal";
    $scope.solicitud_requerimientos.dependencia_autorizante = "Concejo Municipal";
    //Lugar de entrega alcaldia municipal de san julian
    $scope.solicitud_requerimientos.lugar_entrega = "Alcaldia Municipal de San Julian";


    $scope.test = function() {
        console.log($scope.solicitud_requerimientos);
        console.log($scope.propuesta_orden_de_compras);
        console.log($scope.productos);
    }

    const validarCamposVacios = () => {
        if ($scope.solicitud_requerimientos.fecha == null ||
            $scope.solicitud_requerimientos.amsj == null ||
            $scope.solicitud_requerimientos.departamento_solicitante == null ||
            $scope.solicitud_requerimientos.nombre_solicitante == null ||
            $scope.solicitud_requerimientos.dependencia_solicitante == null ||
            $scope.solicitud_requerimientos.cargo_solicitante == null ||
            $scope.solicitud_requerimientos.nombre_autorizante == null ||
            $scope.solicitud_requerimientos.dependencia_autorizante == null ||
            $scope.solicitud_requerimientos.cargo_autorizante == null ||
            //$scope.solicitud_requerimientos.valor_compra == null ||
            //$scope.solicitud_requerimientos.forma_entrega == null || 
            $scope.solicitud_requerimientos.lugar_entrega == null ||
            $scope.solicitud_requerimientos.destino_de_bien == null ||
            $scope.propuesta_orden_de_compras.nombre_administrador_contrato == null ||
            $scope.propuesta_orden_de_compras.cargo_administrador_contrato == null ||
            $scope.propuesta_orden_de_compras.dependencia == null ||
            $scope.propuesta_orden_de_compras.nombre_recibido_por == null ||
            $scope.propuesta_orden_de_compras.cargo_de_recibido == null) {

            alert("Por favor llene todos los campos");
            console.log($scope.solicitud_requerimientos);
            console.log($scope.propuesta_orden_de_compras);


            return false;

        }
    }

    (function() {
        $http({
            method: 'GET',
            url: '<?php echo base_url().'/Reporte/getSolicitudRequerimientoPorId/'.$id; ?>'
        }).then(function successCallback(response) {
            $scope.solicitud_requerimientos = response.data;
            $scope.solicitud_requerimientos.fecha = new Date($scope.solicitud_requerimientos.fecha);
            console.log(response.data);
        }, function errorCallback(response) {
            console.log(response);
        })
    })();



    (function() {
        $http({
            method: 'GET',
            url: '<?php echo base_url().'/Reporte/getPropuestaOrdenCompra/'.$id; ?>'
        }).then(function successCallback(response) {
            $scope.propuesta_orden_de_compras = response.data;
            console.log(response.data);
        }, function errorCallback(response) {
            console.log(response);
        })
    })();

    (function(){
        $http({
            method: 'GET',
            url: '<?php echo base_url().'/Reporte/getAsignacionPresupuestaria/'.$id; ?>'
        }).then(function successCallback(response) {
            $scope.asignacion_presupuestaria = response.data;
            if($scope.asignacion_presupuestaria.fecha_asignacion != ""){
                $scope.asignacion_presupuestaria.fecha = new Date($scope.asignacion_presupuestaria.fecha);
            }

            console.log(response.data);
        }, function errorCallback(response) {
            console.log(response);
        })
    })();
    

    (function() {
        $http({
            method: 'GET',
            url: '<?php echo base_url().'/Reporte/getProductosPorIdActa/'.$id; ?>'
        }).then(function successCallback(response) {
            $scope.productos = response.data;
            console.log(response.data);
        }, function errorCallback(response) {
            console.log(response);
        })
    })();





    $scope.guardarOrden = function() {

        if (validarCamposVacios() == false) {
            console.log("no se puede guardar");
        } else {

            $http({
                method: 'POST',
                url: '<?php echo base_url(); ?>Reporte/actualizareSolicitud',
                data: $scope.solicitud_requerimientos
            }).then(function succes(response) {
                let id = parseInt(response.data);


                $http({
                    method: 'POST',
                    url: '<?php echo base_url(); ?>Reporte/actualizarPropuesta',
                    data: $scope.propuesta_orden_de_compras
                }).then(function succes(response) {
                    console.log(response.data);
                });

                $http({
                    method: 'POST',
                    url: '<?php echo base_url(); ?>Reporte/actualizarAsigancionPresupuestaria',
                    data: $scope.asignacion_presupuestaria
                }).then(function succes(response) {
                    console.log(response.data);
                });

                for (let i = 0; i < $scope.productos.length; i++) {
                    //$scope.productos[i].solicitud_id = id;
                    $http({
                        method: 'POST',
                        url: '<?php echo base_url(); ?>Reporte/updateProducto',
                        data: $scope.productos[i]
                    }).then(function succes(response) {
                        console.log(response.data);
                        if (i == parseInt($scope.productos.length) - 1) {
                            window.location.href =
                                "<?php echo base_url(); ?>Reporte/documentacionCompra/" +
                                <?php echo $id?>;
                        }
                    });
                }

                //$scope.acta_reporte = {};
                //abrir otra vista

            })
        }


    }

    $scope.actualizarProducto = function() {

        $scope.productos = $scope.productos.filter((producto) => {
            return producto.producto_id != $scope.producto.producto_id;
        });

        $scope.productos = [...$scope.productos, angular.copy($scope.producto)];
        console.log($scope.productos);

        $('#modal-prod').modal('hide');
    }


    $scope.editar = function(producto) {


        $scope.producto = producto;
        $scope.producto.cantidad = parseInt($scope.producto.cantidad);
        console.log($scope.producto);
        $('#modal-prod').modal('show');
    }

    $scope.reset = function() {
        $scope.producto = {};
    }
});
</script>