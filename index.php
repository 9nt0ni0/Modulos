<html>
<!--
	el formulario con id "conexion", manda los datos usuario y contraseña por medio del metodo oculto post
	al acrchio principal.php y a la funcion conectarBase al dar click en el boton submit

 -->
	<header>
		<title>
			Primera conexion base
		</title>
	</header>

	<body>
		<form id="conexion" action="principal.php/conectarBase" method="POST" >  

			<label>Usuario:</label>
			<input type="text" name="usuario" value="root">
			<br>
			<label>Contraseña:</label>
			<input type="password" name="contraseña" placeholder="Introduce la contraseña" >
			<br>
			<input type="submit" value="Conecta Base">


		</form>

	</body>

</html
