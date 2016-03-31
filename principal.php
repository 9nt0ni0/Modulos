<?php

$llamarPrincipal -> pantallaPrinc();
$llamarPrincipal = new principal();

class principal {


    function pantallaPrinc (){

    	echo "Aqui esta la pantalla principal";

    }


}


// AQUI ES DONDE EMPEZARIA EL MODULO BASE DE DATOS



$llamarBaseDeDatos -> conectarBase($baseDatSeg);
$llamarBaseDeDatos = new baseDeDatos();

class baseDeDatos{

	function conectarBase($datos){

		extract($datos)
		// Este arreglo $datos contiene $BaseDeDatos, $Usuario, $Contrasenna		

		$db_hostname = "localhost";//direccion de la base
		$db_database = $BaseDeDatos;//nombre de la base
		$db_username = $Usuario;//usuario
		$db_password = $Contrasenna;//contraseña
		
		
		$db_server = mysql_connect($db_hostname, $db_username, $db_password);//creamos string con datos de conexion
		if (!$db_server) die("No puede conectar a la base de datos, el código de error MySQL es: " . mysql_error());//creamos la conexion, si es false lanza error
		
		
		mysql_select_db($db_database)//
		or die("No se puede seleccionar la base de datos, el código de error MySQL es: " . mysql_error());


		echo "Estas conectado a la base de datos " . $BaseDeDatos;//se conecto exitosamente
		
	}

	/* CONCEPTOS MANEJADOS EN LA BASE DE DATOS

	Entidad

		Entidad normal
		Entidad debíl (no puede existir sin una Entidad normal)

	Restrincciones

		Restrincción de dominio.- Un dato es indivisible (arreglos no) y en un rango de valores permitidos
		Restrincción de clave.- Cada tupla tiene un id o clave unico
		Restrincción de integridad.- Algunas tablas pueden tener una tuplas que se relaciona unicamente con otra tupla de otra tabla 

	Relación

		Nombre.- De la relación (usualmente un verbo)
		Grado.- Cantidad de entidades que intervienen en la relación
		Cardinalidad.- Numeros permitidos de correspondencias entre entidades 
			Valor mínimo
			Valor máximo
		Correspondencia.- Tipo de relacion
			1 - 1
			1 - M
			M - M

	Atributos

		Pertenece: A entidades o relaciones
		Atributo simple: un solo valor
		Atributo compuesto: varios valores (direccion: calle, num. ext., num. int., del., cp., ciudad, pais)
		Clave principal: atributo unico de cada tupla y cada tabla que lo identifica
		Clave secundaria: atributo en una tupla que identifica a otras tuplas en otras entidades concetadas por una relación

	Lenguaje de definición de datos

		Crear (CREATE).- Engendra bases de datos y tablas:

			Engendra una base de datos nueva

				CREATE DATABASE nombreDeLaBaseDeDatos

				*/

				function crearBase($datos){
					extract($datos); 
					$query = "CREATE DATABASE " + $baseDeDatos
					$query = "USE " + $baseDeDatos
				}

				/*

			Engendra una tabla nueva

				CREATE TABLE nombreDeLaTabla (
					
					nombreClavePrimaria int NOT NULL AUTO_INCREMENT,
					PRIMARY KEY (nombreClavePrimaria),

					nombreClaveSecundaria int NOT NULL,
					FOREIGN KEY (nombreClaveSecundaria) REFERENCES nombreDeTablaConectada (clavePrimariaDeTablaConectada)

					nombreAtributoComún tipoDeDato

					)

					Tipo de dato

						INT (numeroDeCantidadDelTipoDeDato)										12
						DECIMAL (numeroDeCantidadDelTipoDeDato, numeroDeDecimalesMostrados)		12.7
						CHAR para cadena de valores (numeroDeCantidadDelTipoDeDato)				'doce'
						VARCHAR para longitud de variable (numeroDeCantidadDelTipoDeDato)		"doce"

				*/

