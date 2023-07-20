<?php

namespace PaymentPhp\Model;

class TransferenciaBancaria extends FormaDePagamento
{
    public function __construct($valor)
    {
        parent::__construct($valor);
    }
    public function operacaoDePagamento()
    {
        return "Conect";
    }
}