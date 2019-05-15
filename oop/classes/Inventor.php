<?php
class Inventor extends User{
    protected $_db,
            $_data,
            $_sessionName,
            $_isLoggedIn,
            $_isFormIn;

    public function __construct($user = null){
        parent::__construct();
    }

    public function findType($user=null) {
        if($user){
            $field = (is_numeric($user))?'id':'email';
            $data=$this->_db->get('inventor',array($field, '=',$user));

            if ($data->count()){
                $this->_data=$data->first();
                return true;
            }
        }
        return false;
    }

    public function createType($fields=array()){
        if (!$this->_db->insert('inventor',$fields)){
            throw new Exception('There was a problem creating an account.');

        }
    }

    public function delete($user){
        if (!$this->_db->delete('inventor',array('email', '=',$user))){
            throw new Exception('There was a problem deleting an account.');

        }
    }
}
?>