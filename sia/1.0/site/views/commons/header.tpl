<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no, width=device-width" />
<meta name="keywords" content="{if isset($page_options->tags)}{$page_options->tags}{/if}" />
<meta name="description" content="{$configs['meta-description']} - {if isset($page_options->tags)}{$page_options->tags}{/if}">
{$scripts}
{$styles}
<title>{$configs['site-title']}</title>
<style>
body, div, a, a:visited, ul, li, span{ldelim}color:{$configs['primary-color']}{rdelim}
nav a:hover, nav a.active{ldelim}border-bottom: solid 2px {$configs['secondary-color']}{rdelim}
</style>
</head>
<body>
<div class="main container-fluid">
<header class="col-12 row">
	<nav class="nav col-8">
    	<ul class="row">
    	{if isset($pages)}
    		<li class="nav-item col">
    			<a href="#{$pages['home_page']->page_slug}" class="nav-link">A Academia</a>
    		</li>
    		<li class="nav-item col">
    			<a href="#{$pages['modalidades']->page_slug}" class="nav-link col">{$pages['modalidades']->page_title}</a>
    		</li>
    		<li class="nav-item col-2">
    			<span class="col-2"><img class="img-fluid" src="{str_replace('../', '', $configs['logo'])}"></span>
    		</li>
    		<li class="nav-item col">
    			<a href="#{$pages['horarios']->page_slug}" class="nav-link col">{$pages['horarios']->page_title}</a>
    		</li>
    		<li class="nav-item col">
    			<a href="#{$pages['contatos']->page_slug}" class="nav-link col">{$pages['contatos']->page_title}</a>
    		</li>
    	{/if}
    	</ul>
	</nav>
</header>
