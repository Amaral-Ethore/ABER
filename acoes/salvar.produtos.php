<?php
session_start();

/* require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . './acoes/verifica_sessao.php'); */
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../classes/produtos.class.php");
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../controller/produto.controller.php");

$produto = new Produtos();

if (isset($_POST) && isset($_POST['id']) && !empty($_POST['id'])) {
    $id         = intval(addslashes(filter_input(INPUT_POST, 'id')));
    $nome       = addslashes(filter_input(INPUT_POST, 'nome'));
    $descricao    = addslashes(filter_input(INPUT_POST, 'descricao'));
    $marca   = addslashes(filter_input(INPUT_POST, 'marca'));
    $validade   = addslashes(filter_input(INPUT_POST, 'validade'));
    $setor   = addslashes(filter_input(INPUT_POST, 'setor'));
    $codebar   = addslashes(filter_input(INPUT_POST, 'codebar'));
    var_dump($descricao);

    if (empty($nome) || empty($descricao)) {
        $_SESSION['mensagem'] = "Obrigatório informar Nome e Descrição2";
        $_SESSION['sucesso'] = false;
        header('Location:../public/cad_produto.php?key=' . $id);
        die();
    }
    $produto->setId($rs->id);
    $produto->setNome(($rs->nome));
    $produto->setDescricao($rs->descricao);
    $produto->setMarca($rs->marca);
    $produto->setValidade($rs->validade);
    $produto->setSetor($rs->setor);
    $produto->setCodebar($rs->codebar);



    $controller = new ProdutoController();
    $resultado = $controller->atualizarproduto($produto);

    if ($resultado) {
        $_SESSION['mensagem'] = "Atualizado com sucesso";
        $_SESSION['sucesso'] = true;
    } else {
        $_SESSION['mensagem'] = "Erro ao atualizar";
        $_SESSION['sucesso'] = false;
    }
    header('Location:../public/cad_produto.php');
} else {

    $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
    $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;
    $marca = isset($_POST['marca']) ? $_POST['marca'] : null;
    $validade = isset($_POST['validade']) ? $_POST['validade'] : null;
    $setor = isset($_POST['setor']) ? $_POST['setor'] : null;
    $codebar = isset($_POST['codebar']) ? $_POST['codebar'] : null;
    

    if ($nome && $descricao) {
        $produto->setNome(($rs->nome));
        $produto->setDescricao($rs->descricao);
        $produto->setMarca($rs->marca);
        $produto->setValidade($rs->validade);
        $produto->setSetor($rs->setor);
        $produto->setCodebar($rs->codebar);

        $dao = new ProdutoController();
        $resultado = $dao->criarProduto($produto);
        if ($resultado) {
            $_SESSION['mensagem'] = "Criado com sucesso";
            $_SESSION['sucesso'] = true;
        } else {
            $_SESSION['mensagem'] = "Erro ao criar";
            $_SESSION['sucesso'] = false;
        }
    } else {
        $_SESSION['mensagem'] = "Obrigatório informar Nome e Descrição";
        $_SESSION['sucesso'] = false;
    }
    header('Location:../public/cad_produto.php');
}
