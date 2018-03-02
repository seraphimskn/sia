<section class="mostReaded col-10">
	{foreach $most_readed as $bestnew}
	<article id="article-view-{$bestnew->ID}" class="col-10 home-view">
		<small><a href="staff/{$bestnew->author_link}">{$bestnew->author_name}</a> - {$bestnew->date}</small> 
		<a href="article/{$bestnew->link}">
			<p>{$bestnew->excerpt}</p>
		</a>
	</article>
	{/foreach}
</section>