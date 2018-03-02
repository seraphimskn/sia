<div class="internal main row">
	{foreach $staffs as $staff}
	<article class="col-4 staff">
		<a href="staff/{$staff->link}"> 
			<img src="{$staff->image}" title="{$staff->post_title}" alt="{$staff->image}"  class="img-fluid" />
			<h4 class="staff-name">{$staff->post_title}</h4>
			<p>{$staff->excerpt}</p>
		</a>
	</article>
	{/foreach}
	<section class="right modules">
		{foreach $page->options->aditional as $aditional} 
			{if $aditional === "most-readed"} 
				{if !isset($module_error_message)} 
					{include file="modules/most-readed.tpl"} 
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
		{/foreach}
	</section>
</div>