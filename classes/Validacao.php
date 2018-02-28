<?php 
	class Validacao{
		private $dados;
		private $erro = array();
		
		//seta o valor de cada campo
		public function set($valor, $nome){
			$this->dados = array("valor" => strip_tags(trim($valor)), "nome" => $nome);
			return $this;
		}	
		
		//valida campos obrigatórios
		public function obrigatorio(){
			if(empty($this->dados['valor'])){
				$this->erro[] = sprintf("Por favor, preencha o campo %s.", $this->dados['nome']);
			}
			
			return $this;
		}
		
		//valida um email
		public function isEmail(){
			//nome@servidor.com
			if(!preg_match("/^[a-z0-9_\.\-]+@[a-z0-9_\.\-]+\.[a-z]{2,4}$/i", $this->dados['valor'])){
				$this->erro[] = sprintf("O campo %s só aceita emails válidos", $this->dados['nome']);
			}
			return $this;
		}
		
		//função para validar os demais metodos
		public function validar(){
			if(count($this->erro) > 0){
				return false;
			}else{
				return true;
			}
		}
		
		//retorna os erros encontrados
		public function getErro(){
			return $this->erro;
		}
	}
