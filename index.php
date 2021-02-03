<?php
include_once 'estrutura/header.php';
include_once 'estrutura/includes.php';
?>
<div id="modalDiv"></div>
<div class="el el6">
    <div class="form-group" id="slcAbelha_div">
        <label for="slcAbelha" class="texto">Selecione as abelhas</label>
        <br/>
        <select onchange="filtraFlores();" name="slcAbelha[]" id="slcAbelha" class="js-example-basic-multiple" multiple="multiple">
            <option value="">&nbsp;</option>
            <?php
            $db  = new Banco(BANCO);
            $sql = "SELECT * FROM abelhas ORDER BY abl_nome ASC";
            $rs  = $db->query($sql);

            foreach($rs as $row){
                echo '<option value="'.$row['abl_nome'].'">'.$row['abl_nome'].'</option>';
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
        $sql = "SELECT * FROM meses ORDER BY cod_mes ASC";
        $rs  = $db->query($sql);

        foreach($rs as $row){
        ?>
        <input onclick="filtraFlores();" name="meses[]" type="checkbox" id="<?=$row['mes_abrev']?>" value="<?=$row['mes_abrev']?>">
        <label for="<?=$row['mes_abrev']?>"><?=$row['mes_abrev']?></label>
        <?php
        }

        $db->close();
        ?>
    </div>
    <div class="form-group" id="flores_div">
        <label for="meses" class="texto">Flores</label>
        <br/>
        <div id="floresDiv"></div>
        <script>
            $(document).ready(function(){
                filtraFlores();
            });

            function filtraFlores(){
                var txt_meses   = "";
                var txt_abelhas = "";
                var flw_meses   = $("input[name='meses[]']");
                var slcAbelha   = $("#slcAbelha").select2("val");
                var x           = 0;
                var y           = 0;
                
                flw_meses.each(function(){
                    if ($(this).is(':checked')) {
                        if(x < 1){
                            txt_meses += $(this).val();
                        }else{
                            txt_meses += ","+$(this).val();
                        }
                        x++;
                    }
                });

                $.ajax({
                    url      : "filtraFlores.php",
                    type     : "GET",
                    dataType : "json",
                    data     : {
                        meses   : txt_meses,
                        abelhas : slcAbelha
                    },
                    success: function(response){
                        var r = response;
                        var txt = "";
                        var c = r.length;
                        
                        if(c < 1){
                            txt += '<div class="col-md-12" style="text-align: center;"><h2>Nenhum registro encontrado!</2></div>'
                        }

                        $("#floresDiv").html("");
                        txt += '<div class="row">';
                        for(var i=0; i<r.length; i++){ 
                            txt += '<div class="card ml-4 border-0" style="width: 10rem;">';
                            txt += '<img onclick="modalShow(\''+r[i].flw_imagem+'\',\''+r[i].flw_nome+'\',\''+r[i].flw_descricao+'\');" class="card-img-top" style="cursor: pointer;border-radius: 100%;" src="config/img/'+r[i].flw_imagem+'" alt="'+r[i].flw_nome+'">';
                            txt += '<div class="card-body">';
                            txt += '<h5 class="card-title" style="text-align: center;">'+r[i].flw_nome+'</h5>';
                            txt += '</div>';
                            txt += '</div>';
                            
                            if(i == 3){
                                txt += '</div>';
                                txt += '<div class="row">';
                            }

                            if(i == 6){
                                txt += '</div>';
                                txt += '<div class="row">';
                            }

                            if(i == 9){
                                txt += '</div>';
                                txt += '<div class="row">';
                            }

                            if(i == 12){
                                txt += '</div>';
                                txt += '<div class="row">';
                            }
                        }
                        txt += '</div>';

                        $("#floresDiv").html(txt);
                    }
                });
            }
        </script>
    </div>
</div>
<?php
include_once 'estrutura/footer.php';
?>