{if isset($pages)}
	{if isset($page_id)}
	{else}
		{foreach $pages as $page}
			{if $page->page_type eq 'home'}
				<section class="col-12 row" id="{$page->page_slug}">
					<div class="col">{$page->page_value}</div>
				</section>
			{else}
				<section class="col-12 row page" id="{$page->page_slug}">
					<h1 class="title text-center col-12">{$page->page_title}</h1>
					<div class="content col-12">
						{if isset($page->page_value)}
							{$page->page_value}
						{/if}
						<pre>
						{var_dump($page)}
						</pre>
					</div>
				</section>
			{/if}
		{/foreach}
	{/if}
{/if}