<?php

namespace PaymentPhp\Model;

class Boleto extends FormaDePagamento
{
    private $codigoDeBarras;
    private $dataDeVencimento;
    private  $dataAtual;
    private  $valorAPagar;

    public function __construct($codigoDeBarras, $valor, $valorAPagar)
    {
        $this->codigoDeBarras = $codigoDeBarras;
        $this->dataAtual = date("d/m/Y");
        $this->dataDeVencimento = date("d/m/Y", strtotime("+1 month"));
        parent::__construct($valor);
        $this->valorAPagar=$valorAPagar;
    }
    public function getCodigoDeBarras()
    {
        return $this->codigoDeBarras;
    }

    public function getDataDeVencimento()
    {
        return $this->dataDeVencimento;
    }

    public function getDataAtual()
    {
        return $this->dataAtual;
    }

    public function getValorAPagar()
    {
        return $this->valorAPagar;
    }
    private function validaCodigo(){
        return str_replace(" ", "",$this->codigoDeBarras);
    }
    private function validarDados()
    {
        return ((strlen($this->validaCodigo())===44) &&
                ($this->dataAtual<=$this->dataDeVencimento) &&
                ($this->valorAPagar === $this->valor));
    }

    public function operacaoDepagamento()
    {
        if($this->validarDados()){
            return "Pagamento por Boleto efetuado com sucesso";
        }else{
            return "Houve algum problema e o pagamento por Boleto não efetuado com sucesso.";
//                "Valor a ser pago " . $this->valor .
//                    " e o valo que você disponibilizou para pagamento foi de " . $this->valorAPagar .
//                    ". Por favor, disponibilize o valor correto.";
        }
    }
}