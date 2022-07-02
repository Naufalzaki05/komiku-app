<?php

// POST content: $_POST
// JSON POST content: file_get_contents('php://input')

function postGenre(){
   $link;

  $payload = json_decode(file_get_contents('php://input'));

  $sqlStatement = $link->prepare("INSERT INTO public.genre(
  id_genre, nama_genre)
  VALUES (?, ?)");

  $sqlStatement->execute(array(
    $payload->id_genre,
    $payload->nama_genre
  ));

  $output = new stdClass();
  $output->inserted = $payload;
  $output->inserted_id = $link->lastInsertId();

  echo json_encode($output);
};