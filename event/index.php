<?php
	include("../core/connect.php");
	$query = "SELECT * FROM events ORDER BY realdate DESC";
	$post = mysql_query($query, $conection) or die(mysql_error());
?>
<!DOCTYPE html>
<html lang="es">    
    <head>
        <meta charset="utf-8">
        <title>Noobtty | Eventos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Joshua Aranda">
        <link href="http://bootswatch.com/flatly/bootstrap.css" rel="stylesheet">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.0/css/bootstrap-responsive.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,500,500italic,700,' rel='stylesheet' type='text/css'>
		<!--[if lt IE 9]>
            <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.1/html5shiv.js"></script>
        <![endif]-->
		<style>
            body{background:#ecf0f1;font-family:'Ubuntu', sans-serif;}
			h1{font-size:32px;}
			h2{font-size:28px;}
			h3{font-size:24px;}
			.paragraph{font-size:15px;margin-bottom:-2px;}
			.thumbnail{background:#f9f9f9;}
        </style> 
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button><a class="brand" href="../">Nobbtty</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li><a href="../">Inicio</a></li>
                            <!--li class="active"><a href="#about">Blog</a></li>
                            <li><a href="#cast">Cast</a></li>
                            <li><a href="#geek">Geek</a></li-->
                            <li><a href="">Evento</a></li>
                            <li><a href="../contacto.html">Contacto</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
		<div class="row-fluid" style="margin-top:60px;">
			<?php 	while ($row =  mysql_fetch_array($post)) { ?>
			<div class="thumbnail span4">
				<div class="well well-small" style="margin:0;">
					<h3><?php echo $row['title']; ?></h3>
					<p><?php echo $row['description']; ?></p>
					<hr style="margin:0;">
					<ul>
						<?php echo $row['price']; ?>
					</ul>
					<hr style="margin:0;">					
					<ul>
						<li><strong>Cuando: </strong><?php echo $row['date']; ?></li>
						<li><strong>Donde: </strong><?php echo $row['place']; ?></li>
					</ul>
					<br>
					<p class="text-center">
						<a class="btn btn-medium btn-info span6" href="<?php echo $row['event']; ?>" target="_blank"><i class="icon-ok"></i> Evento</a>
						<a class="btn btn-medium btn-info span6" href="<?php echo $row['link']; ?>" target="_blank"><i class="icon-ok"></i> Lugar</a>
					</p>
					<br>
				</div>
			</div>
			<?php } ?>
		</div>
		
		<div class="thumbnail well well-small text-center" style="margin-top:20px;">
			<h3>Suscr&iacute;base</h3>
			<p>A nuestro bolet&iacute;n semanal y esta atento a las actualizaciones.</p>
			<form action="" method="post">
				<div class="input-prepend"><span class="add-on"><i class="icon-envelope"></i></span>
					<input type="email" class="span5" id="correo" name="correo" placeholder="tu@correo.com" required/>
				</div>
				<br />
				<input type="submit" id="suscribir" name="suscribir" value="Suscríbase ahora!" class="btn btn-medium btn-success" />
			</form>
		</div>
		
	    <div class="container">
			<hr>
			<div class="well well-small row-fluid">
				<div class="span12">
					<div class="span6">
						<a href="../termsofservice.html">Terminos of Servicio</a><span style="margin-left:15px;"></span> 
						<a href="../privacypolicy.html">Privacidad</a>
					</div>
					<div class="span6">
						<p class="muted pull-right paragraph">&copy; 2013 Noobtty. Todos los Derechos Reservados</p>
					</div>
				</div>
			</div>
		</div>
        <!-- Le javascript==================================================-->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.0/js/bootstrap.js"></script> 
		<div id="fb-root"></div>
		<script>
		(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=603409329669318";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		</script>		
	</body>
	<?php //mysql_close($conection); ?>
</html>