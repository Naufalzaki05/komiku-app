<?php

// POST content: $_POST
// JSON POST content: file_get_contents('php://input')

function postPengarang(){
   $link;

  $payload = json_decode(file_get_contents('php://input'));

  $sqlStatement = $link->prepare("INSERT INTO public.pengarang(
  id_pengarang, nama_pengarang)
  VALUES (?, ?)");

  $sqlStatement->execute(array(
    $payload->id_pengarang,
    $payload->nama_pengarang
  ));

  $output = new stdClass();
  $output->inserted = $payload;
  $output->inserted_id = $link->lastInsertId();

  echo json_encode($output);
};