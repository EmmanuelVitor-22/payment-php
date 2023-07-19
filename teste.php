<?php

require "vendor/autoload.php";
use Emmanuelvitor\PaymentPhp\Model\CartaoDeCredito;



$pagamento = new CartaoDeCredito("Emmanuel", "1234567890","130", "123");
print_r($pagamento);
