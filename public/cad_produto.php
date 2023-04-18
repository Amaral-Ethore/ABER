<?php
include_once('header.php');
?>
<div class="container">
    <?php include_once('nav.php');
    require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "/classes/produtos.class.php");
    $produto = new Produtos();
    ?>

    <main>
        <h1>Cadastro Produto</h1>
        <form method="Post" action="../acoes/salvar.produtos.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nome" class="form-label"> Nome </label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?= $produto->getNome() ?>">
                <input type="hidden" name="id" value="<?= $produto->getId(); ?>">
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label"> Descrição </label>
                <input type="text" class="form-control" id="descricao" name="descricao" value="<?= $produto->getDescricao() ?>">
            </div>
            <div class="mb-3">
                <label for="codebar" class="form-label"> Codigo de Barras </label>
                <input type="text" class="form-control" id="codebar" name="codebar" value="<?= $produto->getCodebar() ?>">
            </div>
            <div class="mb-3">
                <label for="marca" class="form-label"> Marca </label>
                <input type="text" class="form-control" id="marca" name="marca" value="<?= $produto->getMarca() ?>">
            </div>
            <div class="mb-3">
                <label for="validade" class="form-label"> Validade </label>
                <input type="date" class="form-control" id="validade" name="validade" value="<?= $produto->getValidade() ?>">
            </div>
            <div class="mb-3">
                <label for="setor" class="form-label"> setor </label>
                <input type="text" class="form-control" id="setor" name="setor" value="<?= $produto->getSetor() ?>">
            </div>
            <div class="mb-3">
                <label for="imagem" class="form-label"> Imagem </label>
                <input type="file" class="form-control" id="imagem" name="imagem" value="<?= $produto->getImagem() ?>">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form> <?php
        if (isset($_SESSION) && isset($_SESSION['sucesso']) && $_SESSION['sucesso']) {
        ?>
            <div class="alert alert-success" role="alert">
                <?= $_SESSION['mensagem']; ?>
            </div>
        <?php
            }
        if (isset($_SESSION) && isset($_SESSION['sucesso']) && !$_SESSION['sucesso']) {
        ?>
            <div class="alert alert-danger" role="alert">
                <?= $_SESSION['mensagem']; ?>
            </div>
        <?php
        }
            unset($_SESSION['sucesso'], $_SESSION['mensagem']);
        ?>
    </main>
</div>
<?php require_once('footer.php'); ?>