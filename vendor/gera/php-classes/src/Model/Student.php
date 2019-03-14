<?php 

namespace Geral\Model;

use \Geral\DB\Sql;
use \Geral\Model;

class Student extends Model {




    public function save (){
        
        $sql = new Sql();      

        $results = $sql->select("CALL sp_student_save(:pid, :pdesname, :pdesregistr, :pdesid1, :pdesid2, :pdesphonotice, :pdesemailnotice, :pdesperiodo, :pdesstatus, :pdephoto)", [
            ":pid"=>$this->getid(),
            ":pdesname"=>$this->getdesname(),
            ":pdesregistr"=>$this->getdesregistr(),
            ":pdesid1"=>$this->getdesid1(),
            ":pdesid2"=>$this->getdesid2(),
            ":pdesphonotice"=>$this->getdesphonotice(),
            ":pdesemailnotice"=>$this->getdesemailnotice(),
            ":pdesperiodo"=>$this->getdesperiodo(),
            ":pdesstatus"=>$this->getdesstatus(),
            ":pdephoto"=>$this->getdephoto()
        ]);

        if (count($results) > 0)
            $this->setData($results[0]);
    }
    
    public function setPhoto($file){
        $extension = explode('.', $file['name']);
        $extension = end($extension);

        switch ($extension){
            case 'jpg':
            case 'jpeg':
            $image = imagecreatefromjpeg($file['tmp_name']);
                break;

            case 'gif':
            $image = imagecreatefromjpeg($file['tmp_name']);
                break;
            
            case 'png':
            $image = imagecreatefromjpeg($file['tmp_name']);
                break;
        }

        $dist = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
                "res" . DIRECTORY_SEPARATOR .
                "photo-student" . DIRECTORY_SEPARATOR .
                "student-" . $this->getid() . ".jpg";

        imagejpeg($image, $dist);
        imagedestroy($image);

    }

    public static function listAll(){
        
        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_student ORDER BY id");
    }    

}

?>