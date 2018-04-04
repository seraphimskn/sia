<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<meta charset="utf-8" />
<base href="{$baseHREF}">
<meta name="viewport" content="initial-scale= 1, width= device-width" />
<meta name="robots" content="noindex, nofollow" />
{$scripts}
{$styles}
<title>SIA - Sistema Integrado de Gest&atilde;o Avan&ccedil;ado</title>
<style>
nav a, nav ul, nav li, nav a:visited, nav a:hover{ldelim}color:{$configs['font-color']};{rdelim}
body{ldelim}background-color:{$configs['primary-color']};{rdelim}
nav{ldelim}background-color:{$configs['secondary-color']};{rdelim}
div.welcome{ldelim}color:{$configs['primary-color']};{rdelim}
</style>
</head>
<body>
<header>
{if true eq $sessionLogged}
	<nav class="vertical-nav">
		<h2 class="site-title">{$configs['site-title']}</h2>
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
		<h5 class="breadcrumbs col-3 float-left"><i class="fa fa-bars" aria-hidden="true"></i>{$breadcrumb}</h5>
		<div class="col-4 float-right avatar">
			<ul>
				<li class="dropdown">
					<a href="#">{$userData->user_name} <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
					<ul class="hidden-menu col-12">
						<li class="col-12"><a href="#">Editar Perfil</a></li>
						<li class="col-12 quit"><a href="?quit=true">Sair</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="col-12 float-left welcome">
		<span>Bem Vindo, {$userData->user_name}</span>	
	</div>
{/if}
</header>
<div id="main" class="content-fluid {if true eq $sessionLogged}internal{/if}">