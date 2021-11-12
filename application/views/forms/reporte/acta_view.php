<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
    <title>Acta</title>
    <style>
        /** ocultar los botones al imprimir**/
     
        @media print {
            .ocultar *{
                display: none;
            }
        }


    </style>
</head>

<body>
    <main>
        <div class="container  pt-4">
            <h3 class="text-capitalize text-center mb-3">ACTA DE RECEPCIÓN</h3>
            <p>En la Municipalidad de San Julián, ubicada en: <?php echo $acta->ubicacion; ?> con fecha:
                <?php echo $acta->fecha; ?> reunido con el propósito de recibir lo especificado mas adelante de
                <b><?php echo$acta->nombre?></b> por un monto de <b>$<?php echo $acta->monto_total; ?></b>.
            </p>

            <div class="table-responsive">
                <!--nombre_producto, cantidad, costo_unitario, descripcion, total-->
                <table class="table table-bordered table-sm text-center">
                    <thead>
                        <tr>
                            <th>Nombre del producto</th>
                            <th>Cantidad</th>
                            <th>Costo unitario</th>
                            <th>Descripción</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productos as $detalle) { ?>
                        <tr>
                            <td><?php echo $detalle->nombre_producto; ?></td>
                            <td><?php echo $detalle->cantidad; ?></td>
                            <td>$<?php echo $detalle->costo_unitario; ?></td>
                            <td><?php echo $detalle->descripcion; ?></td>
                            <td>$<?php echo $detalle->total; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <p><b><?php echo $acta->descripcion; ?></b> De conformidad a Orden de Compra <b> N
                    °<?php echo $acta->id;?></b> de fecha <b><?php echo $acta->fecha; ?> </b> recibiendo por parte de la
                Municipalidad de San Julián <b><?php echo $acta->nombre_admin_alcaldia; ?></b> Administrador de orden de
                Compras.</p>


            <p>Se hace constar que el servicio recibido cumple con las condiciones y especificaciones
                técnicas,previamente definidas en la Orden de Compra.</p>
            <p class="mb-5"> En cumplimiento a los Arts. 82 bis Literal e) y no habiendo más que hacer constar, firmamos
                la presente acta.</p>

            <div class="row d-flex d-flex justify-content-between mt-5">
                <div class="col-5 d-flex justify-content-center border-dark border-top ">
                    <div class="row">
                        <div class="col-12 m-0">
                            Firma del Administrador de la Orden de Compra
                        </div>
                        <div class="col-12">
                            <?php echo $acta->nombre_admin_alcaldia; ?>
                        </div>
                    </div>


                </div>


                <div class="d-flex justify-content-center col-5 border-dark border-top ">
                    <div class="row">
                        <div class="col-12 m-0">
                            Firma del representante del proveedor
                        </div>
                        <div class="col-12 text-center">
                            <?php echo $acta->nombre_representante_proveedor; ?>
                        </div>
                    </div>
                </div>
                
            </div>
            <!---boton de imprimir y volver inicio-->
            <div class="ocultar d-flex justify-content-evenly mt-5">
                <button id="imprimir" name="imprimir" class="btn btn-primary">Imprimir</button>
                <a class="btn btn-primary" href="<?php echo base_url(); ?>">Volver</a>
            </div>
        </div>

    </main>
    <script>
        //imprimir
        document.getElementById('imprimir').onclick = function() {
            window.print();
        }
    </script>
</body>

</html>