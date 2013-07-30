<?php
header('Content-Type: text/xml'); 

error_reporting(E_ALL^E_NOTICE);
include("../../core/connect.php");

$sql = "SELECT * FROM blog_posts";
$consulta = mysql_query($sql, $conection);
  
$url = "http://noobtty.co/";  
		
echo '<?xml version="1.0" encoding="utf-8" ?>';
print '<rss version="2.0">

<channel>
	<title>Noobtty</title>
	<link>http://noobtty.co/noobtty.xml</link>
	<description>Blog sobre tecnologia, noticias, redes sociales, cultura y todo el mundo geek que esta tan emergente en estos dias</description>';
	
	while($row = mysql_fetch_array($consulta)){
		echo'<item>
			<title>'.$row["title"].'</title>
			<link>../../?post='.$row['ident'].'</link>
			<description>'.$row["post_short"].'</description>
		</item>';
	}
echo '</channel>';

echo '</rss>';

mysql_close($conection); 
?> 