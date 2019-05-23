<?php
abstract class User{
    protected $_db,
              $_data,
              $_sessionName,
              $_isLoggedIn,
              $_isFormIn;
    

    public function __construct($user = null){
        $this->_db = DB::getInstance();

        $this->_sessionName=Config::get('session/session_name');

        if(!$user){
            if (Session::exists($this->_sessionName)){
                $user=Session::get($this->_sessionName);
               
                if ($this->find($user)) {
                    $this->_isFormIn=true;
                    if ($this->findType($user)){
                        $this->_isLoggedIn=true;
                    }
                    else{
                        $this->_isLoggedIn=false;
                        
                    }
                }else{
                    $this->_isFormIn=false; 
                }          
            }
                
            }else{
                $this->find($user);
            }
        }
    

    abstract public function findType($user = null);
    abstract public function createType($user = null);
    abstract public function delete($user);

    public function create($fields=array()){
        if (!$this->_db->insert('users',$fields)){
            throw new Exception('There was a problem creating an account.');

        }
    }
    
    public function find($user=null) {
        if($user){
            $field = (is_numeric($user))?'id':'email';
            $data=$this->_db->get('users',array($field, '=',$user));
            if ($data->count()){
                $this->_data=$data->first();
                return true;
            }
        }
        return false;
    }

    public function getpass($email=null){
        if(!$email && $this->isLoggedIn()){
            $email = $this->data()->email;
        }
        $data=$this->_db->get('users',array('email', '=',$email));
        if ($data->count()){
            $this->_data=$data->first();
            return $this->_data;
        }
        return false;
    }

    public function update($fields = array(),$table,$email = null){
        if(!$email && $this->isLoggedIn()){
            $email = $this->data()->email;
        }
        if(!$this->_db->update( $table,$email,$fields)){
            throw new Exception('Error');
        }
    }


    public function login($email=null,$password=null){
        $user=$this->find($email);

        if($user) {
            if(password_verify($password, $this->data()->password)){
                Session::put($this->_sessionName, $this->data()->email);
                return true;

            }
            return false;
        }
        return false;
    }

    public function data() {
        return $this->_data;
    }

    public function logout(){
        Session::delete($this->_sessionName); 
    }

    public function isLoggedIn() {
        return $this->_isLoggedIn;
    }

    public function isFormIn() {
        return $this->_isFormIn;
    }

    public function sendMessage(){
        $msg=$_POST['msg'];
        $email=$this->data()->email;
        $name = $this->data()->firstname;
        if(!empty($_POST['msg'])){
            if (!$this->_db->insert('message',array('firstname'=>$name,
                                                    'email'=>$email,
                                                    'msg'=>$msg,
                                                    ))){
                throw new Exception('There was a problem creating an account.');
            } 
        }
        header("Location:message.php");
    }

}