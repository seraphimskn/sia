<div class="internal main row">
	<section class="pagetitle row">
		<h2>{$page->page_title}</h2>
		<div class="socialmedias">
		<span>Siga-nos em nossas redes sociais</span>
		<div class="links">
			<a href="{$youtube_link}" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
			<a href="{$facebook_link}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
			<a href="{$twitter_link}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
			<a href="{$instagram_link}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
		</div>
	</div>
	</section>
	<section class="col-md-8 col-xs-12 row staffs left">
    	{foreach $staffs as $staff}
    	<article class="col-md-4 col-xs-12 staff">
    		<a href="staff/{$staff->link}"> 
    			<img src="{$staff->image}" title="{$staff->post_title}" alt="{$staff->image}"  class="img-fluid" />
    			<h4 class="staff-name">{$staff->post_title}</h4>
    		</a>
    	</article>
    	{/foreach}
	</section>
	<section class="right modules col-md-4 col-xs-12">
		<section class="mostReaded col-md-12 col-xs-12">
            	<h2>MAIS LIDAS</h2>
            	{foreach $most_readed as $bestnew}
            		<article id="article-view-{$bestnew->ID}" class="col-12 home-view">
            			<h2>{$bestnew->post_title}</h2>
            			<small><a href="staff/{$bestnew->author_link}">{$bestnew->author_name}</a> - {$bestnew->date}</small>
            			<a href="article/{$bestnew->link}" class="excerpt">
            				<p>{$bestnew->excerpt}</p>
            			</a>
            		</article>
            	{/foreach}
            	<a href="articles" class="more">MAIS NOT&Iacute;CIAS</a>
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