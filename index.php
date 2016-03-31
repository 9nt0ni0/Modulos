<?php 

	$llamarPrincipal -> principal();
	$llamarBaseDeDatos -> baseDeDatos();

	/*
	TOÑO:El index que ingles significa indice pudiera opere asi:

		Una pantalla que pregunte por usuario y contraseña para permitir el acceso a las paginas web asi como a la base de datos

		Habiendo dado el usuario y contraseña correctos de una pantalla da un desplegado de nuestras paginas web incluyendo la nuestra

			1.- ANTONIOYPATO

			2.- WIRIKUTA (AZUL)

			3.- LALO

			4.- ISAAC

		Al haber escogido alguna de ellas junta el usuario, contraseña de la pantalla del principio 
		y el nombre de la base de datos que hemos creado para esa pagina en especifico (crearemos una base de datos por cada pagina)
		y se conecta especificamente a ella

		Muestra la pagina de inicio de la pagina seleccionada y de ahi se manipula sus cambios desde sublime text para observarse en localhost


		La arquitectura de las web pudiera ser por ejemplo en la pagina de WirikutaStudio.com de Azul:

			Wiributa
				index.php
				Diseño
					Pantallas
						Centrales
							Inicio.html
							Eventos.html
							Galeria.html
							Contacto.html
							Ubicacion.html
							Danza.html
							Fitness.html
							Introspeccion.html
							Mercado.html
							Descarga.html
						Elementos
							Cabecera.html
							Lateral.html
							Pie.html
						AutoEditor
							GeneralEdit.html(TipoDeClases, Inicio, Cabecera, Lateral, Pie, Mercado, Descarga, Estilos (CSS JS))
							EventosEdit.html(Eventos)
							GaleriaEdit.html(Galeria)
							ContactoEdit.html(Contacto)
							UbicacionEdit.html(Ubicacion)
							DanzaEdit.html(Clases)
							FitnessEdit.html(Clases)
							IntrospeccionEdit.html(Clases)
							BaseDeDatosDDLEdit.html(Base de datos(Tablas Atributos Relaciones))
							BaseDeDatosDMLEdit.html(Base de datos(Datos))
					CSS
						EstiloCSS.css
						Responsividad.css
					JS
						EstiloJS.js
				Controlador
					Intermediario.js
					Controlador.php
					BaseDeDatos.php
					Seguridad.php
					Historial.php

	*/

?>
