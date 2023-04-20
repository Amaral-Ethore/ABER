<?php
session_start();
unset($_SESSION['usuario'], $_SESSION['tipo'], $_SESSION['privilegio']);

header("Location:../public/index.php");
