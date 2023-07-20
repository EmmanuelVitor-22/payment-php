<?php

use PaymentPhp\Model\Boleto;
use PaymentPhp\Model\CartaoDeCredito;
use PaymentPhp\Model\TransferenciaBancaria;

require_once __DIR__ . '/vendor/autoload.php';



// $pgCartaoDeCredito= new CartaoDeCredito("Emmanuel", "1234567890", "1R6","145","12") ;
//print_r($pgCartaoDeCredito->operacaoDepagamento());

//$codBarras = "0019 337370000000100 05009 401448 16060680935031";
//$valorDoBoleto = "150";
//$valorDePagamanento = "150";
//$pgBoleto =  new Boleto($codBarras, $valorDoBoleto, $valorDePagamanento);
//var_dump($pgBoleto->operacaoDepagamento());

$pgTransferencia = new TransferenciaBancaria("1276181-8","100");
var_dump($pgTransferencia->validaDados());