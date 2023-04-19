<?php
include_once('header.php');
?>
<div class="container">
    <?php include_once('nav.php');
    /*   require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . '../acoes/verifica_sessao.php'); */
    require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../classes/funcionario.class.php");
    require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../controller/funcionario.controller.php");
    $funcionario = new Funcionario();

    if (isset($_GET) && isset($_GET['key'])) {
        $id = filter_input(INPUT_GET, 'key');
        $controller = new FuncionarioController();
        $funcionario = $controller->buscarPorId($id);
    }
    ?>

    <h1>Cadastro Funcionário</h1>
    <form method="Post" action="../acoes/salvar.func.php">
        <div class="mb-3">
            <label for="nome" class="form-label"> Nome </label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?= $funcionario->getNome() ?>">
            <input type="hidden" name="id" value="<?= $funcionario->getId(); ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label"> Email </label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $funcionario->getEmail() ?>">
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label"> Senha </label>
            <input type="password" class="form-control" id="senha" name="senha" value="<?= $funcionario->getSenha() ?>">
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label"> Telefone </label>
            <input type="tel" class="form-control" id="telefone" name="telefone" value="<?= $funcionario->getTelefone() ?>">
        </div>
        <div class="mb-3">
            <label for="ativo" class="form-label"> Ativo </label>
            <input type="text" class="form-control" id="ativo" name="ativo" value="<?= $funcionario->getAtivo() ?>">
        </div>
        <div class="mb-3">
            <label>Privilégio</a>
                <select name="privilegio">
                    <option value="admin" <?= $funcionario->getPrivilegio() == "admin" ? "selected" : "" ?>>Adminstrador</option>
                    <option value="func" <?= $funcionario->getPrivilegio() == "func" ? "selected" : "" ?>>Funcionário</option>
                </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form> <?php
            if (isset($_SESSION) && isset($_SESSION['sucesso']) && $_SESSION['sucesso'] == TRUE) {
            ?>
        <div class="alert alert-success" role="alert">
            <?= $_SESSION['mensagem']; 
            header('Location:../public/index.php');?>
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
require_once('footer.php');
