<!-- Re-re-exam -->
<!-- <!DOCTYPE HTML> -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
	
<html>
  <head><title>test003 - Læger i området</title>
    <h1>Re-Re doctors</h1>
	<h2><img src="edit_f2.png" alt="Vore læger" width="50" height="50" />Vore læger</h2>
  </head>
  <body>dfgæsg
 <?php
     $db_host="lassena.dk.mysql";
     $db_user = "lassena_dk";
     $db_passwd = "LLewddku";

      //$link = mysql_connect(_DBserver, _DBuser, _DBpswd) or die('Kunne ikke connecte til database serveren');

	 $host="localhost";
	 //$host = "127.0.0.1";
	 //echo $host;
	 //echo '<p><b>Server:$host</b><p>';
	 $user = "root";
	 $passwd = "";
	 //$user = "rere001";
	 //$passwd = "rere001";


	if (@mysql_connect($db_host, $db_user, $db_passwd)) {
	//	if (@mysql_connect($db_host, "lassena_dk", "LLewddku")) {
    //if (@mysql_connect("lassena.dk.mysql", "lassena_dk", "LLewddku")) {
			mysql_select_db("lassena_dk");	
			echo '<h1>Connected to MYSQL</h1>';
} else {echo '<h1>MYSQL server is not connected</h1>';
}

/*
	$con=mysql_connect($host,$user,$passwd);
	 if(!$con){ echo '<h1>Connected to MYSQL</h1>';} else {<h1>MYSQL server is not connected</h1>';}
	 $user_db = "rere001";
	 $timeout = "1";
	 mysql_select_db('rere001');

	 $result = $mysql_query("SELECT * FROM doctors");
*/	 
	 
 ?> 
  </body>
</html>