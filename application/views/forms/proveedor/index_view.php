<main class="bg-light" ng-app="app" ng-controller="app-controller">
    <div class="container  pt-4">
        <h2 class="text-capitalize text-center mb-5"><?php echo $title;?></h2>
        <!--Agregar Acta-->

        <button data-bs-toggle="modal" data-bs-target="#modal-save"
            class="btn btn-success mb-3 text-white" ng-click="nuevo()">Nuevo</button>

        <!--buscar-->
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="form-group">
                    <input type="text" ng-model="buscar" class="form-control" placeholder="Buscar...">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre </th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="p in proveedores | filter:buscar | limitTo:10">
                            <td>{{p.proveedorid}}</td>
                            <td>{{p.nombre}}</td>
                            <td>{{p.direccion}}</td>
                            <td>{{p.telefono}}</td>
                            <td>{{p.correo}}</td>
                            <td>
                                <button data-bs-toggle="modal" data-bs-target="#modal-save" class="btn btn-primary" ng-click="llenarModal(p)">Editar</button>
                                <!-- <a href="" class="btn btn-danger">Eliminar</a> -->
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

        <div class="modal fade" id="modal-save" aria-hidden="true"   tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content p-4">
                    <div class="modal-header">
                        <h5 class="text-center" id="exampleModalLabel">Proveedor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nombre:</label>
                            <input type="text" ng-model="proveedor.nombre" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Direccion:</label>
                            <input type="text" ng-model="proveedor.direccion" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Telefono:</label>
                            <input type="text" ng-model="proveedor.telefono" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Correo:</label>
                            <input type="text" ng-model="proveedor.correo" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-primary" ng-click="save()">Guardar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>

                </div>
            </div>
        </div>
</main>





<script>
angular.module("app", []).controller("app-controller", function($scope, $http, $compile) {
    $scope.proveedores = [];
    $scope.proveedor = {};
    function get_proveedores() {
        $http.get("<?php echo base_url(); ?>Proveedor/getProveedores").then(function(response) {
            $scope.proveedores = response.data;
            
        });
    }

    get_proveedores();

    //nuevo proveedor
    $scope.nuevo = function() {
        $scope.proveedor = {};
    }

    $scope.llenarModal = function(obj) {
        //evitar el cambio automatico
        $scope.proveedor = angular.copy(obj);
}

    $scope.save = function() {
        
       if($scope.proveedor.proveedorid){
            $http({
                method: 'POST',
                url: '<?php echo base_url(); ?>Proveedor/actualizar',
                data: $scope.proveedor,
            }).then(function(response) {
                alert('llego');
                $('#modal-save').modal('hide');
            });
         }else{
            $http({
                method: 'POST',
                url: '<?php echo base_url(); ?>Proveedor/guardar',
                data: $scope.proveedor,
            }).then(function(response) {
                $('#modal-save').modal('hide');
                console.log('guardar')
                
            });
         }

         //reload
         location.reload();
         
    }


});
</script>
