<?php

namespace PaymentPhp\Model;

class Boleto extends FormaDePagamento
{
    private $codigoDeBarras;
    private $dataDeVencimento;
    private  $dataAtual;
    private  $valorAPagar;

    public function __construct($codigoDeBarras,  $dataDeVencimento, $valor, $valorAPagar)
    {
        $this->codigoDeBarras = $codigoDeBarras;
        $this->dataAtual = date("d/m/Y");
        $this->dataDeVencimento = date("d/m/Y", strtotime("+1 month"));
        parent::__construct($valor);
        $this->valorAPagar=$valorAPagar;
    }

    public function validarDados()
    {
        return ((strlen($this->codigoDeBarras))===44) &&
                ($this->dataAtual<=$this->dataDeVencimento) &&
                ($this->valorAPagar==$this->valor);
    }
    public function valorAPagar()
    {
        if ($this->valorAPagar != $this->valor){
            return "O valor que você está tentando pagar " . $this->valorAPagar . " é diferente do que deve ser pago que é: ". $this->valor;
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