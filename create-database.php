<?php 
    /* ARQUIVO USADO PARA CRIAR UM BANCO DE DADOS */

    try {
        /* VARIÁVEIS DE CONEXÃO */
        $hostname = 'localhost'; /* HOST DE CONEXÃO */   
        $username = 'root';      /* USUÁRIO P/ CONEXÃO */
        $password = '';          /* SENHA P/ CONEXÃO */

        /* STRING DE CONEXÃO */
        $conn = new PDO('mysql:host='.$hostname,$username,$password);

        /* AQUI O ATRIBUTO DE ERRO É CONVERTIDO PARA EXCEPTION(PDO)
         PARA QUE ASSIM POSSA SER TRATADO NO BLOCO CATCH EM
         CASO DE ERRO */
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /* QUERY USADA PARA CRIAR UM BANCO DE DADOS(CLIENTES) */
        $query = 'CREATE DATABASE clientes';

        /* AQUI A FUNÇÃO EXEC É USADA PARA EXECUTAR
         UMA DETERMINADA QUERY */
        $conn->exec($query);

        echo 'Banco de dados criado com sucesso!';

        /* FECHANDO A CONEXÃO */
        $conn = null;
    }
    catch(PDOException $e) {
        echo 'Erro, '.$e->getMessage();
    }
?>