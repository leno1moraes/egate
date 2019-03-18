<?php 

namespace Geral\Model;

use \Geral\DB\Sql;
use \Geral\Model;

class Gate extends Model {



    public static function listAll(){        
        $sql = new Sql();

        return $sql->select("SELECT a.id, d.desname, a.data, b.desname as desaction, c.descode, a.desmessage  
                             FROM tb_registrygate a 	
                                 LEFT JOIN tb_action b ON a.iaction = b.id
                                 LEFT JOIN tb_gate c ON a.gate = c.id
                                 LEFT JOIN  tb_student d ON a.student = d.id
                             ORDER BY id DESC");
        
    }

    public static function getPage($page = 1, $itemsPerPage = 10){
        $start = ($page -1) * $itemsPerPage;

        $sql = new Sql();
        
        $results = $sql->select("SELECT sql_calc_found_rows a.id, d.desname, a.data, b.desname as desaction, c.descode, a.desmessage 
                                 FROM tb_registrygate a
                                 LEFT JOIN tb_action b ON a.iaction = b.id
                                 LEFT JOIN tb_gate c ON a.gate = c.id
                                 LEFT JOIN  tb_student d ON a.student = d.id
                                 ORDER BY a.id DESC                                 
                                 LIMIT $start, $itemsPerPage");

        $resultsTotal = $sql->select("SELECT found_rows() AS nrtotal;");

        return [
            'data'=>$results,
            'total'=>(int)$resultsTotal[0]["nrtotal"],
            'pages'=>ceil($resultsTotal[0]["nrtotal"] / $itemsPerPage)
        ];

    }
    
    public static function getPageSearch($search, $page = 1, $itemsPerPage = 10){
        $start = ($page -1) * $itemsPerPage;

        $sql = new Sql();
        
        $results = $sql->select("SELECT sql_calc_found_rows a.id, d.desname, a.data, b.desname as desaction, c.descode, a.desmessage 
                                 FROM tb_registrygate a
                                 LEFT JOIN tb_action b ON a.iaction = b.id
                                 LEFT JOIN tb_gate c ON a.gate = c.id
                                 LEFT JOIN  tb_student d ON a.student = d.id
                                 WHERE d.desname LIKE :searcha
                                       OR b.desname LIKE :searchb
                                       OR c.descode LIKE :searchc
                                       OR a.desmessage LIKE 'LIBERAR_SAIDA'                                 
                                 ORDER BY a.id DESC                                  
                                 LIMIT $start, $itemsPerPage;",[
                                     ':searcha'=>'%'.$search.'%',
                                     ':searchb'=>'%'.$search.'%',
                                     ':searchc'=>'%'.$search.'%'
                                 ]);

        $resultsTotal = $sql->select("SELECT found_rows() AS nrtotal;");

        return [
            'data'=>$results,
            'total'=>(int)$resultsTotal[0]["nrtotal"],
            'pages'=>ceil($resultsTotal[0]["nrtotal"] / $itemsPerPage)
        ];        
    }



}