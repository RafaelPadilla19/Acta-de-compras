<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo base_url(); ?>">Alcaldia de san Julian</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>Proveedor">Proveedores</a>
                </li>

            </ul>
            <ul  class="navbar-nav me-5">
                <li class="nav-item dropdown  me-3">
                    <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Usuario
                    </a>
                    
                    <ul class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink"  style="font-size: 85%;">
                        <li><a class="dropdown-item" href="<?php echo base_url()?>Usuario/logout">Salir</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>