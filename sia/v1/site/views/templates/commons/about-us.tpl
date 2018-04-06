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
	<div class="left col-md-7 col-xs-12">
		<section class="col-12 featured content">
			{$page->options->Destaque}
		</section>
		<section class="col-md-12 col-xs-12 about content">
			{$page->content}
		</section>
		<section class="about left bottom modules col-md-12 col-xs-12 no-wrap">
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
	</div>
	<section class="right modules col-md-5 col-xs-12">
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