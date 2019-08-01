<form name="add_post" method="post" enctype="multipart/form-data" action="" class="row">
<section class="top-row col-12 row first">
	<h2>T&iacute;tulo do Post</h2>
	<input type="text" name="post_title" class="form-control" {if isset($post->post_title)}value="{$post->post_title}"{/if} required />
	<span>URL: {if isset($post->slug)}{if $server['SERVER_PORT'] eq '80'}http://{else}https://{/if}{$server['HTTP_HOST']}/{$url[1]}/{$url[2]}/article/{$post->slug}{/if} <a href="#" id="edit_url"><i class="fa fa-pencil" aria-hidden="true"></i></a></span>
</section>
<section class="post-body col-8 row dock first float-left">
<h4>Conte&uacute;do do Post</h4>
<textarea name="post_value" id="tinyMCE">{if isset($post->post_value)}{$post->post_value}{/if}</textarea>
</section>
<section class="right row col-3">
    <section class="controls col-12 row float-right dock">
    	<div class="col-12">
    		<button class="btn btn-primary" name="publish" id="publish"><i class="fa fa-pencil" aria-hidden="true"></i> {if isset($post)}Atualizar{else}Publicar{/if}</button>
    		<button class="btn btn-danger" name="delete" id="delete"><i class="fa fa-trash" aria-hidden="true"></i> Deletar</button>
    		<div class="col-12 status">
    			<span>{$status} <a href="#" role="button" class="btn btn-warning btn-sm" id="draft" >Tornar Rascunho</a></span>
    			<span>Publicado em {$date_published}</span>
    		</div>
    	</div>
    </section>
    <section class="post-type dock float-right col-12">
    	<h6>Tipo de Post</h6>
    	<div class="the_types float-left" id="the_types">
    		{if is_array($post_types)}
    			{foreach $post_types as $type}
    				<article><input type="radio" value="{$type->option_value}" id="{$type->option_value}" name="post_type"> <label for="{$type->option_value}">{$type->option_value}</label></article>
    			{/foreach}
    		{else}
    			<span>N&atilde; h&aacute; um tipo de post definido ainda.</span>
    		{/if}
    	</div>
    	<a href="#" role="button" class="btn btn-sm btn-secondary" id="new_type">Adicionar Tipo de Post</a>
    </section>
    <section class="post-image dock float-right col-12">
    	<h6>Imagem Destacada</h6>
    	<div class="the_image">
    		<div class="image_preview col-12"><img src="../{$image}" class="img-fluid" /></div>
    		<input type="hidden" value="" name="options['featured-image']" />
    		<a href="#" role="button" class="btn btn-secondary btn-sm" id="add_image">{if isset($post)}Trocar Imagem de Destaque{else}Adicionar Imagem em Destaque{/if}</a> 
    	</div>
	</section>
</section>
<section class="bottom float-left dock first options row">
	<section class="seo col-12 row">
		<h4>SEO do Post</h4>
		<div class="form-group col-3">
			<label>TAGs</label>
    		<input type="text" name="post_options['seo']"  class="form-control" {if isset($post_options->tags)}value="{$post_options->tags}"{else}placeholder="tags..."{/if}/>
    		<small class="red">*Separe as TAGs com ";"</small>
		</div>
		<div class="form-group col-6">
			<label>Meta-Description</label>
			<input type="text" name="post_options['meta-description']" class="form-control" {if isset($post_options->meta_description)}value="{$post_options->meta_description}"{else}placeholder="Lorem ipsum dolor..."{/if} />
		</div>
		<div class="form-group col-3">
			<label>Palavra-Chave</label>
    		<input type="text" name="post_options['keyword]"  class="form-control" {if isset($post_options->keywords)}value="{$post_options->keywords}"{else}placeholder="keyword..."{/if}/>
    		<small class="red">*Use no m&aacute;ximo 2 palavras-chave</small>
		</div>
	</section>
	<section class="extensions col-12 row">
		<h4>Plug-ins Ativos e Extens&otilde;es</h4>
		<div class="form-group col-5" data-count="1">
			<label>Tipo de Plug-in/Extens&atilde;o</label>
			<select class="form-control" name="options['extensions']">
				{if is_array($extensions)}
					{foreach $extensions as $extension}
						<option value="{$extension->ID}" {if $extension->ID eq $post->extension}selected{/if}>{$extension->extension_name}</option>
					{/foreach}
				{else}
					<option value="">Nenhum plug-in ou extens&atilde;o foi configurada ainda.</option>
				{/if}
			</select>
		</div>
		<div class="form-group col-2">
			<label>ID do Plug-in/Extens&atilde;o</label>
			<select class="form-control" name="options['extensions']['extension_id']" readonly>
			</select>
		</div>
		<div class="form-group col-3 controls">
			<label>&nbsp;</label>
			<a href="#" role="button" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar Mais</a>
		</div>
	</section>
</section>
</form>
{$tinyMCE}
{$ajax}