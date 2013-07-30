<?php
	include("core/connect.php");
	$query = "SELECT * FROM blog_posts ORDER BY id DESC";
	$post = mysql_query($query, $conection) or die(mysql_error());
?>
<!DOCTYPE html>
<html lang="es">    
    <head>
        <meta charset="utf-8">
        <title>Noobtty 404</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Joshua Aranda">
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
        <link rel="shortcut icon" href="img/favicon.ico">
        <link href="http://bootswatch.com/flatly/bootstrap.css" rel="stylesheet">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.0/css/bootstrap-responsive.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,500,500italic,700,' rel='stylesheet' type='text/css'>
		<!--[if lt IE 9]>
            <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.1/html5shiv.js"></script>
        <![endif]-->
		<style>
		body{background:#f9f9f9;font-family:'Ubuntu', sans-serif;}
		.center {text-align: center; margin-left: auto; margin-right: auto; margin-bottom: auto; margin-top: auto;}
		</style>
	</head>	
	<body>
		<div class="hero-unit center">
			<h1>Page Not Found <small><font face="Tahoma" color="red">Error 404</font></small></h1>
			<br />
			<p>La p&aacute;gina solicitada no se pudo encontrar, o bien puede ponerse en contacto con su webmaster o int&eacute;ntelo de nuevo. Utilice su navegador <b>Atr&aacute;s</b> para navegar a la p&aacute;gina previa</p>
			<p><b>O simplemente puede pulsar este bot&oacute;n:</b></p>
			<a href="index.php" class="btn btn-large btn-info"><i class="icon-home icon-white"></i> Llevame a casa</a>
		</div>
		<br/>
		<div class="thumbnail">
			<center><h2>Contenido reciente:</h2></center>
		</div>
		<br/>
		<div class="row-fluid span12">
		<?php $aux=0; while ($row =  mysql_fetch_array($post)) { if($aux <= 2) {?>
			<div class="thumbnail span4">
				<h3><?php echo $row['title']; ?></h3>
				<p><?php echo $row['post_short']; ?></p>
				<img src="<?php echo 'blog/'.$row['ident'].'/'.$row['image']; ?>" style="width:100%;height:200px;"><!--Why Not Put a Picture To Celebrate Your 404-->
					<p></p>
				<a href="blog/?post=<?php echo $row['ident'];?>" class="btn btn-danger btn-block"><i class="icon-share icon-white"></i> Llevame ahi...</a>
			</div>
		<?php } $aux = $aux + 1; } ?>
		</div>
		<br/>
		<p></p>
	</body>
	<?php mysql_close($conection); ?>
</html>