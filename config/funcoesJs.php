<script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2({ 
        width: '100%' 
    });
});

function mudaImagem(valor){
    console.log(valor);

    var txt = "";
    txt = '<img src="'+valor+'" class="bolinhaUpload">';
    $("#bolinhaUpload").remove();
    
    $("#bolinha").html(txt);
}
</script>