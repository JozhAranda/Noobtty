<?php
	error_reporting(E_ALL^E_NOTICE);
	include("core/connect.php");
	if(isset($_GET['post'])){ 
		$var = $_GET['post'];
		$query = "SELECT * FROM blog_posts WHERE ident = $var";
		$post = mysql_query($query, $conection) or die(mysql_error());
		$row =  mysql_fetch_assoc($post);
	}
	else {
		$query = "SELECT * FROM blog_posts ORDER BY id DESC";
		$post = mysql_query($query, $conection) or die(mysql_error());
		$query1 = "SELECT * FROM blog_image ORDER BY id ASC";
		$post1 = mysql_query($query1, $conection) or die(mysql_error());
	}
?>
<!DOCTYPE html>
<html lang="es">    
    <head>
        <meta charset="utf-8">
        <title>Noobtty <?php echo $row['title']; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php if(isset($_GET['post'])){ echo $row['post_short']; } else { echo "Awesome"; } ?>">
        <meta name="author" content="Joshua Aranda">		
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
        <link rel="shortcut icon" href="img/favicon.ico">
        <link href="http://bootswatch.com/flatly/bootstrap.css" rel="stylesheet">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.0/css/bootstrap-responsive.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,500,500italic,700,' rel='stylesheet' type='text/css'>
        <style>
			body{background:#ecf0f1;font-family:'Ubuntu', sans-serif;}
            h1{font-size:32px;}
			h2{font-size:24px;}
			.thumbnail{background:#f9f9f9;}
			#IrArriba{position:fixed; bottom:20px; right:3px;}
			#IrArriba span {width:32px; height:32px; display:block; background:url(js/arrow.png) no-repeat center center;}
			.label:hover{background:#999;}
			@media (max-width: 767px) {
			   .thumbnails { max-width: 480px; margin: 0 auto; }
			   .thumbnails > li { float: left; margin-left: 10px; width: 220px; }
			}			 
			@media (max-width: 499px) {
				.thumbnails { max-width: 100%; margin: 0;  }
				.thumbnails > li { float: none; margin-left: none; width: 100%; text-align: center; }
			}
			#rs{-webkit-border-radius:5px;-moz-border-radius:5px;border-radius:5px;background:#3b5998;}
			#rs1{-webkit-border-radius:5px;-moz-border-radius:5px;border-radius:5px;background:#00aced;}
			#rs2{-webkit-border-radius:5px;-moz-border-radius:5px;border-radius:5px;background:#fa9b39;}
        </style>
    </head>   
    <body>
		<!--div class="thumbnail" style="background:rgb(44, 62, 80);height:30px;box-shadow:1px 1px 12px #555;border:0;border-radius:0;"></div-->

		<div class="row-fluid">
			<div class="navbar-fixed-top span3 well well-small" style="background:rgb(44, 62, 80);height:100%;border-radius:0;">
				<a class="brand" href="index.php"><h1>Noobtty</h1></a>
				<ul class="nav nav-pills nav-stacked">
						<li class="active"><a href="index.php">Inicio</a></li>
						<!--li><a href="#about">Blog</a></li>
						<li><a href="#cast">Cast</a></li>
						<li><a href="#geek">Geek</a></li-->
						<li><a href="event/">Evento</a></li>
						<li><a href="contacto.html">Contacto</a></li>
				</ul>
				<hr/>
				<div class="row-fluid">
					<div class="alert alert-success span12">
						<p style="font-size:17px;line-height:1.3em;font-weight:bold;margin-bottom:-1px;">
							"Creo que todos en este país deberían de aprender a programar una computadora porque te enseña cómo pensar".
						</p>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12 text-center">
						<div class="span4" id="rs"><a href="#" target="_blank"><img src="js/facebook.png" alt="facebook"></a></div>
						<div class="span4" id="rs1"><a href="#" target="_blank"><img src="js/twitter.png" alt="twitter"></a></div>
						<div class="span4" id="rs2"><a href="blog/rss/" target="_blank"><img src="js/rss.png" alt="rss"></a></div>
					</div>
				</div><br/>
				<!--div class="row-fluid span12" style="margin:0;">
					<a class="twitter-timeline" href="https://twitter.com/SymbCo" data-widget-id="360256441015226368">Tweets por @SymbCo</a>
				</div-->
				<hr style="margin:0;">
				<div class="row-fluid span12" style="margin-top:10px;">
					<div class="span6">
						<ul class="unstyled">
							<li style="color:#fff;font-weight:bold;">Comunidades</li>
							<li><a href="https://www.facebook.com/GDGTijuana" target="_blank">GDG</a></li>
							<li><a href="http://www.tjnet.org/default.aspx" target="_blank">.NET</a></li>
							<li><a href="https://www.facebook.com/groups/gultij/" target="_blank">Gultij</a></li>
							<li><a href="https://www.facebook.com/groups/491201077566739/" target="_blank">Defcon</a></li>
						</ul>
					</div>
					<div class="span6">
						<ul class="unstyled">
							<li style="color:#fff;font-weight:bold;">Enlaces</li>
							<li><a href="http://www.awwwards.com/">Awwwards</a></li>
							<li><a href="http://dribbble.com/">Dribbble</a></li>
							<li><a href="http://startupweekend.mx/">StartupWeekend</a></li>
							<li><a href="http://thenextweb.com/">The Next Web</a></li>	
						</ul>
					</div>
				</div>
				<div class="row-fluid span12" style="margin-top:7px;">
					<div class="span12">
						<a href="termsofservice.html">Terminos de Servicio</a><span style="margin-left:15px;"></span>
						<a href="privacypolicy.html">Privacidad</a>
					</div>
					<div class="span12">
						<p class="muted" style="margin-left:-10px;">&copy; 2013 Noobtty.<br/> Todos los Derechos Reservados</p>
					</div>
				</div>
			</div>
			
			<div class="span9 pull-right">
				<?php 	if(!isset($_GET['post'])) { while ($row1 =  mysql_fetch_array($post1)) { if($aux <= 5) {?>
					<div class="thumbnail span2" style="margin-right:-4px;">
						<a href="<?php echo 'img/images/'.$row1['photo']; ?>" target="_blank"><img src="<?php echo 'img/images/'.$row1['photo']; ?>" alt="" style="height:110px;"></a>
					</div>
				<?php } $aux = $aux + 1;} }?>	
			</div>
			
			<div class="span9 pull-right">
				<ul class="thumbnails" style="margin-top:15px;">
				<?php if(isset($_GET['post'])) { ?>
					<li class="span12" style="margin-left:-12px;margin-top:-30px;">
						<div class="thumbnail">
							<a href="<?php echo 'blog/'.$row['ident'].'/'.$row['image']; ?>"><img src="<?php echo 'blog/'.$row['ident'].'/'.$row['image']; ?>" alt="" style="width:100%;height:480px;"></a>
							<h1 style="font-size:30px;"> <?php echo $row['title']; ?> </h1>
							<p style="font-size:16px;padding:7px;line-height:1.3em;text-align:justify;"> <?php echo $row['post_full']; ?> </p>
							<p class="pull-right"><i class="icon-tag"></i> <a href="#"> <?php echo $row['tag']; ?> </a> | <i class="icon-calendar"></i> <?php echo $row['date']; ?> </p>
							
							<div class="fb-like" data-href="http://localhost/Noobtty/?post=<?php echo $row['ident']; ?>" data-send="true" data-width="350" data-show-faces="false"></div>
							<br style="margin-bottom:7px;">
						</div>
					</li>
				<?php } else { ?>
				<?php 	while ($row =  mysql_fetch_array($post)) { ?>
					<li class="span6" style="margin:0;">
						<div class="thumbnail">
							<a href="?post=<?php echo $row['ident'];?>"><img src="<?php echo 'blog/'.$row['ident'].'/'.$row['image']; ?>" alt="" style="width:100%;height:225px;"></a>
							<a href="?post=<?php echo $row['ident'];?>" style="color:rgb(44, 62, 80);"><h3 style="font-size:24px;line-height:1.1em;"> <?php echo $row['title']; ?> </h3></a>
							<p> <?php echo $row['post_short']; ?> </p>
							<a href="?post=<?php echo $row['ident'];?>"><span class="label pull-left">Leer...</span></a>
							<p class="pull-right"><i class="icon-tag"></i> <a href="#"> <?php echo $row['tag']; ?> </a> | <i class="icon-calendar"></i> <?php echo $row['date']; ?> </p>
							<br style="margin-bottom:7px;">
						</div>
					</li>
				<?php } ?>
				<?php } ?>
				</ul>
				<!--hr style="margin:0;"-->
			</div>
		</div>
		<span id="finish"></span>			
		<div id='IrArriba'>
			<a href='#Arriba'><span/></a>
		</div>
        <!-- Le javascript==================================================-->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.0/js/bootstrap.js"></script>
		<script type="text/javascript" src="js/jquery-scroll.js"></script>
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
		<script>
			!function(d,s,id){
				var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
				if(!d.getElementById(id)){
					js=d.createElement(s);
					js.id=id;js.src=p+"://platform.twitter.com/widgets.js";
					fjs.parentNode.insertBefore(js,fjs);
					}
				}(document,"script","twitter-wjs");
		</script>

		<!--script>
		jQuery(document).ready(function() {
			jQuery(function () {
				jQuery(window).scroll(function () {
					if (jQuery(this).scrollTop() > 600) {			
						jQuery('#finish').load('archive/1.php');
					}
				});
			});
		});
		</script-->
	</body>
	<?php mysql_close($conection); ?>
</html>