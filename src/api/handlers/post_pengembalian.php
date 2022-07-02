<?php

// POST content: $_POST
// JSON POST content: file_get_contents('php://input')

function postPengembalian(){
   $link;

  $payload = json_decode(file_get_contents('php://input'));

  $sqlStatement = $link->prepare("INSERT INTO public.pengembalian(
  id_pengembalian, id_peminjaman, waktu_pengembalian, denda, status_pengembalian, kondisi, id_member, id_admin, id_komik)
  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

  $sqlStatement->execute(array(
    $payload->id_pengembalian,
    $payload->id_peminjaman,
    $payload->waktu_pengembalian,
    $payload->denda,
    $payload->status_pengembalian,
    $payload->kondisi,
    $payload->id_member,
    $payload->id_admin,
    $payload->id_komik
  ));

  $output = new stdClass();
  $output->inserted = $payload;
  $output->inserted_id = $link->lastInsertId();

  echo json_encode($output);
};