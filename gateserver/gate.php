<?php
    require_once("connect.php");
    
    clearstatcache();
    
    $query ='SELECT a.id, d.desname, d.desemailnotice, a.data, b.desname as desaction, c.descode, a.desmessage, d.dephoto, d.id as idest 
             FROM tb_registrygate a
             LEFT JOIN tb_action b ON a.iaction = b.id
             LEFT JOIN tb_gate c ON a.gate = c.id
             LEFT JOIN  tb_student d ON a.student = d.id  
             WHERE a.id = (SELECT MAX(e.id) FROM tb_registrygate e)';
    
    $listadados = mysqli_query($conexao, $query);
    
    $rows = mysqli_num_rows($listadados);
    
    $campo = mysqli_fetch_array($listadados);
    
    $json = json_encode($campo);
    echo $json;

    mysqli_close($conexao);
?>