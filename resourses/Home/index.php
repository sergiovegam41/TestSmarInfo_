<?php
session_start();
if(! @$_SESSION['userAuth.name']){
    header('Location: /');
    $_SESSION['last_message'] = 'su session a Terminado'; 
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title> 
    <link rel="stylesheet" href="../utils/css/all.css">
    <link rel="stylesheet" href="css/home.css">


</head>
<body>
    
    <side-bar> </side-bar>

    <section class="home">

    


        <div class="content" >

            <img src="../assets/hi.jpg" alt="">
            <h1 id="saludo" class="text">  Bienvenido  </h1>
            <p>Navega por el menu de inicio para empezar.</p>
        
        </div>

       
        
    </section>

    <script src="../utils/js/sidebar/SidebarScrtipt.js" type="module"></script>
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

    <script>

        let name = '<?= @$_SESSION['userAuth.name']?>'.split('@')[0];
        

            let day = new Date()

            let hh = day.getHours();
            console.log(hh)


            if(hh <= 12){
                document.getElementById('saludo').innerHTML = 'Buenos Dias '+name;
            }


            if(hh >= 12){
                document.getElementById('saludo').innerHTML = 'Buenas Tardes '+name;
            }

            if(hh >= 19){
                document.getElementById('saludo').innerHTML = 'Buenas Noches '+name;
            }


   
    </script>

    <style>
        * {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

body {
	background: #E3E5EB;
    font-family: 'Open Sans', sans-serif;
	min-height: 100vh;
	display: flex;
	align-items: center;
	justify-content: center;
}

.contenedor {
	width: 90%;
	max-width: 900px;
}

.contenedor-lista {
	background: #F3F5FA;
	box-shadow: 0px 0px 20px rgba(149, 153, 159, .16);
	border-radius: 10px;
}

.contenedor-lista h1 {
	text-transform: uppercase;
	font-size: 20px;
	background: #fff;
	height: 100px;
	display: flex;
	align-items: center;
	padding: 40px;
	border-radius: 10px 10px 0 0;
	margin-bottom: 0;
}

.lista {
	padding: 40px;
	width: 100%;
}

.lista .persona {
	background: #fff;
	display: grid;
	grid-template-columns: auto 1fr 1fr 1fr;
	align-items: center;
	padding: 20px;
	border-radius: 10px;
	margin-bottom: 20px;
	
}



/* ? Clases para los estilos en los diferentes estados del drag and drop */

/* ? ------- */



.lista .label {
	text-transform: uppercase;
	font-weight: 600;
	margin-bottom: 5px;
	color: #5173CF;
}

.lista .dato {
	font-weight: bold;
	font-size: 20px;
}

.lista .persona img {
	width: 70px;
	border-radius: 100%;
	margin-right: 40px;
}
    </style>



</body>

</html>