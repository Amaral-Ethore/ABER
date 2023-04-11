<?php
session_start();

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
    var_dump($cpfcnpj);

    if (empty($nome) || empty($cpfcnpj)) {
        $_SESSION['mensagem'] = "Obrigatório informar Nome e CPF/CNPJ 2";
        $_SESSION['sucesso'] = false;
        header('Location:../public/cad_cliente.php?key=' . $id);
        die();
    }
    $cliente->setId($id);
    $cliente->setNome(($nome));
    $cliente->setEndereco(($endereco));
    $cliente->setSenha(($senha));
    $cliente->setEmail(($email));
    $cliente->setCpfCnpj($cpf_cnpj);
    $cliente->setTelefone($telefone);
    $controller = new ClienteController();
    $resultado = $controller->atualizarCliente($cliente);

    if ($resultado) {
        $_SESSION['mensagem'] = "Atualizado com sucesso";
        $_SESSION['sucesso'] = true;
    } else {
        $_SESSION['mensagem'] = "Erro ao atualizar";
        $_SESSION['sucesso'] = false;
    }
    header('Location:../public/cad_cliente.php');
} else {

    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
    $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : null;
    $senha = isset($_POST['senha']) ? $_POST['senha'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $cpfcnpj = isset($_POST['cpf_cnpj']) ? $_POST['cpf_cnpj'] : null;
    $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
    if ($nome && $cpfcnpj) {

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
            echo $_SESSION['mensagem'];
        } else {
            $_SESSION['mensagem'] = "Erro ao criar";
            $_SESSION['sucesso'] = false;
        }
    } else {
        $_SESSION['mensagem'] = "Obrigatório informar Nome e CPF/CNPJ";
        $_SESSION['sucesso'] = false;
    }
    header('Location:../public/cad_cliente.php');
}
