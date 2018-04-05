{$kinetic}
<div class="row float-left top-row">
	<section class="col-3 local-visitors dock first">
  		<span class="title">Visitantes Locais</span>
  		<span class="results">{if !isset($metrics['info'])}{$metrics['locals']}{else}{$metrics['info']}{/if}</span>
  	</section>
  	<section class="col-3 global-visitors dock">
  		<span class="title">Visitantes Globais</span>
  		<span class="results">{if !isset($metrics['info'])}{$metrics['globals']}{else}{$metrics['info']}{/if}</span>
  	</section>
  	<section class="col-3 daily-clicks dock">
  		<span class="title">Visitas Di&aacute;rias</span>
  		<span class="results">{if !isset($metrics['info'])}{$metrics['daily']}{else}{$metrics['info']}{/if}</span>
  	</section>
  	<section class="col-2 monthly-partial dock">
  		<span class="title">Parcial Mensal</span>
  		<span class="results">{if !isset($metrics['info'])}{$metrics['partial']}{else}{$metrics['info']}{/if}</span>
  	</section>
</div>
<div class="row float-left middle-row graphic columns">
	<section class="col-3 visits-stats dock first">
		<span class="title grey">Estat&iacute;stica visitas</span>
		<canvas id="columns-graphic" class="col-12">
		</canvas>
	</section>
	<section class="visits-stats dock graphic lines">
		<span class="title grey">Estat&iacute;sticas mensais</span>
		<canvas id="lines-graphic" class="col-12">
		</canvas>
	</section>
</div>
<div class="row float-left bottom-row">
	<section class="col-3 first visits-stats dock graphic circle">
		<span class="title grey">Percentagem de Visitas</span>
		<canvas id="circle-graphic" class="col-12">
		</canvas>
	</section>
	<section class="col-3 posts dock">
  		<span class="title grey">Total de Publica&ccedil;&otilde;es</span>
  		<div class="the_posts col-12 float-left">
  		{if isset($posts) && is_array($posts)}
  			{foreach $posts as $post}
  				<article class="post"><a href="/post/?edit=true&post={$post->ID}">{$post->post_title}</a> <span class="clickstats">{$post->post_clicks}</span></article>
  			{/foreach}
  		{elseif isset($posts) && !is_array($posts)}
  			<span class="info">Ainda n&atilde;o h&aacute; postagens publicadas</span>
  		{/if}
  		</div>
  		<a href="posts" class="btn btn-success float-left">Todas</a>
  	</section>
</div>