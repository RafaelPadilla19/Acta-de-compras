<main class="bg-light mb-5" ng-app="app" ng-controller="app-controller">
    <div class="container  pt-4">
        <h2 class="text-capitalize text-center mb-3">Agregar Orden de compra</h2>
        <hr>
        <form>
            <div class="row">
            <div class="mb-3 col-4">
                    <label for="fecha" class="form-label">Fecha de orden</label>
                    <input type="date" class="form-control"  value="09-09-2019" id="fecha" ng-model="solicitud_requerimientos.fecha" required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-4">
                    <label for="nombre_solicitante" class="form-label">Nombre del solicitante</label>
                    <input type="text" class="form-control" id="nombre_solicitante" ng-model="solicitud_requerimientos.nombre_solicitante"
                        placeholder="Ingrese el nombre del solicitante" required>
                </div>
                <div class="mb-3 col-4">
                    <label for="dependencia_solicitante" class="form-label">Dependencia del solicitante</label>
                    <input type="text" class="form-control" id="dependencia_solicitante" ng-model="solicitud_requerimientos.dependencia_solicitante"
                        placeholder="Ingrese la dependencia del solicitante" required>
                </div>
                <div class="mb-3 col-4">
                <label for="cargo_solicitante" class="form-label">Cargo del solicitante</label>
                    <input type="text" class="form-control" id="cargo_solicitante" ng-model="solicitud_requerimientos.cargo_solicitante"
                        placeholder="Ingrese el cargo del solicitante" required>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="mb-3 col-4">
                    <label for="nombre_autorizante" class="form-label">Nombre del autorizante</label>
                    <input type="text" class="form-control" id="nombre_autorizante" ng-model="solicitud_requerimientos.nombre_autorizante"
                        placeholder="Ingrese el nombre del autorizante" required>
                </div>
                <div class="mb-3 col-4">
                    <label for="dependencia_autorizante" class="form-label">Dependencia del autorizante</label>
                    <input type="text" class="form-control" id="dependencia_autorizante" ng-model="solicitud_requerimientos.dependencia_autorizante"
                        placeholder="Ingrese la dependencia del autorizante" required>
                </div>
                <div class="mb-3 col-4">
                <label for="cargo_autorizante" class="form-label">Cargo del autorizante</label>
                    <input type="text" class="form-control" id="cargo_autorizante" ng-model="solicitud_requerimientos.cargo_autorizante"
                        placeholder="Ingrese el cargo del autorizante" required>
                </div>
            </div>
            <hr>
            <div class="row mb-3">
                <div class="mb-3 col-2">
                    <label for="valor_compra" class="form-label">Valor de la compra</label>
                    <input type="text" required class="form-control" id="valor_compra" ng-model="solicitud_requerimientos.valor_compra" placeholder="" disabled>
                </div>
                <div class="mb-3 col-3">
                    <label for="forma_entrega" class="form-label">Forma de entrega</label>
                    <input type="text" class="form-control" id="forma_entrega" ng-model="solicitud_requerimientos.forma_entrega"
                        placeholder="Ingrese la forma de entrega" required>
                </div>
                <div class="mb-3 col-3">
                    <label for="lugar_entrega" class="form-label">Lugar de entrega</label>
                    <input type="text" class="form-control" id="lugar_entrega" ng-model="solicitud_requerimientos.lugar_entrega"
                        placeholder="Ingrese el lugar de entrega" required>
                </div>
                <div class="mb-3 col-4">
                    <label for="destino_de_bien" class="form-label">Destino de bien</label>
                    <input type="text" class="form-control" id="destino_de_bien" ng-model="solicitud_requerimientos.destino_de_bien"
                        placeholder="Ingrese el destino del bien" required>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="mb-3 col-4">
                    <label for="nombre_administrador_contrato" class="form-label">Nombre del administrador del contrato</label>
                    <input type="text" class="form-control" id="nombre_administrador_contrato" ng-model="propuesta_orden_de_compras.nombre_administrador_contrato"
                        placeholder="Ingrese el nombre" required>
                </div>
                <div class="mb-3 col-4">
                    <label for="cargo_administrador_contrato" class="form-label">Cargo del administrador del contrato</label>
                    <input type="text" class="form-control" id="cargo_administrador_contrato" ng-model="propuesta_orden_de_compras.cargo_administrador_contrato"
                        placeholder="Ingrese el cargo" required>
                </div>
                <div class="mb-3 col-4">
                    <label for="dependencia" class="form-label">Dependencia del administrador del contrato</label>
                    <input type="text" class="form-control" id="dependencia" ng-model="propuesta_orden_de_compras.dependencia"
                        placeholder="Ingrese la dependencia" required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-4">
                    <label for="nombre_recibido_por" class="form-label">Nombre quien lo recibe</label>
                    <input type="text" class="form-control" id="nombre_recibido_por" ng-model="propuesta_orden_de_compras.nombre_recibido_por"
                        placeholder="Ingrese el nombre de quien lo recibe" required>
                </div>
                <div class="mb-3 col-4">
                    <label for="cargo_de_recibido" class="form-label">Cargo de quien lo recibe</label>
                    <input type="text" class="form-control" id="cargo_de_recibido" ng-model="propuesta_orden_de_compras.cargo_de_recibido"
                        placeholder="Ingrese el cargo de quien lo recibe" required>
                </div>
                <div class="mb-3 col-4">
                    <label for="fecha" class="form-label">Fecha que recibe UACI</label>
                    <input type="date" class="form-control"  value="09-09-2019" id="fecha" ng-model="propuesta_orden_de_compras.fecha" required>
                </div>
                <div class="row">
                <!---Boton Guardar orden de compre alineado hacia abajo-->
                    <div class="mb-3 col-2 mt-4">
                        <button type="button" class="btn btn-primary" ng-click="guardarOrden()">Guardar</button>
                    </div>
                </div>
            </div>
            <hr>
            <button type="button" data-bs-toggle="modal" data-bs-target="#modal-prod"
                class="btn btn-success mb-3" ng-click="reset()">Agregar Producto</button>



            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Unidad</th>
                            <th>Cifra presupuestada</th>
                            <th>Costo unitario</th>
                            <th>Descripcion</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="p in productos">
                            <td>{{p.nombre_producto}}</td>
                            <td>{{p.cantidad}}</td>
                            <td>{{p.unidad_medida}}</td>
                            <td>{{p.cifra_presupuestada}}</td>
                            <td>{{p.costo_unitario}}</td>
                            <td>{{p.descripcion}}</td>
                            <td>{{p.total}}</td>
                            <td>
                                <button type="button" class="btn btn-danger" ng-click="borrar(p)">
                                    <i class="fas fa-trash-alt"></i>
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
                            <input type="text" class="form-control" id="nombre-producto" ng-model="producto.nombre_producto">
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="message-text" class="col-form-label">Cantidad:</label>
                                <input type="number" class="form-control" id="cantidad-producto" ng-model="producto.cantidad">

                            </div>
                            <div class="mb-3 col-6">
                                <label for="message-text" class="col-form-label">Costo unitario:</label>
                                <input type="number" class="form-control" id="costo-unitario" ng-model="producto.costo_unitario">

                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="recipient-name" class="col-form-label">Unidad de medida:</label>
                                <input type="text" class="form-control" id="unidad-medida" ng-model="producto.unidad_medida">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="recipient-name" class="col-form-label">Cifra presupuestada:</label>
                                <input type="number" class="form-control" id="cifra-presupuestada" ng-model="producto.cifra_presupuestada">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Descripcion:</label>
                            <textarea class="form-control" id="descripcion" ng-model="producto.descripcion"></textarea>
                        </div>

                        <!-- <div class="mb-3">
                            <label for="message-text" class="col-form-label">Total:</label>
                            <input type="number" class="form-control" id="total-producto" ng-model="producto.total" disabled>
                        </div> -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" ng-click="agregarProducto()">Agregar</button>
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
    $scope.propuesta_orden_de_compras = {};

        $scope.test = function(){
            console.log($scope.solicitud_requerimientos);
            console.log($scope.propuesta_orden_de_compras);
            console.log($scope.productos);
        }

    $scope.guardarOrden =  function() {
        $http({
            method: 'POST',
            url: '<?php echo base_url(); ?>Reporte/insertSolicitud',
            data: $scope.solicitud_requerimientos
        }).then(function succes(response) {
            let id= parseInt(response.data);
            //guardar todos lo productos con el id del acta
            // console.log($scope.productos);
            // console.log(id);
            // console.log($scope.productos.length);
            // console.log($scope.productos[0]);
            $scope.propuesta_orden_de_compras.solicitud_id = id;
            $http({
                method: 'POST',
                url: '<?php echo base_url(); ?>Reporte/insertPropuesta',
                data: $scope.propuesta_orden_de_compras
            }).then(function succes(response){
                console.log(response.data);
            });
            for (let i = 0; i < $scope.productos.length; i++) {
                $scope.productos[i].solicitud_id = id;
                 $http({
                    method: 'POST',
                    url: '<?php echo base_url(); ?>Reporte/insertProducto',
                    data: $scope.productos[i]
                }).then(function succes(response) {
                    console.log(response.data);
                    if(i==parseInt($scope.productos.length)-1){
                        window.location.href = "<?php echo base_url(); ?>Reporte/acta/"+id;
                    }
                });
            }
            
            //$scope.acta_reporte = {};
            //abrir otra vista
            
        })
    }

    $scope.agregarProducto= function(){
        //total = cantidad * costo dos decimales
        
        $scope.producto.total = ($scope.producto.cantidad * $scope.producto.costo_unitario).toFixed(2);
       

        $scope.productos= [...$scope.productos, angular.copy($scope.producto)];
        console.log($scope.productos);

        //sumar a monto total
        
        $scope.solicitud_requerimientos.valor_compra = $scope.productos.reduce((total, producto) => total + parseFloat(producto.total), 0).toFixed(2);
        //cerrar modal
        
        $('#modal-prod').modal('hide');
    }

    //borrar producto
    $scope.borrar = function(producto) {
        $scope.productos = $scope.productos.filter(function(p) {
            return p !== producto;
        });
        $scope.solicitud_requerimientos.valor_compra = $scope.productos.reduce((total, producto) => total + parseFloat(producto.total), 0).toFixed(2);

    }

    $scope.reset = function() {
        $scope.producto = {};
    }
    });


</script>