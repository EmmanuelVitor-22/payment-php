<?php

namespace PaymentPhp\Controller;

use PaymentPhp\Model\Boleto;
use PaymentPhp\Model\FormaDePagamento;

require_once "vendor/autoload.php";

class MetodoDePagamento
{
    private FormaDePagamento $formaDePagamento;

    public function metodoDePagamento(FormaDePagamento $formaDePagamento){

        $this->formaDePagamento = $formaDePagamento;
        var_dump( $this->formaDePagamento->operacaoDePagamento());
    }


}