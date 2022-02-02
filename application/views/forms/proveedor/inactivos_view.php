<main class="container  pt-4" ng-app="app" ng-controller="app-controller">
    <h1 class="m-2 text-capilaze text-muted text-center">
        <?php echo $titulo;?>
    </h1>
    <a href="<?php echo base_url(); ?>/Proveedor/" id="btnNuevo" class="btn btn-success mb-2">Nuevos</a>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
        <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre </th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>NCR O DUI</th>
                    <th>NIT</th>
                    <th style="display:none;">Estado</th>
                    <th>Restaurar</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="p in proveedores | filter: buscar | limitTo:10">
                        <td>{{p.proveedor_id}}</td>
                        <td>{{p.nombre}}</td>
                        <td>{{p.direccion}}</td>
                        <td>{{p.telefono}}</td>
                        <td>{{p.correo}}</td>
                        <td>{{p.ncr_dui}}</td>
                        <td>{{p.nit}}</td>
                        <td style="display:none;">{{p.estado}}</td>
                    <td>
                        <a href="<?php echo base_url()?>Proveedor/restaurar/{{p.proveedor_id}}" class="btn btn-primary">
                        <!--icono de carga-->
                        <i class="fa fa-upload icon-alt"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</main>

<script>
angular.module("app", []).controller("app-controller", function($scope, $http, $compile) {
    $scope.proveedores = [];
    $scope.proveedor = {};
    function get_proveedores() {
        $http.get("<?php echo base_url(); ?>Proveedor/getProveedoresInactivos").then(function(response) {
            $scope.proveedores = response.data;
            
        });
    }

    get_proveedores();
});
</script>