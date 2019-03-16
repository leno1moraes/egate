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

}