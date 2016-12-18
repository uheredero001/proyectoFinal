         <?php
           session_start();
           if(isset($_SESSION['profesor'])){
              $connect=mysqli_connect("mysql.hostinger.es","u906430108_u","4QYzSiq7","u906430108_quiz");
              if ($connect) {
	        $sql = "SELECT * FROM UsuariosConFoto";
	        $result = mysqli_query($connect,$sql);
	        echo '<table border=1> <tr> <th> NOMBRE </th> <th> APELLIDOS </th> <th> EMAIL </th> <th> PASSWORD </th> <th> TELEFONO </th> 
		<th> ESPECIALIDAD </th> <th> IMAGEN </th></tr>';
    	        while($row = mysqli_fetch_array($result)) {
    		   echo '<tr> 
    		   <td><font size="3">' .$row["Nombre"]. '</td> 
    		   <td><font size="3">' .$row["Apellidos"]. '</td> 
    		   <td><font size="3">' .$row["Email"]. '</td> 
    		   <td><font size="3">' .$row["Password"]. '</td> 
    		   <td><font size="3">' .$row["Telefono"]. '</td> 
    		   <td><font size="3">' .$row["Especialidad"].'</td>
                   <td><img src="data:image/jpeg;base64,'.base64_encode($row['Imagen']).'"/></td>
    		   </tr>';
    	        }
    	    echo '</table>';
            }
            mysqli_close($connect);
         }
         else{
            header('Location: http://uherederosw1617.hol.es/labSeguridad/login.php');
         }
       ?>