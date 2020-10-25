<?php
/* Smarty version 3.1.30, created on 2020-02-14 15:42:48
  from "/var/www/html/sigms/views/modules/scanner.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e46bff808e410_54183723',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2fe8a98edc6e859ef3512cd32fac3b7cef417b49' => 
    array (
      0 => '/var/www/html/sigms/views/modules/scanner.tpl',
      1 => 1581543371,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e46bff808e410_54183723 (Smarty_Internal_Template $_smarty_tpl) {
echo $_smarty_tpl->tpl_vars['scannerJS']->value;?>

<div class="col-6 row" id="scanQRCODE">
    <div class="btn btn-large btn-secondary col-3 mx-auto" id="scan"><i class="fa fa-qrcode fa-5x" aria-hidden="true"></i><br>Ler QR CODE</div>
    <div class="col-12 clearfix"></div>
    <video class="col-5 mx-auto" id="video" style="display: none; background-color: #303030"></video>
    <div class="col-12 clearfix"></div>    
</div>
<?php echo '<script'; ?>
 language="javascript" type="text/javascript">
$(document).ready(function(){
    
    let scanner = new Instascan.Scanner({video: document.getElementById('video')});
    scanner.addListener('scan', function(content){

        var id = content.split('userhash: ')[1];

        $.ajax({
            url: '<?php echo $_smarty_tpl->tpl_vars['model']->value;?>
',
            dataType: 'json',
            data: {userId: id, send: 'true'},
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
<?php echo '</script'; ?>
><?php }
}
