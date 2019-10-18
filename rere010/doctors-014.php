<!-- Re-re-exam -->
<!-- <!DOCTYPE HTML> -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
	
<html>
  <head><title>test003 - L&aelig;ger i området</title>
    <h1>Re-Re doctors</h1>
	<h2><img src="edit_f2.png" alt="Vore l&aelig;ger" width="50" height="50" />Vore l&aelig;ger</h2>
 	<style>.farve1{color:red;}</style>
 </head>
  <body>
 <?php
     $db_host="lassena.dk.mysql";
     $db_user = "lassena_dk";
     $db_schema = "lassena_dk";
     $db_passwd = "LLewddku";

     $link = mysql_connect($db_host, $db_user, $db_passwd ) or die('Kunne ikke connecte til database serveren');
	 $con = mysql_select_db($db_schema, $link) or die('Kunne ikke koble op til session på databasen');

//	 if($link) { echo '<h1>Connected to MYSQL</h1>';} else { echo '<h1>MYSQL server is not connected</h1>';}
//	 if($con) { echo '<h1>Session connected on MYSQL</h1>';} else { echo '<h1>MYSQL server is not connected</h1>';}
   //  foreach 
	 $result = mysql_query("SELECT * FROM re_doctors");
	
	 ?> 
	<table border="1em">
	<thead><tr><td>did</td><td>dname</td><td>speciality</td></tr>
	</thead>
	 <?php

	 while($arr = mysql_fetch_array($result)) {
	  //echo 'Bla di bla'.$arr["did"].' '.$arr["dname"].' '.$arr["speciality"] ;
	  echo '<tr><td>'.$arr["did"].'</td><td>'.$arr["dname"].'</td><td>'.$arr["speciality"].'</td><td>-</td></tr>' ;
	 }

 ?> 
	<tfoot><tr class="farve1"><td>test013</td><td style="color:green">test014</td><td>test015</td></tr></thead>
	</table>
	
  </body>
</html>