<h5 class="title"><i class="fa fa-list" aria-hidden="true"></i> M&iacute;dias</h5>
<div class="row float-left col-12 medias list">
	<section class="dock list first float-left">
		<section class="top-bar col-12">
			<div class="controls col-7 float-left">
				<div class="float-left">
					<a href="media/add" class="btn btn-primary btn-sm" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Adicionar Nova</a>
					<a href="media/update" class="btn btn-secondary btn-sm" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Editar Imagem</a>
					<a href="#" class="btn btn-danger btn-sm" role="button"><i class="fa fa-trash" aria-hidden="true"></i> Apagar</a>
				</div>
			</div>
        	<form class="search navbar-form float-right col-3" method="post" enctype="multipart/form-data" name="search-post">
        		<div class="form-group float-left">
        			<input type="text" class="form-control" name="search" placeholder="Procurar" />
        		</div>
        		<button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></button>
        	</form>
    	</section>
    	<section class="media-viewing thumbs col-12 row">
    	{if is_array($medias)}
    		{foreach $medias as $media}
    		<article class="media thumbnail col-2" data-id="{$media->ID}">
    			<img src="../{$media->media_url}" title="{$media->media_title}" class="the_thumb">
    			<form name="select_media" method="post" action="" enctype="multipart/form-data">
    				<input type="checkbox" name="the_media[]" value="{$media->ID}" >
    			</form>
    		</article>
    		{/foreach}
    	{else}
    		<span>{$medias}</span>		
    	{/if}
    	</section>
	</section>
</div>