<!DOCTYPE HTML>
<?php
$a1 = $_POST['a1'];
$r = $_POST['r'];
$qtdn = $_POST['qtdn'];
$papg = $_POST['papg'];
$nomeArq = $_POST['nomearq'];


function pa($a1, $r, $qtdn){
	$pa = array();
	for ($i=0; $i < $qtdn ; $i++) { 
		$pa[$i] = $a1 + (($i) * $r);
	}
	return $pa;
}

function pg($a1, $r, $qtdn){
	$pg = array();
	for ($i=0; $i < $qtdn; $i++) { 
		$pg[$i] = $a1 * pow($r, $i);
	}
	return $pg;
}

?>
<html lang="pt-br">
<head>
 	<meta charset="UTF-8">
    <title>PA e PG</title>
</head>
<body>
	<?php include 'menu.php'; ?>
	<h1>Gerador de PA ou PG</h1>

	<form method="POST" action="">
		<br><br>
        <label>A1(Primeiro termo):</label>
        <input id="a1" type="text" name="a1" placeholder="Primeiro termo">
        <br><br>
        <label>R (Razão):</label>
        <input id="r" type="text" name="r" placeholder="Razão">
        <br><br>
        <label>Número de termos:</label>
        <input id="qtdn" type="text" name="qtdn" placeholder="Quantidade de termos">
        <br><br>
        <label>Tipo de Progressão:</label>
        <input id ="papg" type="radio" name="papg"  value="pa"> PA
        <input id = "papg" type="radio" name="papg" value="pg"> PG
        <br><br>

        <label>Nome do Arquivo:</label>
        <input id="nomearq" type="text" name="nomearq" placeholder="Nome do arquivo">

        <br><br>
        <button type="reset" name="limpar" id="limpar">Limpar</button>
        <button type="submit" name="salvar" id="salvar">Salvar</button>
        <br><br>
	</form>
	<?php

    if ($papg == "pa") {
        $array = pa($a1, $r, $qtdn);
    } else{
        $array = pg($a1, $r, $qtdn);
    }
    $dados_json = json_encode($array);

    $fp = fopen($nomeArq . ".json", "w");
    fwrite($fp, $dados_json);
    fclose($fp);
    ?>
	
</body>
</html>
<script>
    let btn = document.getElementById("salvar");
</script>