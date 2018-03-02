{$facebookSDK}
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
	<div id="carousel" class="row">
		{foreach $staffs as $staff}
			<article class="col-4">
				<a href="staff/{$staff->link}">
					<img src="{$staff->image}" title="{$staff->post_title}" alt="{$staff->image}" />
					<h4 class="staff-name">{$staff->post_title}</h4>
					<p>{$staff->excerpt}</p>
				</a>
			</article>
		{/foreach}
	</div>
</section>
<section class="row">
    <section class="latest-news row">
    {if isset($posts)}
    	{foreach $posts as $post}
    	<article id="article-view-{$post->ID}" class="col-10 home-view">
    		<a href="article/{$post->link}">{$post->post_options->Destaque}</a>
    		<small><a href="staff/{$post->author_link}">{$post->author_name}</a> - {$post->date}</small>
    		<a href="article/{$post->link}">
    			<p>{$post->excerpt}</p>
    		</a>
    	</article>
    	{/foreach}
    {/if}
    </section>
    <section class="externals row">
        <section class="featured-video col-10">
        <h4>V&iacute;deo em destaque</h4>
        {if isset($video)}
        	{$video->post_value}	
        {/if}
        </section>
        <section id="twitter" class="twitter-view col-4">
        	<a class="twitter-timeline" 
        	   data-width="100%"  
        	   data-chrome="noheader nofooter transparent noscrollbar"
        	   data-tweet-limit="3" 
        	   href="https://twitter.com/radiobandnewsfm?ref_src=twsrc%5Etfw">Siga a BandNewsFMES</a> 
        	   <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </section>
        <section id="facebook" class="facebook-view col-4">
        	<div class="fb-page" data-href="https://www.facebook.com/Bandnewses" 
                	data-tabs="timeline" 
                	data-small-header="false" 
                	data-adapt-container-width="true" 
                	data-hide-cover="false" 
                	data-show-facepile="true">
                <blockquote cite="https://www.facebook.com/Bandnewses" class="fb-xfbml-parse-ignore">
                	<a href="https://www.facebook.com/Bandnewses">BandNews FM Espírito Santo</a>
            	</blockquote>
            </div>
        </section>
	</section>
</section>
<section class="row">
    <section class="mostReaded col-10">
		{foreach $most_readed as $bestnew}
			<article id="article-view-{$bestnew->ID}" class="col-10 home-view">
    		<a href="article/{$bestnew->link}">{$bestnew->post_options->Destaque}</a>
    		<small><a href="staff/{$bestnew->author_link}">{$bestnew->author_name}</a> - {$bestnew->date}</small>
    		<a href="article/{$bestnew->link}">
    			<p>{$bestnew->excerpt}</p>
    		</a>
    	</article>
		{/foreach}
	</section>
	<section class="authors col-10">
		{foreach $staffs as $staff}
			<article class="col-10">
				<a href="staff/{$staff->link}">
					<h5 class="staff-name">{$staff->post_title}</h5>
					<img src="{$staff->image}" title="{$staff->post_title}" alt="{$staff->image}" />
				</a>
			</article>
		{/foreach}
	</section>
	<section class="newsletter col-10">
		<form enctype="multipart/form-data" method="post" action="">
			<input type="email" placeholder="E-mail" name="newsletter-subscribe" required /><button type="submit" name="enviar">RECEBER NEWSLETTER</button>
		</form>
	</section> 
</section>