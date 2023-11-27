<?php
/* esse código foi criado para caso o user 
não responda a tempo as fases.*/
session_start();

$_SESSION = array();

session_destroy();

header("Location: index.php");
exit;
