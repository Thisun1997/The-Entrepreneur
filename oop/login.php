<?php
require_once('core/init.php');

if(input::exists()){
    if(Token::check(Token::generate())){

        $validate=new Validate();
        $Validation=$validate->check($_POST,array(
            'emaillog'=>array('requiredemaillog'=> true),
            'password'=>array('required'=> true)

        ));
        if($Validation->passed()) {
            $inventor=new Inventor();
            $facilitator=new Facilitator();
            $loginInv = $inventor->login(Input::get('emaillog'),Input::get('password'));
            $loginFaci = $facilitator->login(Input::get('emaillog'),Input::get('password'));
            $availableInv = $inventor->findType(Input::get('emaillog'));
            $availableFaci = $facilitator->findType(Input::get('emaillog'));
            if($loginInv || $loginFaci) {
                if($availableInv){
                    Redirect::to('index.php');
                }
                else if($avaulableFaci){
                    Redirect::to('index.php');
                }
                else{
                    if($inventor->data()->type == 'inventor'){
                        Redirect::to('inventorform.php');
                    }
                    else if($inventor->data()->type == 'facilitator'){
                        Redirect::to('facilitatorform.php');
                    }
                }
            }else{
                Session::flash('success','<div class="alert alert-danger">
                <strong>Sorry!</strong> login failed.
              </div>');
            }

        }
        else{
             echo "<div class='error' >";
            foreach($Validation->errors() as $error){
                echo "<p>$error</p>";}
            echo "</div>";


    }


}}