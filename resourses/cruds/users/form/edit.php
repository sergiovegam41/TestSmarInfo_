<?php

    require_once  __DIR__.'/../../../../app/controllers/UsersController.php';

    UserController::find( @$_REQUEST['id'] );
?>

<?php

    require_once __DIR__.'/../../../../app/controllers/EssaysController.php';

    EssaysController::index();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <title>Home</title> 
    <!-- <link rel="stylesheet" href="../../../utils/css/all.css"> -->

    <!-- <link rel="stylesheet" href="./css/usuarios.css"> -->
    <link rel="stylesheet" href="../../../utils/css/forms/form.css">
    <!-- <link rel="stylesheet" href="../../utils/css/cruds/crud.css"> -->
    <link rel="stylesheet" href="../../../utils/css/all.css">

</head>
<body>
    
    <side-bar> </side-bar>

    <section class="home">

 
        <div class="row">
            <ion-icon  class= "prymary-icon" name="person-circle-outline"></ion-icon>
            <h1 class="text">  Edita un Usuario </h1>
        </div>
        <br>

        <!-- <div class="mesaje">
            <ion-icon class='icon-info' name="information-circle-outline"></ion-icon>
            <p>El Usuario se a guardado correctamente.</p>
        </div>  -->

        <div class="form-contain">

            <div class="row back">
                 <ion-icon  onclick="history.back()" class= "prymary-icon" name="arrow-back-outline"></ion-icon>
                <h2>Informacion del usuario</h2>
            </div>
            <hr>
            <form action="/app/controllers/UsersController.php" method="post" enctype="multipart/form-data">
                

            <div class="campo">
                        
            <img style="width:100px;border-radius:10px" src="<?= './../../../../app/'.str_ireplace('../','',@$_SESSION['user']->file_url??'storage/Untitled.jpg' )?>"> 
        
            <!-- <div class="campo"> -->
                            <span> Cambiar foto </span>
                            <input type="file" name="file_rule"  >
                        <!-- </div> -->
                    </div>
                    <div class="campos">
                        <div class="campo">
                            <span> Nombre</span>
                            <input value=<?php echo  @$_SESSION['user']->name ?> type="text" name="name" id="name" required> 
                        </div>
        
                        <div class="campo">
                            <span> Apellido </span>
                            <input  value=<?php echo  @$_SESSION['user']->last_name ?> type="text" name="last_name" id="last_name" required> 
                        </div>
        
                        <div class="campo">
                            <span> Tipo de identificacion </span>
                            <select  name="identification_type" required>
                                <option value="null" >seleccione..</option>
                                <option value="Cedula" <?php if(@$_SESSION['user']->identification_type == 'Cedula') { echo 'selected'; }?> >Cedula</option>
                                <option value="Targeta de identidad" <?php if(@$_SESSION['user']->identification_type == 'Targeta de identidad') { echo 'selected'; }?>> Targeta de identidad</option>
                                <option value="Registro civil" <?php if(@$_SESSION['user']->identification_type == 'Registro civil') { echo 'selected'; }?>>Registro civil</option>
                            </select>
                        </div>

                        
                        <div class="campo">
                        <span> Departamentos </span>
                            <select name="essay_id" required>
                            <option value="null" selected>seleccione..</option>
                            <?php 
                                // echo $_SESSION['Essays'];
                                foreach ( $_SESSION['Essays'] as $item ){

                                   if( $_SESSION['user']->essay_id == $item->id){
                                    echo '<option value="'.$item->id.'" selected>'.$item->name.'</option>';

                                   }else{
                                    echo '<option value="'.$item->id.'" >'.$item->name.'</option>';

                                   }
                                    
                                }
                            ?>
                        
                        </select>
                           
                        </div>
        
                        <div class="campo">
                            <span> N° identificacion </span>
                            <input  value=<?php echo  @$_SESSION['user']->identification_number ?> required type="text" name="identification_number" id="identification_number"> 
                        </div>
        
                        <div class="campo">
                            <span>  N° Telefono </span>
                            <input value=<?php echo  @$_SESSION['user']->phone_number ?> type="text" name="phone_number" id="phone_number" required> 
                        </div>
        
                        <div class="campo">
                            <span> Direccion</span>
                            <input  value=<?php echo  @$_SESSION['user']->address ?> type="text" name="address" id="address" required> 
                        </div>
        
                        <div class="campo">
                            <span> Email</span>
                            <input value=<?php echo  @$_SESSION['user']->email ?> type="text" name="email" id="email" required> 
                        </div>
        
                        <div class="campo">
                            <span> Contraseña </span>
                            <input value=<?php echo  @$_SESSION['user']->password ?> type="password" name="password" id="password" required> 
                        </div>

                        <div class="campo"  >
                            <span> confirmar Contraseña </span>
                            <input  value=<?php echo  @$_SESSION['user']->password ?>  type="password" name="password-repet" id="password-repet" required> 
                        </div>


                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="id" value=<?php echo @$_REQUEST['id'] ?> >
                        <!-- <p>Asegurate que las contraseñas sean iguales</p> -->
        
                    </div>


                
                    <div class="botons">
                        <input class="btn-dan" type="reset" value="Borrar formulario">
                        <input id="send-btn" class="btn-succ" type="submit"  value="Actualizar Usuario">
                    </div>
            </form>

        </div>
        <span class='help' onclick="alert_sw()" href="#">¿Necesitas ayuna?</a>
        

    



        

  
    </section>
    

    <script src="../js/validateForm.js"></script>

    <script src="../../../utils/js/sidebar/SidebarScrtipt.js" type="module"></script>
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function alert_sw(){
            const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
            title: '¿Necesitas ayuda?',
            text: "Asegurate de diligenciar todos los campos y que las contraseñas sean inguales.",
            icon: 'warning',
            confirmButtonText: 'Ok',
            });
        }
    </script>
    
</body>

</html>