<!DOCTYPE html>
<html lang="es">    
    <head>
        <meta charset="utf-8">
        <title>Noobtty</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Joshua Aranda">	
        <link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon"/>
        <link rel="shortcut icon" href="../../img/favicon.ico">
        <link href="http://bootswatch.com/flatly/bootstrap.css" rel="stylesheet">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.0/css/bootstrap-responsive.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,500,500italic,700,' rel='stylesheet' type='text/css'>
		<!--[if lt IE 9]>
            <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.1/html5shiv.js"></script>
        <![endif]-->
		<link rel="stylesheet" type="text/css" media="screen" href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">

		<style>
            body{background:#f9f9f9;font-family:'Ubuntu', sans-serif;}
			textarea{resize:none;}
        </style>   
    </head> 
	<?php session_start(); if (empty($_SESSION['username'])){ header('Location: ../'); } ?>	
    <body>
		<div class="thumbnail" style="background:rgb(44, 62, 80);height:30px;box-shadow:1px 1px 12px #555;border:0;border-radius:0;">
			<a href="../logout.php" class="pull-right" style="font-weight:bold;">Logout</a>
		</div>
		<div style="margin:0;margin-top:50px;">
			<div class="span6 well well-small">
				<form accept-charset="UTF-8" action="upload.php" method="post" enctype="multipart/form-data">
					<input type="text" maxlength="125" id="title" name="title" placeholder="Type your title" class="span6" required/>
					<textarea class="span6" maxlength="255" id="post_short" name="post_short" placeholder="Type your short post" rows="4" required></textarea>
					<textarea class="span6" id="post_full" name="post_full" placeholder="Type your full post" rows="10" required></textarea>
					<select class="span6" name="tag" required>
						<option value="">Select your tag</option>
						<option value="Geek">Geek</option>
						<option value="Design_&_Dev">Design & Dev</option>
						<option value="Sciencie">Sciencie</option>
						<option value="Startup">Startup</option>
						<option value="Tech">Tech</option>
						<option value="Game">Game</option>
						<option value="App_&_Software">App & Software</option>
						<option value="Education">Education</option>
						<option value="Gadget">Gadget</option>
					</select>
					<input type="file" id="image" name="image" placeholder="Upload your image" class="span6" required/><br/><br/>	
					<button class="btn btn-info btn-block" name="submit" id="submit" type="submit">New Post</button>				
				</form>
			</div>
			<div class="span6 well well-small">
				<form accept-charset="UTF-8" action="upload.php" method="post" enctype="multipart/form-data">
					<input type="file" id="photo" name="photo[]" multiple="multiple" placeholder="Upload your photo" class="span6" required/><br/><br/>	
					<button class="btn btn-info btn-block" name="submitp" id="submitp" type="submit">New Image</button>
				</form>
			</div>
			<div class="span6 well well-small">
				<form accept-charset="UTF-8" action="upload.php" method="post" enctype="multipart/form-data">
					<input type="text" maxlength="125" id="title" name="title" placeholder="Type your title" class="span6" required/>
					<textarea class="span6" maxlength="255" id="description" name="description" placeholder="Type your description" rows="5" required></textarea>
					<textarea class="span6" id="price" name="price" placeholder="Type the price" rows="3" required></textarea>
					<input type="text" maxlength="125" id="place" name="place" placeholder="Type the place" class="span6" required/>
					<input type="text" maxlength="125" id="date" name="date" placeholder="Type the date" class="span6" required/>
					<div id="datetimepicker" class="input-append date">
						<input type="text" class="span5" data-format="yyyy-MM-dd" name="realdate" placeholder="Date of event" ></input>
						<span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
					</div>
					<input type="text" maxlength="125" id="event" name="event" placeholder="Link event" class="span6" required/>
					<input type="text" maxlength="125" id="link" name="link" placeholder="Link place" class="span6" required/>
					<br/><br/>	
					<button class="btn btn-info btn-block" name="submite" id="submite" type="submit">New Event</button>
				</form>
			</div>
			<div class="span6 well well-small">
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Title</th>
							<th>Tag</th>
							<th>Date</th>
							<th style="width:32px;"></th>
						</tr>
					</thead>
				<?php
					include("../../core/connect.php");
					$query = "SELECT * FROM blog_posts ORDER BY id DESC";
					$post = mysql_query($query, $conection) or die(mysql_error());
					while ($row =  mysql_fetch_array($post)) {
				?>
					<tbody>
						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['title']; ?></td>
							<td><?php echo $row['tag']; ?></td>
							<td><?php echo $row['date']; ?></td>
							<td>
								<a href="user.html"><i class="icon-pencil"></i></a>
								<a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
							</td>
						</tr>
					</tbody>
				<?php } ?>
				</table>
				<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h3 id="myModalLabel">Delete Confirmation</h3>
					</div>
					<div class="modal-body">
						<p class="error-text">Are you sure you want to delete the user?</p>
					</div>
					<div class="modal-footer">
						<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
						<button class="btn btn-danger" data-dismiss="modal">Delete</button>
					</div>
				</div>			
			</div>
		</div>
        <!-- Le javascript==================================================-->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.0/js/bootstrap.js"></script>  
		<script src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js"></script>
		<script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>
		<script type="text/javascript">
		  $(function() {
			$('#datetimepicker').datetimepicker({
			  pickTime: false
			});
		  });
		</script>
	</body>
</html>