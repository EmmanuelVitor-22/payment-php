<?php

namespace PaymentPhp\Model;

 class TransferenciaBancaria extends FormaDePagamento
{
    private $contaDestino;
    private $valorDeTranferencia;

     public function __construct($contaDestino, $valorDeTranferencia, $valor="100" , $numeroContaDaEmpresa="")
     {
         $this->contaDestino = $contaDestino;
         $this->valorDeTranferencia = $valorDeTranferencia;
         parent::__construct($valor,$numeroContaDaEmpresa);

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
         return (($this->contaDestino == $this->getNumeroContaDaEmpresa()) &&
                 ($this->valorDeTranferencia == $this->valor));

     }

     public function operacaoDePagamento()
     {
         if ($this->validaDados()){
            return "Tranfercia efetuada. Pagamento realizado com sucesso.";
         }
         return "Erro ao tranferir/pagar a conta";

     }
 }