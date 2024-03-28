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
=            REGISTRO DE USUARIO  
Creo la clase ModeloUsuarios  esta me extrae los datos de la BD  creando un metodo(funcion llamada mdlMostrarUsuarios) en donde declaro los parametros $tabla , $item, $valor estos reemplazaran a la sentencia SQL que extraera los datos de la tabla usurios.Luego  creo una variable $stmt esta me permite guardar la preparacion de la conexion de la tabla para seleccionar el nombre de la tabla, el nombre de usurio y el valor de toda la fila de ese usuario, una vez extraido y guardado dentro de mi variable $stmt ejecuto y cierro la extraccion.
===========================================*/


/*===========================================
=            REGISTRO DE USUARIO            =
===========================================*/
static public function mdlIngresarUsuario($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, usuario, password, perfil) VALUES (:nombre, :usuario, :password, :perfil)");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
        

        if($stmt->execute()){

            return "ok";    

        }else{

            return "error";
        
        }

        $stmt->close();
        
        $stmt = null;

    }
  
}


                                      /*--EXPLICACION DEL CODIGO-*/
/*--==================================================================================================
    En este modelo requerimos  la conexion.php en este archivo se encuentra la configuracion de la conexion a la BD.

    Creo la clase modelo en donde utilizo los parametros del controlador  y preparo una sentecia SQL en donde traigo el nombre de la tabla el nombre de la columna y el valor del item  del usuario preparo  esos item y ejecuto para devolver al controlador.      
====================================================================================================-*/