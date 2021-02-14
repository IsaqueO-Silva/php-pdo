<?php
    /* ARQUIVO USADO PARA REALIZAR UMA CONSULTA NO BD */

    try {
        /* VARIÁVEIS DE CONEXÃO */
        $hostname = 'localhost'; /* HOST */
        $database = 'clientes';  /* DATABASE */
        $username = 'root';      /* USUÁRIO P/ CONEXÃO */
        $password = '';          /* SENHA P/ CONEXÃO */

        /* STRING DE CONEXÃO */
        $conn = new PDO('mysql:host='.$hostname.';dbname='.$database,$username,$password);

        /* AQUI O ATRIBUTO DE ERRO É CONVERTIDO PARA EXCEPTION(PDO)
         PARA QUE ASSIM POSSA SER TRATADO NO BLOCO CATCH EM
         CASO DE ERRO */
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /* QUERY DE SELECT
           A FUNÇÃO QUERY SERVE PARA EXECUTA UMA CONSULTA
           NO BD E RETORNA O RESULTADO DA CONSULTA */
        $stmt = $conn->query('SELECT * FROM dados_clientes;');

        /* A FUNÇÃO FETCHALL CAPTURA O RETORNO DA CONSULTA */
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        /* PRINTANDO OS DADOS RETORNADOS EM UM ARRAY */
        print('<pre>');
        print_r($data);

        /* FECHANDO A CONEXÃO */
        $conn = null;
        $stmt = null;
    }
    catch(PDOException $e) {
        echo 'Erro, '.$e->getMessage();
    }
?>