<?php

$data[usuario] = "paquito";
$data[contraseña] = "123";

$conexion = new baseDeDatos();
$conexion->conectarBase($data);


class baseDeDatos{


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
					$query = "CREATE DATABASE " + $baseDeDatos;
					$query = "USE " + $baseDeDatos;
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

			/*	function crearTabla($datos){
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

			Muestra las tablas creadas:

				SHOW TABLES

			Describe (DESCRIBE) los atributos de una tabla:

				DESCRIBE nombreTabla

		Usar (USE).- Permite utilizar a una base de datos ya creada

			USE nombre de la base de datos

			*/

			function usarBase($datos){
				extract($datos); 
				$query = "USE " + $baseDeDatos;
			}

			/*

		Alterar (ALTER).- Editar a una tabla ya creada y sus atributos: 

			Editar el nombre de una tabla:

				ALTER TABLE nombreDeLaTablaViejo RENAME nombreDeLaTablaNuevo

			Añadir un nuevo atributo despues que todos los atributos:

				ALTER TABLE nombreDeLaTabla ADD nombreAtributoCua tipoDeDato

			Añadir un nuevo atributo antes que todos los atributos:

				ALTER TABLE nombreDeLaTabla ADD nombreAtributoCua tipoDeDato first

			Añadir un nuevo atributo despues de alguno específico:

				ALTER TABLE nombreDeLaTabla ADD nombreAtributoCua tipoDeDato after atributoArribaDelNuevo

			Cambiar atributos ya existentes:

				ALTER TABLE nombreDeLaTabla CHANGE nombreAtributoViejo nombreAtributoNuevo tipoDeDato

			Editar el nombre de un atributo existente

				ALTER TABLE nombreDeLaTabla nombreAtributoViejo nombreAtributoNuevo tipoDeDato

			Modificar el tipo de dato en un atributo:

				ALTER TABLE nombreDeLaTabla MODIFY nombreAtributo tipoDeDatoNuevo

			Borrar atributos ya existentes

				ALTER TABLE nombreDeLaTabla DROP COLUMN nombreAtributo
		
		Tirar (DROP).- Borra bases de datos y tablas: 

			Borra tablas:

				DROP TABLE nombreDeLaTabla

				*/

				function tirarTabla($datos){
					extract($datos); 
					$query = "DROP TABLE " + $tabla;
				}

				/*

			Borra bases de datos:
				
				DROP DATABASE nombreDeLaBase

				*/

				function tirarBase($datos){
					extract($datos); 
					$query = "DROP DATABASE " + $baseDeDatos;
				}

				/*

	Lenguaje de manipulación de datos

		Insertar (INSERT).- crea un dato nuevo en una entidad

			En todos los atributos y creado en una o varias tuplas

				INSERT INTO entidad VALUES (tuplaUnoDatoUno, tuplaUnoDatoDos, tuplaUnoDatoTres), (tuplaDosDatoUno, tuplaDosDatoDos, tuplaDosDatoTres)

				*/

				function insertarTupla($datos){
					extract($datos); 
					$query = "INSERT INTO " + $tabla + " VALUES (" + $datoUno + ", " + $datoDos + ", " + $datoTres + ")";
				}

				/*

			En alagunos atributos en una tupla dejando el resto como valores nulos

				INSERT INTO entidad (atributoUno, atributoDos, atributoTres) VALUES (datoUno, datoDos, datoTres)

				function insertarDato($datos){
					extract($datos); 
					$query = "INSERT INTO " + $entidad + " (" + $atributo + ")" + " VALUES " + "(" + $dato + ")"
				}

		Seleccionar (SELECT).- muestra datos de una entidad o varias

			Selecciona toda la tabla 

				SELECT * FROM tabla

				*/

				/*function seleccionarTabla($datos){
					extract($datos);
					$query = "SELECT * FROM " + $tabla;
					$arreglo = arreglo(
						'datoUno'	=> $datoUno,
						'datoDos'	=> $datoDos,
						'datoTres'	=> $datoTres
					);
					/* enviar $arreglo a modulo */
				//}

				/*

			Selecciona parte de una tabla

				SELECT * FROM tabla WHERE atributo = condición

				

				function seleccionarTablaCond($cond){
					/* $cond = "atributo = condición" */ /*
					$query = "SELECT * FROM tabla WHERE " + $cond
					$array = array(
						'datoUno'	=> $datoUno,
						'datoDos'	=> $datoDos,
						'datoTres'	=> $datoTres
					);
				}

			

			Selecciona los datos del atributo de una tabla

				SELECT atributo FROM tabla

			Selecciona parte de los datos del atributo de una tabla

				SELECT atributo FROM tabla WHERE atributo = condición

		Actualizar (UPDATE).- edita un dato ya existente

			Edita uno o varios datos en un tupla particular

				UPDATE entidad SET atributoUno = datoNuevoUno, atributoDos = datoNuevoDos, atributoTres = datoNuevoTres WHERE atributo = condición

				*/

