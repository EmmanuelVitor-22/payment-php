<?php


namespace Emmanuelvitor\PaymentPhp\Model;


class CartaoDeCredito extends FormaDePagamento
{
    private $nomeTitular;
    private $numeroDoCartao;
    private $cvv;
    private $parcelas;
    private $juros;


    public function __construct($nomeTitular, $numeroDoCartao, $cvv, $valor, $parcelas=1,)
    {

        $this->nomeTitular = $nomeTitular;
        $this->numeroDoCartao = $numeroDoCartao;
        $this->cvv = $cvv;
        $this->parcelas = $parcelas;
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
    public function verificarDados($numeroDoCartao, $cvv)
    {
        if((strlen($numeroDoCartao) == 10) && (strlen($cvv) == 3) ){
            return "dados validos";
        }
        return "Algum dado está invalido. Verifique as informações";

    }

    public function parcelamento()
    {
        if ($this->parcelas<=6){
            return $this->valor /= $this->parcelas;

        }elseif ($this->parcelas > 6 && $this->parcelas<=12){
            $juros = ($this->valor * 0.1);
            return $this->valor /= $this->parcelas + $juros;
        }
        return "numero de parcelas excede";
    }
    public function valorAPagar($valor)
    {
        if ($this->getValor() != $valor){
            return "O valor que você está tentando pagar " . $valor . " é diferente do que deve ser pago que é: ". $this->getValor();
        }
        return "Valor correto";
    }

    public function operacaoDepagamento()
    {
        if ($this->verificarDados($this->getNumeroDoCartao(), $this->getCvv())){
            if($this->valorAPagar($this->getValor())){
                return "Pagamento efetuado com sucesso";
            }else{
                return "Valor a ser pago";
            }

        }

    }
}
