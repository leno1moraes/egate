<?php 

namespace Geral\Model;

use \Geral\DB\Sql;
use \Geral\Model;

class User extends Model {

    const SUCCESS = "UserSuccess";
    const ERROR = "UserError";

    public static function setSuccess($msg){
        $_SESSION[User::SUCCESS] = $msg;
    }

    public static function setError($msg){
        $_SESSION[User::ERROR] = $msg;
    }

    public static function getSuccess(){
        
        $msg = (isset($_SESSION[User::SUCCESS]) && $_SESSION[User::SUCCESS]) ? $_SESSION[User::SUCCESS] : "";

        User::clearSuccess();

        return $msg;

    }

    public static function getError(){

        $msg = (isset($_SESSION[User::ERROR]) && $_SESSION[User::ERROR]) ? $_SESSION[User::ERROR] : "";

        User::clearError();

        return $msg;

    }

    public static function clearSuccess(){
        $_SESSION[User::SUCCESS] = NULL;
    }    

    public static function clearError(){
        $_SESSION[User::ERROR] = NULL;
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
                "photo-profile" . DIRECTORY_SEPARATOR .
                "profile-" . $this->getid() . ".jpg";

        imagejpeg($image, $dist);
        imagedestroy($image);

    }

    public function delete(){
        $sql = new Sql();      

        $sql->query("DELETE FROM tb_user WHERE id = :iduser", array(
            ":iduser"=>$this->getid()
        ));        
    }

    public function save (){
        
        $sql = new Sql();      

        $results = $sql->select("CALL sp_users_save(:pid, :pdeslogin, :pdesstatus, :pdtcadastro, :pdesnome, :pdesurl, :pdesemail, :pdespassword)", [
            ":pid"=>$this->getid(),
            ":pdeslogin"=>$this->getdeslogin(),
            ":pdesstatus"=>$this->getdesstatus(),
            ":pdtcadastro"=>$this->getdtcadastro(),
            ":pdesnome"=>$this->getdesnome(),
            ":pdesurl"=>$this->getdesurl(),
            ":pdeslogin"=>$this->getdeslogin(),
            ":pdesemail"=>$this->getdesemail(),
            ":pdespassword"=>$this->getdespassword()
        ]);

        if (count($results) > 0)
            $this->setData($results[0]);
    }

    public static function listAll(){
        
        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_user ORDER BY id");
    }

    public function get($id){
        
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_user WHERE id = :iduser", array(
            ":iduser"=>$id
        ));

        $this->setData($results[0]);

    }

}

?>