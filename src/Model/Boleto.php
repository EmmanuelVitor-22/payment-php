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

    private function validaCodigo(){
        return $this->codigoDeBarras = str_replace(" ", "", $this->codigoDeBarras);

    }

    /**
     * @return mixed
     */
    public function getCodigoDeBarras()
    {
        return $this->codigoDeBarras;
    }

    /**
     * @return false|string
     */
    public function getDataDeVencimento()
    {
        return $this->dataDeVencimento;
    }

    /**
     * @return false|string
     */
    public function getDataAtual()
    {
        return $this->dataAtual;
    }

    /**
     * @return mixed
     */
    public function getValorAPagar()
    {
        return $this->valorAPagar;
    }
    public function validarDados()
    {
        return (($this->validaCodigo()===44) &&
                ($this->dataAtual<=$this->dataDeVencimento) &&
               ($this->valorAPagar === $this->valor));
    }


    public function operacaoDepagamento()
    {
        if($this->validarDados()){
            return "Pagamento efetuado com sucesso";
        }else{
            return "Valor a ser pago " . $this->valor .
                    " e o valo que você disponibilizou para pagamento foi de " . $this->valorAPagar .
                    ". Por favor, disponibilize o valor correto.";
        }

    }
}