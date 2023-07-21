<?php

use PaymentPhp\Controller\MetodoDePagamento;
use PaymentPhp\Model\Boleto;
use PaymentPhp\Model\CartaoDeCredito;
use PaymentPhp\Model\TransferenciaBancaria;

require_once __DIR__ . '/vendor/autoload.php';

$pgCartaoDeCredito= new CartaoDeCredito("Emmanuel", "1234567890", "1R6","12") ;
$pgBoleto = new Boleto("150");
$pgTransferencia = new TransferenciaBancaria("1276181-8","100");


$metodo = new MetodoDePagamento();
$metodo->metodoDePagamento($pgBoleto);
$metodo->metodoDePagamento($pgTransferencia);
$metodo->metodoDePagamento($pgCartaoDeCredito);