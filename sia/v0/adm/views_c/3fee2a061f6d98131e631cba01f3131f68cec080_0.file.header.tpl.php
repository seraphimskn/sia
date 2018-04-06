<?php
/* Smarty version 3.1.30, created on 2018-04-05 21:22:33
  from "C:\xampp\htdocs\bandnews\site\adm\views\commons\header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ac677796d6126_50907086',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3fee2a061f6d98131e631cba01f3131f68cec080' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bandnews\\site\\adm\\views\\commons\\header.tpl',
      1 => 1522956148,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ac677796d6126_50907086 (Smarty_Internal_Template $_smarty_tpl) {
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

<title>SIA - Sistema Integrado de Gest&atilde;o Avan&ccedil;ado</title>
<style>
nav a, nav ul, nav li, nav a:visited, nav a:hover{color:<?php echo $_smarty_tpl->tpl_vars['configs']->value['font-color'];?>
;}
body{background-color:<?php echo $_smarty_tpl->tpl_vars['configs']->value['primary-color'];?>
;}
nav{background-color:<?php echo $_smarty_tpl->tpl_vars['configs']->value['secondary-color'];?>
;}
div.welcome, section.dock:not(.monthly-partial) span.title{color:<?php echo $_smarty_tpl->tpl_vars['configs']->value['primary-color'];?>
;}
section.dock.monthly-partial{background-color:<?php echo $_smarty_tpl->tpl_vars['configs']->value['primary-color'];?>
;}
</style>
</head>
<body>
<header>
<?php if (true == $_smarty_tpl->tpl_vars['sessionLogged']->value) {?>
	<nav class="vertical-nav">
		<h2 class="site-title"><?php echo $_smarty_tpl->tpl_vars['configs']->value['site-title'];?>
</h2>
		<div class="col-12 bar"></div>
		<ul>
			<li><a href="#">PAINEL DE CONTROLE</a></li>
			<li><a href="#">PUBLICA&Ccedil;&Otilde;ES</a></li>
			<li><a href="#">EXTENS&Otilde;ES</a></li>
			<li><a href="#">M&Iacute;DIAS</a></li>
			<li><a href="#">USU&Aacute;RIOS</a></li>
			<li><a href="#">SISTEMA</a></li>
			<li><a href="#">RELAT&Oacute;RIO</a></li>
			<li><a href="#">MENSAGENS</a><i class="fa fa-envelope float-right" aria-hidden="true"></i></li>
		</ul>
	</nav>
	<div class="col-12 float-left top">
		<h5 class="breadcrumbs col-3 float-left"><i class="fa fa-bars" aria-hidden="true"></i><?php echo $_smarty_tpl->tpl_vars['breadcrumb']->value;?>
</h5>
		<div class="col-4 float-right avatar">
			<ul>
				<li class="dropdown">
					<a href="#"><?php echo $_smarty_tpl->tpl_vars['userData']->value->user_name;?>
 <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
					<ul class="hidden-menu col-12">
						<li class="col-12"><a href="#">Editar Perfil</a></li>
						<li class="col-12 quit"><a href="?quit=true">Sair</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="col-12 float-left welcome">
		<span>Bem Vindo, <?php echo $_smarty_tpl->tpl_vars['userData']->value->user_name;?>
</span>	
	</div>
<?php }?>
</header>
<div id="main" class="content-fluid <?php if (true == $_smarty_tpl->tpl_vars['sessionLogged']->value) {?>internal<?php }?>"><?php }
}
