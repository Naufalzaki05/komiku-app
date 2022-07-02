<?php

// POST content: $_POST
// JSON POST content: file_get_contents('php://input')

function postGudang(){
   $link;

  $payload = json_decode(file_get_contents('php://input'));

  $sqlStatement = $link->prepare("INSERT INTO public.gudang(
  id, id_admin, id_komik, rak)
  VALUES (?, ?, ?, ?)");

  $sqlStatement->execute(array(
    $payload->id,
    $payload->id_admin,
    $payload->id_komik,
    $payload->rak
  ));

  $output = new stdClass();
  $output->inserted = $payload;
  $output->inserted_id = $link->lastInsertId();

  echo json_encode($output);
};