<?php

function getAllGudang(){
  $link;

  if(isset($params)) {
    $params = $_SERVER['QUERY_STRING'];
  } else {
    $params = false;
  }


  $sqlStatement = $link->prepare("
    SELECT g.rak,count(*) as jumlah_Komik from komik k  inner join gudang g on g.id_komik = k.id_komik group by g.rak order by g.rak;
  ");
  $sqlStatement->execute();

  $output = new stdClass();
  $output->data = $sqlStatement->fetchall(PDO::FETCH_ASSOC);
  $output->params = $params;

  echo json_encode($output);
};