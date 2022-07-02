<?php
	// establishing DB connection
	$host   = "localhost";
	$dbuser = "postgres";
	$dbpass = "waifu";
	$port   = "5432";
	$dbname = "komiku";
	

	// connection string (pg_connect() is native PHP method for Postgres)
	  global $dbconn;

	  $dbconn=new PDO("pgsql:dbname=$dbname;host=$host",$dbuser,$dbpass, array(PDO::ATTR_PERSISTENT => true));

	  $dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// validating DB connection
	  if(!$dbconn) {
		exit("There was an error establishing database connection");
		}

?>