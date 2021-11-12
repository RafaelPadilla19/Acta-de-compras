<main class="bg-light mb-5" ng-app="app" ng-controller="app-controller">
    <div class="container  pt-4">
        <h2 class="text-capitalize text-center mb-3">Agregar Orden de compra</h2>
        <hr>
        <form>
            <div class="row">
                <div class="mb-3 col-4">
                    <label for="nombre_proyecto" class="form-label">Nombre del proyecto</label>
                    <input type="text" class="form-control" id="nombre_proyecto" ng-model="acta_reporte.nombre_proyecto"
                        placeholder="Ejemplo: Donacion de laminas" required>
                </div>
                <div class="mb-3 col-4">
                    <label for="proveedor" class="form-label">Proveedor</label>
                    <select name="proveedor" ng-model="acta_reporte.proveedorid" id="proveedor" class="form-select">
                        <option value="">Seleccione un proveedor</option>
                        <option ng-repeat="proveedor in proveedores" value="{{proveedor.proveedorid}}">{{proveedor.nombre}}</option>
                    </select>
                </div>
                <div class="mb-3 col-4">
                    <label for="fecha" class="form-label">Fecha del acta</label>
                    <input type="date" class="form-control"  value="09-09-2019" id="fecha" ng-model="acta_reporte.fecha" required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-4">
                    <label for="n_documento_fiscal" class="form-label">Numero de identificacion fiscal</label>
                    <input type="text" class="form-control" ng-model="acta_reporte.n_documento_fiscal" id="n_documento_fiscal" placeholder="" required>
                </div>
                <div class="mb-3 col-4">
                    <label for="proveedor" class="form-label">Tipo de documento fiscal</label>
                    <select name="tipo_documento_fiscal" id="tipo_documento_fiscal" class="form-select" ng-model="acta_reporte.tipo_documento_fiscal">
                        <option value="Credito Fiscal">Credito fiscal</option>
                        <option value="Factura">Factura</option>
                    </select>
                </div>
                <div class="mb-3 col-4">
                    <label for="ubicacion" class="form-label">Ubicacion</label>
                    <input type="text" class="form-control" id="ubicacion" ng-model="acta_reporte.ubicacion"
                        placeholder="Ejemplo: Sonsonate,San Julian, Colonia ...." required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-12">
                    <label for="descripcion" class="form-label">Descripcion</label>
                    <textarea name="descripcion" id="descripcion" class="form-control" ng-model="acta_reporte.descripcion" required></textarea>
                </div>

                <div class="mb-3 col-4">
                    <label for="administrador" class="form-label">Administrador de Orden de Compra</label>
                    <input type="text" class="form-control" id="administrador" ng-model="acta_reporte.nombre_admin_alcaldia" placeholder="">
                </div>

                <div class="mb-3 col-4">
                    <label for="provendiente" class="form-label">Persona Reprecentante de la empresa</label>
                    <input type="text" class="form-control" placeholder="Nombre del reprecentante" id="proveniente" ng-model="acta_reporte.nombre_representante_proveedor"
                        required>
                </div>


                <div class="mb-3 col-2">
                    <label for="monto_total" class="form-label">Monto total</label>
                    <input type="text" required class="form-control" id="monto_total" ng-model="acta_reporte.monto_total" placeholder="" disabled>
                </div>
                <!---Boton Guardar orden de compre alineado hacia abajo-->
                <div class="mb-3 col-2 mt-4">
                    <button type="button" class="btn btn-primary" ng-click="guardarOrden()">Guardar</button>
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
                            <th>Precio</th>
                            <th>Descripcion</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="p in productos">
                            <td>{{p.nombre_producto}}</td>
                            <td>{{p.cantidad}}</td>
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
    $scope.acta_reporte = {};
    $scope.proveedores = {};

    function get_proveedores() {
        $http.get("<?php echo base_url(); ?>Proveedor/getProveedores").then(function(response) {
            $scope.proveedores = response.data;
          //  console.log($scope.proveedores)
            
        });
    }

    get_proveedores()

    $scope.guardarOrden =  function() {
         console.log($scope.acta_reporte);
        $http({
            method: 'POST',
            url: '<?php echo base_url(); ?>Reporte/guardar',
            data: $scope.acta_reporte
        }).then(function succes(response) {
            let id= parseInt(response.data);
            //guardar todos lo productos con el id del acta
            // console.log($scope.productos);
            // console.log(id);
            // console.log($scope.productos.length);
            // console.log($scope.productos[0]);

            for (let i = 0; i < $scope.productos.length; i++) {
                $scope.productos[i].id_acta = id;
                 $http({
                    method: 'POST',
                    url: '<?php echo base_url(); ?>Reporte/guardarProducto',
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
        
        $scope.acta_reporte.monto_total = $scope.productos.reduce((total, producto) => total + parseFloat(producto.total), 0).toFixed(2);
        //cerrar modal
        
        $('#modal-prod').modal('hide');
    }

    //borrar producto
    $scope.borrar = function(producto) {
        $scope.productos = $scope.productos.filter(function(p) {
            return p !== producto;
        });
        $scope.acta_reporte.monto_total = $scope.productos.reduce((total, producto) => total + parseFloat(producto.total), 0).toFixed(2);

    }

    $scope.reset = function() {
        $scope.producto = {};
    }


    });


</script>