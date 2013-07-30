<?php
	error_reporting(E_ALL^E_NOTICE);
	include("../core/connect.php");
	
	if(isset($_POST['submit'])){	
		if ( !empty($_POST['name'])) $name = htmlspecialchars(stripslashes(strip_tags($_POST['name']))); else $error = true;
		if ( !empty($_POST['lastname'])) $lastname = htmlspecialchars(stripslashes(strip_tags($_POST['lastname']))); else $error = true;
		if ( !empty($_POST['email'])) $email = htmlspecialchars(stripslashes(strip_tags($_POST['email']))); else $error = true;
		if ( !empty($_POST['subject'])) $subject = htmlspecialchars(stripslashes(strip_tags($_POST['subject']))); else $error = true;
		if ( !empty($_POST['message'])) $message = htmlspecialchars(stripslashes(strip_tags($_POST['message']))); else $error = true;
		if ( !empty($error)) { 
			echo '<script language="JavaScript"> alert("Error al acceder"); </script>'; 
			header('Location: ../404.html'); die; 
		}				
		
		$date = date("Y/m/d H:i:s");
				
		$sql = "INSERT INTO contact(name, lastname, email, subject, message, date) VALUES ('$name', '$lastname', '$email', '$subject', '$message','$date')";
		$insert = mysql_query($sql, $conection) or die(mysql_error());
		
		if($insert){ ?>
			<!DOCTYPE html>
			<html lang="es">    
				<head>
					<meta charset="utf-6">
					<title>Noobtty 404</title>
					<meta name="viewport" content="width=device-width, initial-scale=1.0">
					<meta http-equiv="refresh" content="3;url=../">
					<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon"/>
					<link rel="shortcut icon" href="../img/favicon.ico">
					<link href="http://bootswatch.com/flatly/bootstrap.css" rel="stylesheet">
					<link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.0/css/bootstrap-responsive.css" rel="stylesheet">
					<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,500,500italic,700,' rel='stylesheet' type='text/css'>
					<style>
					body{background:#f9f9f9;font-family:'Ubuntu', sans-serif;margin-top:100px;}
					</style>
				</head>
				<body>
					<div class="container">
						<div class="hero-unit">
							<h2>Muchas gracias!</h2>
							<h3>Todas tus sugerencias serán tomadas en cuenta.</h3>
							<p><a href="../" class="btn btn-primary btn-medium"><i class="icon-home icon-white"></i>Vamos a casa.</a></p>
						</div>
					</div>
				</body>
		<?php }
		else{ 
			echo '<script language="JavaScript">
					alert("Error al intentar ingresar");
				  </script>';
			header('Location: ../'); 
		}
	}
	else{
		echo '<script language="JavaScript">
				alert("Error al intentar ingresar");
			  </script>';
		header('Location: ../'); 
	}
	mysql_close($conection);
?>