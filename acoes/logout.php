<?php
require_once('../config/functions.php');
session_start();
$_SESSION['sucesso'] = false;
// $_SESSION['sucesso'] = "";
unset($_SESSION['usuario'], $_SESSION['tipo'], $_SESSION['privilegio'], $_SESSION['carrinho']);
verificaSessao();
