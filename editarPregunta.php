<html>
<head>
       <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Preguntas</title>
        <link rel='stylesheet' type='text/css' href='style/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='style/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='style/smartphone.css' />
	
</head>
<body> 
<div id='page-wrap'>
        <header class='main' id='h1'>
        <span><a href='paginaProfesor.php'>Atras</a></spam>
        </header>
        <nav class='main' id='n1' role='navigation'>
	<form method="POST" id="editar" action="editarPregunta.php">
		<h2>Edicion de pregunta </h2>
			<p> Codigo Pregunta : <input type="text" required name="codigo" value="" />
			<p> Pregunta : <input type="text" required name="pregunta"  value="" />
			<p> Respuesta: <input type="text" required name="respuesta"value="" /> 
			<p> Comprejidad: <select name="complejidad">
  				<option value="1">1</option> 
  				<option value="2" selected>2</option>
  				<option value="3">3</option>
  				<option value="4">4</option>
  				<option value="5">5</option>
			</select> 
			<p><input type="submit" value="Modificar"/>
	</form>
	</nav>
</div>
</body>
</html>
<?php
session_start();
if(!isset($_SESSION['profesor'])){
	header('Location: http://uherederosw1617.hol.es/labSeguridad/login.php');
	exit();	
}
else
{	
if(isset($_POST['codigo'])){
	$codigo=$_POST['codigo'];
	$pregunta=$_POST['pregunta'];
	$respuesta=$_POST['respuesta'];
	$complejidad=$_POST['complejidad'];
	$connect=mysqli_connect("mysql.hostinger.es","u906430108_u","4QYzSiq7","u906430108_quiz");
	$sql="SELECT * FROM Preguntas WHERE Numero='$codigo'";
	$resultado=mysqli_query($connect,$sql);
	
	$contador=mysqli_num_rows($resultado);	
	if($contador!=1){
	 	echo "Codigo pregunta erroneo.";
	}
	else{
		if(strlen($pregunta)<3||strlen($respuesta)==0||strlen($complejidad)==0){
			echo "Falta algun dato.";
		}
		else{
			$sql="UPDATE Preguntas SET pregunta='$pregunta',respuesta='$respuesta', 
			complejidad='$complejidad' WHERE Numero='$codigo'";
			if(!mysqli_query($connect,$sql)){
				die('Error: ' .mysqli_error($connect));
			}
			else{
				echo "Pregunta $codigo actualizada correctamente";
			}
		}
	}
}
}
	

?>