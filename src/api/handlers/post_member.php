<?php

// POST content: $_POST
// JSON POST content: file_get_contents('php://input')

function postMember(){
   $host= "localhost";
  $port= "port=5432";
  $dbname="komiku";
  $dbuser="postgres";
  $dbpwd="waifu";

  // connection string (pg_connect() is native PHP method for Postgres)
  $link = new PDO("pgsql:dbname=$dbname;host=$host",$dbuser,$dbpwd);

  $payload = json_decode(file_get_contents('php://input'));

  $sqlStatement = $link->prepare("INSERT INTO member(
  id_member, nama_member, alamat_member, no_telepon_member)
  VALUES (?, ?, ?, ?)");

  $sqlStatement->execute(array(
    $payload->id_member,
    $payload->nama_member,
    $payload->alamat_member,
    $payload->no_telepon_member
  ));

  $output = new stdClass();
  $output->inserted = $payload;

  echo json_encode($output);
};