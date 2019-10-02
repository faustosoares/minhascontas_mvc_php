<?php

use FBMS\Contas\Entity\Compra;

require '/../Compra.php';

$compra = new Compra();
$compra->setId(1);
$compra->setDescricao("iPhone 8 Plus");
$compra->setValor(3150.52);
$compra->setNumeroParcelas(1);
$compra->setNumeroParcelasEmFaturas(1);
$data = new DateTime();
//echo $data->format('d-m-Y') . PHP_EOL;

$compra->setData($data);

//var_dump($compra);

echo $compra->getData() . PHP_EOL;

