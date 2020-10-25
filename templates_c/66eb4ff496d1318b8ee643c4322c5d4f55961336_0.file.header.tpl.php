<?php
/* Smarty version 3.1.30, created on 2020-04-12 19:15:54
  from "/var/www/html/sigms/views/commons/header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e9368ea0ab214_98159771',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '66eb4ff496d1318b8ee643c4322c5d4f55961336' => 
    array (
      0 => '/var/www/html/sigms/views/commons/header.tpl',
      1 => 1586718915,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e9368ea0ab214_98159771 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<meta charset="utf-8" />
<base href="<?php echo $_smarty_tpl->tpl_vars['baseHREF']->value;?>
">
<meta name="viewport" content="initial-scale= 1, width= device-width" />
<meta name="robots" content="noindex, nofollow" />
<?php echo $_smarty_tpl->tpl_vars['scripts']->value;?>

<?php echo $_smarty_tpl->tpl_vars['styles']->value;?>

<link href="assets/css/print.css" media="print" type="text/css" rel="stylesheet" />
<title>SIGMEDSerrana - Sistema de Gestão MEDSerrana</title>
</head>
<body>
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NM4RWVR"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<header>
<?php if (true == $_smarty_tpl->tpl_vars['sessionLogged']->value) {?>
	<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['menu']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
	
	<div class="col-12 float-left top">
		<h5 class="breadcrumbs col-4 float-left"><?php echo $_smarty_tpl->tpl_vars['breadcrumbs']->value;?>
</h5>
		<div class="col-4 float-right avatar">
			<ul>
				<li class="dropdown">
					<a href="#" id="viewing"><?php echo $_smarty_tpl->tpl_vars['dataUser']->value->nome;?>
<i class="fa fa-user" aria-hidden="true"></i></a>
					<ul class="hidden-menu col-12">
						<li class="col-12"><a href="users/edit/<?php echo $_smarty_tpl->tpl_vars['dataUser']->value->id;?>
">Editar Perfil</a></li>
						<li class="col-12 quit"><a href="?quit=true">Sair</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="col-12 float-left welcome">
		<span>Bem Vindo, <?php echo $_smarty_tpl->tpl_vars['dataUser']->value->nome;?>
</span>
		<?php if (strtolower($_smarty_tpl->tpl_vars['session']->value['userLevel']) != 'beneficiario' && strtolower($_smarty_tpl->tpl_vars['session']->value['userLevel']) != 'parceiro') {?>
			<span class="viewLegend float-right visionMain">Visão de <?php echo $_smarty_tpl->tpl_vars['session']->value['userLevel'];?>
</span>
			<span class="viewLegend float-right visionUser legendOff">Visão de Beneficiário</span>
			<div class="viewChange">
				<div class="switchTrail col-10"><div class="switchButton off"></div></div>
			</div>
		<?php }?>	
	</div>
<?php }?>
</header>
<div id="main" class="content-fluid <?php if (true == $_smarty_tpl->tpl_vars['sessionLogged']->value) {?>internal<?php }?>"><?php }
}
