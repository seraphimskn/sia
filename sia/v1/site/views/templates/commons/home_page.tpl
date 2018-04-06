{$facebookSDK}
{$carousel}
<section id="top" class="row">
	<div class="radiostreaming col-md-3 col-xs-12">
		<a href="#" data-url="{$streamingUrl}"><img src="{$streamingButton}" title="Ou&ccedil;a a R&aacute;dio BANDNEWS ao vivo!" alt="radio-online" class="img-fluid" /></a>
	</div>
	<div class="socialmedias col-md-9 col-xs-12">
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
			<article class="element">
				<a href="staff/{$staff->link}" class="col-md-12 col-xs-12">
					<img src="{$staff->image}" title="{$staff->post_title}" alt="{$staff->image}" class="img-fluid" />
					<h2 class="staff-name">{$staff->post_title}</h2>
					<p class="excerpt">{$staff->excerpt}</p>
				</a>
			</article>
		{/foreach}
	</div>
</section>
<div id="mid" class="row">
    <section class="col-md-7 col-xs-12 ">
        <section class="latest-news row">
        {if isset($posts)}
        	{foreach $posts as $post}
        	<article id="article-view-{$post->ID}" class="col-md-11 col-xs-12 home-view">
        		<a href="article/{$post->link}" class="featured-image link">{$post->post_options->Destaque}</a>
        		<small><a href="staff/{$post->author_link}">{$post->author_name} - </a> {$post->date}</small>
        		<a href="article/{$post->link}" class="title link">{$post->post_title}</a>
        		<a href="article/{$post->link}" class="excerpt">
        			<p>{$post->excerpt}</p>
        		</a>
        	</article>
        	{/foreach}
        {/if}
        </section>
        <section class="externals row">
            <section class="featured-video col-md-12 col-xs-12">
            <h2>V&iacute;deo em destaque</h2>
            {if isset($video)}
            	{$video->post_value}	
            {/if}
            </section>
            <section id="twitter" class="twitter-view col-md-6 col-xs-12">
            	<a class="twitter-timeline" 
            	   data-width="100%"  
            	   data-chrome="noheader nofooter noscrollbar"
            	   data-height="700"
            	   href="https://twitter.com/radiobandnewsfm?ref_src=twsrc%5Etfw">Siga a BandNewsFMES</a> 
            	   <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </section>
            <section id="facebook" class="facebook-view col-md-5 col-xs-12">
            	<div class="fb-page" data-href="https://www.facebook.com/Bandnewses" 
                    	data-tabs="timeline" 
                    	data-small-header="false" 
                    	data-adapt-container-width="true" 
                    	data-hide-cover="false" 
                    	data-show-facepile="true"
                    	data-height="700">
                    <blockquote cite="https://www.facebook.com/Bandnewses" class="fb-xfbml-parse-ignore">
                    	<a href="https://www.facebook.com/Bandnewses">BandNews FM Espírito Santo</a>
                	</blockquote>
                </div>
            </section>
    	</section>
    </section>
    <section class="col-md-5 col-xs-12">
        <section class="mostReaded col-md-12 col-xs-12">
        	<h2>MAIS LIDAS</h2>
    		{foreach $most_readed as $bestnew}
    			<article id="article-view-{$bestnew->ID}" class="col-12 home-view">
        		<small><a href="staff/{$bestnew->author_link}">{$bestnew->author_name}</a> - {$bestnew->date}</small>
        		<a href="article/{$bestnew->link}" class="excerpt">
        			<p>{$bestnew->excerpt}</p>
        		</a>
        	</article>
    		{/foreach}
    		<a href="articles" class="more">MAIS NOT&Iacute;CIAS</a>
    	</section>
    	<section class="authors col-12">
    		<ul>
    		{foreach $staffs as $staff}
    			<li>
    				<a href="staff/{$staff->link}"><span class="staff-name">{$staff->post_title}</span><img src="{$staff->image}" title="{$staff->post_title}" alt="{$staff->image}" class="img-fluid" /></a>
    			</li>
    		{/foreach}
    		</ul>
    	</section>
    	<section class="newsletter col-md-12 col-xs-12">
    		<form enctype="multipart/form-data" method="post" action="">
    			<input type="email" placeholder="E-mail" name="newsletter-subscribe" required class="form-control"/><button type="submit" name="enviar" class="btn btn-light">RECEBER NEWSLETTER</button>
    		</form>
    	</section> 
    </section>
</div>