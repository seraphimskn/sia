<section class="mostReaded col-md-12 col-xs-12">
	<h2>MAIS LIDAS</h2>
	{foreach $most_readed as $bestnew}
		<article id="article-view-{$bestnew->ID}" class="col-md-12 col-xs-12 home-view">
			<h2>{$bestnew->post_title}</h2>
			<small><a href="staff/{$bestnew->author_link}">{$bestnew->author_name}</a> - {$bestnew->date}</small>
			<a href="article/{$bestnew->link}" class="excerpt">
				<p>{$bestnew->excerpt}</p>
			</a>
		</article>
	{/foreach}
	<a href="articles" class="more">MAIS NOT&Iacute;CIAS</a>
</section>