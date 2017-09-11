<?php 

require_once './Cliente.php';
require_once './ClienteDao.php';

$cliente = new Cliente(null, null, null);
$dao = new ClienteDAO();

//$cliente->getId($_GET['id']);

$getCliente = $dao->getCliente($_GET['id']);


 foreach ($getCliente  as $value):
     $id = $value->id;
     $nome = $value->nome;
     $email = $value->email;
 endforeach;


?>

<html>
    <head>
        <meta charset="UTF-8">
           <script src="jquery-3.2.1.min.js" type="text/javascript"></script>
        <script  src="jquery.validate.js" type="text/javascript"></script>
        
        <script type="text/javascript">
			
	$(document).ready(function(){

                $("#cadastro").validate({
                  
                    rules: {
                        nome:{
	                    required: true,
		        } ,
                        email: {
                            required: true,
                            email: true
                        }
                    },
                    messages: {
                        nome: {
			    required: "Campo Obrigatório"
			},
                        email: {
                            required: "Digite o seu e-mail para contato",
                            email: "Digite um e-mail válido",
                       }
                   }
               });
             });
      </script>
        <title></title>
    </head>
    <body>
        

        <form action="ClienteController.php?opc=alt" method="post">
        <fieldset>
         <legend>Dados Pessoais</legend>
         
         <a href="index.php">voltar</a><p>
         
         <table cellspacing="10">
          <tr>
            
          <input type="hidden" name="id" value="<?= $id ?> " >

           <td>
            <label for="nome">Nome: </label>
           </td>
           <td align="left">
               <input type="text" name="nome" value="<?= $nome  ?>">

           </td>
           <td>
            <label for="idade">Email: </label>
           </td>
           <td align="left">
               <input type="text" name="email" value="<?= $email ?>">
           </td>
             <td align="left">
            <input type="submit" value="Enviar">
           </td>

          </tr>
          <tr>
           <td>
         </table>
        </fieldset>
            
         </form>
    </body>
</html>
