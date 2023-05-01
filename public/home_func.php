<?php

require_once('./header.php');
/* require_once(str_replace('\\', '/', dirname(__FILE__, 2)) .'/acoes/verifica_sessao.php'); */
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . '../controller/funcionario.controller.php');

$controller = new FuncionarioController();
$funcionario = $controller->buscarTodos();

require_once('nav.php'); ?>
<div class="container">
    <h1>Lista de Funcionários</h1>
    <a class="btn btn-primary" href="../public/cad_func.php">Novo Funcionário</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Senha</th>
                <th scope="col">Telefone</th>
                <th scope="col">Ativo</th>
                <th scope="col">Privilégio</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($funcionario as $f) :
            ?>
                <tr>
                    <td><?= $f->getId(); ?></td>
                    <td><?= $f->getNome(); ?></td>
                    <td><?= $f->getEmail(); ?></td>
                    <td><?= $f->getSenha(); ?></td>
                    <td><?= $f->getTelefone(); ?></td>
                    <td><?= $f->getAtivo(); ?></td>
                    <td><?= $f->getPrivilegio(); ?></td>
                    <td>
                        <a class="btn btn-light" href="./cad_func.php?key=<?= $f->getId() ?>"><i class="fa-solid fa-pen-clip"></i></a>
                        <a class="btn btn-light " href="../acoes/excluir.func.php?key=<?= $f->getId() ?>"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>

    <?php
        if (isset($_SESSION) && isset($_SESSION['sucesso']) && isset($_SESSION['mensagem']) && $_SESSION['sucesso']) {
        ?>
            <div class="alert alert-success" role="alert">
                <?= $_SESSION['mensagem']; ?>
            </div>
        <?php
        }
        if (isset($_SESSION) && isset($_SESSION['sucesso']) && isset($_SESSION['mensagem']) && !$_SESSION['sucesso']) {
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
