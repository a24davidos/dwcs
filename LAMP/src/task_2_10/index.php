<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Web Portal - Includes and requires</title>
	<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>

<!-- La diferencia entre "include" y "require", es que ambas se utiliza para añadir contenido/codigo de un archivo PHP a otro archivo PHP. 

Durante este proceso si llamamos a la función "require", y hay algun tipo de problema aparecerá un mensaje de alerta que parará de inmediato la ejecución del script, en cambio con "include", si hay cualquier tipo de error, no se parará la ejecución del script, es decir continuará el proceso. Por lo tanto "include" no da un error fatal, pero "require" si. 

"include" se utiliza cuando el archivo no es requerido y la aplicación ha de continuar funcionando aunque el archivo no se encuentre, y "require" es utilizado cuando un archivo es de uso obligatorio para la aplicación -->

<div id="header" class="container">
	<?php
	include 'logo.php';
	include 'menu.php';
	?>
</div>


<?php include 'pictures.php' ?>

<div id="page">
	<div id="bg1">
		<div id="bg2">
			<div id="bg3">
				<?php 
					include 'content.php';
					include 'sidebar.php';
				?>
			</div>
		</div>
	</div>
</div>



<?php include 'footer.php' ?>

</body>
</html>
