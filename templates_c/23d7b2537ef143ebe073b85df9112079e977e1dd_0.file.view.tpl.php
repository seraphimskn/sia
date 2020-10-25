<?php
/* Smarty version 3.1.30, created on 2020-03-27 12:48:46
  from "/var/www/html/sigms/views/users/view.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e7df62ec2a4b0_65902812',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '23d7b2537ef143ebe073b85df9112079e977e1dd' => 
    array (
      0 => '/var/www/html/sigms/views/users/view.tpl',
      1 => 1584130668,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e7df62ec2a4b0_65902812 (Smarty_Internal_Template $_smarty_tpl) {
if (strtolower($_smarty_tpl->tpl_vars['userLevel']->value) != 'vendedor') {?>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Login</th>
            <th scope="col"><a href="users/add">Adicionar</a></th>
        </tr>
    </thead>
    <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['usuarios']->value, 'usuario');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['usuario']->value) {
?>
        <tr id="item-<?php echo $_smarty_tpl->tpl_vars['usuario']->value->id;?>
">
            <td><?php echo $_smarty_tpl->tpl_vars['usuario']->value->nome;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['usuario']->value->cpf_cnpj;?>
</td>
            <td><a href="users/edit/<?php echo $_smarty_tpl->tpl_vars['usuario']->value->id;?>
">Editar</a> | <a href="#" data-id="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->id;?>
" data-script="users" class="sendDelete">Excluir</a></td>
        </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </tbody>
</table>
<?php } else { ?>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Login</th>
            <th scope="col"><a href="users/add">Adicionar</a></th>
        </tr>
    </thead>
    <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['usuarios']->value, 'usuario');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['usuario']->value) {
?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['usuario']->value, 'dado');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['dado']->value) {
?>
        <tr id="item-<?php echo $_smarty_tpl->tpl_vars['dado']->value->id;?>
">
            <td><?php echo $_smarty_tpl->tpl_vars['dado']->value->nome;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['dado']->value->cpf_cnpj;?>
</td>
            <td><a href="users/edit/<?php echo $_smarty_tpl->tpl_vars['dado']->value->id;?>
">Editar</a></td>
        </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </tbody>
</table>
<?php }
}
}
