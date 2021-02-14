<?php
    /* ARQUIVO USADO PARA EXCLUIR DADOS DE UMA TABELA

       OBS: NESTE EXEMPLO O BANCO DE DADOS USADO SE CHAMA 'clientes'
       E A TABELA 'dados_clientes'.
    */

    try {
        /* VARIÁVEIS DE CONEXÃO */
        $hostname = 'localhost'; /* HOST DE CONEXÃO */
        $database = 'clientes';  /* BANCO DE DADOS */
        $username = 'root';      /* USUÁRIO P/ CONEXÃO */
        $password = '';          /* SENHA P/ CONEXÃO */

        /* VARIÁVEIS UTILIZADAS NA QUERY DE DELETE */
        $id = 1;

        /* STRING DE CONEXÃO */
        $conn = new PDO('mysql:host='.$hostname.';dbname='.$database,$username,$password);

        /* AQUI O ATRIBUTO DE ERRO É CONVERTIDO PARA EXCEPTION(PDO)
         PARA QUE ASSIM POSSA SER TRATADO NO BLOCO CATCH EM
         CASO DE ERRO */
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /* QUERY DE DELETE */
        $query = 'DELETE FROM dados_clientes WHERE (id_cliente='.$id.');';

        /* EXECUTANDO A QUERY */
        $conn->exec($query);

        echo 'Registro excluído com sucesso';

        /* FECHANDO A CONEXÃO */
        $conn = null;
    }
    catch(PDOException $e) {
        echo 'Erro, '.$e->getMessage();
    }
?>