<form name="add_media" method="post" enctype="multipart/form-data" action="" class="row the_medias">
{if isset($msg)}
	{$msg}
{/if}
<section class="top-row col-12 row first">
	<h2>Adicionar M&iacute;dias</h2>
</section>
<section class="media-body row dock first float-left">
	<div class="the_media col-3 row" data-count="1">
		<div class="the_preview col-12"></div>
		<label class="col the_browse">
			<span class="btn btn-secondary">
				Browse <input type="file" name="media">
			</span>
		</label>
		<div class="the_buttons col-2">
			<button class="btn btn-primary" id="add_line"><i class="fa fa-plus" aria-hidden="true"></i></button>
		</div>
	</div>
</section>
<section class="row the_controls bottom justify-content-end">
    <section class="controls col-3 row float-right dock">
    	<div class="col-12">
    		<button class="btn btn-primary" name="publish" id="publish"><i class="fa fa-pencil" aria-hidden="true"></i> Salvar</button>
    		<button class="btn btn-danger" name="delete" id="delete"><i class="fa fa-trash" aria-hidden="true"></i> Deletar</button>

    	</div>
    </section>
</section>
</form>