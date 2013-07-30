<!DOCTYPE html>
<html lang="es">    
    <head>
        <meta charset="utf-6">
        <title>Noobtty</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="http://bootswatch.com/flatly/bootstrap.css" rel="stylesheet">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.0/css/bootstrap-responsive.css" rel="stylesheet">
		<!--[if lt IE 9]>
            <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.1/html5shiv.js"></script>
        <![endif]-->
		<style>
            body{padding-top:150px;background:#f9f9f9;}
			h1{font-size:34px;}
        </style>   
    </head>
	<?php session_start(); if(!empty($_SESSION['username'])){ header('Location: admin/naked.php'); }?>
    <body>
		<div class="container" style="margin-left:23%;">
			<div class="span7 well">
				<form class="form-horizontal span6" action="admin/" method="post">
					<fieldset>
						<h1>Login</h1><br/><br/>
						<div class="control-group">
							<!-- Username -->
							<label class="control-label" for="username">Username</label>
							<div class="controls">
								<input type="text" id="username" name="username" placeholder="username" class="span4" required/>
							</div>
						</div>
						 
						<div class="control-group">
							<!-- Password-->
							<label class="control-label" for="password">Password</label>
							<div class="controls">
								<input type="password" id="password" name="password" placeholder="password" class="span4" required/>
							</div>
						</div>					 
						 
						<div class="control-group">
							<!-- Button -->
							<div class="controls">
								<input type="submit" id="submit" value="login" name="submit" class="btn btn-success btn-block" />
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
        <!-- Le javascript==================================================-->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.0/js/bootstrap.js"></script>  
	</body>
</html>