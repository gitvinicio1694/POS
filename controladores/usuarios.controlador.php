<?php

/**
 * 
 */
class ControladorUsuarios{ 
	/*==========================================
	=            INGRESO DE USUARIO            =
	==========================================*/
	
	static public function ctrIngresoUsuario(){
		 if(isset($_POST["ingUsuario"])){
		 	if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"])&&
		 	   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

		 	   	$tabla = "usuarios";

		 	   	$item = "usuario";
		 	   	$valor = $_POST["ingUsuario"];

		 	   	$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

		 	   	if($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"]== $_POST["ingPassword"]){

		 	   		$_SESSION["iniciarSesion"] = "ok";
		 	   		echo '<script>
		 	   			window.location = "inicio";
		 	   		</script>';

		 	   	}else{

		 	   		echo '<br> <div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
		 	   	}
		 	}
		}
	}

	/*===========================================
=            REGISTRO DE USUARIO            =
===========================================*/
static public function ctrCrearUsuario(){

    if(isset($_POST["nuevoUsuario"])){

        if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$', $_POST["nuevoNombre"]) && 
            preg_match('/^[a-zA-Z0-9]+$', $_POST["nuevoUsuario"]) &&
            preg_match('/^[a-zA-Z0-9]+$', $_POST["nuevoPassword"])) {
            // code...
        }else{

            echo '<script>
                 
                 swal({

                    type: "error",
                    title: "!El usuario no puede ir vacio o llevar caracteres especiales",
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
}
}
/*--==================================================================================================
    Creo el controlador  en donde  creo una funcion  en donde coloco una condicional que me permita traer los valores insertados en login.php y almaceno en variables tabla item valor y luego comparo los datos de BD. con los valores ingresados del login si es correcto la validacion a traves de SESSION me direcciona a la pagina de inicio y sino me envia una alerta y me pide que ingrese nuevamente.       
====================================================================================================--*/