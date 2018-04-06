{$facebookSDK}
{$twitterSDK}
<div class="internal main row">
	<section class="pagetitle row">
		<h2>{$post->post_title}</h2>
		<div class="socialmedias">
		<span>Siga-nos em nossas redes sociais</span>
		<div class="links">
			<a href="{$youtube_link}" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
			<a href="{$facebook_link}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
			<a href="{$twitter_link}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
			<a href="{$instagram_link}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
		</div>
		</div>
	<span class="author"><a href="staff/{$post->author_link}">{$post->author_name}</a> - {$post->date}</span>
	</section>
	<section class="col-md-7 col-xs-12 no-wrap">
    	<article id="article-view-{$post->ID}" class="col-12 article-view">
        	{if isset($post->options->Destaque)}
        		{$post->options->Destaque}
        	{/if}
        	<div class="content col-12">
        		{$post->post_value}
        	</div>
        	<div class="share col-12">
        		<div class="facebook">
        			<div class="fb-share-button" 
        					data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartilhar</a></div>
        		</div>
        		<div class="tweet">
        			<a class="twitter-share-button"
  						href="https://twitter.com/intent/tweet">Tweet</a>
        		</div>
        	</div>
		</article>
	</section>
	<section class="col-md-5 col-xs-12 right modules">
		<section class="authors col-12">
    		<ul>
    			{foreach $staffs as $staff}
    			<li>
    				<a href="staff/{$staff->link}"><span class="staff-name">{$staff->post_title}</span><img src="{$staff->image}" title="{$staff->post_title}" alt="{$staff->image}" class="img-fluid" /></a>
    			</li>
   			 {/foreach}
			</ul>
		</section>
		<section id="twitter" class="twitter-view col-12">
	<a class="twitter-timeline" data-width="100%"
		data-chrome="noheader nofooter noscrollbar"
		data-height="500"
		href="https://twitter.com/radiobandnewsfm?ref_src=twsrc%5Etfw">Siga a BandNewsFMES</a>
			<script async src="https://platform.twitter.com/widgets.js"
		charset="utf-8"></script>
		</section>
	</section>
</div>