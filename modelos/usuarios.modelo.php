<?php

require_once "conexion.php";
 class ModeloUsuarios{

 	/*========================================
 	=            MOSTRAR USUARIOS            =
 	========================================*/
 	
 	
 	
static public function mdlMostrarUsuarios($tabla, $item, $valor){
 
 $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

 $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

 $stmt -> execute();

 return $stmt -> fetch();

 $stmt -> close();

 $stmt = null;

}

/*===========================================
=            REGISTRO DE USUARIO            =
===========================================*/
/*static public function ctrCrearUsuario(){

    if(isset($_POST["nuevoUsuario"])){

        if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$', $_POST["nuevoNombre"]) && 
            preg_match('/^[a-zA-Z0-9]+$', $_POST["nuevoUsuario"]) &&
            preg_match('/^[a-zA-Z0-9]+$', $_POST["nuevoPassword"])) {
            // code...
        }else{

            echo '<script>
                 
                 swal({

                    type: "error",
                    tittle: "!El usuario no puede ir vacio o llevar caracteres especiales",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOneConfirm: false

                 }).then((result)=>{

                    if(result.value){

                        window.location = "usuarios";

                    }

                    });

            </script>';
        }
    }
}*/
  
}


                                      /*--EXPLICACION DEL CODIGO-*/
/*--==================================================================================================
    En este modelo requerimos  la conexion.php en este archivo se encuentra la configuracion de la conexion a la BD.

    Creo la clase modelo en donde utilizo los parametros del controlador  y preparo una sentecia SQL en donde traigo el nombre de la tabla el nombre de la columna y el valor del item  del usuario preparo  esos item y ejecuto para devolver al controlador.      
====================================================================================================-*/