<?php
require_once __DIR__.'/UsersController.php';



if(  $_REQUEST["action"] == 'login' ){

    if( $_REQUEST["frist"] == 'on'){

        UserController::index();

        foreach ($_SESSION["users"] as $item){
            
            if($item->email ==  $_REQUEST["email"]){
                header('Location: /');
                $_SESSION['last_message'] = 'El nombre de usuario '.$_REQUEST["email"].' Ya existe'; 
                exit;
            }

        
        }
       
        $user = new User();
        $user->name =  $_REQUEST["email"];
        $user->last_name = ".";
        $user->identification_type = ".";
        $user->identification_number =  ".";
        $user->phone_number = ".";
        $user->address = ".";
        $user->email =  $_REQUEST["email"];
        $user->password = $_REQUEST["password"];
        $user->save();
    }


    UserController::index();

    foreach ($_SESSION["users"] as $item){
        
        if($item->email == $_REQUEST["email"] && $item->password ==  $_REQUEST["password"]){
            
            header('Location: /resourses/home/');
            $_SESSION['userAuth.name'] = $item->name;
            $_SESSION['userAuth.last_name'] = $item->last_name;
            
        }else{
            header('Location: /');
            $_SESSION['last_message'] = 'Nombre de Usuario y/o Contraseña incorrectos.'; 
        }

    }



}else{

    if( @$_SESSION['userAuth.name'] == null ){

    }else{
        header('Location: /');
        $_SESSION['last_message'] = 'su session a Terminado'; 
    }

   
 
}

