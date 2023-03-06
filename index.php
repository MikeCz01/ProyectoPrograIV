<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Ingreso al Sistema</title>
</head>
<body>
    <header class="main-header">
        <div class="main-cont">
            <div class="desc-header">
                <img src="images/school.svg" alt="image school">
                <p>Royal Legacy Bilingual School</p>
            </div>
        </div>   
        <div class="cont-header">
            <h1>Bienvenid@</h1>
            <div class="form">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Administrador</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Docente</button>
                </li>
                
                </ul>
                <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <form action="" method="POST" onsubmit="return validar()">
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" id="usuario" placeholder="Nombre de usuario">
                    <label for="password">Contraseña</label>
                    <div id="messageUsuario"></div>
                    <input type="password" name="pass" id="pass" placeholder="Contraseña">
                    <button id="loginUsuario" type="button">INICIAR SESION</button>
                </form>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <form action="" method="POST" onsubmit="return validar()">
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" id="usuario" placeholder="Nombre de usuario">
                    <label for="password">Contraseña</label>
                    <div id="messageProfesor"></div>
                    <input type="password" name="pass" id="pass" placeholder="Contraseña">
                    <button id="loginProfesor" type="button">INICIAR SESION</button>
                </form>
                </div>
                </div>
                </div>
        </div>    
    </header>  
    <script src="js.jquery-3.3.1.min.js"></script>
    <script src="js/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>
</html>