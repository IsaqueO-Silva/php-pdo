<?php 
    /* RESUMIDAMENTE UM PREPARED STATEMENT SE TRATA DE UMA
     INSTRUÇÃO SQL QUE PODE SER UTILIZADA QUANTAS VEZES FOR PRECISO
     OU SEJA ELA É DINÂMICA(SEM VALORES PRÉ-DEFINIDOS) */

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

        /* AQUI É IMPORTANTE NOTAR ALGUNS CONCEITOS

           1° - A QUERY NÃO TEM OS SEUS VALORES DEFINIDOS ESTÁTICAMENTE MAS SIM
           PELO USO DE PLACEHOLDERS (:nome, :sobrenome, :cpf, :rg) 
           
           2° - A FUNÇÃO PREPARE SERVE PARA OTIMIZAR A QUERY QUE SERÁ EXECUTADA, 
           PARA QUE ASSIM AS PRÓXIMAS EXECUÇÕES OCORRAM DE MANEIRA MAIS EFICIENTE
           
        */
        $stmt = $conn->prepare('INSERT INTO dados_clientes(nome, sobrenome, cpf, rg) VALUES (:nome, :sobrenome, :cpf, :rg);');

        /* VALORES A SEREM USADOS NA QUERY
           OBS: PODEM SER VALORES DE UM FORMULÁRIO, 
           SENDO ASSIM VALORES DINÂMICOS A CADA REQUISIÇÃO */
        $nome      = 'Usuario';
        $sobrenome = 'Teste';
        $cpf       = '11111111111';
        $rg        = '111111111';

        /* A FUNÇÃO BINDPARAM PERMITE LIGAR AS VARIÁVEIS
           AOS PLACEHOLDERS DA QUERY
           GARANTINDO QUE ESTES VALORES SEJAM DINÂMICOS
           A CADA EXECUÇÃO DA QUERY */
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':sobrenome', $sobrenome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':rg', $rg);

        /* EXECUTANDO A QUERY */
        $stmt->execute();

        echo 'Dados inseridos com sucesso!';
    }
    catch(PDOException $e) {
        echo 'Erro '.$e->getMessage();
    }
?>