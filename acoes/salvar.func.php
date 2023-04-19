<?php
session_start();
/* require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . './acoes/verifica_sessao.php'); */
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../classes/funcionario.class.php");
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../controller/funcionario.controller.php");

$funcionario = new Funcionario();

if (isset($_POST) && isset($_POST['id']) && !empty($_POST['id'])) {
    $id         = intval(addslashes(filter_input(INPUT_POST, 'id')));
    $nome       = addslashes(filter_input(INPUT_POST, 'nome'));
    $senha       = addslashes(filter_input(INPUT_POST, 'senha'));
    $email       = addslashes(filter_input(INPUT_POST, 'email'));
    $telefone   = addslashes(filter_input(INPUT_POST, 'telefone'));
    $ativo   = addslashes(filter_input(INPUT_POST, 'ativo'));
    $privilegio   = addslashes(filter_input(INPUT_POST, 'privilegio'));


    if (empty($nome) || empty($email)) {
        $_SESSION['mensagem'] = "Obrigatório informar Nome e email 2";
        $_SESSION['sucesso'] = false;
        header('Location:../public/cad_func.php?key=' . $id);
        die();
    }
    $funcionario->setId($id);
    $funcionario->setNome(($nome));
    $funcionario->setSenha(($senha));
    $funcionario->setEmail(($email));
    $funcionario->setTelefone($telefone);
    $funcionario->setAtivo(($ativo));
    $funcionario->setPrivilegio(($privilegio));
    $controller = new funcionarioController();
    $resultado = $controller->atualizarfuncionario($funcionario);
    
    if ($resultado) {
        $_SESSION['mensagem'] = "Atualizado com sucesso";
        $_SESSION['sucesso'] = true;
    } else {
        $_SESSION['mensagem'] = "Erro ao atualizar";
        $_SESSION['sucesso'] = false;
    }
    header('Location:../public/home.func.php');
} else {

    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
    $senha = isset($_POST['senha']) ? $_POST['senha'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
    $ativo = 1;
    $privilegio = isset($_POST['privilegio']) ? $_POST['privilegio'] : null;


    if (!empty($nome) && !empty($email) && !empty($senha)) {

        $funcionario->setId($id);
        $funcionario->setNome(($nome));
        $funcionario->setSenha(($senha));
        $funcionario->setEmail(($email));
        $funcionario->setTelefone($telefone);
        $funcionario->setAtivo(($ativo));
        $funcionario->setPrivilegio(($privilegio));

        $dao = new funcionarioController();
        $resultado = $dao->criarfuncionario($funcionario);

        if ($resultado) {
            $_SESSION['mensagem'] = "Criado com sucesso";
            $_SESSION['sucesso'] = true;
            echo $_SESSION['mensagem'];
        } else {
            $_SESSION['mensagem'] = "Erro ao criar";
            $_SESSION['sucesso'] = false;
        }
    } else {
        $_SESSION['mensagem'] = "Obrigatório informar Nome e email";
        $_SESSION['sucesso'] = false;
    }
    header('Location:../public/cad_func.php');
}
