<?php
session_start();
unset($_SESSION['usuario'], $_SESSION['tipo'], $_SESSION['privilegio'], $_SESSION['sucesso']);

header("Location:../public/index.php");
