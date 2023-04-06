<?php
include_once('./header.php');
?>
<div class="container">
  <?php include_once('./nav.php'); ?>

  <h1>Cadastro Cliente</h1>
  <form>
    <div class="mb-3">
      <label for="nome" class="form-label"> Nome </label>
      <input type="text" class="form-control" id="nome">
    </div>
    <div class="mb-3">
      <label for="cpfcnpj" class="form-label"> CPF/CNPJ </label>
      <input type="text" class="form-control" id="cpfcnpj">
    </div>
    <div class="mb-3">
      <label for="email" class="form-label"> Email </label>
      <input type="email" class="form-control" id="email">
    </div>
    <div class="mb-3">
      <label for="endereco" class="form-label"> Endereço </label>
      <input type="text" class="form-control" id="endereco">
    </div>
    <div class="mb-3">
      <label for="telefone" class="form-label"> Telefone </label>
      <input type="tel" class="form-control" id="telefone">
    </div>
    <div class="mb-3">
      <label for="senha" class="form-label"> Senha </label>
      <input type="password" class="form-control" id="senha">
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
  </form>
</div>