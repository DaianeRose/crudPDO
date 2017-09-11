<?php


require_once '../model/bean/Cliente.php';
require_once '../model/dao/ClienteDAO.php';


$cliente = new Cliente(null,null,null);
$clienteDao = new ClienteDao();



if (isset($_REQUEST["opc"]) && $_REQUEST["opc"] == "cad") {
    
    $cliente->setNome($_POST['nome']);
    $cliente->setEmail($_POST['email']);

    $resul = $clienteDao->cadastrar($cliente);


    if($resul){
        echo "<script> alert('Cadastrado com Sucesso!') </script>"; 
        header("Location:index.php");
    }else{
        echo ('Não foi possível cadastrar!');
    }

}

if (isset($_REQUEST["opc"]) && $_REQUEST["opc"] == "del" && $_REQUEST["id"] != "") {
    $id = $_GET['id'];
    $clienteDao->excluir($id);  
}

if (isset($_REQUEST["opc"]) && $_REQUEST["opc"] == "alt" ) {
  
    $clienteDao->alterar();
    header("Location: index.php");
}



