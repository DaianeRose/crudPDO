<?php

require_once 'Conexao.php';
require_once 'Cliente.php';
$conexao = new Conexao();

class ClienteDAO {
    
    public function __construct() {
        $this->conn = new Conexao();
        $this->pdo = $this->conn->conectar();
    }
    
    public function cadastrar(Cliente $cliente){
        try{
            $stmt = $this->pdo->prepare('INSERT INTO usuario (nome, email) VALUES (:nome, :email)');
            $param = array(':nome'=> $cliente->getNome(),
               ':email'=> $cliente->getEmail() );
            return $stmt->execute($param);
        } catch (Exception $ex) {
            echo "Erro: {$ex->getMessage()}";
        }
    }
    
    public function listar(){   
        try{   
        
            $stmt = $this->pdo->prepare('SELECT * FROM usuario');   
            $stmt->execute();   
            $dados =  $stmt->fetchAll(PDO::FETCH_OBJ);   
            return $dados;   
        }catch(PDOException $ex){   
            echo "Erro: {$ex->getMessage()}";
        }   
    }   
    
   
    public function alterar(){
 
       $id = $_POST['id'];
       $nome = $_POST['nome'];
       $email = $_POST['email']; 
            
     // if(empty($nome) || empty($email)) {    
       try{   
           
         $stmt = $this->pdo->prepare("UPDATE usuario SET nome=:nome, email=:email WHERE id=:id");
         $dados = $stmt ->execute(array(':id' => $id, ':nome' => $nome, ':email' => $email));
         
         return   $dados;
          header("Location: index.php");
        
        } catch (PDOException $ex) {
            echo "Erro: {$ex->getMessage()}";
        }
      }  
   // }
    
    
//public function alterar($id){
//    try {
//        $stmt =  $this->pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
//        $stmt->bindParam(1, $id, PDO::PARAM_INT);
//        if ($stmt->execute()) {
//            $rs = $stmt->fetch(PDO::FETCH_OBJ);
//            $id = $rs->id;
//            $nome = $rs->nome;
//            $email = $rs->email;
//        } else {
//            throw new PDOException("Erro: Não foi possível executar a declaração sql");
//        }
//    } catch (PDOException $erro) {
//        echo "Erro: ".$erro->getMessage();
//    }
//}
    
    public function excluir($id){
       try{   
           $id = $_GET['id'];
           $stmt = $this->pdo->prepare("DELETE FROM usuario WHERE id=:id");
           $stmt ->execute(array(':id' => $id));
 
           header("Location:index.php");
       } catch (PDOException $ex) {
              echo "Erro: {$ex->getMessage()}";
       }
        
    }
    
    public function  getCliente($id){
        
         try{   
        
            $stmt = $this->pdo->prepare('SELECT * FROM usuario WHERE id= :id');   
            $stmt->execute(array(':id' => $id));   
            $cliente =  $stmt->fetchAll(PDO::FETCH_OBJ);   
            return $cliente;   
        }catch(PDOException $ex){   
            echo "Erro: {$ex->getMessage()}";
        }   

    }
     
      
}
