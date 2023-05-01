<?php
include_once('header.php');
?>
<?php include_once('nav.php'); ?>
<div class="container">
    <?php
    require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../controller/cliente.controller.php");
    require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../classes/cliente.class.php");
    $cliente = new Cliente();
    if (isset($_GET) && isset($_GET['key'])) {
        $id = filter_input(INPUT_GET, 'key');
        $controller = new ClienteController();
        $cliente = $controller->buscarPorId($id);
    } ?>
    <h1>Cadastro Cliente</h1>
    <form method="post" action="../acoes/salvar.cliente.php">
        <div class="mb-3">
            <label for="nome" class="form-label"> * Nome </label>
            <input type="hidden" name="id" value="<?= $cliente->getId(); ?>">
            <input type="text" class="form-control" id="nome" name="nome" value="<?= $cliente->getNome() ?>">
        </div>
        <div class="mb-3">
            <label for="cpfcnpj" class="form-label"> CPF/CNPJ </label>
            <input type="text" class="form-control" id="cpfcnpj" name="cpf_cnpj" value="<?= $cliente->getCpfCnpj() ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label"> * Email </label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $cliente->getEmail() ?>">
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label"> Endereço </label>
            <input type="text" class="form-control" id="endereco" name="endereco" value="<?= $cliente->getEndereco() ?>">
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label"> Telefone </label>
            <input type="tel" class="form-control" id="telefone" name="telefone" value="<?= $cliente->getTelefone() ?>">
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label"> * Senha </label>
            <input type="password" class="form-control" id="senha" name="senha" value="<?= $cliente->getSenha() ?>">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
    <?php if (isset($_SESSION) && isset($_SESSION['sucesso']) && $_SESSION['sucesso'] == TRUE) { ?>
        <div class="alert alert-success" role="alert">
            <?= $_SESSION['mensagem']; ?>
        </div>
    <?php }
    if (isset($_SESSION) && isset($_SESSION['sucesso']) && $_SESSION['sucesso'] == false && isset($_SESSION['mensagem'])) { ?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['mensagem']; ?>
        </div>
    <?php }
    unset($_SESSION['sucesso'], $_SESSION['mensagem']); ?>
</div>

<?php require_once('footer.php');
