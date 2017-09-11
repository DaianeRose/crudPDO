<?php

class Conexao{

    private $usuario;
	private $senha;
	private $banco;
	private $servidor;
	public $pdo;
	
	
	public function conectar(){
		
	   $this->servidor = "localhost";
	   $this->banco = "crud-pdo";
	   $this->usuario = "root";
	   $this->senha = "";
		
		try {
           $this->pdo = new PDO("mysql:host=".$this->servidor.";dbname=".$this->banco, $this->usuario, $this->senha);
           $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		   if(!$this->pdo){
			  echo "Erro na Conexao!"; 
		   }
		   
		   return $this->pdo;
		   
      } catch(PDOException $e) {
           echo 'ERROR: ' . $e->getMessage();
      }
		
	
		
	}
}	
	
?>