<?php
include_once 'estrutura/header.php';
include_once 'estrutura/includes.php';
?>
<div class="wrap">
    <div class="el el1">&nbsp;</div>
    <div class="el el3">
        <div class="el el2">
            <span class="titulo">Calendário de flores</span>
        </div>
        <div class="el el5">
            <button class="botao">
                Cadastrar flores
            </button>
            <button class="botao">
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
                                <a class="nav-link" href="#">Cadastrar flores</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Cadastrar abelhas</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="el el4">&nbsp;</div>
</div>
<?php
include_once 'estrutura/footer.php';
?>