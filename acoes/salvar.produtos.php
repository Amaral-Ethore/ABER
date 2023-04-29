<?php
session_start();

/* require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . './acoes/verifica_sessao.php'); */
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../classes/produtos.class.php");
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../controller/produto.controller.php");
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../config/config.php");
$produto = new Produtos();

if (isset($_POST) && isset($_POST['id']) && !empty($_POST['id'])) {
    $id         = intval(addslashes(filter_input(INPUT_POST, 'id')));
    $nome       = addslashes(filter_input(INPUT_POST, 'nome'));
    $descricao    = addslashes(filter_input(INPUT_POST, 'descricao'));
    $marca   = addslashes(filter_input(INPUT_POST, 'marca'));
    $preco   = addslashes(filter_input(INPUT_POST, 'preco'));
    $validade   = addslashes(filter_input(INPUT_POST, 'validade'));
    $setor   = addslashes(filter_input(INPUT_POST, 'setor'));
    $codebar   = addslashes(filter_input(INPUT_POST, 'codebar'));
    $file = isset($_FILES['imagem']) ? $_FILES['imagem']['name'] : null;
    $extensao = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    $diretorio = CAMINHO;
    if ($extensao == "png" || $extensao == "jpeg" || $extensao == "jpg") {
        $imgname = md5(time()) . "." . "$extensao";
        if ($nome && $descricao && $imgname) {
            
            $produto->setId($id);
            $produto->setNome($nome);
            $produto->setDescricao($descricao);
            $produto->setMarca($marca);
            $produto->setPreco($preco);
            $produto->setValidade($validade);
            $produto->setSetor($setor);
            $produto->setCodebar($codebar);
            $produto->setImagem($imgname);
            $controller = new ProdutoController();
            $resultado = $controller->atualizarproduto($produto);

            if ($resultado) {
                move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $imgname);
                $_SESSION['mensagem'] = "Atualizado com sucesso";
                $_SESSION['sucesso'] = true;
            } else {
                $_SESSION['mensagem'] = "Erro ao atualizar 1";
                $_SESSION['sucesso'] = false;
            }
        }
        if (empty($nome) || empty($descricao) || empty($file)) {
            $_SESSION['mensagem'] = "Obrigatório informar Nome, Descrição e imagem";
            $_SESSION['sucesso'] = false;
            header('Location:../public/cad_produto.php?key=' . $id);
            die();
        }
    }
    header('Location:../public/home_produtos');
} else {
    $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
    $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;
    $preco = isset($_POST['preco']) ? $_POST['preco'] : null;
    $marca = isset($_POST['marca']) ? $_POST['marca'] : null;
    $validade = isset($_POST['validade']) ? $_POST['validade'] : null;
    $setor = isset($_POST['setor']) ? $_POST['setor'] : null;
    $codebar = isset($_POST['codebar']) ? $_POST['codebar'] : null;
    $file = isset($_FILES['imagem']) ? $_FILES['imagem']['name'] : null;
    $extensao = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    $diretorio = CAMINHO;
    if ($extensao == "png" || $extensao == "jpeg" || $extensao == "jpg") {
        $imgname = md5(time()) . "." . $extensao;
        if ($nome && $descricao && $imgname) {
            $produto->setNome($nome);
            $produto->setDescricao($descricao);
            $produto->setPreco($preco);
            $produto->setMarca($marca);
            $produto->setValidade($validade);
            $produto->setSetor($setor);
            $produto->setCodebar($codebar);
            $produto->setImagem($imgname);
            $dao = new ProdutoController();
            $resultado = $dao->criarProduto($produto);
            if ($resultado) {
                move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $imgname);
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
    } else {
        $_SESSION['mensagem'] = "Extenção Invalida";
        $_SESSION['sucesso'] = false;
    }
    header('Location:../public/home_produtos.php');
}
