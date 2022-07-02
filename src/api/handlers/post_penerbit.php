<?php

// POST content: $_POST
// JSON POST content: file_get_contents('php://input')

function postPenerbit(){
   $link;

  $payload = json_decode(file_get_contents('php://input'));

  $sqlStatement = $link->prepare("INSERT INTO public.penerbit(
  id_penerbit, nama_penerbit)
  VALUES (?, ?)");

  $sqlStatement->execute(array(
    $payload->id_penerbit,
    $payload->nama_penerbit
  ));

  $output = new stdClass();
  $output->inserted = $payload;
  $output->inserted_id = $link->lastInsertId();

  echo json_encode($output);
};