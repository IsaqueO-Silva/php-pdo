<?php 
    /* ARQUIVO USADO PARA INICIALIZAR A CONEXÃO COM O BANCO DE DADOS */

    try {
        /* VARIÁVEIS DE CONEXÃO */
        $hostname = 'localhost'; /* HOST DE CONEXÃO */
        $database = 'database';  /* BANCO DE DADOS */    
        $username = 'root';      /* USUÁRIO P/ CONEXÃO */
        $password = '';          /* SENHA P/ CONEXÃO */

        /* STRING DE CONEXÃO */
        $conn = new PDO('mysql:host='.$hostname.';dbname='.$database,$username,$password);

        /* AQUI O ATRIBUTO DE ERRO É CONVERTIDO PARA EXCEPTION(PDO)
         PARA QUE ASSIM POSSA SER TRATADO NO BLOCO CATCH EM
         CASO DE ERRO */
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo 'Conexão realizada com sucesso!';
    }
    catch(PDOException $e) {
        echo 'Erro, '.$e->getMessage();
    }
?>