<?php
	error_reporting(E_ALL^E_NOTICE);
	include("../../core/ini-val.php");
	include("../../core/connect.php");
	
	session_start(); if (empty($_SESSION['username'])){ header('Location: ../'); }
	
	if(isset($_POST['submit'])){
	
		extract($_POST);		
		$ident = substr(str_shuffle("0123456789"), 0, 9);
		mkdir('../../blog/'.$ident."/", 0700);

		
		$date = date("Y/m/d H:i:s");
		$image = $_FILES["image"]['name'];
		move_uploaded_file($HTTP_POST_FILES['image']['tmp_name'], $ruta_destino);
		copy($_FILES['image']['tmp_name'],'../../blog/'.$ident.'/'.$_FILES['image']['name']);
				
		$sql = "INSERT INTO blog_posts(title, post_short, post_full, image, tag, date, ident) VALUES ('$title', '$post_short', '$post_full', '$image', '$tag', '$date', '$ident')";
		$insert = mysql_query($sql, $conection) or die(mysql_error());
		
		if($insert){
			echo '<script language="JavaScript">
					alert("Articulo insertado correctamente");
				  </script>';
			$post = fopen('../../blog/'.$ident.'/index.php', "w+");
			
			if($post == false)
				die("No se ha podido crear el archivo.");
			else {
    			fwrite($post,"<?php $title.'<br/><br/>'.$post_short.'<br/><br/>'.$post_full.'<br/>'.$image.'<br/>'.$tag.'<br/>'.$date.'<br/>'.$ident ?>");
    			fclose($post);		
				header('Location: ../../');
			}
		}
		else{ 
			echo '<script language="JavaScript">
					alert("Error al insertar el articulo");
				  </script>';//header('Location: ../error.html'); 
		}
	}
	elseif(isset($_POST['submitp'])){
		$date = date("Y/m/d H:i:s");
		for($i = 0; $i < count($_FILES['photo']['size']); $i++){
			$photo = $_FILES["photo"]['name'][$i];
			move_uploaded_file($HTTP_POST_FILES['photo']['tmp_name'][$i], $ruta_destino);
			copy($_FILES['photo']['tmp_name'][$i],'../../img/images/'.$_FILES['photo']['name'][$i]);

			$sql = "INSERT INTO blog_image(photo, date) VALUES ('$photo', '$date')";
			$insert = mysql_query($sql, $conection) or die(mysql_error());
		}
		if($insert){
			echo '<script language="JavaScript">
					alert("Articulo insertado correctamente");
				  </script>';
			header('Location: ../');
		}
		else{ 
			echo '<script language="JavaScript">
					alert("Error al insertar el articulo");
				  </script>';//header('Location: ../error.html'); 
		}		
	}
	elseif(isset($_POST['submite'])){
		extract($_POST);
		$sql = "INSERT INTO events(title, description, price, place, date, event, link, realdate) VALUES ('$title', '$description', '$price', '$place', '$date', '$event', '$link', '$realdate')";
		$insert = mysql_query($sql, $conection) or die(mysql_error());
		
		if($insert){
			echo '<script language="JavaScript">
					alert("Articulo insertado correctamente");
				  </script>';
			header('Location: ../');
		}
		else{ 
			echo '<script language="JavaScript">
					alert("Error al insertar el articulo");
				  </script>';//header('Location: ../error.html'); 
		}		
	}
	else{
		echo '<script language="JavaScript">
				alert("Error al enviar el articulo");
			  </script>';//header('Location: ../error.html'); 
	}
	mysql_close($conection);
?>