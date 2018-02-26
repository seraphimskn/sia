<section id="top row">
	<div class="radiostreaming col-3">
		<a href="{$streamingUrl}" target="_blank"><img src="{$streamingButton}" title="Ouça a Rádio BANDNEWS ao vivo!" alt="radio-online" class="img-fluid" /></a>
	</div>
	<div class="socialmedias col-6">
		<span>Siga-nos em nossas redes sociais</span>
		<div class="links">
			<a href="{$youtube_link}" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
			<a href="{$facebook_link}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
			<a href="{$twitter_link}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
			<a href="{$instagram_link}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
		</div>
	</div>
	<div id="carousel">
		<pre>
		{var_dump($staffs)}
		</pre>
	</div>
</section>
<section class="left">
{include file="commons/left-sidebar.tpl"}
</section>
<section class="right">
{include file="commons/right-sidebar.tpl"}
</section>