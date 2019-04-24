<?php
    require_once("connect.php");
    
    clearstatcache();
    
    $query ='SELECT ticket FROM tb_regtickets WHERE id = (SELECT id FROM tb_regtickets WHERE flag = 0 ORDER BY id ASC LIMIT 1)';
    
    $listadados = mysqli_query($conexao, $query);
    
    $rows = mysqli_num_rows($listadados);
    
    $campo = mysqli_fetch_array($listadados);
    
    $json = json_encode($campo);
    echo $json;

    mysqli_close($conexao);
?>