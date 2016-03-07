<?php




$data[usuario] = "paquito";
$data[contraseña] = "123";

$conexion = new baseDeDatos();
$conexion->conectarBase($data);


class baseDeDatos{


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


	function consulta($data){
	

		$query = "SELECT * FROM clasicos";
		$resultado = mysql_query($query);
		if (!$resultado) die("El acceso a la base de datos ha fallado: " . mysql_error());
	}


	function Insertardatos($data){
		extract($data); 
		$array = array(
			'usuario'	 => $usuario,
			'email' 	 => $email
			);
		$query = "INSERT  "

	}


	function Eliminardatos(){

	}

	function cerrarBase($data){
	
	}

	function BuscarDatos($data){

	}

	function CrearTabla($data){

	}

	function EliminarTabla($data){

	}

	function CrearCampo($data){

	}

	
	function EliminarCampo($data){

	}	

	function CrearBase($data){

	}

	function EliminarBase($data){

	}

	function ConsultasConParametros($data){

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