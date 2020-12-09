<?php
include_once 'estrutura/header.php';
include_once 'estrutura/includes.php';
?>
<div class="el el6">
    <div class="form-group" id="slcAbelha_div">
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
    </div>
    <div class="form-group" id="slcMes_div">
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
    </div>
</div>
<?php
include_once 'estrutura/footer.php';
?>