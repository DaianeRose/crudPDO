<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php 
require_once '../controller/ClienteController.php';
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
        

        <form id="cadastro" action="ClienteController.php?opc=cad" method="post">
        <fieldset>
         <legend>Dados Pessoais</legend>
         <table cellspacing="10">
          <tr>
            
          <input type="hidden" name="id" >

           <td>
            <label for="nome">Nome: </label>
           </td>
           <td align="left">
               <input type="text" name="nome">

           </td>
           <td>
            <label for="idade">Email: </label>
           </td>
           <td align="left">
               <input type="text" name="email" value="">
           </td>
             <td align="left">
            <input type="submit" value="Enviar">
           </td>

          </tr>
          <tr>
           <td>
         </table>
        </fieldset>
            
            
            <?php $dados = new ClienteDAO();

            $clientes = $dados->listar();
           
            if($clientes > 0): ?>

               <table border="1" width="100%">

                      <tr>
                          <th>Id</th>
                          <th>Nome</th>
                          <th>E-mail</th>
                          <th>Ações</th>
                      </tr>
                      <?php foreach ($clientes  as $value): ?>
                      <tr>
                            <td> <?php echo $value->id;  ?>  </td>
                            <td> <?php echo $value->nome;  ?>  </td>
                            <td> <?php echo $value->email; ?> </td>
                            <td>  <a href="form_alt.php?id=<?php echo $value->id; ?>" > [Alterar] </a>
                                  <a href=".\ClienteController.php?opc=del&id=<?php echo $value->id; ?>" onclick="return confirm('Tem certeza de que deseja excluir?');"> [Excluir] </a></td>
                            
                     </tr>
 
                    <?php endforeach; ?>
               </table>   
          <?php else: ?>
             Nenhum Cliente cadastrado
          <?php endif; ?>
        </form>
    </body>
</html>
