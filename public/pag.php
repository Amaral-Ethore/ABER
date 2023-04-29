<?php
include_once('header.php');
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . '../controller/carrinho.controller.php');
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . '../controller/compra.controller.php');

$carrinho = new Carrinho();
$precoTotal = 0;

if (isset($_GET) && isset($_GET['key'])) {
  $id_compra = filter_input(INPUT_GET, 'key');
  $controller = new CarrinhoController();
  $carrinho = $controller->buscarTodosPorCompra($id_compra);
}

foreach ($carrinho as $c) {
  $c->getPreco();
  $precoTotal += $c->getPreco();
}

include_once('nav.php');
?>
<div class="container">

  <div class="cart">
    <div class="checkout-panel">
      <div class="panel-body">
        <div class="payment-method">
          <div class="input-fields">

            <div class="column-1">

              <h2> <span class="envio"> Escolha a Forma de Envio</span></h2>
              <div class="entrega">
                <label for="endereco">Endereço</label>
                <input type="text" id="endereco" />
                <label for="cidade">Cidade</label>
                <input type="text" id="cidade" />
                <div class="entrega">
                  <div>
                    <label for="cep">CEP</label>
                    <input type="text" id="cep" />
                  </div>
                  <div class="estado ">
                    <label for="estado">Estado</label>
                    <select name="estado" id="estado">
                      <option value="RS">Rio Grande do Sul</option>
                      <option value="sc">Santa Catarina</option>
                      <option value="pr">Paraná</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="column-1">
              <h2> <span class="envio"> Escolha a Forma de Pagamento</span></h2>
              <label for="card" class="method">
                <div class="card-logos">
                  <img src="../imagens/img cartao/mastercard_logo.png" />
                  <img src="../imagens/img cartao/visa_logo.png" />
                </div>

                <div class="radio-input">
                  <input id="card" type="radio" class="inp-r-pagamento" name="payment">
                  Pague R$<?= str_replace(".", ",", strval($precoTotal)) ?> no cartão de Credito
                </div>
              </label>

              <label for="paypal" class="method paypal">
                <img src="https://designmodo.com/demo/checkout-panel/img/paypal_logo.png" />
                <div class="radio-input">
                  <input id="paypal" type="radio" class="inp-r-pagamento" name="payment">
                  Pague R$<?= str_replace(".", ",", strval($precoTotal)) ?> no PayPal
                </div>
              </label>
              <label for="cardholder">Nome</label>
              <input type="text" id="cardholder" />
              <label for="cardnumber">Número do Cartão</label>
              <input type="password" id="cardnumber" />
              <div class="small-inputs">
                <div>
                  <label for="date">Data de Validade</label>
                  <input type="text" id="date" />
                </div>
                <div>
                  <label for="verification">CVV / CVC *</label>
                  <input type="password" id="verification" />
                </div>
              </div>
              <span class="info-pagamento">* CVV é o código de segurança do cartão, um número único de
                três dígitos no verso do seu cartão separado do seu número.</span>
            </div>
          </div>
        </div>
      </div>
      <div class="panel-footer">
        <button class="btn-pag back-btn">Voltar</button>
        <button class="btn-pag next-btn">Avançar</button>
      </div>
    </div>
  </div>
</div>

<?php
require_once('footer.php');
