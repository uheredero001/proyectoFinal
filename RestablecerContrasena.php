<html>
<head>
        <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
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
     <section class="main" id="s1">

	<a href="layout.html">Volver</a>
	<form method="POST" id="editar" action="RestablecerContrasena.php">
		<h2>Restablecer Contraseña </h2>
			<p> Email : <input type="text" required name="email" value="" size="35"/>
			<p> Telefono : <input type="text" required name="telefono"  value="" />
			<p> Password nuevo: <input type="password" required name="passw"value="" />  
			<input type="submit" value="Modificar"/>
	</form>
     </section>
 </div>
</body>
</html>


<?php
if(isset($_POST["email"])&&isset($_POST["telefono"])&&isset($_POST['passw'])){
	$connect=mysqli_connect("mysql.hostinger.es","u906430108_u","4QYzSiq7","u906430108_quiz");
        require_once('lib/nusoap.php');
	require_once('lib/class.wsdlcache.php');
        $soapclient = new nusoap_client('http://uherederosw1617.hol.es/labWSDL/comprobar.php?wsdl', true);
	$email=$_POST["email"];
	$nuevoPass=sha1($_POST["passw"]);
        $valido=$soapclient->call('comprobar',array('x'=>$_POST["passw"]));
	$telefono=$_POST["telefono"];
	$sql="SELECT * FROM UsuariosConFoto WHERE email='$email' and telefono='$telefono'";
	$resultado=mysqli_query($connect,$sql);
	$contador=mysqli_num_rows($resultado);
	if($contador!=1){
	 	echo"Email o telefono erroneo.";
	}
	else{
		if(strlen($_POST["passw"])>6&&strstr($valido,"Valida")){
			$sql="UPDATE UsuariosConFoto SET password='$nuevoPass' WHERE email='$email'";
                        if(!mysqli_query($connect,$sql)){
				die('Error: ' .mysqli_error($connect));
			}
			echo 'Contraseña actualizada del usuario: '.$email.'.';
		}
		else{
			echo "Contraseña invalida";
		}
	}
        mysqli_close($connect);
}

?>