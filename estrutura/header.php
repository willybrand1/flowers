<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Calendário de flores</title>
        <link rel="stylesheet" href="config/css/all.css">
        <link rel="stylesheet" href="config/css/bootstrap.css">
        <link rel="stylesheet" href="config/css/main.css">
        <link href="config/css/select2.css" rel="stylesheet"/>
        <link rel="shortcut icon" href="favicon.icon"/>
        <link href="http://hayageek.github.io/jQuery-Upload-File/4.0.11/uploadfile.css" rel="stylesheet">
        <script src="config/js/jquery-3.5.1.js"></script>
        <script src="config/js/select2.full.js"></script>
        <script src="config/js/all.js"></script>
        <script src="config/js/bootstrap.js"></script>
        <script src="http://hayageek.github.io/jQuery-Upload-File/4.0.11/jquery.uploadfile.min.js"></script>
    </head>
    <body>
        <div class="wrap">
        <div class="el el1">&nbsp;</div>
        <div class="el el3">
            <div class="el el2">
                <?php
                if(strpos($_SERVER['PHP_SELF'],'index.php')){
                ?>
                <a href="index.php" style="text-decoration: none;"><span class="titulo">Calendário de flores</span></a>
                <?php
                }else if(strpos($_SERVER['PHP_SELF'],'cadFlor.php')){
                ?>
                <a href="index.php" style="text-decoration: none;"><span class="titulo">Cadastre flores</span></a>
                <?php
                }else if(strpos($_SERVER['PHP_SELF'],'cadAbelha.php')){
                ?>
                <a href="index.php" style="text-decoration: none;"><span class="titulo">Cadastre abelhas</span></a>
                <?php
                }
                ?>
                <div class="textIndex">
                    <?php
                    if(strpos($_SERVER['PHP_SELF'],'index.php')){
                    ?>
                    <p>
                        Neste calendário encontram-se diversas flores. Podem ser agupada pelos meses que florescem e o 
                        pelo tipo de abelha que poliniza a flor.
                    </p>
                    <?php
                    }else if(strpos($_SERVER['PHP_SELF'],'cadFlor.php')){
                    ?>
                    <p>
                        Cadastre as flores de acordo com o mês em que ela floresce
                    </p>
                    <?php
                    }else if(strpos($_SERVER['PHP_SELF'],'cadAbelha.php')){
                    ?>
                    <p>
                        Cadastre as abelhas
                    </p>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="el el5">
                <button class="botao" onclick="window.location.href = 'cadFlor.php'">
                    Cadastrar flores
                </button>
                <button class="botao" onclick="window.location.href = 'cadAbelha.php'">
                    Cadastrar abelhas
                </button>
                <div id="navbar">
                    <nav class="navbar navbar-expand-lg navbar-light justify-content-end">
                        <button id="toggleButton" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                            <i style="color: #C87092;" class="fas fa-bars"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" href="cadFlor.php">Cadastrar flores</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="cadAbelha.php">Cadastrar abelhas</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
    