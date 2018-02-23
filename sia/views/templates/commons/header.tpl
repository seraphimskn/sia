<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8" />
<meta name="keywords" content="{$keywords}" />
<meta name="description" content="{$meta_description}" />
<meta name="robots" content="follow, index" />
<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no, width=device-width">
{$styles}
{$scripts}
<title>{$site_title}</title>
</head>
<body>
<header>
	<section id="banner">
		{if is_array($bannerSlideImage)}
			{foreach $bannerSlideImage as $image}
				<img src="{$image->the_path}" title="{$image->the_title}" alt="{$image->the_name}" class="img-fluid" />
			{/foreach}
		{else}
			<span>{$bannerSlideImage}</span>
		{/if}
	</section>
	<section id="header-streaming">
		{if is_array($streaming)}
			<a href="#"><img src="assets/imgs/listenStreaming.png" alt="listenStreaming" title="Ouça a Rádio ON-LINE" class="img-fluid" /></a>
		{else}
			<img src="assets/imgs/streamingOut.png" alt="streamingOut" title="Rádio ON-LINE fora do ar, voltaremos em breve!" class="img-fluid" />
		{/if}
	</section>
	<section id="main-navigation">
		<div id="logo">
			<a href="./"><img src="{$logo}" alt="{$logo}" title="{$logo_title}" class="img-fluid"></a>
		</div>
		<div id="date">{$date}</div>
		<nav>
			{foreach $navItem as $link}
				<a href="{$link->slug}">{$link->page}</a>
			{/foreach}
			<form enctype="multipart/form-data" action="" method="post">
				<input type="text" placeholder="Busca" required>
				<a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
			</form>
		</nav>
	</section>
</header>
<div id="main-content">