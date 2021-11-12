<style>
  .footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: #f5f5f5;
    color: black;
    text-align: center;
  }
  @media screen and (max-width: 600px) {
    .footer {
      position: static;
      bottom: 0;
    }
  }
    
  
</style>
<section class="mt-5">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.png"
                    class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form action="<?php echo base_url();?>/Usuario/login" method="post" > 
                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                        <p class="lead fw-normal mb-4 mt-4 text-capitalize text-muted display-6">Inicio de Sesion</p>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="text" name="usuario" id="form3Example3" class="form-control form-control-lg"
                            placeholder="Ingrese un usuario valido" />
                        <label class="form-label" for="form3Example3">Ingrese su usurio o correo asignado</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <input type="password" name="password" id="form3Example4" class="form-control form-control-lg"
                            placeholder="Ingrese su clave" />
                        <label class="form-label" for="form3Example4">Ingrese su clave</label>
                    </div>

                    <!-- error --->
                    
                    <?php echo $this->session->flashdata('error'); ?>


                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg mb-5"
                            style="padding-left: 2.5rem; padding-right: 2.5rem;">Entrar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div
        class="footer d-flex flex-column flex-md-row text-center py-4 px-4 px-xl-5 bg-primary">
        <!-- Copyright -->
        <div class="text-white mb-3 mb-md-0 text-center w-100">
            Copyright © 2021. Todos los derechos reservados. ADIS Ingenieros.
        </div>
        <!-- Copyright -->

</section>