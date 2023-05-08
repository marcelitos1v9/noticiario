<?php

$file = $_GET["deletarArquivo"];
$dir = "arquivos/";
unlink($dir . $file);

echo "Arquivo apagado!";
header("location:arquivo.php");

?>