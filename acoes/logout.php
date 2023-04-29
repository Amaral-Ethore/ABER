<?php
require_once('../config/functions.php');
session_start();
unset($_SESSION['usuario'], $_SESSION['tipo'], $_SESSION['privilegio'], $_SESSION['sucesso'], $_SESSION['id_usuario']);

header("Location:../public/index.php");
