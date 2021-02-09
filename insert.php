<?php 
    /* ARQUIVO USADO PARA INSERIR DADOS EM UMA DETERMINADA TABELA

       OBS: NESTE EXEMPLO O BANCO DE DADOS USADO SE CHAMA 'clientes'
       E A TABELA 'dados_clientes'.    
    */

    try {
        /* VARIÁVEIS DE CONEXÃO */
        $hostname = 'localhost'; /* HOST DE CONEXÃO */   
        $database = 'clientes';  /* BD CRIADO NO ARQUIVO 'create-database.php' */
        $username = 'root';      /* USUÁRIO P/ CONEXÃO */
        $password = '';          /* SENHA P/ CONEXÃO */

        /* STRING DE CONEXÃO */
        $conn = new PDO('mysql:host='.$hostname.';dbname='.$database,$username,$password);

        /* AQUI O ATRIBUTO DE ERRO É CONVERTIDO PARA EXCEPTION(PDO)
         PARA QUE ASSIM POSSA SER TRATADO NO BLOCO CATCH EM
         CASO DE ERRO */
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /* QUERY DE INSERT */
        $query = "INSERT INTO dados_clientes(nome, sobrenome, rg, cpf) VALUES ('Usuario', 'Teste', '11111111111', '111111111');";

        /* EXECUTANDO A QUERY */
        $conn->exec($query);

        echo 'Dados inseridos com sucesso!';
    }
    catch(PDOException $e) {
        echo 'Erro, '.$e->getMessage();
    }
?>