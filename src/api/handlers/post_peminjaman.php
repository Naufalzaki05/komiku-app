<?php

// POST content: $_POST
// JSON POST content: file_get_contents('php://input')

function postPeminjaman(){
   $link;

  $payload = json_decode(file_get_contents('php://input'));

  $sqlStatement = $link->prepare("INSERT INTO public.peminjaman(
  id_peminjaman, id_admin, id_komik, id_member, waktu_peminjaman, jatuh_tempo)
  VALUES (?, ?, ?, ?, ?, ?)");

  $sqlStatement->execute(array(
    $payload->id_peminjaman,
    $payload->id_admin,
    $payload->id_komik,
    $payload->id_member,
    $payload->waktu_peminjaman,
    $payload->jatuh_tempo
  ));

  $output = new stdClass();
  $output->inserted = $payload;
  $output->inserted_id = $link->lastInsertId();

  echo json_encode($output);
};