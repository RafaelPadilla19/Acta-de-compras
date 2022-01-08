
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

<main class="pt-2" style="margin: 0 60px;font-size:12px;">
    <div class="d-flex justify-content-startrow g-0 text-center pt-5">
        <div class="col-2">
            <p class="text-end">Yo</p>
            <p class="text-end">NIT: </p>
            <p class="text-end">DUI O NCR: </p>
        </div>
        <div class="col-9">
            <p class="fw-bold"><?php echo $acta->nombre?></p>
            <p class="text-start fw-bold ms-2"><?php echo $acta->nit?></p>
            <p class="text-start fw-bold ms-2"><?php echo $acta->ncr_dui?></p>
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
            <div class="mb-2">
                Por tanto, declaro lo siguiente: 
            </div>
            
        </p>
        <div class="text-justify justify-content-center">
                <div class="mb-2 text-start">
                    <span class="fw-bold">A.</span>	Que no soy empleado de la Alcaldía Municipal de San Julián y tampoco lo es el 
                    representante legal, socio, directivo integrante, administrador o gerente de la 
                    sociedad concursante. Asimismo, declaro que no tengo parentesco alguno hasta el segundo
                    grado de afinidad y cuarto de consanguinidad con empleados de la
                    Alcaldía Municipal de San Julián y tampoco lo tienen el representante legal, socio,
                    directivo integrante, administrador o gerente de esta sociedad.
                </div>
                <div class="mb-2 text-start">
                    <span class="fw-bold">B.</span>	Que no estoy incapacitado ni impedido para contratar con el Estado; y que tampoco 
                    lo está la Sociedad o Empresa a la cual represento, de acuerdo a lo establecido en los 
                    Artículos 25, 26 y 158 de la Ley de Adquisiciones y Contrataciones de la Administración 
                    Pública (LACAP).
                </div>
                <div class="mb-2 text-start">
                    <span class="fw-bold">C.</span>	Que la Información proporcionada para el presente Proceso de Libre Gestión es veraz; 
                    y que soy conocedor de lo establecido en el Artículo 284 en el Código Penal en lo referente 
                    al delito de falsedad ideológica.
                </div>
                <div class="mb-2 text-start">
                    <span class="fw-bold">D.</span>	Que con el objeto de participar en el Proceso de Libre Gestión. Declaro estar solvente 
                    en las obligaciones fiscales, municipales, de seguridad social y previsional, de 
                    conformidad al Art. 25, 26 y 158 de la LACAP y su Reglamento, comprometiéndome a presentar 
                    dichas solvencias en original si la Institución así lo requiere.
                </div>
                <div class="mb-2 text-start">
                    <span class="fw-bold">E.</span>	Que no se emplea a niñas, niños y adolescentes por debajo de la edad mínima de admisión 
                    al empleo y se cumple con la normativa que prohíbe el trabajo infantil y de protección de la 
                    persona adolescente trabajadora.
                </div>
            </div>
    </div> 
    <div class="d-flex justify-content-startrow g-0 text-start fw-bold pt-5">                        
        <div class="col-1 fw-bold">F.</div>                               
        <div class="col-3 col-md-3">
            <div class="linea" style="margin: 20px -50px;"></div>
        </div>  
                                    
    </div>
    <p class="row">
        <div>Nombre: <span><?php echo $acta->nombre?></span></div></p>
        <p class="text-start">DUI O NCR: <?php echo $acta->ncr_dui?></p>
        <p class="text-start">NIT: <?php echo $acta->nit?>
    </p>    
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
