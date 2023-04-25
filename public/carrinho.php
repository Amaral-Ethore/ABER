<?php include_once('./header.php');
include_once('./nav.php'); ?>

<div class="CartContainer">
   	   <div class="Header">
   	   	<h3 class="Heading">Carrinho de compras</h3>
   	   	<h5 class="Action">Remover</h5>
   	   </div>

   	   <div class="Cart-Items">
   	   	  <div class="image-box">
   	   	  	<!-- <img src="images/apple.png" style={{ height="120px" }} /> -->
   	   	  </div>
   	   	  <div class="about">
   	   	  	<h1 class="title">PRODUTO</h1>
   	   	  	<!-- <h3 class="subtitle">descrição</h3> -->
   	   	  	<!-- <img src="images/veg.png" style={{ height="30px" }}/> -->
   	   	  </div>
   	   	  <div class="counter">
   	   	  	<div class="btn">+</div>
   	   	  	<div class="count">2</div>
   	   	  	<div class="btn">-</div>
   	   	  </div>
   	   	  <div class="prices">
   	   	  	<div class="amount">valor</div>
   	   	  	<div class="save"><u>Guardar para depois</u></div>
   	   	  	<div class="remove"><u>Remover</u></div>
   	   	  </div>
   	   </div>

   	   <div class="Cart-Items pad">
   	   	  <div class="image-box">
   	   	  	<!-- <img src="images/grapes.png" style={{ height="120px" }} /> -->
   	   	  </div>
   	   	  <div class="about">
   	   	  	<h1 class="title">PRODUTO</h1>
   	   	  	<!-- <h3 class="subtitle">descrição</h3> -->
   	   	  	<!-- <img src="images/veg.png" style={{ height="30px" }}/> -->
   	   	  </div>
   	   	  <div class="counter">
   	   	  	<div class="btn">+</div>
   	   	  	<div class="count">1</div>
   	   	  	<div class="btn">-</div>
   	   	  </div>
   	   	  <div class="prices">
   	   	  	<div class="amount">valor</div>
   	   	  	<div class="save"><u>Guardar para depois</u></div>
   	   	  	<div class="remove"><u>Remover</u></div>
   	   	  </div>
   	   </div>
   	 <hr> 
   	 <div class="checkout">
   	 <div class="total">
   	 	<div>
   	 		<div class="Subtotal">Sub-Total</div>
   	 		<div class="items">n° de items</div>
   	 	</div>
   	 	<div class="total-amount">Valor total</div>
   	 </div>
   	 <button class="button">Conferir</button></div>
   </div>

<?php include_once('./footer.php');?>