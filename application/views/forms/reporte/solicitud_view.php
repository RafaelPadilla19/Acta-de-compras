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
                        <h5 class="modal-title" id="exampleModalLabel">Asignación presupuestaria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Proyecto o programa:</label>
                            <input type="text" class="form-control" id="proyecto" ng-model="asignacion_presupuestaria.proyecto">
                        </div>
                        <div class="row">
                            <div class="mb-3 col-12">
                                <label for="message-text" class="col-form-label">Aprobado por solicitud de modificación presupuestaria N°:</label>
                                <input type="text" class="form-control" id="numero_solicitud_modificacion" ng-model="asignacion_presupuestaria.numero_solicitud_modificacion">

                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="message-text" class="col-form-label">Fuente de financiamiento:</label>
                                <input type="text" class="form-control" id="fuente_de_financiamiento" ng-model="asignacion_presupuestaria.fuente_de_financiamiento">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="recipient-name" class="col-form-label">Recibo en presupuesto por:</label>
                                <input type="text" class="form-control" id="recibo_en_presupuesto_por" ng-model="asignacion_presupuestaria.recibo_en_presupuesto_por">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="message-text" class="col-form-label">Cargo:</label>
                                <input type="text" class="form-control" id="cargo" ng-model="asignacion_presupuestaria.cargo">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="recipient-name" class="col-form-label">Dependencia:</label>
                                <input type="text" class="form-control" id="dependencia" ng-model="asignacion_presupuestaria.dependencia">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">        
                                <div class="form-group">
                                    <label class="mb-2" for="inputState">Estado</label>
                                    <select id="inputState" class="form-control" name="estado">                                   
                                            <option value="">Aprobado</option>  
                                            <option value="">Rechazado</option>     
                                    </select>
                                </div>         
                            </div>
                            <div class="col-6">
                                <label for="fecha" class="form-label">Fecha</label>
                                <input type="date" class="form-control"  value="09-09-2019" id="fecha" ng-model="asignacion_presupuestaria.fecha" required>
                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>