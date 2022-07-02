<?php

function getAllPengembalian(){
  $link;

  if(isset($params)) {
    $params = $_SERVER['QUERY_STRING'];
  } else {
    $params = false;
  }


  $sqlStatement = $link->prepare("
    SELECT
  pengembalian.id_pengembalian,
  member.nama_member,
    admin.nama_admin,
  komik.judul_komik,
  pengembalian.waktu_pengembalian,
    pengembalian.status_pengembalian,
    pengembalian.kondisi,
    pengembalian.denda
FROM
    pengembalian
INNER JOIN member
    on member.id_member = pengembalian.id_member
INNER JOIN admin
    on admin.id_admin = pengembalian.id_admin
INNER JOIN komik
    ON komik.id_komik = pengembalian.id_komik
ORDER BY id_pengembalian

  ");
  $sqlStatement->execute();

  $output = new stdClass();
  $output->data = $sqlStatement->fetchall(PDO::FETCH_ASSOC);
  $output->params = $params;

  echo json_encode($output);
};