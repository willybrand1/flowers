<?php
include_once 'estrutura/header2.php';
include_once 'estrutura/includes.php';

$codFlor = isset($_REQUEST['codFlor']) ? $_REQUEST['codFlor'] : "0";

if($codFlor !== "0"){
    $db  = new Banco(BANCO);
    $sql = "SELECT * FROM public.flores WHERE id_flor = ".$codFlor;
    $rs  = $db->query($sql);
    
    foreach($rs as $row){
        $flw_nome      = $row['flw_nome'];
        $flw_especie   = $row['flw_especie'];
        $flw_descricao = $row['flw_descricao'];
        $flw_meses     = $row['flw_meses'];
        $flw_abelhas   = $row['flw_abelhas'];
        $flw_imagem    = $row['flw_imagem'];
    }
}else{
    $flw_nome      = "";
    $flw_especie   = "";
    $flw_descricao = "";
    $flw_meses     = "";
    $flw_abelhas   = "";
    $flw_imagem    = "";
}
?>
<div class="el el6" style="margin-top: 2%;">
    <div class="col-md-12">
        <div class="el el2">
            <input type="hidden" name="op" id="op" value="<?=$codFlor?>">
            <div class="row">
                <div class="col-md-12">
                    <label for="flw_nome" class="texto">Nome</label>
                    <input value="<?=$flw_nome?>" type="text" name="flw_nome" id="flw_nome" class="form-control" placeholder="Qual o nome da flor">
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-12">
                    <label for="flw_especie" class="texto">Espécie</label>
                    <input value="<?=$flw_nome?>" type="text" name="flw_especie" id="flw_especie" class="form-control" placeholder="Qual a espécie ou nome científico">
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-12">
                    <label for="flw_descricao" class="texto">Descrição</label>
                    <textarea class="form-control" name="flw_descricao" id="flw_descricao" cols="30" rows="10" placeholder="Escreva uma breve descrição"><?=$flw_descricao?></textarea>
                </div>
            </div>
        </div>
    </div>
    <form action="upload.php" target="postiframe" id="theuploadform" method="post" enctype="multipart/form-data">
        <div class="col-md-12">
            <div class="el el9">
                <label for="fileUpload"  class="input-file" style="text-align: center;">
                    <div id="bolinha">
                        <img class="fas fa-cloud-upload-alt" id="bolinhaUpload">
                    </div>
                    <br/>
                    <span style="color: #FFBED7;" class="texto">ESCOLHA UMA IMAGEM</span>
                    <input type="file" name="fileUpload" id="fileUpload">
                </label>
            </div>
        </div>
        <input type="submit" value="submit" style="display:none;" id="submitBtn">
    </form>
    <iframe id="postiframe" name="postiframe" style="display: none;"></iframe>
    <div class="col-md-12">
            <br/>
            <div class="el el6">
            <label for="meses" class="texto">Escolha os meses</label>
            <br/>
            <?php
            $db  = new Banco(BANCO);
            $sql = "SELECT * FROM meses ORDER BY cod_mes ASC";
            $rs  = $db->query($sql);

            foreach($rs as $row){
            ?>
            <input name="meses[]" type="checkbox" id="<?=$row['mes_abrev']?>" value="<?=$row['mes_abrev']?>">
            <label for="<?=$row['mes_abrev']?>"><?=$row['mes_abrev']?></label>
            <?php
            }

            $db->close();
            ?>
            <br/><br/>
            <label for="slcAbelha" class="texto">Selecione as abelhas</label>
            <br/>
            <select name="slcAbelha[]" id="slcAbelha" class="js-example-basic-multiple" multiple="multiple">
                <option value="">&nbsp;</option>
                <?php
                $db  = new Banco(BANCO);
                $sql = "SELECT * FROM abelhas ORDER BY abl_nome ASC";
                $rs  = $db->query($sql);

                foreach($rs as $row){
                    echo '<option value="'.$row['abl_nome'].'">'.$row['abl_nome'].' ('.$row['abl_especie'].')</option>';
                }

                $db->close();
                ?>
            </select>
            <div style="text-align: center;">
                <br/>
                <br/>
                <br/>
                <input type="button" value="Cancelar" class="botaoCancela" onclick="window.loaction.href = 'index.php'">
                <input type="submit" value="Enviar" class="botaoSubmit" onclick="submitForm('<?=$codFlor?>','flor');">
                <br/>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'estrutura/footer2.php';
?>