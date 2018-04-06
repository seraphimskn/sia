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
	<div class="col-md-7 col-xs-12 no-wrap">
    	<section class="news views col-12 content">
        	{if isset($posts)}
            	{foreach $posts as $post}
            	<article id="article-view-{$post->ID}" class="col-10 home-view">
            		<a href="article/{$post->link}" class="featured-image link">{$post->post_options->Destaque}</a>
            		<a href="article/{$post->link}" class="title link">{$post->post_title}</a>
            		<small><a href="staff/{$post->author_link}">{$post->author_name}</a> - {$post->date}</small>
            		<a href="article/{$post->link}" class="excerpt">
            			<p>{$post->excerpt}</p>
            		</a>
            	</article>
            	{/foreach}
            {/if}
        </section>
        <section class="left bottom modules col-12 no-wrap">
    		{foreach $page->options->aditional as $aditional}
    			{if $aditional === "youtube"}
    				{if !isset($module_error_message)}
    					{include file="modules/youtube.tpl"}
    				{else}
    					{$module_error_message}
    				{/if}
    			{/if}
    		{/foreach}
    	</section>
    </div>
	<section class="right modules col-md-5 col-xs-12">
		{foreach $page->options->aditional as $aditional}
			{if $aditional === "staff"}
				{if !isset($module_error_message)}
					{include file="modules/staff.tpl"}
				{else}
					{$module_error_message}
				{/if}
			{/if}
			{if $aditional === "newsletter"}
				{if !isset($module_error_message)}
					{include file="modules/newsletter.tpl"}
				{else}
					{$module_error_message}
				{/if}
			{/if}
		{/foreach}
	</section>
</div>