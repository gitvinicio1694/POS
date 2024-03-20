<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=pos",
			            "root",
			            "");

		$link->exec("set names utf8");

		return $link;

	}

}


                                      /*--EXPLICACION DEL CODIGO-->
<!--==================================================================================================
    Realizo la conexion en donde creo la funcion conectra y coloco los parametros de mi base de datos        
====================================================================================================-*/