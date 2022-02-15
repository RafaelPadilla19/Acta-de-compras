<main class="bg-light mb-5" ng-app="app" ng-controller="app-controller">
    <div class="container  pt-4">
        <h2 class="text-capitalize text-center mb-3">Orden de compra</h2>
        <hr>
        <form>
            <div class="row">

                <div class="mb-3 col-6">
                    <label for="message-text" class="col-form-label">Lugar:</label>
                    <input type="text" class="form-control" id="lugar" ng-model="orden_de_compra.lugar">

                </div>
                <div class="col-6">
                    <div>
                        <label class="mb-2" for="fecha_orden">Fecha:</label>
                        <input type="date" class="form-control" id="fecha_orden"
                            ng-model="orden_de_compra.fecha_orden" required>
                    </div>
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
                    <label for="fecha_de_entrega" class="form-label">Fecha de entrega(Opcional)</label>
                    <input type="date" class="form-control" id="fecha_de_entrega"
                        ng-model="orden_de_compra.fecha_de_entrega" required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-6">
                    <label for="recipient-name" class="col-form-label">Nombre completo de jefe de
                        UACI:</label>
                    <input type="text" class="form-control" id="nombre_completo_jefe_uaci"
                        ng-model="orden_de_compra.nombre_completo_jefe_uaci">
                </div>
                <div class="mb-3 col-6">
                    <label for="recipient-name" class="col-form-label">Total:</label>
                    <input type="text" class="form-control" id="total" ng-model="orden_de_compra.total" readonly>
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-6">
                    <label for="recipient-name" class="col-form-label">Telefono de Alcaldia:</label>
                    <input type="text" class="form-control" id="telefono_alcaldia"
                        ng-model="orden_de_compra.telefono_alcaldia">
                </div>
                <div class="mb-3 col-6">
                    <label for="recipient-name" class="col-form-label">Correo de Alcaldia:</label>
                    <input type="text" class="form-control" id="correo_alcaldia"
                        ng-model="orden_de_compra.correo_alcaldia">
                </div>
            </div>
        </form>
        <div class="modal-footer">
            <a href = "<?php echo base_url() . "Reporte/documentacionCompra/". $id; ?>" class="btn btn-secondary">Cancelar</a>
            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button> -->
            <button type="button" class="btn btn-primary" ng-click="guardarOrderCompra()">Guardar</button>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Unidad</th>

                        <th>Costo unitario</th>

                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="p in productos track by $index">

                        <td>{{p.nombre_producto}}</td>
                        <td>{{p.cantidad}}</td>
                        <td>{{p.unidad_medida}}</td>

                        <td>{{p.costo_unitario}}</td>

                        <td>{{p.total}}</td>
                        <td>
                            <button type="button" class="btn btn-primary" ng-click="editar(p)">
                                <i class="fa fa-edit icon-size"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        </form>
    </div>

    <!--modal productos-->

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
                                ng-model="producto.nombre_producto" readonly>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="message-text" class="col-form-label">Cantidad:</label>
                                <input type="number" class="form-control" id="cantidad-producto"
                                    ng-model="producto.cantidad" readonly>

                            </div>
                            <div class="mb-3 col-6">
                                <label for="message-text" class="col-form-label">Costo unitario:</label>
                                <input type="number" class="form-control" id="costo-unitario"
                                    ng-model="producto.costo_unitario">

                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="recipient-name" class="col-form-label">Unidad de medida:</label>
                                <input type="text" class="form-control" id="unidad-medida"
                                    ng-model="producto.unidad_medida" readonly>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="recipient-name" class="col-form-label">Total:</label>
                                <input type="text" class="form-control" id="total" ng-model="producto.total" readonly>
                            </div>

                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" ng-click="modificarProducto()">Actualizar</button>
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
    $scope.orden_de_compra.solicitud_id=<?php echo $id; ?>;

    function validarCampoCostoUnitario(){
        if($scope.producto.costo_unitario == "" || $scope.producto.costo_unitario == null){
            alert("El campo costo unitario no puede estar vacio ni tener un cero como valor");
            return false;
        }
    }

    (function() {
        $http.get("<?php echo base_url(); ?>Proveedor/getProveedores").then(function(response) {
            $scope.proveedores = response.data;

        });
    })();

    (function () {
        $http({
            method: 'GET',
            url: '<?php echo base_url()."Reporte/getProductosPorIdActa/".$id; ?>'
        }).then(function(response) {
            $scope.productos = response.data;
        });

    })();

    (function (){
        $http({
            method: 'GET',
            url: '<?php echo base_url()."Reporte/getOrdenCompra/".$id; ?>'
        }).then(function(response) {
            $scope.orden_de_compra = response.data;
            $scope.orden_de_compra.fecha_orden= $scope.orden_de_compra.fecha_orden.split("-");
            $scope.orden_de_compra.fecha_orden= new Date($scope.orden_de_compra.fecha_orden[0], $scope.orden_de_compra.fecha_orden[1]-1, $scope.orden_de_compra.fecha_orden[2]);
            $scope.orden_de_compra.fecha_de_entrega= $scope.orden_de_compra.fecha_de_entrega.split("-");
            $scope.orden_de_compra.fecha_de_entrega= new Date($scope.orden_de_compra.fecha_de_entrega[0], $scope.orden_de_compra.fecha_de_entrega[1]-1, $scope.orden_de_compra.fecha_de_entrega[2]);
            //$scope.orden_de_compra.fecha_orden = new Date($scope.orden_de_compra.fecha_orden);
            //$scope.orden_de_compra.fecha_de_entrega = new Date($scope.orden_de_compra.fecha_de_entrega);
        });
    })();
    


    const validar_campos_orden_compra = () => {
        if ($scope.orden_de_compra.lugar == null ||
            $scope.orden_de_compra.fecha_orden == null ||
            $scope.orden_de_compra.proveedor_id == null ||
            $scope.orden_de_compra.tipo_documento == null ||
            //$scope.orden_de_compra.observaciones == null ||
            //$scope.orden_de_compra.fecha_de_entrega==null ||
            $scope.orden_de_compra.nombre_completo_jefe_uaci == null ||
            $scope.orden_de_compra.telefono_alcaldia == null ||
            $scope.orden_de_compra.correo_alcaldia == null) {
            alert("Llene todos los campos");
            return false;
        }
    }

    $scope.guardarOrderCompra = function() {
        if (!(validar_campos_orden_compra() == false)) {
            $http({
                method: 'POST',
                url: '<?php echo base_url() . "Reporte/actualizarOrdenCompra/"; ?>',
                data: $scope.orden_de_compra
            }).then(function successCallback(response) {
                console.log('ex');
                
            }, function errorCallback(response) {
                console.log(response);
            });

            //update productos
            for (let i = 0; i < $scope.productos.length; i++) {
                $scope.productos[i].solicitud_id=<?php echo $id; ?>;
                $http({
                    method: 'POST',
                    url: '<?php echo base_url() . "Reporte/updateProducto/"; ?>',
                    data: $scope.productos[i]
                }).then(function successCallback(response) {
                    console.log(response);
                    if (i == $scope.productos.length - 1) {
                        $('#modal-orden').modal('hide');
                        //enviar a solicitud Reporte/documentacionCompra/id
                        window.location.href = "<?php echo base_url() . "Reporte/documentacionCompra/"; ?>" + $scope.orden_de_compra.solicitud_id;
                    }
                }, function errorCallback(response) {
                    console.log(response);
                });
            }
        }
    }


    $scope.modificarProducto= function () {

        $scope.producto.total = ($scope.producto.cantidad * $scope.producto.costo_unitario).toFixed(2);

        console.log($scope.productos);

        //actualizar a monto total

        $scope.orden_de_compra.total= $scope.productos.reduce((total, producto) => {
            return total + parseFloat(producto.total);
        }, 0);


        if(validarCampoCostoUnitario()==false){
            return;
        }
        //cerrar modal


        $('#modal-prod').modal('hide');
    }

   

    $scope.editar = function(producto) {
        let cantidadFloat = parseFloat(producto.cantidad);
        let costo_unitarioFloat = parseFloat(producto.costo_unitario);
        

        $scope.producto = producto;
        $scope.producto.cantidad = cantidadFloat;
        $scope.producto.costo_unitario = costo_unitarioFloat;
        


        console.log($scope.producto);
        $('#modal-prod').modal('show');
    }

    let actualizarTotalAlCambiarCostoUnitario = document.getElementById("costo-unitario");
    actualizarTotalAlCambiarCostoUnitario.addEventListener("keyup", function() {
        let cantidadFloat = parseFloat($scope.producto.cantidad);
        let costo_unitarioFloat = parseFloat($scope.producto.costo_unitario);
        $scope.producto.total = (cantidadFloat * costo_unitarioFloat).toFixed(2);
        $scope.$apply();
    });

    
    $scope.reset = function() {
        $scope.producto = {};
    }
});
</script>