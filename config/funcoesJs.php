<script src="config/js/vendor/jquery.ui.widget.js" type="text/javascript"></script>
<script src="config/js/jquery.iframe-transport.js" type="text/javascript"></script>
<script src="config/js/jquery.fileupload.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2({ 
        width: '100%' 
    });

    $("#fileUpload").change(function(){
        var txt = "";
        
        txt = '<img class="fas fa-check" id="bolinhaUpload" style="background: green;">';
        $("#bolinhaUpload").remove();
        $("#bolinha").html(txt);
    });
});

function submitForm(id,tipo){
    var op = 0;

    if(id !== "0"){
        op = tipo+"/0/"+id;
    }else{
        op = tipo+"/0";
    }
    
    if(tipo == "flor"){
        var flw_meses     = $("input[name='meses[]']");
        var flw_nome      = $("#flw_nome").val();
        var flw_especie   = $("#flw_especie").val();
        var flw_descricao = $("#flw_descricao").val();
        var flw_abelhas   = $("#slcAbelha").select2("val");
        var flw_imagem    = $("input[type='file']").val();
        var file          = flw_imagem.substr(flw_imagem.lastIndexOf('\\') + 1);
        var txt_meses     = "";
        var txt_abelhas   = "";
        var x             = 0;
        var y             = 0;

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

        txt_abelhas = flw_abelhas.join(',');
        
        $.ajax({
            url: "save.php",
            data: {
                file          : file,
                flw_nome      : flw_nome,
                flw_especie   : flw_especie,
                flw_descricao : flw_descricao,
                meses         : txt_meses,
                slcAbelha     : txt_abelhas,
                op            : op
            },
            type: "GET",
            dataType: 'json',
            success: function(response){
                if(response.cod < 1){
                    alert(response.msg);
                    return false;
                }else{
                    $("#submitBtn").click();

                    setTimeout(function(){
                        alert(response.msg);
                        window.location.href = 'index.php';
                    }, 1000);
                }
            }
        });
    }else if(tipo == "abelha"){
        var abl_nome      = $("#abl_nome").val();
        var abl_especie   = $("#abl_especie").val();

        $.ajax({
            url: "save.php",
            data: {
                abl_nome    : abl_nome,
                abl_especie : abl_especie,
                op          : op
            },
            type: "GET",
            dataType: 'json',
            success: function(response){
                console.log(response);

                if(response.cod < 1){
                    alert(response.msg);
                    return false;
                }else{
                    alert(response.msg);
                    window.location.href = 'index.php';
                }
            }
        });
    }
}

function modalShow(imagem = "", nome = "", descricao = ""){
    var txt = "";

    txt += '<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
    txt += '<div class="modal-dialog" role="document">';
    txt += '<div class="modal-content">';
    txt += '<div class="modal-header">';
    txt += '<h5 class="modal-title" id="exampleModalLabel">'+nome+'</h5>';
    txt += '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
    txt += '<span aria-hidden="true">&times;</span>';
    txt += '</button>';
    txt += '</div>';
    txt += '<div class="modal-body">';
    txt += '<div class="row">';
    txt += '<div class="col-md-12" style="text-align: center;">';
    txt += '<img src="config/img/'+imagem+'" alt="'+nome+'" style="width: 100%;height: 150px;">';
    txt += '</div>';
    txt += '</div>';
    txt += '<div class="row">';
    txt += '<div class="col-md-12 mt-3" style="text-align: justify;">';
    txt += ''+descricao+'';
    txt += '</div>';
    txt += '</div>';
    txt += '</div>';
    txt += '<div class="modal-footer">';
    txt += '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
    txt += '</div>';
    txt += '</div>';
    txt += '</div>';
    txt += '</div>';

    $("#modalDiv").html("");
    $("#modalDiv").html(txt);
    $('#mymodal').modal({ show: true });
}
</script>