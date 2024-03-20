<div id="back"></div>

<div class="login-box">
  
  <div class="login-logo">

    <img src="vistas/img/plantilla/logo-blanco-bloque.png" class="img-responsive" style="padding:30px 100px 0px 100px">

  </div>

  <div class="login-box-body">

    <p class="login-box-msg">Ingresar al sistema</p>

    <form method="post">

      <div class="form-group has-feedback">

        <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>

      </div>

      <div class="form-group has-feedback">

        <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      
      </div>

      <div class="row">
       
        <div class="col-xs-4">

          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        
        </div>

      </div>

        <?php

        $login = new ControladorUsuarios();
        $login -> ctrIngresoUsuario();
        
      ?>

    </form>

  </div>

</div>



                                      <!--EXPLICACION DEL CODIGO-->
<!--==================================================================================================
    En el login.php se utiliza la plantilla de login de AdminLTE utilizando los compones que vamos a utilizar en donde se perzonaliza con img.

    *En los IMPUT de usuario y password utilizo los identificadores NAME en donde asigno los nombres para mas adelante poder validar los datos en los controladores.

    *Tambien creo  los objetos para instanciar mi clase controlador en donde llamo los  datos usuario y password     
====================================================================================================-->