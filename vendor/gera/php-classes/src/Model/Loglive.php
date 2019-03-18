<?php 

namespace Geral\Model;

use \Geral\DB\Sql;
use \Geral\Model;

class Loglive extends Model {

    public static function getLogLive(){

        $sql = new Sql();

        return $sql->select("SELECT a.id, d.desname, d.desemailnotice, a.data, b.desname as desaction, c.descode, a.desmessage, d.dephoto, d.id as idest 
                             FROM tb_registrygate a
                             LEFT JOIN tb_action b ON a.iaction = b.id
                             LEFT JOIN tb_gate c ON a.gate = c.id
                             LEFT JOIN  tb_student d ON a.student = d.id  
                             WHERE a.id = (SELECT MAX(e.id) FROM tb_registrygate e)");
    }

    public static function getLive(){
        $sql = new Sql();

        $results = $sql->select("SELECT a.id, d.desname, d.desemailnotice, a.data, b.desname as desaction, c.descode, a.desmessage, d.dephoto, d.id as idest 
                             FROM tb_registrygate a
                             LEFT JOIN tb_action b ON a.iaction = b.id
                             LEFT JOIN tb_gate c ON a.gate = c.id
                             LEFT JOIN  tb_student d ON a.student = d.id  
                             WHERE a.id = (SELECT MAX(e.id) FROM tb_registrygate e)");
        
        return json_encode($results);
    }
}

?>