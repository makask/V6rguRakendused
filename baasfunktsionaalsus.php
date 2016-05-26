<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// alusta sessiooniga, et oleks võimalik kasutaja sisselogimist meeles pidada erinevatel lehtedel
session_start();

// andmebaasi muutujad
$mysql_server = 'localhost';
$mysql_andmebaas = 'ladu';
$mysql_kasutaja = 'ladu';
$mysql_parool = 'djd82jds';

// loo ühendus andmebaasiga
$abyhendus = new mysqli($mysql_server, $mysql_kasutaja, $mysql_parool, $mysql_andmebaas);

// logi kasutaja välja, kui minnakse aadressile ?logivalja=1
if (isset($_GET['logivalja'])) {
  logi_kasutaja_valja();
}

// kontrolli, kas kasutaja on sisse logitud
function kas_kasutaja_sisse_logitud() {
  if (isset($_SESSION['kasutaja_id'])) {
    return true;
  }
  else {
    return false;
  }
}

// logi kasutaja sisse
function logi_kasutaja_sisse($kasutaja, $parool) {
  global $abyhendus;

  if ($vastus = mysqli_query($abyhendus, "select kasutaja_id from `kasutajad` where kasutajanimi = '" . $kasutaja . "' and parool = '" . $parool . "'")) {
    $kasutaja_id = mysqli_fetch_array($vastus);
    if (isset($kasutaja_id[0])) {
      $_SESSION['kasutaja_id'] = $kasutaja_id[0];
      $_SESSION['kasutajanimi'] = $kasutaja;
      return true;
    }
    else {
      return false;
    }
  }
}

// logi kasutaja välja
function logi_kasutaja_valja() {
  if (isset($_SESSION['kasutaja_id'])) {
    unset($_SESSION['kasutaja_id']);
    unset($_SESSION['kasutajanimi']);
  }
}

//
function loo_konto($kasutaja, $parool) {
  global $abyhendus;

  if ($vastus = mysqli_query($abyhendus, "insert into `kasutajad` (kasutajanimi, parool) values('" . $kasutaja . "', '" . $parool . "')")) {
    return logi_kasutaja_sisse($kasutaja, $parool);
  }
  else {
    return false;
  }
}

// väljasta kogu esemete nimekiri massiivina
function lao_nimekiri() {
  global $abyhendus;
  $out = array();

  if ($vastus = mysqli_query($abyhendus, "select eseme_id, eseme_nimi, kogus from `esemed`")) {
    while ($row = mysqli_fetch_assoc($vastus)) {
      $out[] = $row;
    }
    return $out;
  }
}

// muuda eseme kogust andmebaasis
function muuda_eseme_kogust($eseme_id, $kogus) {
  global $abyhendus;

  if ($vastus = mysqli_query($abyhendus, "update esemed set kogus = " . $kogus . " where eseme_id = " . $eseme_id)) {
    return true;
  }
  else {
    return false;
  }
}

function lisa_uus_ese($eseme_nimi, $eseme_kogus) {
  global $abyhendus;

  if ($vastus = mysqli_query($abyhendus, "insert into `esemed` (eseme_nimi, kogus) values('" . $eseme_nimi . "', '" . $eseme_kogus . "')")) {
    return true;
  }
  else {
    return false;
  }
}
