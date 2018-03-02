<div class="internal main row">
	<section class="news views col-10 content">
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
    <section class="left bottom modules">
		{foreach $page->options->aditional as $aditional}
			{if $aditional === "youtube"}
				{if !isset($module_error_message)}
					{include file="modules/youtube.tpl"}
				{else}
					{$module_error_message}
				{/if}
			{/if}
			{if $aditional === "twitter"}
				{if !isset($module_error_message)}
					{include file="modules/twitter.tpl"}
				{else}
					{$module_error_message}
				{/if}
			{/if}
			{if $aditional === "facebook"}
				{if !isset($module_error_message)}
					{include file="modules/facebook.tpl"}
				{else}
					{$module_error_message}
				{/if}
			{/if}
		{/foreach}
	</section>
	<section class="right modules">
		{foreach $page->options->aditional as $aditional}
			{if $aditional === "most-readed"}
				{if !isset($module_error_message)}
					{include file="modules/most-readed.tpl"}
				{else}
					{$module_error_message}
				{/if}
			{/if}
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