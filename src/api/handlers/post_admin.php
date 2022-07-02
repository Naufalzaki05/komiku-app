<?php

// POST content: $_POST
// JSON POST content: file_get_contents('php://input')

function postAdmin(){
   $link;

  $payload = json_decode(file_get_contents('php://input'));

  $sqlStatement = $link->prepare("INSERT INTO public.admin(
  id_admin, nama_admin, username_admin, pass_admin, alamat_admin, no_telepon)
  VALUES (?, ?, ?, ?, ?, ?)");

  $sqlStatement->execute(array(
    $payload->id_admin,
    $payload->nama_admin,
    $payload->username_admin,
    $payload->pass_admin,
    $payload->alamat_admin,
    $payload->no_telepon
  ));

  $output = new stdClass();
  $output->inserted = $payload;
  $output->inserted_id = $link->lastInsertId();

  echo json_encode($output);
};