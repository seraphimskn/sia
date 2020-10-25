<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<meta charset="utf-8" />
<base href="{$baseHREF}">
<meta name="viewport" content="initial-scale= 1, width= device-width" />
<meta name="robots" content="noindex, nofollow" />
{$scripts}
{$styles}
<link href="assets/css/print.css" media="print" type="text/css" rel="stylesheet" />
<title>SIGMEDSerrana - Sistema de Gestão MEDSerrana</title>
</head>
<body>
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NM4RWVR"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<header>
{if true eq $sessionLogged}
	{include file=$menu}	
	<div class="col-12 float-left top">
		<h5 class="breadcrumbs col-4 float-left">{$breadcrumbs}</h5>
		<div class="col-4 float-right avatar">
			<ul>
				<li class="dropdown">
					<a href="#" id="viewing">{$dataUser->nome}<i class="fa fa-user" aria-hidden="true"></i></a>
					<ul class="hidden-menu col-12">
						<li class="col-12"><a href="users/edit/{$dataUser->id}">Editar Perfil</a></li>
						<li class="col-12 quit"><a href="?quit=true">Sair</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="col-12 float-left welcome">
		<span>Bem Vindo, {$dataUser->nome}</span>
		{if strtolower($session['userLevel']) neq 'beneficiario' && strtolower($session['userLevel']) neq 'parceiro'}
			<span class="viewLegend float-right visionMain">Visão de {$session['userLevel']}</span>
			<span class="viewLegend float-right visionUser legendOff">Visão de Beneficiário</span>
			<div class="viewChange">
				<div class="switchTrail col-10"><div class="switchButton off"></div></div>
			</div>
		{/if}	
	</div>
{/if}
</header>
<div id="main" class="content-fluid {if true eq $sessionLogged}internal{/if}">