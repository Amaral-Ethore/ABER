<?php
include_once('header.php');
?>
<div class="container">
<?php include_once('nav.php');

?>


<div class="cart">


<div class="checkout-panel">
  <div class="panel-body">
    <h2 class="title">Cadastrar Cartão</h2>
 
 
    <div class="payment-method">
      <label for="card" class="method">
        <div class="card-logos">
          <img src="../imagens/img cartao/mastercard_logo.png"/>
          <img src="../imagens/img cartao/visa_logo.png"/>
        </div>
 
        <div class="radio-input">
          <input id="card" type="radio" class="inp-r-pagamento" name="payment">
          Pague R$20.99 no cartão de Credito
        </div>
      </label>
 
      <label for="paypal" class="method paypal">
        <img src="https://designmodo.com/demo/checkout-panel/img/paypal_logo.png"/>
        <div class="radio-input">
          <input id="paypal" type="radio" class="inp-r-pagamento" name="payment">
          Pague R$20.99 no PayPal
        </div>
      </label>
    </div>
 
    <div class="input-fields">
      <div class="column-1">
        <label for="cardholder">Nome</label>
        <input type="text" id="cardholder" />
 
        <div class="small-inputs">
          <div>
            <label for="date">Data de Validade</label>
            <input type="text" id="date"/>
          </div>
 
          <div>
            <label for="verification">CVV / CVC *</label>
            <input type="password" id="verification"/>
          </div>
        </div>
 
      </div>
      <div class="column-2">
        <label for="cardnumber">Número do Cartão</label>
        <input type="password" id="cardnumber"/>
 
        <span class="info-pagamento">* CVV é o código de segurança do cartão, um número único de três dígitos no verso do seu cartão separado do seu número.</span>
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