				function actualizarDato($datos){
					extract($datos);
					$query = "UPDATE " + $tabla + " SET " + $atributo + " = " + $dato + " WHERE id = " + $id;
				}

				/*

			Edita un atributo cambiando a todas los datos de ese atributo de todas las tuplas

				UPDATE entidad SET atributo = datoUniversal

				*/

				/*function actualizarAtrTxt($datos){
					extract($datos);
					$query = " UPDATE " + $tabla " SET " + $atributo + " = " + $dato;
				}

				/*

			Edita un atributo de tipo númerico cambiando a todas los datos de ese atributo de todas las tuplas usando operaciones matemáticas

				UPDATE entidad SET atributoDeTipoNumerico = atributoDeTipoNumerico (Operacion + / -) numeroQueSumaRestaUOperaATodosLosDatos

				*/

				/*function actualizarAtrNum($datos){
					extract($datos);
					if ($condOper = "+") {
						$query = "UPDATE " + $tabla + " SET " + $atributo + " = " + $atributo + " + " + $cond
					} else if ($condOper = "-") {
						$query = "UPDATE " + $tabla + " SET " + $atributo + " = " + $atributo + " - " + $cond
					} else if ($condOper = "x") {
						$query = "UPDATE " + $tabla + " SET " + $atributo + " = " + $atributo + " * " + $cond
					} else if ($condOper = "/") {
						$query = "UPDATE " + $tabla + " SET " + $atributo + " = " + $atributo + " / " + $cond
					}
				}

				/*

			Borrar una cantidad especifica de las primeras tuplas a un mismo dato

				UPDATE entidad SET atributo = datoNuevo LIMIT numeroDeTuplasACambiar

		Borrar (DELETE).- borra datos (tupla) aunque también tablas y bases de datos

			Todos los datos de una tabla

				DELETE FROM entidad

				*/

				function borrarTabla($datos){
					extract($datos);
					$query = "DELETE FROM " + $tabla;
				}

				/*

			Todos los datos de una tupla

				DELETE FROM entidad WHERE atributo = condicion

				*/

				function borrarTupla($datos){
					extract($datos);
					$query = "DELETE FROM " + $tabla + " WHERE id = " + $id;
				}

				/*

			Borrar una cantidad especifica de las primeras tuplas

				DELETE FROM entidad LIMIT numeroDeTuplasABorrar

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


	function conectarBase(){//$data){ solo funciona si pasamos datos de la funcion desde otra funcion
		//extract($data); //solo funciona para ajax

		$usuario = $_POST["usuario"];// recibimos el nombre de usuario desde el formulario html
		$contraseña = $_POST["contraseña"];// recibimos la contraseña desde el formulario html

		$db_hostname = "localhost";//direccion de la base
		$db_database = 'baseDeDatos';//nombre de la base
		$db_username = $usuario;//usuario
		$db_password = $contraseña;//contraseña
		
		
		$db_server = mysql_connect($db_hostname, $db_username, $db_password);//creamos string con datos de conexion
		if (!$db_server) die("No puede conectar a MySQL, el error es: " . mysql_error());//creamos la conexion, si es false lanza error
		
		
		mysql_select_db($db_database)//
		or die("No se puede seleccionar la base de datos:" . mysql_error ());
		


		echo "conectado exitosamente";//se conecto exitosamente
		
	}











	// TOÑO: PATO, ESTAS NO LAS ENTIENDO, ¿CÚAL ES SU FUNCIÓN? ME LAS EXPLICAS PORFA :P

	function consulta($data){
		$query = "SELECT * FROM clasicos";
		$resultado = mysql_query($query);
		if (!$resultado) die("El acceso a la base de datos ha fallado: " . mysql_error());
	}

	function consultaConParametros($data){

	}

	// TOÑO: PATO, ESTAS NO LAS ENTIENDO, ¿CÚAL ES SU FUNCIÓN? ME LAS EXPLICAS PORFA :P









	// Datos

	function insertarDato($data){
		extract($data); 
		$array = array(
			'usuario'	 => $usuario,
			'email' 	 => $email
			);
		$query = "INSERT ";
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

	function crearBase2($data){

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


}

?>