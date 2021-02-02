<script src="config/js/vendor/jquery.ui.widget.js" type="text/javascript"></script>
<script src="config/js/jquery.iframe-transport.js" type="text/javascript"></script>
<script src="config/js/jquery.fileupload.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2({ 
        width: '100%' 
    });
});

function submitForm(id,tipo){
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
    var op            = 0;

    if(id !== "0"){
        op = tipo+"/0/"+id;
    }else{
        op = tipo+"/0";
    }
    
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
    
    const formData = new FormData();
    
    formData.append("fileUpload",fileUpload.files[0]);
    formData.append("file",file);
    formData.append("flw_nome",flw_nome);
    formData.append("flw_especie",flw_especie);
    formData.append("flw_descricao",flw_descricao);
    formData.append("meses",txt_meses);
    formData.append("slcAbelha",txt_abelhas);
    formData.append("op",op);

    $.ajax({
        url: "save.php",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        type: "GET",
        dataType: 'json',
        success: function(response){
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

function mudaImagem(valor){
    var txt = "";
    txt = '<img class="fas fa-check" id="bolinhaUpload" style="background: green;">';
    $("#bolinhaUpload").remove();
    $("#bolinha").html(txt);

    $("#theuploadform").submit(function(){
        alert('aaaa');
    });
}
</script>