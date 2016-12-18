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
        <script src="http://code.jquery.com/jquery-1.8.3.min.js" type="text/javascript"></script> 
	<script>

		xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
		 } 
		}
		function funcionVer(){
			$.ajax({
                          url: 'verPreguntas.php',
                          success: function(data) {
                             $('#txtHint').fadeIn().html(data);
                          },
                          type: 'GET'
                        });
		}
                function funcionVerUsuarios(){
                        xmlhttp.open("POST","verUsuarios.php",true); 
			xmlhttp.send();
                }

	</script>
</head>
<body>
 <div id='page-wrap'>

	

    <nav class='main' id='n1' role='navigation'>
        <?php
        session_start();
        if(isset($_SESSION['profesor'])){
	       echo "Bienvenido: ";
	       echo $_SESSION['user'];	
        }
        else{
	       header('Location: http://uherederosw1617.hol.es/labSeguridad/login.php');
	       exit();
        }
        ?>

	<p><a href="logout.php">Log Out</a></p>
	<p><a href="creditos.html">Creditos</a></p>
       	<p><a href="editarPregunta.php">EditarPregunta</a></p>
       	<p><a href="eliminarUsuario.php">Eliminar Usuarios nongratos</a></p>
    </nav>
    <section class="main" id="s1">
      <input type="button" value="verPreguntas" onClick="funcionVer()"/>
      <input type="button" value="Ver Usuarios" onClick="funcionVerUsuarios()"/>    
      <div id="txtHint">
      </div>
    </section>
</div>
</body>
</html>