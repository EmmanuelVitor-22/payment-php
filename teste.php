<?php

use PaymentPhp\Model\Boleto;
use PaymentPhp\Model\TransferenciaBancaria;
require_once __DIR__ . '/vendor/autoload.php';


//$pagamento = new TransferenciaBancaria("134");
////    = new CartaoDeCredito("Emmanuel", "1234567890", "1R6","145", "12");
//print_r($pagamento);
//print_r($pagamento->operacaoDepagamento());


$codBarras = "001 9 337370000000100 05009 401448 16060680935031";
$valorDoBoleto = "150";
$valorDePagamanento = "150";
$pg =  new Boleto($codBarras, $valorDoBoleto, $valorDePagamanento);

exit();
var_dump($pg->operacaoDepagamento());