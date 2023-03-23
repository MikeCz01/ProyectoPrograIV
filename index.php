<?php
session_start();
if(!empty($_SESSION['active'])){
    header('Location: administrador/');
}else if(!empty($_SESSION['activeP'])){
header('Location: profesor/');
}else if(!empty($_SESSION['activeA'])){
    header('Location: Alumno/');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="png" href="images/user.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">    
    <link rel="stylesheet" href="css/index.css">
    <title>Royal Legacy Bilingual School & Institute</title>
</head>
<body>
<section>
        
        <div class="formlogin" >
        <div>INICIA SESIÓN</div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                        type="button" role="tab" aria-controls="home" aria-selected="true">Administrador</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                        type="button" role="tab" aria-controls="profile" aria-selected="false">Docente</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="alumno-tab" data-bs-toggle="tab" data-bs-target="#alumno"
                        type="button" role="tab" aria-controls="alumno" aria-selected="false">Alumno</button>
                </li>
            </ul>
            
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form action="" onsubmit="return validar()">
                            <div class="inputbox">
                                    <ion-icon name="mail-outline"></ion-icon>
                                    <input type="text" name="usuario" id="usuario"  placeholder="Usuario">
                            </div>
                                <div id="messageUsuario"></div>
                            <div class="inputbox">
                                    <ion-icon name="lock-closed-outline"></ion-icon>
                                    <input type="password" name="pass" id="pass"  placeholder="Contraseña">
                            </div>
                                <button id="loginUsuario" type="button">INICIAR SESION</button> 
                    </form>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form action="" onsubmit="return validar()">
                        <div class="inputbox">
                                    <ion-icon name="mail-outline"></ion-icon>
                                    <input type="text" name="usuarioProfesor" id="usuarioProfesor" placeholder="Usuario">
                                </div>
                                <div id="messageProfesor"></div>
                        <div class="inputbox">
                                    <ion-icon name="lock-closed-outline"></ion-icon>
                                    <input type="password" name="passProfesor" id="passProfesor" placeholder="Contraseña">
                                </div>
                                <button id="loginProfesor" type="button">INICIAR SESION</button> 
                    </form>
                </div>
                <div class="tab-pane fade" id="alumno" role="tabpanel" aria-labelledby="alumno-tab">
                    <form action="" onsubmit="return validar()">
                        <div class="inputbox">
                                    <ion-icon name="mail-outline"></ion-icon>
                                    <input type="text" name="usuarioAlumno" id="usuarioAlumno" placeholder="Usuario">
                                </div>
                        <div id="messageAlumno"></div>
                        <div class="inputbox">
                                    <ion-icon name="lock-closed-outline"></ion-icon>
                                    <input type="password" name="passAlumno" id="passAlumno" placeholder="Contraseña">
                        </div>
                            <button id="loginAlumno" type="button">INICIAR SESION</button> 
                    </form>
                </div>
            </div>
        </div>
        </section>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="js/login.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>