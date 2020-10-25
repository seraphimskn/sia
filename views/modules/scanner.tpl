{$scannerJS}
<div class="col-6 row" id="scanQRCODE">
    <div class="btn btn-large btn-secondary col-3 mx-auto" id="scan"><i class="fa fa-qrcode fa-5x" aria-hidden="true"></i><br>Ler QR CODE</div>
    <div class="col-12 clearfix"></div>
    <video class="col-5 mx-auto" id="video" style="display: none; background-color: #303030"></video>
    <div class="col-12 clearfix"></div>    
</div>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
    
    let scanner = new Instascan.Scanner({ldelim}video: document.getElementById('video'){rdelim});
    scanner.addListener('scan', function(content){

        var id = content.split('userhash: ')[1];

        $.ajax({
            url: '{$model}',
            dataType: 'json',
            data: {ldelim}userId: id, send: 'true'{rdelim},
            type: 'post',
            beforeSend: function(){
                $('#result').append('<i class="fa fa-spinner fa-pulse fa-3x fa-fw mx-auto"></i>').fadeIn();
            },
            success: function(msg){
                $.when($('#result').find('.fa-spinner').fadeOut('fast')).then(function(){
                    $('.fa-spinner').remove();                    
                    $('#id_usuario').val(msg['id']);
                    $('#nome').html(msg['nome']);
                    $('#imagem').attr('src', msg['imagem']);
                    $('#id_user').html(msg['id']);
                    if(msg['ativo'] == 1){
                        $('#status').html('<span class="badge badge-success" role="badge">Ativo</span>');
                    }else{
                        $('#status').html('<span class="badge badge-danger" role="badge">Inativo</span>');
                        $('.dados_venda').css('display', 'none');
                    };
                    $.when($('video').slideUp()).then(function(){
                        $('#result #beneficiario').slideDown();
                        scanner.stop(cameras[0]);
                    })

                });
            }
       });
        
    })

    $('#scan').on('click', function(){
        Instascan.Camera.getCameras().then(function(cameras){
            if(cameras.length > 0){
               scanner.start(cameras[0]);
               $('video').slideDown('fast');
            }else{
                $('#result').append('<span class="alert alert-warning">Nenhuma câmera foi detectada. Verifique se há algum dispositivo conectado.</span>');
                setTimeout(function(){
                    $('#result').find('.alert').fadeOut('fast');
                }, 1000);
            }
        }).catch(function (e){
            console.error(e);
        });
    });
});
</script>