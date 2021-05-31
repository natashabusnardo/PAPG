<!DOCTYPE HTML>
<?php

$nomearq = $_POST['nomearq'];
$arquivo = file_get_contents($nomearq . '.json');
$json = json_decode($arquivo);

?>
<html lang="pt-br">
<head>
 	<meta charset="UTF-8">
    <title>PA e PG</title>
</head>
<body>
	<?php include 'menu.php'; ?>
	<h1>Verificador de PA ou PG</h1>

	<form method="POST" action="">
        <br><br>
        <label>Nome do arquivo a ser carregado: </label>
        <input id="nomearq" type="text" name="nomearq" placeholder="Nome do arquivo">
        <button type="submit" name="verificar" id="verificar">Verificar</button>
        <br><br>
        
	</form>	
</body>
</html>
<script>
    let btn = document.getElementById("verificar");
</script>