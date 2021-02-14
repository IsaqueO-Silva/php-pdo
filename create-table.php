<?php
    /* ARQUIVO USADO PARA CRIAR UMA TABELA */

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

        /* QUERY USADA PARA CRIAR UMA TABELA(dados_clientes) */
        $query = 'CREATE TABLE dados_clientes (
            id_cliente INT AUTO_INCREMENT NOT NULL,
            nome VARCHAR(255) NOT NULL,
            sobrenome VARCHAR(255) NOT NULL,
            cpf VARCHAR(14) UNIQUE NOT NULL,
            rg VARCHAR(11) UNIQUE NOT NULL,
            PRIMARY KEY (id_cliente)
        );';

        /* AQUI A FUNÇÃO EXEC É USADA PARA EXECUTAR
         UMA DETERMINADA QUERY */
        $conn->exec($query);

        echo 'Tabela criada com sucesso!';

        /* FECHANDO A CONEXÃO */
        $conn = null;
    }
    catch(PDOException $e) {
        echo 'Erro, '.$e->getMessage();
    }
?>