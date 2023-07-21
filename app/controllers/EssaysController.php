<?php
if (session_status() === PHP_SESSION_NONE) {
    // Si la sesión no está activa, entonces la iniciamos
    session_start();
}


require_once __DIR__.'/../models/Essays.php';
require_once __DIR__.'/../Repository/StorageImage.php';

if(! @$_SESSION['userAuth.name']){
    header('Location: /');
    $_SESSION['last_message'] = 'su session a Terminado'; 
}

if(@$_REQUEST['action'] == 'store'){
    EssaysController::store();
}

if(@$_REQUEST['action'] == 'update'){
    EssaysController::update( @$_REQUEST['id'] );
}   

if(@$_REQUEST['action'] == 'delete'){
    EssaysController::delete( @$_REQUEST['id'] );
}

class EssaysController {

    public static function index(){
      $Essays = Essays::all();
      $_SESSION['Essays'] = $Essays;
    }

    public static function store(){ 

        
    
        try {

            $Essays = new Essays();
            $Essays->name = $_REQUEST['name'];
            $Essays->save();

            $_SESSION['last_message'] = "El Requisito se a guardado correctamente.";

            header('Location: /resourses/cruds/Essays/');

            return true;      

        } catch (\Throwable $th) {

            $_SESSION['last_message'] = "Ups! Algo salio mal. Error: ".$th;

            header('Location: /resourses/cruds/Essays/');

            return false;     

        }


          
    }

    
    
    public static function update($id){
        

        
    
        try {

            $Essays = Essays::find($id);
            $Essays->name =  $_REQUEST['name'];

            $Essays->save();

            $_SESSION['last_message'] = "El Departamento se a Actualizado correctamente.";

            header('Location: /resourses/cruds/Essays/');

            return true;      

        } catch (\Throwable $th) {

            $_SESSION['last_message'] = "Ups! Algo salio mal. Error: ".$th;

            header('Location: /resourses/cruds/Essays/');

            return false;     

        }


    }

    public static function find($id){

        try {

            $Essays = Essays::find($id);
            
            $_SESSION['essay'] = $Essays;

            return $Essays;

        } catch (\Throwable $th) {

            $_SESSION['last_message'] = "Ups! Algo salio mal. Error: ".$th;

            header('Location: /resourses/cruds/Essays/');

            return false;     

        }

    }

    public static function delete($id){


        try {

            $Essays = Essays::find($id);
            $Essays->delete();

            $_SESSION['last_message'] = "El Departamento se elimino correctamente.";

            header('Location: /resourses/cruds/Essays/');

        } catch (\Throwable $th) {

            $_SESSION['last_message'] = "Ups! Algo salio mal. Error: ".$th;

            header('Location: /resourses/cruds/Essays/');

            return false;     

        }


    }

    





}
