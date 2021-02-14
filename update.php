<?php
    /* ARQUIVO USADO PARA ATUALIZAR DADOS EM UMA DETERMINADA TABELA

       OBS: NESTE EXEMPLO O BANCO DE DADOS USADO SE CHAMA 'clientes'
       E A TABELA 'dados_clientes'.
    */

    try {
        /* VARIÁVEIS DE CONEXÃO */
        $hostname = 'localhost'; /* HOST DE CONEXÃO */
        $database = 'clientes';  /* BD CRIADO NO ARQUIVO 'create-database.php' */
        $username = 'root';      /* USUÁRIO P/ CONEXÃO */
        $password = '';          /* SENHA P/ CONEXÃO */

        /* VARIÁVEIS UTILIZADAS NA QUERY DE ATUALIZAÇÃO */
        $id        = 1;
        $nome      = 'Usuario';
        $sobrenome = 'Teste';
        $cpf       = '00000000000';
        $rg        = '000000000';

        /* STRING DE CONEXÃO */
        $conn = new PDO('mysql:host='.$hostname.';dbname='.$database,$username,$password);

        /* AQUI O ATRIBUTO DE ERRO É CONVERTIDO PARA EXCEPTION(PDO)
         PARA QUE ASSIM POSSA SER TRATADO NO BLOCO CATCH EM
         CASO DE ERRO */
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /* QUERY DE UPDATE */
        $stmt = $conn->prepare('UPDATE dados_clientes SET nome = :nome, sobrenome = :sobrenome, cpf = :cpf, rg = :rg WHERE (id_cliente = '.$id.');');

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

        echo 'Dados atualizados com sucesso';

        /* FECHANDO A CONEXÃO */
        $stmt = null;
        $conn = null;
    }
    catch(PDOException $e) {
        echo 'Erro '.$e->getMessage();
    }
?>