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

	<script>
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
		 } 
	}
        function loguearse(){
		xmlhttp.open("POST","login.php",true); 
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send();
	}
	</script>
<head>
<body>
 <div id='page-wrap'>
  <section class="main" id="s1">
    <form method="post" accept-charset="UTF-8"> 
	<h2>IdentificacioÃÅn de usuario </h2>
		<p> Email : <input type="email" required name="email"  value="" size="35"/>
		<p> Password: <input type="password" required name="password" value="" /> 
		<p> <input type="submit" value="Entrar" onClick="loguearse()"/>
    </form>
    <br/>
    <p><span><a href='layout.html'>Inicio</a></spam></p>
    <p><span><a href='RestablecerContrasena.php'>øHas olvidad tu contraseÒa?</a></spam></p>
    <div id="txtHint"></div>
  </section>
</div>
</body>
</html>
<?php
session_start();
$connect=mysqli_connect("mysql.hostinger.es","u906430108_u","4QYzSiq7","u906430108_quiz");
if(isset($_POST["email"])&&isset($_POST["password"])){
	if ($connect) {
                $bloqueado="no";
		$email=$_POST["email"];
		$password=sha1($_POST["password"]);
		$sql="SELECT * FROM UsuariosConFoto WHERE email='$email' and password='$password'";
		$resultado=mysqli_query($connect,$sql);
		$contador=mysqli_num_rows($resultado);
		if($contador==1){
			$_SESSION['user']=$email;
			$_SESSION['passw']=$password;
			if(strcmp($email,"web000@ehu.es")==0){
                                $_SESSION['profesor']="profesor";
				header('Location: http://uherederosw1617.hol.es/labSeguridad/paginaProfesor.php');
			}
			else{
			      $_SESSION['alumno']="alumno";
                              header('Location: http://uherederosw1617.hol.es/labSeguridad/PaginaLogin.php');
			}
		}
		else{
			echo"DATOS INCORRECTOS.";
 
		}

		mysqli_close($connect);
	}
}
?>