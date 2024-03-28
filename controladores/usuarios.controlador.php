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

/*--==================================================================================================
    Creo el controlador  en donde  creo una funcion  en donde coloco una condicional que me permita insertar los valores  en login.php. establesco los nombres de los parametros que quiero buscar en donde $tabla== usuarios, $item==usuario y $valor== es igual a toda la fila de la tabla que va ser almacenado en $_POS["ingUsuario"] creo una variable $respuesta  me trera  el llamado de los datos  de mis parametros  de usuario.modelo.php. Declaro un IF y  compararo si los datos de  de mi  variable $respuesta es igual que los datos ingresados en lohin.php  me inice sesion y me almacene en la variable $_SESSION para luego ser utilizado en plantilla.php y verificarlo en caso de que no este bien validado  o se inserte un valor incorrecto  mostrare  una alerta  de error al ingresar
==================================================================================================--*/
/*===========================================
=            REGISTRO DE USUARIO            =
===========================================*/
static public function ctrCrearUsuario(){

    if(isset($_POST["nuevoUsuario"])){

        if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) && 
            preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
            preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])) {
            // code...

            $tabla = "usuarios";

        	$datos = array("nombre" => $_POST["nuevoNombre"],
        				   "usuario" => $_POST["nuevoUsuario"],
        				   "password" => $_POST["nuevoPassword"],
        				   "perfil" => $_POST["nuevoPerfil"]);

        	$respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);
			
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El usuario ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

						}

					});
				

					</script>';


				}	


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

						}

					});
				

				</script>';

			}


		}


	}
}
