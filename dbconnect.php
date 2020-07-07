<?php

try{
	
	$pdo = new PDO("mysql:host = localhost; dbname=tuition_media_db", "root", "Sa611ar047");

//echo "Connection Successful";
	
	}

catch(PDOException $f){
	
	echo $f->getmessage();
	
	}



?>