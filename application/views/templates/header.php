<?php 
    if($this->session->userdata("usuario") == null){
        if(!($this->uri->segment(1) == "Usuario" && $this->uri->segment(2) == "logear"))
            {
                return redirect("Usuario/logear");
            }
    }
    
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords"
        content="bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
    <link href="<?php echo base_url();?>assets/icons/css/fontawesome.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/icons/css/brands.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/icons/css/solid.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/js/angular.min.js"></script>
</head>

<body>