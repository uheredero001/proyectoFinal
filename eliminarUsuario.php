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
        <header class='main' id='n1' role="navigation">
           <span><a href='paginaProfesor.php'>Atras</a></spam>
        </header>
       <section class="main" id="s1">
	<form method="POST" id="eliminar" action="eliminarUsuario.php">
		<h2>Eliminar Usuario </h2>
			<p> Email del usuario : <input type="text" required name="usuario" value="" />
			<p><input type="submit" value="Eliminar"/>
	</form>
	</section>
        <footer class='main' id='f1'>
        <?php
        session_start();
        if(!isset($_SESSION['profesor'])){
            header('Location: http://uherederosw1617.hol.es/labSeguridad/layout.html');
            exit();
        }
        else{
            if(isset($_POST['usuario'])){
                $connect=mysqli_connect("mysql.hostinger.es","u906430108_u","4QYzSiq7","u906430108_quiz");
	        if ($connect) {
                    $email=$_POST["usuario"];
		    $sql="SELECT * FROM UsuariosConFoto WHERE email='$email'";
		    $resultado=mysqli_query($connect,$sql);
		    $contador=mysqli_num_rows($resultado);
		    if($contador==1){
                          $sql="DELETE FROM UsuariosConFoto WHERE email='$email'";
                          mysqli_query($connect,$sql);
                          $sql="DELETE FROM Preguntas WHERE email='$email'";
                          mysqli_query($connect,$sql);
                          echo 'Usuario '.$email.' eliminado.';
                    }
                    else{
                        echo 'No se encuentra ningun usuario con el email: '.$email.'.';
                    }
                    mysqli_close($connect);
                 }
             }
         }
         ?>
         </footer>



</div>
</body>
</html>