<html>

	<header>

		<title>Conectado a la base</title>

	</header>

	<body>

		<h1>INGRESA EL USUARIO Y CONTRASEÑA PARA PODER INGRESAR</h1>

		<form id="usuario_contraseña" method="POST" action="principal.php"> 

			<input type="text"  name="usuario" placeholder="Usuario"><br>
			<input type="text"  name="contraseña" placeholder="Contraseña"><br>
			<input type="submit" value="Ingresar" >

		</form><br>

		<h1>PAGINAS WEB CREADAS POR ANTONIO Y PATO</h1>

		<a>AntonioYPato</a>
		<a>Wirikuta</a>
		<a>Lalo</a>
		<a>Isaac</a>

		<br><br><br><br><br>

		<h3>Estas conectado a tu base de datos selecciona la accion a realizar</h3>

		<form id="consulta_tabla"> 

			<h4>Consulta datos de una tabla</h4>
			<input type="text"  name="tabla" placeholder="nombre de la tabla">
			<input type="submit" value="Consultar" >

		</form>

		<!--$usuario = $_POST["usuario"];// recibimos el nombre de usuario desde el formulario html
		//$contraseña = $_POST["contraseña"];// recibimos la contraseña desde el formulario html -->


		<form id="datos_a_tabla"> 

			<p>Proximamente</p>

		</form>


		<form id="crea_tabla"> 

			<p>Proximamente</p>

		</form>

	</body>
	
</html>