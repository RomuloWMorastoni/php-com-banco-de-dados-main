<?php

// require_once("conexao/index.php");

$consultaSistema = '<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Sistema</title>
</head>
<body>
    <table border="1">
        <thead>
            <th>Código</th>
            <th>Nome</th>
            <th>Situação</th>
        </thead>
        <tbody>';


// Pegar os dados do banco de dados 
require_once("conexao/Utils.php");

$sql = " select * from sistema where siscodigo >=1 order by siscodigo";
$aListaSistema = getQuery()->selectAll($sql);

// echo "<pre>" . print_r($aDados, true) ."</pre>"; return true;


foreach($aListaSistema as $aSistema){
    // INICIA A LINHA
    $consultaSistema .= '<tr>';

    // COLUNAS
    $consultaSistema .= '<td>' . $aSistema["siscodigo"] . '</td>';
    $consultaSistema .= '<td>' . $aSistema["sisnome"] . '</td>';
    
    if($aSistema["sisativo"] == 1){
        $consultaSistema .= '<td>ATIVO</td>';
    } else {
        $consultaSistema .= '<td>INATIVO</td>';
    }

    // FECHA A LINHA
    $consultaSistema .= '</tr>';
}

$consultaSistema .= '            
        </tbody>
    </table>
</body>
</html>';

echo $consultaSistema;