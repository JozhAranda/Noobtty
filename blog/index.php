<?php
	include("../core/connect.php");
	if(empty($_GET['post'])){ header('Location: ../'); }
	$var = $_GET['post'];
	$query = "SELECT * FROM blog_posts WHERE ident = $var";
	$post = mysql_query($query, $conection) or die(mysql_error());
	$row =  mysql_fetch_assoc($post);
?>
<!DOCTYPE html>
<html lang="es">    
    <head>
        <meta charset="utf-8">
        <title>Noobtty | <?php echo $row['title']; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php echo $row['post_short']; ?>">
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
			p{font-size:18px;padding:7px;line-height:1.3em;text-align:justify;}
			.paragraph{font-size:15px;margin-bottom:-2px;}
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
                            <li><a href="../event/">Evento</a></li>
                            <li><a href="../contacto.html">Contacto</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
		<div class="container" style="margin-top:60px;">
			<div class="panel well well-small">
				<div class="panel-heading">
					<img src="<?php echo $row['ident'].'/'.$row['image']; ?>" alt="1200x420" style="width:100%;height:500px;">
				</div>
				<h1><?php echo $row['title']; ?></h1><br/>
				<p> <?php echo $row['post_full']; ?> </p>
				<div class="fb-like" data-href="http://localhost/Noobtty/?post=<?php echo $row['ident']; ?>" data-send="true" data-width="350" data-show-faces="false"></div>
			</div>
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
						<p class="muted pull-right paragraph">© 2013 Noobtty. Todos los Derechos Reservados</p>
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
	<?php mysql_close($conection); ?>
</html>