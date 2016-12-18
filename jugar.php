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
          
	    function fcomprobar() {
                xmlhttp = new XMLHttpRequest();
	        xmlhttp.onreadystatechange=function(){
		    if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("content").innerHTML=xmlhttp.responseText;
		    } 
	        }
		var frm = document.getElementById("juego");
		xmlhttp.open("POST","comprobarRespuesta.php",true); 
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                misdatos="pregunta="+frm.elements[0].value+"&respuesta="+frm.elements[1].value;
		xmlhttp.send(misdatos);
	  }
        </script>
	</head>
	
	<body>
         <div id='page-wrap'>
             <section class="main" id="s1">
		<form method="POST" id="juego" onSubmit="return false">
			<p>Elige la pregunta: <select name="pregunta">
				<?php 
				$connect=mysqli_connect("mysql.hostinger.es","u906430108_u","4QYzSiq7","u906430108_quiz");
				$sql = mysqli_query($connect, "SELECT * FROM Preguntas");
                                $cont=0;
				while ($row = mysqli_fetch_array($sql)){
					echo "<option value='$cont'>" . $row['pregunta'] . "</option>";
                                        $cont=$cont+1;
				}
                                mysqli_close(connect);
				?>
			</select>
			<p>Tu respuesta: <input type="text" value="" name="respuesta"/>
			<p><input type="submit" value="Comprobar" onClick="fcomprobar()"/>
		</form>
              <p>Tu respuesta es: <div id="content"></div></p>
             </section>
          </div>
          <span><a href='layout.html'>Inicio</a></spam>

		
	</body>
	
</html>