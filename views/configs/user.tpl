<form name="add_config" method="post" enctype="multipart/form-data" action="" class="row the_configs">
<section class="top-row col-12 row first">
	<div class="col">
		<label>Nome de Usu&aacute;rio</label>
		<input type="text" name="user_name" class="form-control" required />
	</div>
	<div class="col">
		<label>E-mail</label>
		<input type="email" name="user_mail" class="form-control" required />
	</div>
	<div class="col">
		<label>Confirme o E-mail</label>
		<input type="email" name="confirm_mail" class="form-control" required />
	</div>	
	<div class="col">
		<label>Senha</label>
		<input type="password" name="password" class="form-control" required />
	</div>
	<div class="col">
		<label>Confirme a Senha</label>
		<input type="password" name="confirm_password" class="form-control" required />
	</div>	
</section>
<section class="row the_controls justify-content-end">
    <section class="controls col-4 row float-right dock">
    	<div class="col-12">
    		<label>Antes de salvar, selecione um n&iacute;vel de acesso para o usu&aacute;rio</label>
    		<select name="user_level" class="form-control" required>
    			{if isset($adm_levels)}
    				{if is_array($adm_levels)}
    					{foreach $adm_levels as $level}
    						<option value="{$level->option_name}" {if $level->option_name eq $user->user_level} selected {/if}>{$level->option_value}</option>
    					{/foreach}
    				{/if}
    			{else}
					<option value="">N&atilde;o h&aacute; n&iacute;veis de administra&ccedil;&atilde;o configurados.</option>    				
    			{/if}
    		</select>
    		<button class="btn btn-primary" name="publish" id="publish"><i class="fa fa-pencil" aria-hidden="true"></i> Salvar Usu&aacute;rio</button>
    		<button class="btn btn-danger" name="delete" id="delete"><i class="fa fa-trash" aria-hidden="true"></i> Deletar Usu&aacute;rio</button>
    	</div>
    </section>
</section>
</form>
