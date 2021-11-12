<main class="bg-light" ng-app="app" ng-controller="app-controller">
    <div class="container  pt-4">
        <h2 class="text-capitalize text-center mb-5"><?php echo $title;?></h2>
        <!--Agregar Acta-->

        <a href="<?php echo base_url(); ?>Reporte/registrar" class="btn btn-success mb-3 text-white">Agregar orden</a>

        <!--buscar-->
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="form-group">
                    <input type="text" ng-model="buscar"class="form-control" placeholder="Buscar.....">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre proyecto</th>
                            <th style="display: none;">Descripcion</th>
                            <th style="display: none;">Ubicacion</th>
                            <th>Documento fiscal</th>
                            <th style="display: none;">Tipo de documento fiscal</th>
                            <th>Representante alcaldia</th>
                            <th>Representante proveedor</th>
                            <th>Proveedor</th>
                            <th>Fecha</th>
                            <th>Monto</th>
                            <th>Ver Acta</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="r in reportes | filter:buscar | limitTo:10">
                            <td>{{r.id}}</td>
                            <td>{{r.nombre_proyecto}}</td>
                            <td style="display: none;">{{r.descripcion}}</td>
                            <td style="display: none;">{{r.ubicacion}}</td>
                            <td>{{r.n_documento_fiscal}}</td>
                            <td style="display: none;">{{r.tipo_documento_fiscal}}</td>
                            <td>{{r.nombre_admin_alcaldia}}</td>
                            <td>{{r.nombre_representante_proveedor}}</td>
                            <td>{{r.nombre}}</td>
                            <td>{{r.fecha}}</td>
                            <td>{{r.monto_total}}</td>
                            <td>
                                <a href="<?php echo base_url()?>Reporte/acta/{{r.id}}" class="btn btn-primary">
                                    <i class="fas fa-copy"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
</main>
<script>
angular.module("app", []).controller("app-controller", function($scope, $http, $compile) {
    $scope.reportes = [];
    
    function get_reportes() {
        $http.get("<?php echo base_url(); ?>Reporte/getReportes").then(function(response) {
            $scope.reportes = response.data;
            console.log($scope.reportes)
        });
    }

    get_reportes();

    //nuevo proveedor
  

    


});
</script>
