<html>
<head>
        <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Pagina login</title>
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
	function funcionVerPreguntas() {
           $.ajax({
             url: 'verPreguntasAlumno.php',
             success: function(data) {
                $('#txtHint').fadeIn().html(data);
             },
             type: 'GET'
             });
	}
        function VerCreditos(){
           xmlhttp.open("GET","creditos.html",true); 
           xmlhttp.send();
        }
        xmlht = new XMLHttpRequest();
	xmlht.onreadystatechange=function(){
		if (xmlht.readyState==4 && xmlht.status==200){
			document.getElementById("content").innerHTML=xmlht.responseText;
		 } 
	}
        function mostrarNPreguntas(){
             xmlht.open("GET","mostrarPreguntasUser.php",true);
             xmlht.send();
        }

    </script>
<head>
<body onload="mostrarNPreguntas()">
 <div id='page-wrap'>
    <section class="main" id="s1">
        <p><div id="txtHint"></div></p>
        <p><div id="content"></div></p>
    </section>
    <nav class='main' id='n1' role='navigation'>
         <input type="button" onClick="funcionVerPreguntas()" value="verPreguntas"/>
	 <a href="gestionarPregunta.php">Editar Pregunta</a>
	 <a href="logout.php">Log Out</a>
         <input type="button" onClick="VerCreditos()" value="Creditos"/>
    </nav>
   
 </div>
</body>
</html>


<?php
session_start();
if(isset($_SESSION['alumno'])){
	echo "Bienvenido: ";
	echo $_SESSION['user'];
        $connect=mysqli_connect("mysql.hostinger.es","u906430108_u","4QYzSiq7","u906430108_quiz");
        if ($connect) {
           $usuario=$_SESSION['user'];
 	   $sql = "SELECT * FROM Preguntas";
	   $result = mysqli_query($connect,$sql);
           $total=mysqli_num_rows($result);
           echo "<br/>";
           echo 'Preguntas totales: '.$total.'.';
           $sql = "SELECT * FROM Preguntas WHERE email='$usuario'";
	   $result = mysqli_query($connect,$sql);
           $numero=mysqli_num_rows($result);
           echo "<br/>";
           echo 'Preguntas del usuario: '.$numero.'.';
           mysqli_close($connect);
       }
}
else{
	header('Location: http://uherederosw1617.hol.es/labSeguridad/login.php');
	exit();
}
?>