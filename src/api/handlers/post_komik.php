<?php

// POST content: $_POST
// JSON POST content: file_get_contents('php://input')

function postKomik(){
   $link;

  $payload = json_decode(file_get_contents('php://input'));

  $sqlStatement = $link->prepare("INSERT INTO public.komik(
  id_komik, id_genre, id_pengarang, id_penerbit, judul_komik, tahun_rilis, jumlah)
  VALUES (?, ?, ?, ?, ?, ?, ?)");

  $sqlStatement->execute(array(
    $payload->id_komik,
    $payload->id_genre,
    $payload->id_pengarang,
    $payload->id_penerbit,
    $payload->judul_komik,
    $payload->tahun_rilis,
    $payload->jumlah
  ));

  $output = new stdClass();
  $output->inserted = $payload;
  $output->inserted_id = $link->lastInsertId();

  echo json_encode($output);
};