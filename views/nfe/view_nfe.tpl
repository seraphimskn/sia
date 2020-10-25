<div class="form row float-left col-12">
    <form class="form-control row" action="" method="post" enctype="multipart/form-data" id="edituser">
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
        <div class="rg col">
            <label for="rg">RG:</label> <input type="text" name="rg" class="form-control" value="{$usuario->rg}" />
        </div>
        <div class="profissao col">
            <label for="profissao">Profissão:</label> <input type="text" name="profissao" class="form-control" value="{$usuario->profissao}" />
        </div>
        <div class="nivel col">
            <label for="nivel">Nível de Usuário:</label>
            <select name="nivel" class="form-control">
                {if isset($levels)}
                    {foreach from=$levels item=$level}
                        <option value="{$level->id}" {if $level->id == $usuario->id_nivel}selected{/if}>{$level->nome}</option>
                    {/foreach}
                {/if}
            </select> 
        </div>
        <div class="endereco col">
            <label for="endereco">Endereço:</label> <input type="text" name="endereco" class="form-control" value="{$usuario->endereco}" />
        </div>
        <div class="cidade col">
            <label for="cidade">Cidade:</label> <input type="text" name="cidade" class="form-control" value="{$usuario->cidade}" />
        </div>
        <div class="estado col">
            <label for="estado">Estado:</label>
            <select name="estado" class="form-control">
                <option value="AC" {if $usuario->estado == 'AC'}selected{/if}>Acre</option>
                <option value="AL" {if $usuario->estado == 'AL'}selected{/if}>Alagoas</option>
                <option value="AP" {if $usuario->estado == 'AP'}selected{/if}>Amapá</option>
                <option value="AM" {if $usuario->estado == 'AM'}selected{/if}>Amazonas</option>
                <option value="BA" {if $usuario->estado == 'BA'}selected{/if}>Bahia</option>
                <option value="CE" {if $usuario->estado == 'CE'}selected{/if}>Ceará</option>
                <option value="DF" {if $usuario->estado == 'DF'}selected{/if}>Distrito Federal</option>
                <option value="ES" {if $usuario->estado == 'ES'}selected{/if}>Espírito Santo</option>
                <option value="GO" {if $usuario->estado == 'GO'}selected{/if}>Goiás</option>
                <option value="MA" {if $usuario->estado == 'MA'}selected{/if}>Maranhão</option>
                <option value="MT" {if $usuario->estado == 'MT'}selected{/if}>Mato Grosso</option>
                <option value="MS" {if $usuario->estado == 'MS'}selected{/if}>Mato Grosso do Sul</option>
                <option value="MG" {if $usuario->estado == 'MG'}selected{/if}>Minas Gerais</option>
                <option value="PA" {if $usuario->estado == 'PA'}selected{/if}>Pará</option>
                <option value="PB" {if $usuario->estado == 'PB'}selected{/if}>Paraíba</option>
                <option value="PR" {if $usuario->estado == 'PR'}selected{/if}>Paraná</option>
                <option value="PE" {if $usuario->estado == 'PE'}selected{/if}>Pernambuco</option>
                <option value="PI" {if $usuario->estado == 'PI'}selected{/if}>Piauí</option>
                <option value="RJ" {if $usuario->estado == 'RJ'}selected{/if}>Rio de Janeiro</option>
                <option value="RN" {if $usuario->estado == 'RN'}selected{/if}>Rio Grande do Norte</option>
                <option value="RS" {if $usuario->estado == 'RS'}selected{/if}>Rio Grande do Sul</option>
                <option value="RO" {if $usuario->estado == 'RO'}selected{/if}>Rondônia</option>
                <option value="RR" {if $usuario->estado == 'RR'}selected{/if}>Roraima</option>
                <option value="SC" {if $usuario->estado == 'SC'}selected{/if}>Santa Catarina</option>
                <option value="SP" {if $usuario->estado == 'SP'}selected{/if}>São Paulo</option>
                <option value="SE" {if $usuario->estado == 'SE'}selected{/if}>Sergipe</option>
                <option value="TO" {if $usuario->estado == 'TO'}selected{/if}>Tocantins</option>
            </select>
        </div>
        <div class="telefone col">
            <label for="telefone">Telefone:</label> <input type="text" name="telefone" class="form-control" value="{$usuario->telefone}" />
        </div>
        <div class="email col">
            <label for="email">E-mail:</label> <input type="email" name="email" class="form-control" value="{$usuario->email}" />
        </div>
        <div class="convenio col">
            <label for="convenio">Convênio:</label> <input type="text" name="convenio" class="form-control" value="{$usuario->convenio}" />
        </div>
        <div class="categoria col">
            <label for="categoria">Categoria:</label> <input type="text" name="categoria" class="form-control" value="{$usuario->categoria}" />
        </div>
        <div class="ativo col row">
            <span>Usuário Ativo:</span> 
            <div class="col"><label>Sim: </label><input type="radio" name="ativo" class="form-control" value="1" {if $usuario->ativo == 1}checked{/if} /></div>
            <div class="col"><label>Não: </label><input type="radio" name="ativo" class="form-control" value="0" {if $usuario->ativo == 0}checked{/if} /></div>
        </div>       
        <div class="col">
            <button class="btn btn-success float-right" id="sendEdit">Enviar</button>
            <button class="btn btn-danger float-right" id="cancelEdit">Cancelar</button>
        </div>
    </form>
</div>