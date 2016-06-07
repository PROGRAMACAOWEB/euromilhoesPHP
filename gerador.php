<?php

// inclui biblioteca de classes
include_once('eurolib.php');

// quantos numeros e estrelas (por defeito)
$nn = 5;
$ne = 2;

// se estão deginidos como variáveis na URL
if (isset($_GET['nn'])) {
  $nn = $_GET['nn'];
}

if (isset($_GET['ne'])) {
  $ne = $_GET['ne'];
}

// instancia o gerador (que automaticamente gera uma chave)
$gera = new Gerador($nn,$ne);

// converte a chave para JSON
$chavejson = $gera->toJSON();

// faz output da chave em json
echo $chavejson;

?>
