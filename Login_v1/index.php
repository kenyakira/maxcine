<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form method="POST" class="login100-form validate-form">
					<span class="login100-form-title">
						Iniciar sesión
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="txtemail" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="txtpass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button name="accion" value="insertar" class="login100-form-btn">
							Ingresar
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">¿Olvidó su nombre de
						</span>
						<a class="txt2" href="#">
							usuario / contraseña?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="#">
							Crea una cuenta
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
		
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>

	<?php

if(isset($_POST['accion'])){
$link=mysqli_connect("localhost","root","",'clientes');

$pass=$_POST['txtpass'];
$codigo=$_POST['txtemail'];

switch ($_POST["accion"]) {
    case "insertar" :
        $sql="insert into usuarios(Email,Contraseña) values ('$pass')";
    break;
  case "actualizar":
       $sql="update usuarios set Contraseña='$pass' where codigo='$codigo'";
    break;
  case "eliminar":  
      
      $sql="delete from usuarios where codigo='$codigo'";
    break;
    
}
    $result=mysqli_query($link,$sql);
    echo "Bienvenido Usuario";
    $registro=mysqli_query($link,"select * from usuarios");
    echo "<table border='1'>";
    while($row=mysqli_fetch_row($registro))
    echo "<tr>
           <td>$row[0]</td>
       <td>$row[1]</td>
       <td>$row[2]</td>
       <td>$row[3]</td>
       <td>$row[4]</td>
       <td>$row[5]</td>
    </tr>";
    echo "</table>";
}

?>
         