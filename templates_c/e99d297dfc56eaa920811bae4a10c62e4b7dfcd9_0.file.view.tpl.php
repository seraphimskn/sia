<?php
/* Smarty version 3.1.30, created on 2020-03-23 15:37:02
  from "/var/www/html/sigms/views/products/view.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e78d79eb4ed00_48633865',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e99d297dfc56eaa920811bae4a10c62e4b7dfcd9' => 
    array (
      0 => '/var/www/html/sigms/views/products/view.tpl',
      1 => 1584130647,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e78d79eb4ed00_48633865 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th scope="col">Imagem</th>            
            <th scope="col">Produto</th>
            <th scope="col">Pontos</th>
            <th scope="col">Quantidade Disponível</th>
            <?php if (strtolower($_smarty_tpl->tpl_vars['userLevel']->value) != 'beneficiario') {?>
                <th scope="col"><a href="products/add">Adicionar</a><th>
            <?php } else { ?>
                <th scope="col"></th>
            <?php }?>
        </tr>
    </thead>
    <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['produtos']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
        <tr id="item-<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
">
            <td><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value->imagem;?>
" class="img-fluid" width="50px" /></td>            
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->produto;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->pontos;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->quantidade;?>
</td>
            <?php if (strtolower($_smarty_tpl->tpl_vars['userLevel']->value) != 'beneficiario') {?>
                <td><a href="products/edit/<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
">Editar</a> | <a href="#" data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
" data-script="products" class="sendDelete">Excluir</a></td>
            <?php } else { ?>
                <td><a href="products/product/<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
">Ver Produto</a></td>
            <?php }?>
        </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    <tbody>
</table><?php }
}
