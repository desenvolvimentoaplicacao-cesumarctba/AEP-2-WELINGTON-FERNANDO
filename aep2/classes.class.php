<?php

class pessoa {
	
	public $nome;
	public $dataNascimento;
	public $peso;
	public $altura;
	public $cpf;
	public $validadeCpf;
	public $caractereCpf; 
	public $somaCpfA;
	public $somaCpfB;
	public $imc;
	public $idade;
	
	function __construct($nome, $dataNascimento, $peso, $altura, $cpf) 
	{
		$this->nome = $nome;
		$this->dataNascimento = $dataNascimento;
		$this->peso = $peso;
		$this->altura = $altura;
		$this->cpf = $cpf;
	}	
	
	function validaCPF() 
	{
		$cont = 0;
		$somaCpfA = 0;
		$somaCpfB = 0;
		
		//primeiro digito verificador
		for($contador = 10; $contador >= 2; $contador--)
		{
			$caractereCpf = $this->cpf[$cont];
			$somaCpfA = (($contador * $caractereCpf) + $somaCpfA);
			$cont ++;
		}
		$cont = 0;
		
		//Segundo digito verificador
		for($contador = 11; $contador >= 2; $contador--)
		{
			$caractereCpf = $this->cpf[$cont];
			$somaCpfB = (($contador * $caractereCpf) + $somaCpfB);
			$cont ++;
		}
		
		$somaCpfA = (($somaCpfA * 10) % 11);
		$somaCpfB = (($somaCpfB * 10) % 11);
			
		if (($somaCpfA == $this->cpf[9])&&($somaCpfB == $this->cpf[10]))
		{
			$validadeCpf = 'valido';
		}else{
			$validadeCpf = 'invalido';
		}
			
		return $validadeCpf;	
	}
	
	function calculaIMC() 
	{
		//$imc = ($this->peso / ($this->altura * $this->altura));
		$imc = number_format(($this->peso / ($this->altura * $this->altura)), 2, '.', ' ');
		
		if ($imc < 17){
			
			echo('Muito abaixo do peso');
			
		}else if (($imc >= 17)&&($imc <= 18.49)){
			
			echo('Abaixo do peso');
			
		}else if(($imc >= 18.50)&&($imc <= 24.99)){
			
			echo('Peso normal');
			
		}else if(($imc >= 25)&&($imc <= 29.99)){
			
			echo('Acima do peso');
			
		}else if(($imc >= 30)&&($imc <= 34.99)){
			
			echo('Obesidade I');
			
		}else if(($imc >= 35)&&($imc <= 39.99)){
			
			echo('Obesidade II (severa)');
			
		}else{
			
			echo('Obesidade III (mórbida)');
			
		}
		
		return $imc;	
	}
	
	function calculaIdade() 
	{
		list($dia, $mes, $ano) = explode('/', $this->dataNascimento);
		$hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
		$nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
		$idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
		
		return $idade;	
	}
}