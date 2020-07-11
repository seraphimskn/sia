<h5 class="title"><i class="fa fa-list" aria-hidden="true"></i> Usu&aacute;rios</h5>
<div class="row float-left col-12 users list">
	<section class="dock list first float-left">
		<section class="top-bar col-12">
			<div class="controls col-7 float-left">
				<div class="form-check form-check-inline float-left">
					<input type="checkbox" class="checkall form-check-input" name="checkall" id="checkall" />
					<label for="checkall" class="form-check-label">Marcar Todos</label>
				</div>
				<div class="float-left">
					<a href="user/add" class="btn btn-primary btn-sm" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Adicionar Novo</a>
					<a href="#" class="btn btn-secondary btn-sm" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Tornar Rascunho</a>
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
    	<section class="table col-12 float-left">
    		<div class="thead col-12 float-left row">
    			<div class="empty col-1"></div>
    			<div class="col-6"><h6>Nome do Usu&aacute;rio</h6></div>
    			<div class="col-2"><h6>N&iacute;vel</h6></div>
    			<div class="col-3"><h6>A&ccedil;&otilde;es</h6></div>
    		</div>
    		<div class="tbody col-12 row">
    		{if is_array($users)}
    			{foreach $users as $user}
    				<article class="the_user row float-left col-12">
    					<div class="checkbox col-1"><form class="form-check-inline"><input type="checkbox" name="check[]" value="{$user->ID}" /></form></div>
    					<div class="col-6">{$user->user_name}</div>
    					<div class="col-2">{$user->user_level}</div>
    					<div class="col-3"><a href="user/update/{$user->ID}" class="btn btn-primary btn-sm" role="btn"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a> <a href="#" class="btn btn-danger btn-sm" role="btn"><i class="fa fa-trash" aria-hidden="true"></i> Apagar</a></div>
    				</article>
    			{/foreach}
    		{else}
    				<article class="the_extension row float-left col-12">
    					<div class="col-12">{$users}</div>
    				</article>
    		{/if}
    		</div>
    	</section>
	</section>
</div>