				function crearTabla($datos){
					extract($datos); 
					$query = "CREATE TABLA " + $tabla + " ("
						+ " id int NOT NULL AUTO INCREMENT, PRIMARY KEY (id) "
						if (isset $llavSec()){
							for ($f_sec = 0, $f_sec < "tamaño del arreglo de llaves secundarias", $f_sec ++) {
								+ $llavSec($f_sec) " int NOT NULL, FOREIGN KEY (" + $llavSec($f_sec) + ") REFERENCES " + $tablaHija($f_sec) + " (id)"
							}
						}
						if (isset $atr()){
							for ($f_atr = 0, $f_atr < "tamaño del arreglo de atributos", $f_atr ++) {
								+ $atr($f_atr) + " " + $tipDat($f_atr) + " " + $cantDat($f_atr)
							}
						}

					+ " )"
						

						// TOÑO: ¿Habrá conflicto si todas las llaves primarias de todas las tablas se llaman id, ó tienen qué llamarse distinto?

				}

				/*

		Mostrar (SHOW).- Enseña bases de datos tablas y sus atributos:

			Muestra todas las bases de datos creadas:

				SHOW DATABASES

				*/

				function mostrarBases(){
					$query = "SHOW DATABASES"
					$arreglo = arreglo(
						'baseUno'	=> $baseUno,
						'baseDos'	=> $baseDos,
						'baseTres'	=> $baseTres
					);
				}

				/*

			Muestra las tablas creadas:

				SHOW TABLES

				*/

				function mostrarTablas(){
					$query = "SHOW TABLES"
					$arreglo = arreglo(
						'tablaUno'	=> $tablaUno,
						'tablaDos'	=> $tablaDos,
						'tablaTres'	=> $tablaTres
					);
				}

				/*

			Describe (DESCRIBE) los atributos de una tabla:

				DESCRIBE nombreTabla

				*/

				function mostrarTablas($datos){
					extract($datos)
					$query = "DESCRIBE " + $tabla
					$arreglo = arreglo(
						'atrUno'	=> $atrUno,
						'atrDos'	=> $atrDos,
						'atrTres'	=> $atrTres
					);
				}

				/*

		Usar (USE).- Permite utilizar a una base de datos ya creada

			USE nombre de la base de datos

			function usarBase($datos){
				extract($datos); 
				$query = "USE " + $baseDeDatos
			}

		Alterar (ALTER).- Editar a una tabla ya creada y sus atributos: 

			Editar el nombre de una tabla:

				ALTER TABLE nombreDeLaTablaViejo RENAME nombreDeLaTablaNuevo

				*/

				function alterarTablaNom($datos){
					extract($datos); 
					$query = "ALTER TABLE " + $tablaVieja + " RENAME " + $tablaNueva
				}

				/*

			Añadir un nuevo atributo despues que todos los atributos:

				ALTER TABLE nombreDeLaTabla ADD nombreAtributoCua tipoDeDato

				*/

				function alterarAtrUlt($datos){
					extract($datos); 
					$query = "ALTER TABLE " + $tabla + " ADD " + $atr
				}

				/*

			Añadir un nuevo atributo antes que todos los atributos:

				ALTER TABLE nombreDeLaTabla ADD nombreAtributoCua tipoDeDato first

				*/

				function alterarAtrPrim($datos){
					extract($datos); 
					$query = "ALTER TABLE " + $tabla + " ADD " + $atr + " FIRST"
				}

				/*

			Añadir un nuevo atributo despues de alguno específico:

				ALTER TABLE nombreDeLaTabla ADD nombreAtributoCua tipoDeDato after atributoArribaDelNuevo

				*/

				function alterarAtrEnt($datos){
					extract($datos); 
					$query = "ALTER TABLE " + $tabla + " ADD " + $atr + "AFTER" + $atrAnt
				}

				/*

			Cambiar atributos ya existentes:

				ALTER TABLE nombreDeLaTabla CHANGE nombreAtributoViejo nombreAtributoNuevo tipoDeDato

				*/

				function alterarAtr($datos){
					extract($datos); 
					$query = "ALTER TABLE " + $tabla + " CHANGE " + $atrViejo + " " + $atrNuevo
				}

				/*

			Editar el nombre de un atributo existente

				ALTER TABLE nombreDeLaTabla nombreAtributoViejo nombreAtributoNuevo tipoDeDato

				*/

				function alterarAtrNom($datos){
					extract($datos); 
					$query = "ALTER TABLE " + $tabla + " " + $atrViejo + " " + $atrNuevo
				}

				/*

			Modificar el tipo de dato en un atributo:

				ALTER TABLE nombreDeLaTabla MODIFY nombreAtributo tipoDeDatoNuevo

				*/

