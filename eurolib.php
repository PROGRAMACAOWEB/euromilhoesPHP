<?php
// classe para armazenar a chave
class Chave {
	public $numeros = array();
	public $estrelas = array();
}

// classe para implementar o gerador
class Gerador {

	// a chave gerada
	public $chave;

	// parametros da geração (constantes)
	const MINN = 1;
	const MAXN = 50;
	const MINE = 1;
	const MAXE = 11;

	// quantos numeros e estrelas devem ser gerados
	private $NN;
	private $NE;


	// construtor com partâmetros com valores por defeito
	public function __construct($numn = 5,$nume = 2) {
		// instancia nova chave
		$this->chave = new Chave();
		// aramazena parâmetros de geração (quantos numeros e estrelas)
		$this->NN = $numn;
		$this->NE = $nume;

		// gera numeros
		$this->gerax($this->chave->numeros,Gerador::MINN, Gerador::MAXN, $this->NN);
		// gera estrelas
		$this->gerax($this->chave->estrelas,Gerador::MINE, Gerador::MAXE, $this->NE);

		//var_dump($this->chave);

	}

	// metodo de geracao
	// notar passar por ref o $arraychave para o poder modificar
	// dentro da funcao
	private function gerax(&$arraychave,$min,$max,$n) {
		$todosnumeros = range($min,$max);

		for($i = 0; $i < $n; $i++) {
			$indice_extrair = rand(0,count($todosnumeros)-1);

			$arraychave[] = $todosnumeros[$indice_extrair];
			$extraido = array_splice($todosnumeros,$indice_extrair,1);
		}

		sort($arraychave);
	}

 // codificaçao para JSON
	public function toJSON() {
		return json_encode($this->chave);
	}

}


?>
