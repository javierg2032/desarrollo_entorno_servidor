<?php
/* si va bien redirige a principal.php si va mal, mensaje de error */
if ($_SERVER["REQUEST_METHOD"] == "POST") {  	
	 //definir un array bidimensional de tamaño
$array=array(
    array("usuario1","1234"),
    array("usuario2","2345"),
    array("usuario3","3456"),
    array("usuario4","4567"),
    array("usuario5","5678")
);

//Obtener los datos del formulario
$usuario= $_POST['usuario'];
$clave= $_POST['clave'];

//Variable para saber si las credenciales son válidas
$valida=false;
$i=0;

// Recorrer el array para validar las credenciales con while
while($i < count($array) && !$valida){
    if($array[$i][0] === $usuario && $array[$i][1] === $clave){
        $valida= true;
    }
    $i++;
}


// Redirigir dependiendo de si las credenciales son correctas o no
if ($valida) {
    header("Location: bienvenido.php");
} else {
    $err = true;
}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Formulario de login</title>		
		<meta charset = "UTF-8">
	</head>
	<body>			
		<?php if(isset($err)){
			echo "<p> Revise usuario y contraseña</p>";
		}?>
		<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST">
			<label for = "usuario">Usuario</label> 
			<input value = "<?php if(isset($_POST['usuario']))echo $_POST['usuario'];?>" 
			id = "usuario" name = "usuario" type = "text">				
			
			<label for = "clave">Clave</label> 
			<input id = "clave" name = "clave" type = "password">			
			
			<input type = "submit">
		</form>
	</body>
</html>
