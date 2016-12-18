<?php
if(isset($_POST['respuesta'])){
	$connect=mysqli_connect("mysql.hostinger.es","u906430108_u","4QYzSiq7","u906430108_quiz");
	$sql = mysqli_query($connect, "SELECT * FROM Preguntas");
	$resultado="Incorrecta";
        $cont=$_POST['pregunta']+1;
	while ($cont>0&&($row = mysqli_fetch_array($sql))){
            $cont=$cont-1;
	}
        if(strcmp($row["respuesta"],$_POST['respuesta'])==0){
       		$resultado="Correcta";
        }
	echo $resultado;
        mysqli_close($connect);
}
?>