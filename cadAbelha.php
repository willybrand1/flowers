<?php
include_once 'estrutura/header2.php';
include_once 'estrutura/includes.php';

$codAbelha = isset($_REQUEST['codAbelha']) ? $_REQUEST['codAbelha'] : "0";
?>
<div class="el el6" style="margin-top: 2%;">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <label for="abl_nome" class="texto">Nome</label>
                <input type="text" name="abl_nome" id="abl_nome" class="form-control">
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-12">
                <label for="abl_especie" class="texto">Espécie</label>
                <input type="text" name="abl_especie" id="abl_especie" class="form-control">
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="el el6">
            <div style="text-align: center;">
                <br/>
                <br/>
                <br/>
                <input type="button" value="Cancelar" class="botaoCancela" onclick="window.loaction.href = 'index.php'">
                <input type="button" value="Enviar" class="botaoSubmit" onclick="submitForm('<?=$codAbelha?>','abelha');">
            </div>
        </div>
    </div>
</div>
<?php
include_once 'estrutura/footer2.php';
?>