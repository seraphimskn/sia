<?php
/* Smarty version 3.1.30, created on 2020-03-27 12:50:12
  from "/var/www/html/sigms/views/users/edit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e7df684910410_93702913',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '93e9f2ecc92af5eefbc0e44dda53f08f3215edc3' => 
    array (
      0 => '/var/www/html/sigms/views/users/edit.tpl',
      1 => 1584130668,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e7df684910410_93702913 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['is_seller']->value)) {?>
<div class="form row float-left col-12">
    <form class="form-control row" action="" method="post" enctype="multipart/form-data" id="editusers">
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->id;?>
" id="id" />
    <input type="hidden" name="send" value="edit" />
    <input type="hidden" name="imagem" id="imagem" />
        <div class="imagem col">
            <div class="no-image col-3">
                <img class="img-fluid img-thumbnail" id="preview" <?php if (isset($_smarty_tpl->tpl_vars['usuario']->value->imagem)) {?>src="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->imagem;?>
"<?php } else { ?>src="assets/img/no-image.png"<?php }?>/>
            </div>
            <div class="file">
                <input type="file" class="form-control" id="file" name="imagem" <?php if (isset($_smarty_tpl->tpl_vars['usuario']->value->imagem)) {?>value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->imagem;?>
"<?php }?>/>
            </div>
        </div>
        <div class="nome col">
            <label for="nome">Nome:</label> <input type="text" name="nome" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->nome;?>
" />
        </div>
        <div class="cpf_cnpj col">
            <label for="cpf_cnpj">CPF/CNPJ:</label> <input type="text" name="cpf_cnpj" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->cpf_cnpj;?>
" />
        </div>
        <div class="estado_civil col">
            <label for="estado_civil">Estado Civil:</label> <input type="text" name="estado_civil" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->estado_civil;?>
" />
        </div>
        <div class="escolaridade col">
            <label for="escolaridade">Escolaridade:</label> <input type="text" name="escolaridade" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->escolaridade;?>
" />
        </div>
        <div class="rg col">
            <label for="rg">RG:</label> <input type="text" name="rg" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->rg;?>
" />
        </div>
        <div class="nascimento col">
            <label for="nascimento">Data de Nascimento:</label> <input type="date" name="data_nascimento" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->data_nascimento;?>
" />
        </div>
        <div class="nivel col">
            <label for="nivel">Nível de Usuário:</label>
            <select name="nivel" class="form-control" id="nivel" readonly> 
                <?php if (isset($_smarty_tpl->tpl_vars['levels']->value)) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['levels']->value, 'level');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['level']->value) {
?>
                        <?php if ($_smarty_tpl->tpl_vars['level']->value->id == $_smarty_tpl->tpl_vars['usuario']->value->id_nivel) {?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['level']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['level']->value->nome;?>
</option>
                        <?php }?>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                <?php }?>
            </select> 
        </div>
        <div class="profissao col">
            <label for="profissao">Profissão:</label> <input type="text" name="profissao" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->profissao;?>
" />
        </div>
        <div class="endereco col">
            <label for="endereco">Endereço:</label> <input type="text" name="endereco" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->endereco;?>
" />
        </div>
        <div class="bairro col">
            <label for="bairro">Bairro:</label> <input type="text" name="bairro" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->bairro;?>
" />
        </div>
        <div class="cep col">
            <label for="cep">CEP:</label> <input type="text" name="cep" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->cep;?>
" />
        </div>
        <div class="cidade col">
            <label for="cidade">Cidade:</label> <input type="text" name="cidade" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->cidade;?>
" />
        </div>
        <div class="estado col">
            <label for="estado">Estado:</label>
            <select name="estado" class="form-control">
                <option value="AC" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'AC') {?>selected<?php }?>>Acre</option>
                <option value="AL" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'AL') {?>selected<?php }?>>Alagoas</option>
                <option value="AP" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'AP') {?>selected<?php }?>>Amapá</option>
                <option value="AM" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'AM') {?>selected<?php }?>>Amazonas</option>
                <option value="BA" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'BA') {?>selected<?php }?>>Bahia</option>
                <option value="CE" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'CE') {?>selected<?php }?>>Ceará</option>
                <option value="DF" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'DF') {?>selected<?php }?>>Distrito Federal</option>
                <option value="ES" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'ES') {?>selected<?php }?>>Espírito Santo</option>
                <option value="GO" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'GO') {?>selected<?php }?>>Goiás</option>
                <option value="MA" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'MA') {?>selected<?php }?>>Maranhão</option>
                <option value="MT" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'MT') {?>selected<?php }?>>Mato Grosso</option>
                <option value="MS" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'MS') {?>selected<?php }?>>Mato Grosso do Sul</option>
                <option value="MG" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'MG') {?>selected<?php }?>>Minas Gerais</option>
                <option value="PA" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'PA') {?>selected<?php }?>>Pará</option>
                <option value="PB" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'PB') {?>selected<?php }?>>Paraíba</option>
                <option value="PR" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'PR') {?>selected<?php }?>>Paraná</option>
                <option value="PE" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'PE') {?>selected<?php }?>>Pernambuco</option>
                <option value="PI" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'PI') {?>selected<?php }?>>Piauí</option>
                <option value="RJ" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'RJ') {?>selected<?php }?>>Rio de Janeiro</option>
                <option value="RN" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'RN') {?>selected<?php }?>>Rio Grande do Norte</option>
                <option value="RS" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'RS') {?>selected<?php }?>>Rio Grande do Sul</option>
                <option value="RO" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'RO') {?>selected<?php }?>>Rondônia</option>
                <option value="RR" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'RR') {?>selected<?php }?>>Roraima</option>
                <option value="SC" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'SC') {?>selected<?php }?>>Santa Catarina</option>
                <option value="SP" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'SP') {?>selected<?php }?>>São Paulo</option>
                <option value="SE" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'SE') {?>selected<?php }?>>Sergipe</option>
                <option value="TO" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'TO') {?>selected<?php }?>>Tocantins</option>
            </select>
        </div>
        <div class="telefone col">
            <label for="telefone">Telefone:</label> <input type="text" name="telefone" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->telefone;?>
" />
        </div>
        <div class="email col">
            <label for="email">E-mail:</label> <input type="email" name="email" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->email;?>
" />
        </div>
        <?php if (isset($_smarty_tpl->tpl_vars['usuario']->value->convenio)) {?>
         <div class="convenio col">
            <label for="convenio">Convênio:</label>
            <select name="convenio" class="form-control">
            <?php if (isset($_smarty_tpl->tpl_vars['plans']->value)) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plans']->value, 'plan');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['plan']->value) {
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['plan']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->convenio == $_smarty_tpl->tpl_vars['plan']->value->id) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['plan']->value->nome;?>
</option>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <?php }?>
            </select>
        </div>
        <?php }?>
        <div class="categoria col text" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->id_nivel == 3) {?>style="display: none"<?php }?>>
            <label for="categoria">Categoria:</label> <input type="text" name="categoria" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->categoria;?>
" />
        </div>
        <div class="categoria col select" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->id_nivel != 3) {?>style="display: none"<?php }?>>
            <label for="categoria">Categoria:</label> 
            <select name="categoria" class="form-control" readonly disabled>
                <option value="titular" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->categoria == 'titular') {?>selected<?php }?>>Titular</option>
                <option value="dependente" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->categoria == 'dependente') {?>selected<?php }?>>Dependente</option>
            </select>            
            <div class="auto-search">
                <input class="form-control mt-2" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->categoria != 'dependente') {?>style="display: none"<?php }?> id="search-titular" placeholder="Busque aqui o titular do contrato"/>
                <input type="hidden" name="id-titular" id="id-titular" />
            </div>
        </div>
        <div class="data-cobranca col" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->id_nivel != 3 && $_smarty_tpl->tpl_vars['usuario']->value->id_nivel != 4) {?>style="display: none"<?php }?>>
            <label for="data-cobranca">Melhor dia para vencimento: </label>
            <input type="text" class="form-control mt-2" id="data-cobranca" value="<?php echo $_smarty_tpl->tpl_vars['usuario_contrato']->value->data_cobranca;?>
"/>
        </div>
        <div class="desconto col" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->id_nivel != 4) {?>style="display: none"<?php }?>>
            <label for="desconto">Desconto: %</label><input type="text" name="desconto" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->desconto;?>
"/>
        </div>
        <div class="ativo col row">
            <span>Usuário Ativo:</span> 
            <div class="col"><label>Sim: </label><input type="radio" name="ativo" class="form-control" value="1" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->ativo == 1) {?>checked<?php }?> /></div>
            <div class="col"><label>Não: </label><input type="radio" name="ativo" class="form-control" value="0" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->ativo == 0) {?>checked<?php }?> /></div>
        </div>       
        <div class="col">
            <button class="btn btn-success float-right" id="sendEdit">Enviar</button>
            <button class="btn btn-danger float-right" id="cancelEdit">Cancelar</button>
        </div>
    </form>
</div>
<?php } else { ?>
<div class="form row float-left col-12">
    <form class="form-control row" action="" method="post" enctype="multipart/form-data" id="editusers">
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->id;?>
" id="id" />
    <input type="hidden" name="send" value="edit" />
    <input type="hidden" name="imagem" id="imagem" />
        <div class="imagem col">
            <div class="no-image col-3">
                <img class="img-fluid img-thumbnail" id="preview" <?php if (isset($_smarty_tpl->tpl_vars['usuario']->value->imagem)) {?>src="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->imagem;?>
"<?php }?>/>
            </div>
            <div class="file">
                <input type="file" class="form-control" id="file" name="imagem" <?php if (isset($_smarty_tpl->tpl_vars['usuario']->value->imagem)) {?>value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->imagem;?>
"<?php }?>/>
            </div>
        </div>
       <div class="nome col">
            <label for="nome">Nome:</label> <input type="text" name="nome" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->nome;?>
" />
        </div>
        <div class="cpf_cnpj col">
            <label for="cpf_cnpj">CPF/CNPJ:</label> <input type="text" name="cpf_cnpj" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->cpf_cnpj;?>
" />
        </div>
        <div class="estado_civil col">
            <label for="estado_civil">Estado Civil:</label> <input type="text" name="estado_civil" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->estado_civil;?>
" />
        </div>
        <div class="escolaridade col">
            <label for="escolaridade">Escolaridade:</label> <input type="text" name="escolaridade" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->escolaridade;?>
" />
        </div>
        <div class="rg col">
            <label for="rg">RG:</label> <input type="text" name="rg" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->rg;?>
" />
        </div>
        <div class="nascimento col">
            <label for="nascimento">Data de Nascimento:</label> <input type="date" name="data_nascimento" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->data_nascimento;?>
" />
        </div>           
        <div class="nivel col">
            <label for="nivel">Nível de Usuário:</label>
            <select name="nivel" class="form-control">
                <?php if (isset($_smarty_tpl->tpl_vars['levels']->value)) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['levels']->value, 'level');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['level']->value) {
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['level']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['level']->value->id == $_smarty_tpl->tpl_vars['usuario']->value->id_nivel) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['level']->value->nome;?>
</option>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                <?php }?>
            </select> 
        </div>
        <div class="profissao col">
            <label for="profissao">Profissão:</label> <input type="text" name="profissao" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->profissao;?>
" />
        </div>
        <div class="endereco col">
            <label for="endereco">Endereço:</label> <input type="text" name="endereco" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->endereco;?>
" />
        </div>
        <div class="bairro col">
            <label for="bairro">Bairro:</label> <input type="text" name="bairro" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->bairro;?>
" />
        </div>
        <div class="cep col">
            <label for="cep">CEP:</label> <input type="text" name="cep" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->cep;?>
" />
        </div>
        <div class="cidade col">
            <label for="cidade">Cidade:</label> <input type="text" name="cidade" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->cidade;?>
" />
        </div>
        <div class="estado col">
            <label for="estado">Estado:</label>
            <select name="estado" class="form-control">
                <option value="AC" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'AC') {?>selected<?php }?>>Acre</option>
                <option value="AL" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'AL') {?>selected<?php }?>>Alagoas</option>
                <option value="AP" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'AP') {?>selected<?php }?>>Amapá</option>
                <option value="AM" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'AM') {?>selected<?php }?>>Amazonas</option>
                <option value="BA" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'BA') {?>selected<?php }?>>Bahia</option>
                <option value="CE" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'CE') {?>selected<?php }?>>Ceará</option>
                <option value="DF" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'DF') {?>selected<?php }?>>Distrito Federal</option>
                <option value="ES" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'ES') {?>selected<?php }?>>Espírito Santo</option>
                <option value="GO" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'GO') {?>selected<?php }?>>Goiás</option>
                <option value="MA" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'MA') {?>selected<?php }?>>Maranhão</option>
                <option value="MT" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'MT') {?>selected<?php }?>>Mato Grosso</option>
                <option value="MS" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'MS') {?>selected<?php }?>>Mato Grosso do Sul</option>
                <option value="MG" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'MG') {?>selected<?php }?>>Minas Gerais</option>
                <option value="PA" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'PA') {?>selected<?php }?>>Pará</option>
                <option value="PB" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'PB') {?>selected<?php }?>>Paraíba</option>
                <option value="PR" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'PR') {?>selected<?php }?>>Paraná</option>
                <option value="PE" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'PE') {?>selected<?php }?>>Pernambuco</option>
                <option value="PI" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'PI') {?>selected<?php }?>>Piauí</option>
                <option value="RJ" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'RJ') {?>selected<?php }?>>Rio de Janeiro</option>
                <option value="RN" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'RN') {?>selected<?php }?>>Rio Grande do Norte</option>
                <option value="RS" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'RS') {?>selected<?php }?>>Rio Grande do Sul</option>
                <option value="RO" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'RO') {?>selected<?php }?>>Rondônia</option>
                <option value="RR" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'RR') {?>selected<?php }?>>Roraima</option>
                <option value="SC" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'SC') {?>selected<?php }?>>Santa Catarina</option>
                <option value="SP" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'SP') {?>selected<?php }?>>São Paulo</option>
                <option value="SE" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'SE') {?>selected<?php }?>>Sergipe</option>
                <option value="TO" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->estado == 'TO') {?>selected<?php }?>>Tocantins</option>
            </select>
        </div>
        <div class="telefone col">
            <label for="telefone">Telefone:</label> <input type="text" name="telefone" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->telefone;?>
" />
        </div>
        <div class="email col">
            <label for="email">E-mail:</label> <input type="email" name="email" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->email;?>
" />
        </div>
        <?php if (isset($_smarty_tpl->tpl_vars['usuario']->value->convenio)) {?>
            <?php if ($_smarty_tpl->tpl_vars['usuario']->value->convenio == '-') {?>
            <?php } else { ?>
            <div class="convenio col">
                <label for="convenio">Convênio:</label>
                <select name="convenio" class="form-control">
                <?php if (isset($_smarty_tpl->tpl_vars['plans']->value)) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plans']->value, 'plan');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['plan']->value) {
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['plan']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->convenio == $_smarty_tpl->tpl_vars['plan']->value->id) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['plan']->value->nome;?>
</option>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                <?php }?>
                </select>
            </div>
            <?php }?>
        <?php }?>
        <div class="categoria col text" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->id_nivel == 3 || $_smarty_tpl->tpl_vars['usuario']->value->id_nivel == 5) {?>style="display: none"<?php }?>>
            <label for="categoria">Categoria:</label> <input type="text" name="categoria" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->categoria;?>
" />
        </div>
        <div class="categoria col select" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->id_nivel != 3) {?>style="display: none"<?php }?>>
            <label for="categoria">Categoria:</label> 
            <select name="categoria" class="form-control">
                <option value="titular" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->categoria == 'titular') {?>selected<?php }?>>Titular</option>
                <option value="dependente" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->categoria == 'dependente') {?>selected<?php }?>>Dependente</option>
            </select>            
            <div class="auto-search">
                <input class="form-control mt-2" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->categoria != 'dependente') {?>style="display: none"<?php }?> id="search-titular" placeholder="Busque aqui o titular do contrato"/>
                <input type="hidden" name="id-titular" id="id-titular" />
            </div>
        </div>
        <div class="data-cobranca col" <?php if (($_smarty_tpl->tpl_vars['usuario']->value->id_nivel != 3 && $_smarty_tpl->tpl_vars['usuario']->value->id_nivel != 4) || $_smarty_tpl->tpl_vars['usuario']->value->categoria == 'dependente') {?>style="display: none"<?php }?>>
            <label for="data-cobranca">Melhor dia para vencimento: </label>
            <input type="text" class="form-control mt-2" id="data-cobranca" value="<?php echo $_smarty_tpl->tpl_vars['usuario_contrato']->value->data_cobranca;?>
"/>
        </div>
        <div class="desconto col" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->id_nivel != 4) {?>style="display: none"<?php }?>>
            <label for="desconto">Desconto: %</label><input type="text" name="desconto" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value->desconto;?>
"/>
        </div>
        <div class="ativo col row">
            <span>Usuário Ativo:</span> 
            <div class="col"><label>Sim: </label><input type="radio" name="ativo" class="form-control" value="1" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->ativo == 1) {?>checked<?php }?> /></div>
            <div class="col"><label>Não: </label><input type="radio" name="ativo" class="form-control" value="0" <?php if ($_smarty_tpl->tpl_vars['usuario']->value->ativo == 0) {?>checked<?php }?> /></div>
        </div>       
        <div class="col">
            <button class="btn btn-success float-right" id="sendEdit">Enviar</button>
            <button class="btn btn-danger float-right" id="cancelEdit">Cancelar</button>
        </div>
    </form>
</div>
<?php }
}
}
