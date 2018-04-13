<form name="add_config" method="post" enctype="multipart/form-data" action="" class="row the_configs">
<section class="top-row col-12 row first">
	<h2>Nome do Par&acirc;metro</h2>
	<input type="text" name="config_name" class="form-control" required />
	<span></span>
</section>
<section class="post-body row dock first float-left">
<h4>Valor do Par&acirc;metro</h4>
<textarea name="config_value" id="tinyMCE"></textarea>
</section>
<section class="row the_controls justify-content-end">
    <section class="controls col-3 row float-right dock">
    	<div class="col-12">
    		<button class="btn btn-primary" name="publish" id="publish"><i class="fa fa-pencil" aria-hidden="true"></i> Publicar</button>
    		<button class="btn btn-danger" name="delete" id="delete"><i class="fa fa-trash" aria-hidden="true"></i> Deletar</button>
    		<div class="col-12 status">
    			<span>{$status} <a href="#" role="button" class="btn btn-warning btn-sm" >Tornar Rascunho</a></span>
    		</div>
    	</div>
    </section>
</section>
</form>
{$tinyMCE}