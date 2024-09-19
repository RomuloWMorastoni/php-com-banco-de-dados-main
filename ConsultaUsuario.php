<?php

$consultaUsuario = '<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Usuario</title>
</head>
<body>
    <table border="1">
        <thead>
            <th>Código</th>
            <th>Login</th>
            <th>Nome</th>
            <th>Senha</th>
        </thead>
        <tbody>';

// Pegar os dados do banco de dados 
require_once("conexao/Utils.php");

$sql = " select * from usuario where usucodigo >=1 order by usucodigo";
$aListaUsuario = getQuery()->selectAll($sql);

// echo "<pre>" . print_r($aListaUsuario, true) ."</pre>"; return true;

foreach($aListaUsuario as $aUsuario){
    // INICIA A LINHA
    $consultaUsuario .= '<tr>';

    // COLUNAS
    $consultaUsuario .= '<td>' . $aUsuario["usucodigo"] . '</td>';
    $consultaUsuario .= '<td>' . $aUsuario["usulogin"] . '</td>';
    $consultaUsuario .= '<td>' . $aUsuario["usunome"] . '</td>';
    $consultaUsuario .= '<td>' . $aUsuario["ususenha"] . '</td>';
    
    // FECHA A LINHA
    $consultaUsuario .= '</tr>';
}

$consultaUsuario .= '            
        </tbody>
    </table>
</body>
</html>';

echo $consultaUsuario;