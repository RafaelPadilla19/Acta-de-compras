<main class="bg-light" ng-app="app" ng-controller="app-controller">
    <div class="container  pt-4">
        <h2 class="text-capitalize text-center mb-5"><?php echo $title;?></h2>
        <!--Agregar Acta-->

        <a href="<?php echo base_url(); ?>Reporte/registrar" class="btn btn-success mb-3 text-white">Agregar solicitud de requerimiento</a>

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
                            <th>N° de orden</th>
                            <th>Programa</th>
                            <!-- <th>Destino del bien</th>
                            <th>Solicitante</th> -->
                            <th>Nombre Proveedor</th>
                            <!-- <th>Autorizante</th>
                            <th>Valor estimado</th> -->
                            <th>Fecha de solicitud</th>
                            <th>Ver Proceso</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="r in reportes | filter:buscar | limitTo:10">
                            <td>{{r.solicitud_id}}</td>
                            <td>{{r.amsj}}</td>
                             <td>{{r.destino_de_bien}}</td>
                            <!--<td>{{r.nombre_solicitante}}</td> -->
                            <td>{{r.nombre}}</td>
                            <!-- <td>{{r.nombre_autorizante}}</td>
                            <td>{{r.valor_compra}}</td> -->
                            <td>{{r.fecha}}</td>
                            
                            <td>
                                <a href="<?php echo base_url()?>Reporte/documentacionCompra/{{r.solicitud_id}}" class="btn btn-primary">
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
