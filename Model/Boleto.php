<?php

namespace Emmanuelvitor\PaymentPhp\Model;

class Boleto extends FormaDePagamento
{


    public function valorAPagar($valor)
    {
        if ($this->getValor() != $valor){
            return "O valor que você está tentando pagar " . $valor . " é diferente do que deve ser pago que é: ". $this->getValor();
        }
        return "Valor correto";

    }

    public function operacaoDepagamento()
    {
            if($this->valorAPagar($this->getValor())){
                return "Pagamento efetuado com sucesso";
            }else{
                return "Valor a ser pago";
            }

        }
}