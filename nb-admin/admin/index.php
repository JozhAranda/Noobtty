<?php
	error_reporting(E_ALL^E_NOTICE);
	include("../../core/connect.php");
	session_start();
	
	if(isset($_POST['submit'])){
	
		if ( !empty($_POST['username'])) $username = htmlspecialchars(stripslashes(strip_tags($_POST['username']))); else $error = true;
		if ( !empty($_POST['password'])) $password = htmlspecialchars(stripslashes(strip_tags($_POST['password']))); else $error = true;
		if ( !empty($error)) { 
			echo '<script language="JavaScript"> alert("Error al acceder"); </script>'; 
			header('Location: ../../404.html'); die; 
		}				
		
		function getRealIP() {
			if (!empty($_SERVER['HTTP_CLIENT_IP']))	return $_SERVER['HTTP_CLIENT_IP'];			   
			if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) return $_SERVER['HTTP_X_FORWARDED_FOR'];		   
			return $_SERVER['REMOTE_ADDR'];
		}

		$ip = getRealIP();
		$date = date("Y/m/d H:i:s");
				
		$sql = "INSERT INTO log(ip, date) VALUES ('$ip', '$date')";
		$insert = mysql_query($sql, $conection) or die(mysql_error());
		
		if($insert){
			$query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
			$search = mysql_query($query, $conection) or die(mysql_error());
			
			if($search){
				while($row = mysql_fetch_array($search)){
					if($username == $row['username'] && $password == $row['password']){
						$_SESSION['username'] = $username;
						header('Location: naked.php');
					}
				}
			}
			else{ 
				echo '<script language="JavaScript">
						alert("Error al intentar ingresar");
					  </script>';
				header('Location: ../'); 
			}
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