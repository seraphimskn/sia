</div>
<footer class="row">
	<div class="col-6">
    	<div id="logoFooter">
    	{if isset($logo_footer)}
    		<img src="{$logo_footer}" alt="{$logo_footer}" title="{$site_title}" class="img-fluid" />
    	{else}
    		<span>{$site_title}</span>
    	{/if}
    	</div>
    	<div id="sitemap">
    	<ul>
    	<li class="title">
    		MAPA DO SITE
    	</li>
    	{foreach $navItem as $link}
			<li><a href="{$link->slug}">{$link->page}</a></li>
		{/foreach}
    	</ul>
    	</div>
    	<div id="band">
    		<img src="assets/imgs/grupo-bandeirantes.png" alt="grupo-bandeirantes" title="Grupo Bandeirantes" class="img-fluid" />
    	</div>
	</div>
	<div class="col-6">
		<div class="socialmedias">
			<a href="{$youtube_link}" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
			<a href="{$facebook_link}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
			<a href="{$twitter_link}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
			<a href="{$instagram_link}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
		</div>
		<div class="adbutton">
			<a href=#><img src="assets/imgs/addbutton.png" alt="adbutton" title="Quero Anunciar na BandNews" /></a>
		</div>
		<span id="slogan">Em 20 minutos, tudo pode mudar.</span>
	</div>
	<div id="copyright">{$copyrights}</div>
</footer>
</body>
</html>