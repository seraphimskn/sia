<?php
/* Smarty version 3.1.30, created on 2020-02-18 19:50:45
  from "/var/www/html/sigms/views/products/add.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e4c4015d6c958_34579366',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '09853d3048d04395fe39513e0809dd05e9b0f35c' => 
    array (
      0 => '/var/www/html/sigms/views/products/add.tpl',
      1 => 1581543376,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e4c4015d6c958_34579366 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="form row float-left col-12">
    <form class="form-control row" action="" method="post" enctype="multipart/form-data" id="addproducts">
    <input type="hidden" name="send" value="add" />
    <input type="hidden" name="imagem" id="imagem" />
    <input type="hidden" name="id_parceiro" id="id_parceiro" value="<?php echo $_smarty_tpl->tpl_vars['id_parceiro']->value;?>
"/>
        <div class="imagem col">
            <div class="no-image col-3">
                <img class="img-fluid img-thumbnail" id="preview" />
            </div>
            <div class="file">
                <input type="file" class="form-control" id="file" name="imagem" />
            </div>
        </div>
        <div class="produto col">
            <label for="produto">Produto:</label> <input type="text" name="produto" class="form-control" required/>
        </div>
        <div class="pontos col">
            <label for="pontos">Pontos:</label> <input type="text" name="pontos" class="form-control" required/>
        </div>
        <div class="descricao col">
            <label for="descricao">Descrição do Produto:</label> 
            <textarea name="descricao" id="descricao" class="form-control"></textarea>
        </div>
        <div class="quantidade col">
            <label for="quantidade">Quantidade Disponível:</label> <input type="text" name="quantidade" class="form-control" required/>
        </div>       
        <div class="ativo col row">
            <span>Produto Ativo:</span> 
            <div class="col"><label>Sim: </label><input type="radio" name="ativo" class="form-control" value="1" /></div>
            <div class="col"><label>Não: </label><input type="radio" name="ativo" class="form-control" value="0" /></div>
        </div>       
        <div class="col">
            <button class="btn btn-success float-right" id="sendAdd">Enviar</button>
            <button class="btn btn-danger float-right" id="cancelEdit">Cancelar</button>
        </div>
    </form>
</div>
<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['tinyMCE']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