				function alterarAtrTip($datos){
					extract($datos); 
					$query = "ALTER TABLE " + $tabla + " MODIFY " + $atr + " " + $tipoNuevo
				}

				/*

			Borrar atributos ya existentes

				ALTER TABLE nombreDeLaTabla DROP COLUMN nombreAtributo

				*/

				function alterarAtrBorr($datos){
					extract($datos); 
					$query = "ALTER TABLE " + $tabla + " DROP COLUMN " + $atr
				}

				/*
		
		Tirar (DROP).- Borra bases de datos y tablas: 

			Borra tablas:

				DROP TABLE nombreDeLaTabla

				*/

				function tirarTabla($datos){
					extract($datos); 
					$query = "DROP TABLE " + $tabla
				}

				/*

			Borra bases de datos:
				
				DROP DATABASE nombreDeLaBase

				*/

				function tirarBase($datos){
					extract($datos); 
					$query = "DROP DATABASE " + $baseDeDatos
				}

				/*

	Lenguaje de manipulación de datos

		Insertar (INSERT).- crea un dato nuevo en una entidad

			En todos los atributos y creado en una o varias tuplas

				INSERT INTO entidad VALUES (tuplaUnoDatoUno, tuplaUnoDatoDos, tuplaUnoDatoTres), (tuplaDosDatoUno, tuplaDosDatoDos, tuplaDosDatoTres)

				*/

				function insertarTupla($datos){
					extract($datos); 
					$query = "INSERT INTO " + $tabla + " VALUES (" + $datoUno + ", " + $datoDos + ", " + $datoTres + ")"
				}

				/*

			En un atributo en una tupla

				INSERT INTO entidad (atributoUno, atributoDos, atributoTres) VALUES (datoUno, datoDos, datoTres)

				*/

				function insertarDato($datos){
					extract($datos); 
					$query = "INSERT INTO " + $entidad + " (" + $atributo + ")" + " VALUES " + "(" + $dato + ")"
				}

				/*

		Seleccionar (SELECT).- muestra datos de una entidad o varias

			Selecciona una tabla 

				SELECT * FROM tabla

				*/

				function seleccionarTabla($datos){
					extract($datos);
					$query = "SELECT * FROM " + $tabla
					$arreglo = arreglo(
						'datoUno'	=> $datoUno,
						'datoDos'	=> $datoDos,
						'datoTres'	=> $datoTres
					);
					/* enviar $arreglo a modulo */
				}

				/*

			Selecciona un atributo

				SELECT atributo FROM tabla

				*/

				function seleccionarAtr($datos){
					extract($datos);
					$query = "SELECT " + $atr + " FROM " + $tabla
					$arreglo = arreglo(
						'datoUno'	=> $datoUno,
						'datoDos'	=> $datoDos,
						'datoTres'	=> $datoTres
					);
				}

				/*

			Selecciona una tupla

				SELECT * FROM tabla WHERE atributo = condición

				*/

				function seleccionarDat($datos){
					extract($datos);
					$query = "SELECT * FROM " + $tabla + " WHERE " + $cond
					$arreglo = arreglo(
						'datoUno'	=> $datoUno,
						'datoDos'	=> $datoDos,
						'datoTres'	=> $datoTres
					);
				}

				/*

			Selecciona un dato

				SELECT atributo FROM tabla WHERE atributo = condición

				*/

				function seleccionarDat($datos){
					extract($datos);
					$query = "SELECT " + $atr + " FROM " + $tabla + " WHERE " + $cond
					$arreglo = arreglo(
						'datoUno'	=> $datoUno,
						'datoDos'	=> $datoDos,
						'datoTres'	=> $datoTres
					);
				}

				/*

		Actualizar (UPDATE).- edita un dato ya existente

			Edita uno o varios datos en un tupla particular

				UPDATE entidad SET atributoUno = datoNuevoUno, atributoDos = datoNuevoDos, atributoTres = datoNuevoTres WHERE atributo = condición

				*/

				function actualizarDato($datos){
					extract($datos);
					$query = "UPDATE " + $tabla + " SET " + $atributo + " = " + $dato + " WHERE id = " + $id
				}

				/*

			Edita un atributo cambiando a todas los datos de ese atributo de todas las tuplas

				UPDATE entidad SET atributo = datoUniversal

				*/

