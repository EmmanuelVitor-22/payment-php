<?php

namespace PaymentPhp\Model;

abstract class FormaDePagamento{
    protected $valor;
    protected $numeroContaDaEmpresa;


    public function __construct($valor="100",$numeroContaDaEmpresa="1276181-8")
    {
        $this->valor = $valor;
        $this->numeroContaDaEmpresa = $numeroContaDaEmpresa;

    }


    public function getValor()
    {
        return $this->valor;
    }
    public function setValor($valor)
    {
        $this->valor = $valor;
    }
    public function getNumeroContaDaEmpresa()
    {
        return $this->numeroContaDaEmpresa;
    }
    public function setNumeroContaDaEmpresa($numeroContaDaEmpresa)
    {
        $this->numeroContaDaEmpresa = $numeroContaDaEmpresa;
    }
    public function getNumeroAgenciaDaEmpresa()
    {
        return $this->numeroAgenciaDaEmpresa;
    }
    public function setNumeroAgenciaDaEmpresa($numeroAgenciaDaEmpresa)
    {
        $this->numeroAgenciaDaEmpresa = $numeroAgenciaDaEmpresa;
    }
    public abstract function operacaoDePagamento();

}