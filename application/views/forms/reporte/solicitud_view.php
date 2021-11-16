<main class="" ng-app="app" ng-controller="app-controller">
    <div class="container  pt-4">
        <h3 class="text-capitalize text-center mb-5"><?php echo $title;?></h3>

        <div class="row">
            <div class="col-6">
                <div class="card text-center">
                    <div class="card-header">
                        Solicitud de compra
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Solicitante: <?php echo $solicitud->nombre_solicitante ?></h5>
                        <p class="card-text">Estado: <?php echo $solicitud->estado ?>.</p>
                        <p class="card-text">Justificacion: <?php echo $solicitud->destino_de_bien ?>.</p>
                        <button
                            class="btn btn-success <?php echo $solicitud->estado!="pendiente"? "disabled":"";?>" data-bs-toggle="modal" data-bs-target="#modal-recepcion">Aprobar</button>
                        <a href="<?php echo base_url()."Reporte/solicitudRequerimiento/".$id; ?>" class="btn btn-info ms-4" target="_blank">Ver</a>
                    </div>
                    <div class="card-footer text-muted">
                        <?php echo $solicitud->fecha;?>
                    </div>
                </div>
            </div>
        </div>

        <!--modal aceptacio o rechazo-->
        <div class="modal fade" id="modal-recepcion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>