<?php


require "vendor/autoload.php";
use PaymentPhp\Model\FormaDePagamento;

class CartaoDeCredito extends FormaDePagamento
{
    private $nomeTitular;
    private $numeroDoCartao;
    private $cvv;
    private $parcelas;
    private $juros;

    public function __construct($nomeTitular, $numeroDoCartao, $cvv, $valor, $parcelas=1)
    {

        $this->nomeTitular = $nomeTitular;
        $this->numeroDoCartao = $numeroDoCartao;
        $this->cvv = $cvv;
        $this->parcelas = $parcelas;
        $this->juros = $parcelas > 6 ? 0.1 : 0;
        parent::__construct($valor) ;
    }

    public function getNomeTitular()
    {
        return $this->nomeTitular;
    }
    public function setNomeTitular($nomeTitular)
    {
        $this->nomeTitular = $nomeTitular;
    }
    public function getNumeroDoCartao()
    {
        return $this->numeroDoCartao;
    }
    public function setNumeroDoCartao($numeroDoCartao)
    {
        $this->numeroDoCartao = $numeroDoCartao;
    }
    public function getCvv()
    {
        return $this->cvv;
    }
    public function setCvv($cvv)
    {
        $this->cvv = $cvv;
    }
    public function getParcelas()
    {
        return $this->parcelas;
    }
    public function setParcelas($parcelas)
    {
        $this->parcelas = $parcelas;
    }
    public function getJuros()
    {
        return $this->juros;
    }
    public function setJuros($juros)
    {
        $this->juros = $juros;
    }

    private function validaDados()
    {
      return ((strlen($this->nomeTitular !== null or $this->nomeTitular !== "")) &&
              (strlen($this->numeroDoCartao) == 10) &&
              (strlen($this->cvv) == 3));


    }
    public function operacaoDepagamento()
    {   $valorFinalComJuros = $this->valor * (1 + $this->juros * $this->parcelas);
        if ($this->validaDados()){
            return "Pagamento com cartão de crédito de R$ " . number_format($valorFinalComJuros, 2) . " (x " . $this->parcelas . " parcelas) realizado com sucesso.";
        } else {
            return "O pagamento com cartão de crédito falhou. Por favor, verifique seus detalhes do cartão.";

        }
    }
}
