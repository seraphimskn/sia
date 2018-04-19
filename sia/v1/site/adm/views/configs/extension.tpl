<form name="add_extension" method="post" enctype="multipart/form-data" action="" class="row the_configs">
{if isset($msg)}{$msg}{/if}
<section class="top-row col-12 row first">
	<h2>Nome da Extens&atilde;o</h2>
	<input type="text" name="extension_name" class="form-control" {if isset($extension->extension_name)}value="{$extension->extension_name}"{/if}required />
</section>
<section class="post-body col-8 row dock first float-left">
<h4>Conte&uacute;do da Extens&atilde;o</h4>
<textarea name="extension_value" id="tinyMCE">{if isset($extension->extension_value)}{$extension->extension_value}{/if}</textarea>
</section>
<section class="right row col-3">
    <section class="controls col-12 row float-right dock">
    	<div class="col-12">
    		<button class="btn btn-primary" name="publish" id="publish"><i class="fa fa-pencil" aria-hidden="true"></i> Publicar</button>
    		<button class="btn btn-danger" name="delete" id="delete"><i class="fa fa-trash" aria-hidden="true"></i> Deletar</button>
    		<div class="col-12 status">
    			<span>{$status} <button name="unpublish" id="unpublish" class="btn btn-warning btn-sm" >Tornar Rascunho</button></span>
    		</div>
    		<div class="col-12 published">
    			<span>Publicado em {if isset($date_published)}{$date_published}{/if}</span>
    		</div>
    	</div>
    </section>
    <section class="post-type dock float-right col-12">
    	<h6>Tipo da Extens&atilde;o</h6>
    	<div class="the_types float-left col-12" id="the_types">
    		{if is_array($extension_types)}
    			{foreach $extension_types as $type}
    				<article class="col-12"><input type="radio" value="{$type->option_value}" id="{$type->option_value}" name="extension_type" {if isset($extension->extension_type)}{if $extension->extension_type eq $type->option_value}checked{/if}{/if}> <label for="{$type->option_value}">{$type->option_name}</label></article>
    			{/foreach}
    		{else}
    			<span>N&atilde; h&aacute; um tipo de extens&atilde;o definido ainda.</span>
    		{/if}
    	</div>
    	<a href="#" role="button" class="btn btn-sm btn-secondary" id="new_type" data-session="{$userID}">Adicionar Tipo de Extens&atilde;o</a>
    </section>
</section>
</form>
{$ajax}
{$tinyMCE}