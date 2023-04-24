<?php
session_start();
/* require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . './acoes/verifica_sessao.php'); */
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../classes/cliente.class.php");
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../controller/cliente.controller.php");

$cliente = new Cliente();

if (isset($_POST) && isset($_POST['id']) && !empty($_POST['id'])) {
    $id         = intval(addslashes(filter_input(INPUT_POST, 'id')));
    $nome       = addslashes(filter_input(INPUT_POST, 'nome'));
    $endereco   = addslashes(filter_input(INPUT_POST, 'endereco'));
    $senha       = addslashes(filter_input(INPUT_POST, 'senha'));
    $email       = addslashes(filter_input(INPUT_POST, 'email'));
    $cpfcnpj    = addslashes(filter_input(INPUT_POST, 'cpf_cnpj'));
    $telefone   = addslashes(filter_input(INPUT_POST, 'telefone'));
    if (empty($email) || empty($senha)) {
        $_SESSION['mensagem'] = "Obrigatório informar Email e Senha";
        $_SESSION['sucesso'] = false;
        header('Location:../public/cad_cliente.php?key=' . $id);
        die();
    }
    $cliente->setId($id);
    $cliente->setNome($nome);
    $cliente->setEndereco($endereco);
    $cliente->setSenha($senha);
    $cliente->setEmail($email);
    $cliente->setCpfCnpj($cpfcnpj);
    $cliente->setTelefone($telefone);
    $controller = new ClienteController();
    $resultado = $controller->atualizarCliente($cliente);
    var_dump($resultado);
    if ($resultado) {
        $_SESSION['mensagem'] = "Atualizado com sucesso";
        $_SESSION['sucesso'] = true;
        header('Location:../public/home_cliente.php');
    } else {
        $_SESSION['mensagem'] = "Erro ao atualizar";
        $_SESSION['sucesso'] = false;
        header('Location:../public/cad_cliente.php?key=' . $id);
    }
} else {
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
    $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : null;
    $senha = isset($_POST['senha']) ? $_POST['senha'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $cpfcnpj = isset($_POST['cpf_cnpj']) ? $_POST['cpf_cnpj'] : null;
    $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
    if ($email && $senha && $nome) {
        $cliente->setId($id);
        $cliente->setNome(($nome));
        $cliente->setEndereco(($endereco));
        $cliente->setSenha(($senha));
        $cliente->setEmail(($email));
        $cliente->setCpfCnpj($cpfcnpj);
        $cliente->setTelefone($telefone);

        $dao = new ClienteController();
        $resultado = $dao->criarCliente($cliente);
        if ($resultado) {
            $_SESSION['mensagem'] = "Criado com sucesso";
            $_SESSION['sucesso'] = true;
            header('Location:../public/home_cliente.php');
        } else {
            $_SESSION['mensagem'] = "Erro ao criar";
            $_SESSION['sucesso'] = false;
            header('Location:../public/cad_cliente.php');
        }
    } else {
        $_SESSION['mensagem'] = "Obrigatório informar Nome e Email e Senha";
        $_SESSION['sucesso'] = false;
        header('Location:../public/cad_cliente.php');
    }
}
