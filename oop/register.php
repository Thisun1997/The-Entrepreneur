<?php
require_once 'core/init.php';

if(isset($_POST['register'])){
if(Input::exists()){
    if(Token::check(Token::generate())){
    $validate = new Validate();
    $validation = $validate->check($_POST,array(
        'email' => array(
            'required' => true,
            'unique' => 'users',
            'validity' => FILTER_VALIDATE_EMAIL
        ),
        'password' => array(
            'required' => true,
            'min' => 6,
            'limit' => true
        ),
        'password_2' => array(
            'matches' => 'password'
        ),
        'firstname' => array(
            'required' => true
        ),
        'lastname' => array(
            'required' => true
        ),
        'type' => array(
            'requiredsel' => true
        ),
        'check' => array(
            'requiredchk' => true
        )

        ));

        if($validation->passed()){
            $inventor = new Inventor();
            $facilitator = new Facilitator();
            $password_hash = Hash::make(Input::get('password')); 
            if (Input::get('type') == 'inventor'){
                try{
                    $inventor->create(array(
                        'firstname'=>Input::get('firstname'),
                        'lastname'=>Input::get('lastname'),
                        'email'=>Input::get('email'),
                        'password'=>$password_hash,
                        'type'=>Input::get('type')
                    ));
                    Session::put(Config::get('session/session_name'),Input::get('email'));
                    Redirect::to('inventorform.php');
                }catch(Exception $e){
                    die($e->getMessage());
                }
            }
            else{
                try{
                    $facilitator->create(array(
                        'firstname'=>Input::get('firstname'),
                        'lastname'=>Input::get('lastname'),
                        'email'=>Input::get('email'),
                        'password'=>$password_hash,
                        'type'=>Input::get('type')
                    ));
                    Session::put(Config::get('session/session_name'),Input::get('email'));
                    Redirect::to('facilitatorform.php');
                }catch(Exception $e){
                    die($e->getMessage());
                }
                
            }

            
            
        }else{
            echo "<div class='error' >";
            foreach($validation->errors() as $error){
                echo "<p>$error</p>";
                        
            }
            echo "</div>";
        }
    }
} 
}  
?>