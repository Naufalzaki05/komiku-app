<?php

function getAllKomik(){
  $link;

  if(isset($params)) {
    $params = $_SERVER['QUERY_STRING'];
  } else {
    $params = false;
  }


  $sqlStatement = $link->prepare("
    SELECT
  komik.id_komik,
  judul_komik,
  genre.nama_genre,
    pengarang.nama_pengarang,
    penerbit.nama_penerbit,
  komik.tahun_rilis,
    komik.jumlah,
  gudang.rak
FROM
  komik
INNER JOIN genre 
    ON komik.id_genre = genre.id_genre
INNER JOIN pengarang
    on komik.id_pengarang = pengarang.id_pengarang
inner JOIN penerbit
    on komik.id_penerbit = penerbit.id_penerbit
inner JOIN gudang
    on komik.id_komik = gudang.id_komik
ORDER BY judul_komik
  ");
  $sqlStatement->execute();

  $output = new stdClass();
  $output->data = $sqlStatement->fetchall(PDO::FETCH_ASSOC);
  $output->params = $params;

  echo json_encode($output);
};