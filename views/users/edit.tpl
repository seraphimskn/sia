{if isset($is_seller)}
<div class="form row float-left col-12">
    <form class="form-control row" action="" method="post" enctype="multipart/form-data" id="editusers">
    <input type="hidden" name="id" value="{$usuario->id}" id="id" />
    <input type="hidden" name="send" value="edit" />
    <input type="hidden" name="imagem" id="imagem" />
        <div class="imagem col">
            <div class="no-image col-3">
                <img class="img-fluid img-thumbnail" id="preview" {if isset($usuario->imagem)}src="{$usuario->imagem}"{else}src="assets/img/no-image.png"{/if}/>
            </div>
            <div class="file">
                <input type="file" class="form-control" id="file" name="imagem" {if isset($usuario->imagem)}value="{$usuario->imagem}"{/if}/>
            </div>
        </div>
        <div class="nome col">
            <label for="nome">Nome:</label> <input type="text" name="nome" class="form-control" value="{$usuario->nome}" />
        </div>
        <div class="cpf_cnpj col">
            <label for="cpf_cnpj">CPF/CNPJ:</label> <input type="text" name="cpf_cnpj" class="form-control" value="{$usuario->cpf_cnpj}" />
        </div>
        <div class="estado_civil col">
            <label for="estado_civil">Estado Civil:</label> <input type="text" name="estado_civil" class="form-control" value="{$usuario->estado_civil}" />
        </div>
        <div class="escolaridade col">
            <label for="escolaridade">Escolaridade:</label> <input type="text" name="escolaridade" class="form-control" value="{$usuario->escolaridade}" />
        </div>
        <div class="rg col">
            <label for="rg">RG:</label> <input type="text" name="rg" class="form-control" value="{$usuario->rg}" />
        </div>
        <div class="nascimento col">
            <label for="nascimento">Data de Nascimento:</label> <input type="date" name="data_nascimento" class="form-control" value="{$usuario->data_nascimento}" />
        </div>
        <div class="nivel col">
            <label for="nivel">Nível de Usuário:</label>
            <select name="nivel" class="form-control" id="nivel" readonly> 
                {if isset($levels)}
                    {foreach from=$levels item=$level}
                        {if $level->id eq $usuario->id_nivel}
                        <option value="{$level->id}">{$level->nome}</option>
                        {/if}
                    {/foreach}
                {/if}
            </select> 
        </div>
        <div class="profissao col">
            <label for="profissao">Profissão:</label> <input type="text" name="profissao" class="form-control" value="{$usuario->profissao}" />
        </div>
        <div class="endereco col">
            <label for="endereco">Endereço:</label> <input type="text" name="endereco" class="form-control" value="{$usuario->endereco}" />
        </div>
        <div class="bairro col">
            <label for="bairro">Bairro:</label> <input type="text" name="bairro" class="form-control" value="{$usuario->bairro}" />
        </div>
        <div class="cep col">
            <label for="cep">CEP:</label> <input type="text" name="cep" class="form-control" value="{$usuario->cep}" />
        </div>
        <div class="cidade col">
            <label for="cidade">Cidade:</label> <input type="text" name="cidade" class="form-control" value="{$usuario->cidade}" />
        </div>
        <div class="estado col">
            <label for="estado">Estado:</label>
            <select name="estado" class="form-control">
                <option value="AC" {if $usuario->estado eq 'AC'}selected{/if}>Acre</option>
                <option value="AL" {if $usuario->estado eq 'AL'}selected{/if}>Alagoas</option>
                <option value="AP" {if $usuario->estado eq 'AP'}selected{/if}>Amapá</option>
                <option value="AM" {if $usuario->estado eq 'AM'}selected{/if}>Amazonas</option>
                <option value="BA" {if $usuario->estado eq 'BA'}selected{/if}>Bahia</option>
                <option value="CE" {if $usuario->estado eq 'CE'}selected{/if}>Ceará</option>
                <option value="DF" {if $usuario->estado eq 'DF'}selected{/if}>Distrito Federal</option>
                <option value="ES" {if $usuario->estado eq 'ES'}selected{/if}>Espírito Santo</option>
                <option value="GO" {if $usuario->estado eq 'GO'}selected{/if}>Goiás</option>
                <option value="MA" {if $usuario->estado eq 'MA'}selected{/if}>Maranhão</option>
                <option value="MT" {if $usuario->estado eq 'MT'}selected{/if}>Mato Grosso</option>
                <option value="MS" {if $usuario->estado eq 'MS'}selected{/if}>Mato Grosso do Sul</option>
                <option value="MG" {if $usuario->estado eq 'MG'}selected{/if}>Minas Gerais</option>
                <option value="PA" {if $usuario->estado eq 'PA'}selected{/if}>Pará</option>
                <option value="PB" {if $usuario->estado eq 'PB'}selected{/if}>Paraíba</option>
                <option value="PR" {if $usuario->estado eq 'PR'}selected{/if}>Paraná</option>
                <option value="PE" {if $usuario->estado eq 'PE'}selected{/if}>Pernambuco</option>
                <option value="PI" {if $usuario->estado eq 'PI'}selected{/if}>Piauí</option>
                <option value="RJ" {if $usuario->estado eq 'RJ'}selected{/if}>Rio de Janeiro</option>
                <option value="RN" {if $usuario->estado eq 'RN'}selected{/if}>Rio Grande do Norte</option>
                <option value="RS" {if $usuario->estado eq 'RS'}selected{/if}>Rio Grande do Sul</option>
                <option value="RO" {if $usuario->estado eq 'RO'}selected{/if}>Rondônia</option>
                <option value="RR" {if $usuario->estado eq 'RR'}selected{/if}>Roraima</option>
                <option value="SC" {if $usuario->estado eq 'SC'}selected{/if}>Santa Catarina</option>
                <option value="SP" {if $usuario->estado eq 'SP'}selected{/if}>São Paulo</option>
                <option value="SE" {if $usuario->estado eq 'SE'}selected{/if}>Sergipe</option>
                <option value="TO" {if $usuario->estado eq 'TO'}selected{/if}>Tocantins</option>
            </select>
        </div>
        <div class="telefone col">
            <label for="telefone">Telefone:</label> <input type="text" name="telefone" class="form-control" value="{$usuario->telefone}" />
        </div>
        <div class="email col">
            <label for="email">E-mail:</label> <input type="email" name="email" class="form-control" value="{$usuario->email}" />
        </div>
        {if isset($usuario->convenio)}
         <div class="convenio col">
            <label for="convenio">Convênio:</label>
            <select name="convenio" class="form-control">
            {if isset($plans)}
                {foreach from=$plans item=$plan}
                    <option value="{$plan->id}" {if $usuario->convenio eq $plan->id}selected{/if}>{$plan->nome}</option>
                {/foreach}
            {/if}
            </select>
        </div>
        {/if}
        <div class="categoria col text" {if $usuario->id_nivel eq 3}style="display: none"{/if}>
            <label for="categoria">Categoria:</label> <input type="text" name="categoria" class="form-control" value="{$usuario->categoria}" />
        </div>
        <div class="categoria col select" {if $usuario->id_nivel != 3}style="display: none"{/if}>
            <label for="categoria">Categoria:</label> 
            <select name="categoria" class="form-control" readonly disabled>
                <option value="titular" {if $usuario->categoria eq 'titular'}selected{/if}>Titular</option>
                <option value="dependente" {if $usuario->categoria eq 'dependente'}selected{/if}>Dependente</option>
            </select>            
            <div class="auto-search">
                <input class="form-control mt-2" {if $usuario->categoria != 'dependente'}style="display: none"{/if} id="search-titular" placeholder="Busque aqui o titular do contrato"/>
                <input type="hidden" name="id-titular" id="id-titular" />
            </div>
        </div>
        <div class="data-cobranca col" {if $usuario->id_nivel != 3 && $usuario->id_nivel != 4}style="display: none"{/if}>
            <label for="data-cobranca">Melhor dia para vencimento: </label>
            <input type="text" class="form-control mt-2" id="data-cobranca" value="{$usuario_contrato->data_cobranca}"/>
        </div>
        <div class="desconto col" {if $usuario->id_nivel != 4}style="display: none"{/if}>
            <label for="desconto">Desconto: %</label><input type="text" name="desconto" class="form-control" value="{$usuario->desconto}"/>
        </div>
        <div class="ativo col row">
            <span>Usuário Ativo:</span> 
            <div class="col"><label>Sim: </label><input type="radio" name="ativo" class="form-control" value="1" {if $usuario->ativo eq 1}checked{/if} /></div>
            <div class="col"><label>Não: </label><input type="radio" name="ativo" class="form-control" value="0" {if $usuario->ativo eq 0}checked{/if} /></div>
        </div>       
        <div class="col">
            <button class="btn btn-success float-right" id="sendEdit">Enviar</button>
            <button class="btn btn-danger float-right" id="cancelEdit">Cancelar</button>
        </div>
    </form>
