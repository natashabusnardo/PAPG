<!DOCTYPE HTML>
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
    <?php
    @$nomeArq = $_POST['nomearq'];
    if(isset($nomeArq)){
        $arquivo = file_get_contents($nomeArq . ".json");
        $json = json_decode($arquivo);
        echo "Sequência:";
        foreach ($json as $value) {
            echo $value . "<br>";
            @$soma = $soma + $value;
        }
        if($json[1]/$json[0] == $json[2] / $json[1]){
            @$papg = "pg";
            @$r = $json[1]/$json[0];
        }else{
            $papg = "pa";
            $r = $json[1] - $json[0];
        }
        $qdtElementos = count($json);
            // qtd$qdtElementos impar: obter valor mediano
        if ($qdtElementos % 2) {
            $mediana = $json[(($qdtElementos + 1) / 2) - 1];
        
            // qtd$qdtElementos par: obter a media simples entre os dois valores medianos
        } else {
            $v1 = $json[($qdtElementos / 2) - 1];
            $v2 = $json[$qdtElementos / 2];
            $mediana = ($v1 + $v2) / 2;
        }

        $media = $soma / $qdtElementos;

        echo "<br><br><label>A1(Primeiro termo):</label>".$json[0];
        echo "<br><br><label>R(Razão):</label>".$r;
        echo "<br><br><label>Tipo da Progressão: </label>".$papg;
        echo "<br><br><label>Quantidade de elementos: </label>".$qdtElementos;
        echo "<br><br><label>Somatório: </label>".$soma;
        echo "<br><br><label>Média: </label>".$media;
        echo "<br><br><label>Mediana: </label>".$mediana;
    }
    ?>
</body>
</html>
<script>
    let btn = document.getElementById("verificar");
</script>