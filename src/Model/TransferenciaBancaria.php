<?php

namespace PaymentPhp\Model;

 class TransferenciaBancaria extends FormaDePagamento
{
    private $contaDestino;
    private $valorDeTranferencia;

     public function __construct($contaDestino, $valorDeTranferencia)
     {
         $this->contaDestino = $contaDestino;
         $this->valorDeTranferencia = $valorDeTranferencia;
         parent::__construct();

     }
     public function getContaDestino()
     {
         return $this->contaDestino;
     }
     public function setContaDestino($contaDestino)
     {
         $this->contaDestino = $contaDestino;
     }
     public function getValorDeTranferencia()
     {
         return $this->valorDeTranferencia;
     }
     public function setValorDeTranferencia($valorDeTranferencia)
     {
         $this->valorDeTranferencia = $valorDeTranferencia;
     }

     public function validaDados()
     {
         return (($this->contaDestino == $this->contaDestino) &&
                 ($this->valorDeTranferencia == $this->valor));

     }

     public function operacaoDePagamento()
     {
         if ($this->validaDados()){
            return "Pagamento por Tranfercia Bnacaria efetuado com sucesso.";
         }
         return "Erro ao tranferir/pagar a conta";

     }
 }