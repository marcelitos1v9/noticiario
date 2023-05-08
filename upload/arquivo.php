<?php

$path = "arquivos/";
$diretorio = dir($path);

    echo "<table border='1'>" .
		 "<tr>" .
		 "<td> Nome do Arquivo </td>" .
		 "<td> Excluir </td>" .
		 "</tr>";
		 
    while($arquivo = $diretorio -> read()){
   
 
	echo "<tr>" .
		 "<td><a href='".$path.$arquivo."'>".$arquivo."</a><br></td>" .
		 "<td><b>";
?>		
	
	<a href="deletar.php?deletarArquivo=<?php echo $arquivo?>"> Excluir </a> 

<?php		 
	echo "</b></td>" .
		 "</tr>";		 
}
   echo "</table>" .

$diretorio -> close();

?>