<?php

use PaymentPhp\Model\CartaoDeCredito;

require "vendor/autoload.php";


$pagamento = new CartaoDeCredito("Emmanuel", "1234567890","130", "123");
print_r($pagamento);

