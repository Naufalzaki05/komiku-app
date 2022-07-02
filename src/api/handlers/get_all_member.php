<?php

function getAllMember(){
  $host= "localhost";
  $port= "port=5432";
  $dbname="komiku";
  $dbuser="postgres";
  $dbpwd="waifu";

  // connection string (pg_connect() is native PHP method for Postgres)
  $dbconn = new PDO("pgsql:dbname=$dbname;host=$host",$dbuser,$dbpwd);
     
  if(isset($params)) {
    $params = $_SERVER['QUERY_STRING'];
  } else {
    $params = false;
  }


  $sqlStatement = $dbconn->prepare("
    SELECT * FROM member;
  ");
  $sqlStatement->execute();

  $output = new stdClass();
  $output->data = $sqlStatement->fetchall(PDO::FETCH_ASSOC);
  $output->params = $params;

  echo json_encode($output);
}

?>