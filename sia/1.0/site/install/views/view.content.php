<div id="firstStep" <?php if($_POST['step'] == 'dbConfigs' || $_POST['step'] == 'admConfigs'): ?>class="d-none"<?php endif; ?>>
    <div class="row justify-content-center installation-content">
    	<div class="col-5">
    		<form class="border" name="configs" method="post" enctype="multipart/form-data">
    		<input type="hidden" name="step" value="dbConfigs" />
    			<div class="display-6 install-header">
    				<span>Esta instala&ccedil;&atilde;o ir&aacute; guiar voc&ecirc; durante o processo de instala&ccedil;&atilde;o do framework SIA - Sistema Integrado de Administra&ccedil;&atilde;o.</span>
    			</div>
    			<div class="col-12 text-center legend">
    				<small>Preencha abaixo com as informa&ccedil;&otilde;es do seu banco de dados:</small>
    			</div>
    			<div class="row ml-auto mr-auto">
        			<div class="form-group col-6">
        				<label for="bancodedados">Nome do Banco:</label>
        				<input type="text" class="form-control" id="bancodedados" name="db" required />
        			</div>
        			<div class="form-group col-6">
        				<label for="server">Servidor do Banco:</label>
        				<input type="text" class="form-control" id="server" name="host" required />
        			</div>
        		</div>
        		<div class="row ml-auto mr-auto">
        			<div class="form-group col-4">
        				<label for="dbUser">Nome de Usu&aacute;rio:</label>
        				<input type="text" class="form-control" id="dbUser" name="dbUser" required />
        			</div>
        			<div class="form-group col-4">
        				<label for="dbPwd">Senha de Usu&aacute;rio:</label>
        				<input type="text" class="form-control" id="dbPwd" name="dbPwd" />
        			</div>
        			<div class="form-group col-4">
        				<label for="tablePrefix">Prefixo das Tabelas:</label>
        				<input type="text" class="form-control" id="tablePrefix" name="tablePrefix" required />
        			</div>
        		</div>
        		<div class="row ml-auto mr-auto">
        			<div class="form-group col-12">
        				<input class="btn btn-primary btn-block" type="submit" value="Enviar" name="send" />
        			</div>
        		</div>
    		</form>
    	</div>
	</div>
</div>
<div id="secondStep" <?php if($_POST['step'] != 'dbConfigs'): ?>class="d-none"<?php endif; ?>>
    <div class="row justify-content-center installation-content">
    	<div class="col-5">
    		<form class="border" name="configs" method="post" enctype="multipart/form-data">
    		<input type="hidden" name="step" value="admConfigs" />
    			<div class="display-6 install-header">
    				<span>Neste passo, fa&ccedil;a a configura&ccedil;&atilde;o e estiliza&ccedil;&atilde;o do Painel de Controle</span>
    			</div>
    			<div class="row ml-auto mr-auto">
        			<div class="form-group col-12">
        				<label for="nomedosite">Nome do Site:</label>
        				<input type="text" class="form-control" id="nomedosite" name="siteName" required />
        			</div>
        			<div class="form-group col-4">
        				<label for="primaryColor">Cor Prim&aacute;ria:</label>
        				<input type="text" class="form-control" id="primaryColor" name="primaryColor" required />
        			</div>
        			<div class="form-group col-4">
        				<label for="secondaryColor">Cor Secund&aacute;ria:</label>
        				<input type="text" class="form-control" id="secondaryColor" name="secondaryColor" required />
        			</div>
        			<div class="form-group col-4">
        				<label for="fontColor">Cor da Fonte:</label>
        				<input type="text" class="form-control" id="fontColor" name="fontColor" required />
        			</div>
        		</div>
        		<div class="row ml-auto mr-auto">
        			<div class="form-group col-6">
        				<label for="file">Logo do Site:</label>
        				<input type="file" accept="image/*" class="form-control" id="file" name="logo" required />
        				<div class="col-12 text-center">
        					<i class="fa fa-spinner fa-spin fa-fw fa-3x d-none" aria-hidden="true"></i>
        					<img id="preview" class="img-responsive col-12">
        				</div>
        			</div>
        			<div class="form-group col-12">
        				<label for="description">Uma curta descri&ccedil;&atilde;o do Site:</label>
        				<input type="text" class="form-control" id="description" name="metaDescription" required />
        			</div>
        		</div>
        		<div class="row ml-auto mr-auto">
        			<div class="form-group col-6">
        				<label for="admin">Nome de Administrador:</label>
        				<input type="text" class="form-control" id="admin" name="admin" required />
          			</div>
        			<div class="form-group col-6">
        				<label for="password">Senha:</label>
        				<input type="text" class="form-control" id="password" name="password" required />
        			</div>
        			<div class="form-group col-6">
        				<label for="email">E-mail do Administrador:</label>
        				<input type="text" class="form-control" id="password" name="email" required />
        			</div>
        		</div>
        		<div class="row ml-auto mr-auto">
        			<div class="form-group col-12">
        				<input class="btn btn-primary btn-block" type="submit" value="Enviar" name="send" />
        			</div>
        		</div>
    		</form>
    	</div>
	</div>
</div>
<div id="finish" <?php if($_POST['step'] != 'admConfigs'): ?>class="d-none"<?php endif; ?>>
    <div class="row justify-content-center installation-content">
    	<div class="col-5">
    		<div class="display-5">
    			<p>Parab&eacute;ns! O seu Sistema Integrado de Administra&ccedil;&atilde;o de Sites - SIA - foi instalado. Clique <a href="../adm" class="btn btn-sm active btn-secondary" role="button" aria-pressed="true" >aqui</a> para come&ccedil;ar a trabalhar na estiliza&ccedil;&atilde;o do seu site! N&atilde;o se esque&ccedil;a de apagar a pasta de instala&ccedil;&atilde;o!</p>
    		</div>
    	</div>
	</div>
</div>