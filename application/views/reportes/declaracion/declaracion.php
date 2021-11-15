
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/declaracion.css">

    <title>Declaracion</title>
    <style>
    /** ocultar los botones al imprimir**/

    @media print {
        .ocultar * {
            display: none;
        }
    }
    </style>
</head>

<body>

<main class="pt-5" style="margin: 0 60px;">
    <div class="d-flex justify-content-startrow g-0 text-center pt-5">
        <div class="col-2">
            <p class="text-end">Yo</p>
            <p class="text-end">NIT: </p>
            <p class="text-end">DUI O NCR: </p>
        </div>
        <div class="col-9">
            <p class="fw-bold"> ALMACENES VIDRI S.A DE C.V</p>
            <p class="text-start fw-bold ms-2">0210-191171-0016</p>
            <p class="text-start fw-bold ms-2">002-7</p>
        </div>
        <div class="col-1">
            <p>con:</p>
        </div>
    </div>
    <div class="col-12">
        <p class="text-wrap">
            Declaro estar solvente de las obligaciones fiscales, municipales, de 
            seguridad social y previsional y dando cumplimiento a lo establecido
            en el Art. 25 literal d) LACAP y Art. 26 RELACAP, sin <span class="fw-bold">perjuicio
            que la Institución les requiera las solvencias originales en cualquier momento.
            </span>
        </p>
    </div> 
    <div class="d-flex justify-content-startrow pt-5">
        <div class="centrado txt">
            <div class="linea"></div>
            <p>
                <div>Nombre: <span>ALMACENES VIDRI S.A DE C.V.</span></div></p>
                <p class="text-start">DUI O NCR: 002-7</p>
                <p class="text-start">NIT: 0210-191171-0016</p>                
            
        </div>
    </div>
    <div class="ocultar d-flex justify-content-center my-3">
            <button id="imprimir" name="imprimir" class="btn btn-primary me-3">Imprimir</button>
            <a class="btn btn-primary" href="<?php echo base_url(); ?>">Volver</a>
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