				function actualizarAtrTxt($datos){
					extract($datos);
					$query = "UPDATE " + $tabla " SET " + $atributo + " = " + $dato
				}

				/*

			Edita un atributo de tipo númerico cambiando a todas los datos de ese atributo de todas las tuplas usando operaciones matemáticas

				UPDATE entidad SET atributoDeTipoNumerico = atributoDeTipoNumerico (Operacion + / -) numeroQueSumaRestaUOperaATodosLosDatos

				*/

				function actualizarAtrNum($datos){
					extract($datos);
					$query = "UPDATE " + $tabla + " SET " + $atributo + " = " + $atributo + $oper
				}

				/*

			Edita una cantidad especifica de las primeras tuplas a un mismo dato

				UPDATE entidad SET atributo = datoNuevo LIMIT numeroDeTuplasACambiar

				*/

				function actualizarAtrLim($datos){
					extract($datos);
					$query = "UPDATE " + $tabla + " SET " + $atributo + " = " + $datoUniv + " LIMIT " + $limite
				}

				/*

		Borrar (DELETE).- borra datos (tupla) aunque también tablas y bases de datos

			Todos los datos de una tabla

				DELETE FROM entidad

				*/

				function borrarTabla($datos){
					extract($datos);
					$query = "DELETE FROM " + $tabla
				}

				/*

			Todos los datos de una tupla

				DELETE FROM entidad WHERE atributo = condicion

				*/

				function borrarTupla($datos){
					extract($datos);
					$query = "DELETE FROM " + $tabla + " WHERE id = " + $id
				}

				/*

			Borrar una cantidad especifica de las primeras tuplas

				DELETE FROM entidad LIMIT numeroDeTuplasABorrar

				*/

				function borrarTuplasLim($datos){
					extract($datos);
					$query = "DELETE FROM " + $tabla + "LIMIT" + $limite
				}

	/*

	Interfaz de base de datos

		Entidad normal = rectangulo con nombre
		Entidad débil = rectangulo dentro de otro rectangulo (entidad normal)

		Relacion = rombo con nombre grado y cardinalidad
		Relacion conectores = lineas (correspondencia = 1) flechas (correspondencia = M)
		
		Atributo simple = un círculo con una linea de pertenencia a su entidad o relación
		Atributo compuesto = los círculos unidos por lineas a otra linea de pertenencia a la entidad o relación
		Clave primaria = círculo negro con una linea de pertenencia a la entidad o relación
		Clave secundaria = círculo con linea a la mitad vertical con una linea de pertenencia a la entidad o relación

	*/


<<<<<<< HEAD
=======
	function conectarBase($data){

		extract($data)

		$db_hostname = 'localhost';
		$db_database = 'baseDeDatos';
		$db_username = $usuario;
		$db_password = $contraseña;
		
		
		$db_server = mysql_connect($db_hostname, $db_username, $db_password);
		if (!$db_server) die("No puede conectar a MySQL: " . mysql_error());
		
		mysql_select_db($db_database)
		or die("No se puede seleccionar la base de datos:" . mysql_error ());
		
	}
>>>>>>> parent of c179e98... primeraConexion


	





<<<<<<< HEAD




=======
	// TOÑO: PATO, ESTAS NO LAS ENTIENDO, ¿CÚAL ES SU FUNCIÓN? ME LAS EXPLICAS PORFA :P
>>>>>>> parent of c179e98... primeraConexion












	// Datos

	function insertarDato($data){
		extract($data); 
		$array = array(
			'usuario'	 => $usuario,
			'email' 	 => $email
			);
		$query = "INSERT  "
	}


	function editarDato($data){

	}


	function buscarDato($data){

	}


	function eliminarDato(){

	}


	// Campo

	function crearCampo($data){

	}


	function editarCampo($data){

	}


	function buscarCampo($data){

	}


	function eliminarCampo($data){

	}


	// Tabla

	function crearTabla($data){

	}


	function editarTabla($data){

	}


	function buscarTabla($data){

	}


	function eliminarTabla($data){

	}


	// Base de datos

	function crearBase($data){

	}


	function editarBase($data){

	}


	function buscarBase($data){

	}


	function cerrarBase($data){
	
	}


	function eliminarBase($data){

	}


}



class Principal {


    function prueba (){

    	echo "lalalalala";

    }


    function baseDeDatos(){

    }


=======
>>>>>>> Stashed changes
}

?>