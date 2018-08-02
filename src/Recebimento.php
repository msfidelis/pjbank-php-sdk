<?php

namespace PJBank;

use PJBank\Boleto\BoletosManager;
use PJBank\Cartao\CartaoManager;
use PJBank\Extrato\ExtratoManager;

/**
 * Class Recebimento
 * @author Matheus Fidelis
 * @email matheus.fidelis@superlogica.com
 */
class Recebimento
{

    /**
     * Credencial informada na criação da conta
     * @var string
     */
    private $credencial;

    /**
     * Chave informada na criação da conta
     * @var null
     */
    private $chave;

    /***
     * Utilzar sandbox
     * @var bool
     */
    private $sandbox;

    /**
     * Boleto Manager SDK
     * @var Boleto
     */
    public $Boletos;

    /**
     * Cartões Manager SDK
     * @var
     */
    public $Cartoes;

    /**
     * ExtratoManager SDK
     * @var
     */
    public $Extratos;

    /**
     * Conta Digital Manager SDk
     * @var
     */
    public $ContaDigital;


    /**
     * PJBank constructor
     * @param string $credencial
     * @param string $chave
     */
    public function __construct($credencial = null, $chave = null, $sandbox = false)
    {
        $this->credencial = $credencial;
        $this->chave = $chave;
        $this->sandbox = (bool)$sandbox;

        $this->constructorCartao();
        $this->constructorBoletos();
        $this->constructorExtrato();
    }

    /**
     * Constructor de Transacoes de Cartão
     */
    private function constructorCartao() {
        $this->Cartoes = new CartaoManager($this->credencial, $this->chave);
    }

    /**
     * Constructor Boletos
     */
    private function constructorBoletos() {
        $this->Boletos = new BoletosManager($this->credencial, $this->chave, $this->sandbox);
    }

    /**
     * Constructor Extrato
     */
    private function constructorExtrato() {
        $this->Extratos = new ExtratoManager($this->credencial, $this->chave, $this->sandbox);
    }

}