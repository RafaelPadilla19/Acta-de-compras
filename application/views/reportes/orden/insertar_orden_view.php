<main class="bg-light mb-5" ng-app="app" ng-controller="app-controller">
    <div class="container  pt-4">
        <h2 class="text-capitalize text-center mb-3">Orden de compra</h2>
        <hr>
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
                            <option value="">Seleccione un tipo de documento</option>
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
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" ng-click="guardarOrderCompra()">Agregar</button>
        </div>
        <hr>
            <button type="button" data-bs-toggle="modal" data-bs-target="#modal-prod" class="btn btn-success mb-3" ng-click="reset()">Agregar Producto</button>

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
                                    <button type="button" id="btnEditar" class="btn btn-primary" ng-click="borrar(p)" name="btnEditar">
                                        <i class="fa fa-edit icon-size"></i>
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
    </div>
</main>

<script>
    angular.module("app", []).controller("app-controller", function($scope, $http, $compile) {
        $scope.proveedores = [];
        $scope.productos = [];
        $scope.producto = {};
        $scope.orden_de_compra = {};
        $scope.orden_de_compra.lugar = "Alcaldia Municipal de San Julian Cacaluta";
        $scope.orden_de_compra.correo_alcaldia = "sanjulian.uaci2021@gmail.com"
        $scope.orden_de_compra.telefono_alcaldia = "2461-2904";
        $scope.orden_de_compra.nombre_completo_jefe_uaci = "Lorena Beatriz Romero de Aviles";

        function get_proveedores() {
            $http.get("<?php echo base_url(); ?>Proveedor/getProveedores").then(function(response) {
                $scope.proveedores = response.data;

            });
        }

        get_proveedores();

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
        $scope.agregarProducto = function() {
            //total = cantidad * costo dos decimales

            $scope.producto.total = ($scope.producto.cantidad * $scope.producto.costo_unitario).toFixed(2);


            $scope.productos = [...$scope.productos, angular.copy($scope.producto)];
            console.log($scope.productos);

            //sumar a monto total

            $scope.solicitud_requerimientos.valor_compra = $scope.productos.reduce((total, producto) => total +
                parseFloat(producto.total), 0).toFixed(2);
            //cerrar modal

            $('#modal-prod').modal('hide');
        }

        //borrar producto
        // $scope.borrar = function(producto) {
        //     $scope.productos = $scope.productos.filter(function(p) {
        //         return p !== producto;
        //     });
        //     $scope.solicitud_requerimientos.valor_compra = $scope.productos.reduce((total, producto) => total +
        //         parseFloat(producto.total), 0).toFixed(2);

        // }

        $scope.reset = function() {
            $scope.producto = {};
        }
    });
    $(document).on('click', '.btnEditar', function() {
    
    });
   
</script>