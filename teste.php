<?php

use PaymentPhp\Model\TransferenciaBancaria;
require_once __DIR__ . '/vendor/autoload.php';


$pagamento = new TransferenciaBancaria("134");
//    = new CartaoDeCredito("Emmanuel", "1234567890", "1R6","145", "12");
print_r($pagamento);
print_r($pagamento->operacaoDepagamento());