</div>
{else}
<div class="form row float-left col-12">
    <form class="form-control row" action="" method="post" enctype="multipart/form-data" id="editusers">
    <input type="hidden" name="id" value="{$usuario->id}" id="id" />
    <input type="hidden" name="send" value="edit" />
    <input type="hidden" name="imagem" id="imagem" />
        <div class="imagem col">
            <div class="no-image col-3">
                <img class="img-fluid img-thumbnail" id="preview" {if isset($usuario->imagem)}src="{$usuario->imagem}"{/if}/>
            </div>
            <div class="file">
                <input type="file" class="form-control" id="file" name="imagem" {if isset($usuario->imagem)}value="{$usuario->imagem}"{/if}/>
            </div>
        </div>
       <div class="nome col">
            <label for="nome">Nome:</label> <input type="text" name="nome" class="form-control" value="{$usuario->nome}" />
        </div>
        <div class="cpf_cnpj col">
            <label for="cpf_cnpj">CPF/CNPJ:</label> <input type="text" name="cpf_cnpj" class="form-control" value="{$usuario->cpf_cnpj}" />
        </div>
        <div class="estado_civil col">
            <label for="estado_civil">Estado Civil:</label> <input type="text" name="estado_civil" class="form-control" value="{$usuario->estado_civil}" />
        </div>
        <div class="escolaridade col">
            <label for="escolaridade">Escolaridade:</label> <input type="text" name="escolaridade" class="form-control" value="{$usuario->escolaridade}" />
        </div>
        <div class="rg col">
            <label for="rg">RG:</label> <input type="text" name="rg" class="form-control" value="{$usuario->rg}" />
        </div>
        <div class="nascimento col">
            <label for="nascimento">Data de Nascimento:</label> <input type="date" name="data_nascimento" class="form-control" value="{$usuario->data_nascimento}" />
        </div>           
        <div class="nivel col">
            <label for="nivel">Nível de Usuário:</label>
            <select name="nivel" class="form-control">
                {if isset($levels)}
                    {foreach from=$levels item=$level}
                        <option value="{$level->id}" {if $level->id eq $usuario->id_nivel}selected{/if}>{$level->nome}</option>
                    {/foreach}
                {/if}
            </select> 
        </div>
        <div class="profissao col">
            <label for="profissao">Profissão:</label> <input type="text" name="profissao" class="form-control" value="{$usuario->profissao}" />
        </div>
        <div class="endereco col">
            <label for="endereco">Endereço:</label> <input type="text" name="endereco" class="form-control" value="{$usuario->endereco}" />
        </div>
        <div class="bairro col">
            <label for="bairro">Bairro:</label> <input type="text" name="bairro" class="form-control" value="{$usuario->bairro}" />
        </div>
        <div class="cep col">
            <label for="cep">CEP:</label> <input type="text" name="cep" class="form-control" value="{$usuario->cep}" />
        </div>
        <div class="cidade col">
            <label for="cidade">Cidade:</label> <input type="text" name="cidade" class="form-control" value="{$usuario->cidade}" />
        </div>
        <div class="estado col">
            <label for="estado">Estado:</label>
            <select name="estado" class="form-control">
                <option value="AC" {if $usuario->estado eq 'AC'}selected{/if}>Acre</option>
                <option value="AL" {if $usuario->estado eq 'AL'}selected{/if}>Alagoas</option>
                <option value="AP" {if $usuario->estado eq 'AP'}selected{/if}>Amapá</option>
                <option value="AM" {if $usuario->estado eq 'AM'}selected{/if}>Amazonas</option>
                <option value="BA" {if $usuario->estado eq 'BA'}selected{/if}>Bahia</option>
                <option value="CE" {if $usuario->estado eq 'CE'}selected{/if}>Ceará</option>
                <option value="DF" {if $usuario->estado eq 'DF'}selected{/if}>Distrito Federal</option>
                <option value="ES" {if $usuario->estado eq 'ES'}selected{/if}>Espírito Santo</option>
                <option value="GO" {if $usuario->estado eq 'GO'}selected{/if}>Goiás</option>
                <option value="MA" {if $usuario->estado eq 'MA'}selected{/if}>Maranhão</option>
                <option value="MT" {if $usuario->estado eq 'MT'}selected{/if}>Mato Grosso</option>
                <option value="MS" {if $usuario->estado eq 'MS'}selected{/if}>Mato Grosso do Sul</option>
                <option value="MG" {if $usuario->estado eq 'MG'}selected{/if}>Minas Gerais</option>
                <option value="PA" {if $usuario->estado eq 'PA'}selected{/if}>Pará</option>
                <option value="PB" {if $usuario->estado eq 'PB'}selected{/if}>Paraíba</option>
                <option value="PR" {if $usuario->estado eq 'PR'}selected{/if}>Paraná</option>
                <option value="PE" {if $usuario->estado eq 'PE'}selected{/if}>Pernambuco</option>
                <option value="PI" {if $usuario->estado eq 'PI'}selected{/if}>Piauí</option>
                <option value="RJ" {if $usuario->estado eq 'RJ'}selected{/if}>Rio de Janeiro</option>
                <option value="RN" {if $usuario->estado eq 'RN'}selected{/if}>Rio Grande do Norte</option>
                <option value="RS" {if $usuario->estado eq 'RS'}selected{/if}>Rio Grande do Sul</option>
                <option value="RO" {if $usuario->estado eq 'RO'}selected{/if}>Rondônia</option>
                <option value="RR" {if $usuario->estado eq 'RR'}selected{/if}>Roraima</option>
                <option value="SC" {if $usuario->estado eq 'SC'}selected{/if}>Santa Catarina</option>
                <option value="SP" {if $usuario->estado eq 'SP'}selected{/if}>São Paulo</option>
                <option value="SE" {if $usuario->estado eq 'SE'}selected{/if}>Sergipe</option>
                <option value="TO" {if $usuario->estado eq 'TO'}selected{/if}>Tocantins</option>
            </select>
        </div>
        <div class="telefone col">
            <label for="telefone">Telefone:</label> <input type="text" name="telefone" class="form-control" value="{$usuario->telefone}" />
        </div>
        <div class="email col">
            <label for="email">E-mail:</label> <input type="email" name="email" class="form-control" value="{$usuario->email}" />
        </div>
        {if isset($usuario->convenio)}
            {if $usuario->convenio eq '-'}
            {else}
            <div class="convenio col">
                <label for="convenio">Convênio:</label>
                <select name="convenio" class="form-control">
                {if isset($plans)}
                    {foreach from=$plans item=$plan}
                        <option value="{$plan->id}" {if $usuario->convenio eq $plan->id}selected{/if}>{$plan->nome}</option>
                    {/foreach}
                {/if}
                </select>
            </div>
            {/if}
        {/if}
        <div class="categoria col text" {if $usuario->id_nivel eq 3 || $usuario->id_nivel eq 5}style="display: none"{/if}>
            <label for="categoria">Categoria:</label> <input type="text" name="categoria" class="form-control" value="{$usuario->categoria}" />
        </div>
        <div class="categoria col select" {if $usuario->id_nivel neq 3}style="display: none"{/if}>
            <label for="categoria">Categoria:</label> 
            <select name="categoria" class="form-control">
                <option value="titular" {if $usuario->categoria eq 'titular'}selected{/if}>Titular</option>
                <option value="dependente" {if $usuario->categoria eq 'dependente'}selected{/if}>Dependente</option>
            </select>            
            <div class="auto-search">
                <input class="form-control mt-2" {if $usuario->categoria neq 'dependente'}style="display: none"{/if} id="search-titular" placeholder="Busque aqui o titular do contrato"/>
                <input type="hidden" name="id-titular" id="id-titular" />
            </div>
        </div>
        <div class="data-cobranca col" {if ($usuario->id_nivel neq 3 && $usuario->id_nivel neq 4) || $usuario->categoria eq 'dependente'}style="display: none"{/if}>
            <label for="data-cobranca">Melhor dia para vencimento: </label>
            <input type="text" class="form-control mt-2" id="data-cobranca" value="{$usuario_contrato->data_cobranca}"/>
        </div>
        <div class="desconto col" {if $usuario->id_nivel neq 4}style="display: none"{/if}>
            <label for="desconto">Desconto: %</label><input type="text" name="desconto" class="form-control" value="{$usuario->desconto}"/>
        </div>
        <div class="ativo col row">
            <span>Usuário Ativo:</span> 
            <div class="col"><label>Sim: </label><input type="radio" name="ativo" class="form-control" value="1" {if $usuario->ativo eq 1}checked{/if} /></div>
            <div class="col"><label>Não: </label><input type="radio" name="ativo" class="form-control" value="0" {if $usuario->ativo eq 0}checked{/if} /></div>
        </div>       
        <div class="col">
            <button class="btn btn-success float-right" id="sendEdit">Enviar</button>
            <button class="btn btn-danger float-right" id="cancelEdit">Cancelar</button>
        </div>
    </form>
</div>
{/if}