<form name="add_page" method="post" enctype="multipart/form-data" action="" class="row">
{if isset($msg)}{$msg}{/if}
<section class="top-row col-12 row first">
	<h2>T&iacute;tulo da P&aacute;gina</h2>
	<input type="text" name="page_title" class="form-control" {if isset($page->page_title)}value="{$page->page_title}"{/if}required />
	<span class="col-12"><label class="float-left">URL: <span id="the_slug">{if isset($page->page_slug)}{if $server['SERVER_PORT'] eq '80'}http://{else}https://{/if}{$server['HTTP_HOST']}/hangar/site/{$page->page_slug}{/if}</span></label> <input type="text" name="page_slug" value="{if isset($page->page_slug)}{$page->page_slug}{/if}" id="page_slug" class="form-control col-2 float-left" {if isset($page->page_slug)}style="display:none"{/if}><a href="#" id="edit_url"><i class="fa fa-pencil" aria-hidden="true"></i></a></span>
</section>
<section class="post-body col-8 row dock first float-left">
<h4>Conte&uacute;do da P&aacute;gina</h4>
<textarea name="page_value" id="tinyMCE">{if isset($page->page_value)}{$page->page_value}{/if}</textarea>
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
    	<h6>Tipo da P&aacute;gina</h6>
    	<div class="the_types float-left col-12" id="the_types">
    		{if is_array($page_types)}
    			{foreach $page_types as $type}
    				<article class="col-12"><input type="radio" value="{$type->option_value}" id="{$type->option_value}" name="page_type" {if isset($page->page_type)}{if $page->page_type eq $type->option_value}checked{/if}{/if}> <label for="{$type->option_value}">{$type->option_name}</label></article>
    			{/foreach}
    		{else}
    			<span>N&atilde; h&aacute; um tipo de post definido ainda.</span>
    		{/if}
    	</div>
    	<a href="#" role="button" class="btn btn-sm btn-secondary" id="new_type" data-session="{$userID}">Adicionar Tipo de P&aacute;gina</a>
    </section>
    <section class="post-image dock float-right col-12">
    	<h6>Imagem Destacada</h6>
    	<div class="the_image">
    		<div class="image_preview col-12"><img src="{$image}" class="img-fluid" /></div>
    		<input type="hidden" value="{if isset($image)}{$image}{/if}" name="options[featured_image]" />
    		<a href="#" role="button" class="btn btn-secondary btn-sm" id="add_image">Adicionar Imagem em Destaque</a> 
    	</div>
	</section>
</section>
<section class="bottom float-left dock first options row">
	<section class="seo col-12 row">
		<h4>SEO da P&aacute;gina</h4>
		<div class="form-group col-3">
			<label>TAGs</label>
    		<input type="text" name="options[seo]"  class="form-control" {if isset($options->seo)}value="{$options->seo}"{else}placeholder="tags..." {/if}/>
    		<small class="red">*Separe as TAGs com ","</small>
		</div>
		<div class="form-group col-6">
			<label>Meta-Description</label>
			<input type="text" name="options[meta_description]" class="form-control" {if isset($options->meta_description)}value="{$options->meta_description}"{else}placeholder="Lorem ipsum dolor sit amet..." {/if}/>
		</div>
		<div class="form-group col-3">
			<label>Palavra-Chave</label>
    		<input type="text" name="options[keyword]"  class="form-control"  {if isset($options->keyword)}value="{$options->keyword}"{else}placeholder="keyword..."{/if}/>
    		<small class="red">*Use no m&aacute;ximo 2 palavras-chave</small>
		</div>
	</section>
	<section class="extensions col-12 row">
		<h4>Plug-ins Ativos e Extens&otilde;es</h4>
		<div class="form-group col-5">
			<label>Tipo de Plug-in/Extens&atilde;o</label>
			<select class="form-control" name="options[extensions]">
				{if isset($extensions)}
					{if is_array($extensions)}
						{foreach $extensions as $extension}
							<option value="{$extension->ID}" {if isset($options->extension)}{if $options->extension eq $extension->ID}selected{/if}{/if}>{$extension->extension_name}</optiion>
						{/foreach}
					{/if}
				{else}
					<option value="">N&atilde;o h&aacute; nenhum plug-in ou extens&atilde;o instalados</option>
				{/if}
			</select>
		</div>
		<div class="form-group col-3 controls">
			<label>&nbsp;</label>
			<a href="#" role="button" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar Mais</a>
			<a href="#" role="button" class="btn btn-danger"><i class="fa fa-minus" aria-hidden="true"></i> Remover</a>
		</div>
	</section>
</section>
</form>
{$ajax}
{$tinyMCE}