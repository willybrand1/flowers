<?php
include_once 'estrutura/header2.php';
include_once 'estrutura/includes.php';
?>
<div class="el el6" style="margin-top: 2%;">
    <div class="col-md-12">
        <div class="el el2">
            <div class="row">
                <div class="col-md-12">
                    <label for="flw_nome" class="texto">Nome</label>
                    <input type="text" name="flw_nome" id="flw_nome" class="form-control" placeholder="Qual o nome da flor">
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-12">
                    <label for="flw_especie" class="texto">Espécie</label>
                    <input type="text" name="flw_especie" id="flw_especie" class="form-control" placeholder="Qual a espécie ou nome científico">
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-12">
                    <label for="flw_descricao" class="texto">Descrição</label>
                    <textarea class="form-control" name="flw_descricao" id="flw_descricao" cols="30" rows="10">Escreva uma breve descrição</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="el el9">
            <label for="fileUpload"  class="input-file" style="text-align: center;">
                <div id="bolinha">
                    <img class="fas fa-cloud-upload-alt" id="bolinhaUpload">
                </div>
                <br/>
                <span style="color: #FFBED7;" class="texto">ESCOLHA UMA IMAGEM</span>
                <input type="file" name="fileUpload" id="fileUpload" onchange="mudaImagem(this.value);">
            </label>
        </div>
    </div>
    <div class="col-md-12">
        <div class="el el6">
            <br/>
            <label for="meses" class="texto">Escolha os meses</label>
            <br/>
            <?php
            $db  = new Banco(BANCO);
            $sql = "SELECT * FROM public.meses ORDER BY id_mes ASC";
            $rs  = $db->query($sql);

            foreach($rs as $row){
            ?>
            <input onclick="selectMes(this.value);" name="meses[]" type="checkbox" id="<?=$row['mes_abrev']?>" value="<?=$row['mes_abrev']?>">
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
                $sql = "SELECT * FROM public.abelhas ORDER BY abl_nome ASC";
                $rs  = $db->query($sql);

                foreach($rs as $row){
                    echo '<option value="'.$row['id_abelha'].'">'.$row['abl_nome'].'</option>';
                }

                $db->close();
                ?>
            </select>
            <div style="text-align: center;">
                <br/>
                <br/>
                <br/>
                <input type="button" value="Cancelar" class="botaoCancela">
                <input type="button" value="Enviar" class="botaoSubmit">
            </div>
        </div>
    </div>
</div>
<?php
include_once 'estrutura/footer.php';
?>