<div class="internal main row">
	<section class="col-10 featured content">
		<pre>
		{$page->options->Destaque};
		</pre>
	</section>
	<section class="col-10 about content">
		{$page->content}
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