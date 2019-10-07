<?php

	require "classes.class.php";
	
	$nome = 'welington';
	$dataNascimento = '02/05/2000';
	$peso = 70;
	$altura = 1.70;
	$cpf = '11332022928';

	$h = new pessoa ($nome, $dataNascimento, $peso, $altura, $cpf);
	echo "seu CPF é ". $h->validaCPF();
	echo "<br>";
	echo " seu imc é ". $h->calculaIMC();
	echo '<br>';
	echo "sua idade é de ". $h->calculaIdade() ." anos";