<?php

require_once('./header.php');
/* require_once(str_replace('\\', '/', dirname(__FILE__, 2)) .'/acoes/verifica_sessao.php'); */
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . '../controller/cliente.controller.php');

$controller = new ClienteController();
$cliente = $controller->buscarTodos();

?>
<?php require_once('./nav.php'); ?>
<div class="container">

    <h1>Lista de Clientes</h1>
    <a class="btn btn-primary" href="../public/cad_cliente.php">Novo Cliente</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Endereço</th>
                <th scope="col">Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($cliente as $c) :
            ?>
                <tr>
                    <td><?= $c->getId(); ?></td>
                    <td><?= $c->getNome(); ?></td>
                    <td><?= $c->getEmail(); ?></td>
                    <td><?= $c->getEndereco(); ?></td>
                    <td><?= $c->getTelefone(); ?></td>
                    <td>
                        <a class="btn btn-light" href="./cad_cliente.php?key=<?= $c->getId() ?>"><i class="fa-solid fa-pen-clip"></i></a>
                        <a class="btn btn-light " href="../acoes/excluir.cliente.php?key=<?= $c->getId() ?>">
                        <i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>

    <?php
    if (isset($_SESSION) && isset($_SESSION['sucesso']) && $_SESSION['sucesso'] == TRUE) {
    ?>
        <div class="alert alert-success" role="alert">
            <?= $_SESSION['mensagem']; ?>
        </div>
    <?php
    }
    if (isset($_SESSION) && isset($_SESSION['sucesso']) && $_SESSION['sucesso'] == false) {
    ?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['mensagem']; ?>
        </div>
    <?php
    }
    unset($_SESSION['sucesso'], $_SESSION['mensagem']);
    ?>

</div>

<?php
require_once('./footer.php');
