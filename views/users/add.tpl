{if isset($is_seller)}
<div class="form row float-left col-12">
    <form class="form-control row" action="" method="post" enctype="multipart/form-data" id="addusers">
    <input type="hidden" name="vendedor" value="{$userID}">
    <input type="hidden" name="send" value="add" />
    <input type="hidden" name="imagem" id="imagem" />
        <div class="imagem col">
            <div class="no-image col-3">
                <img class="img-fluid img-thumbnail" id="preview" src="assets/imgs/no-image.png"/>
            </div>
            <div class="file">
                <input type="file" class="form-control" id="file" name="imagem" />
            </div>
        </div>
        <div class="nome col">
            <label for="nome">Nome:</label> <input type="text" name="nome" class="form-control" required/>
        </div>
        <div class="cpf_cnpj col">
            <label for="cpf_cnpj">CPF/CNPJ:</label> <input type="text" name="cpf_cnpj" class="form-control" required/>
        </div>
         <div class="estado_civil col">
            <label for="estado_civil">Estado Civil:</label> <input type="text" name="estado_civil" class="form-control" required/>
        </div>
        <div class="escolaridade col">
            <label for="escolaridade">Escolaridade:</label> <input type="text" name="escolaridade" class="form-control" required/>
        </div>
        <div class="senha col">
            <label for="senha">Senha:</label> <input type="password" name="senha" class="form-control" required/>
        </div>
        <div class="rg col">
            <label for="rg">RG:</label> <input type="text" name="rg" class="form-control" required/>
        </div>
        <div class="nascimento col">
            <label for="nascimento">Data de Nascimento:</label> <input type="date" name="data_nascimento" class="form-control" required/>
        </div>        
        <div class="nivel col">
            <label for="nivel">Nível de Usuário:</label>
            <select name="nivel" class="form-control" id="nivel">
                <option value="" selected>Selecione um tipo de cadastro</option>
                {if isset($levels)}
                    {foreach from=$levels item=$level}
                        {if strtolower($level->nome) eq 'beneficiario' || strtolower($level->nome) eq 'parceiro'}
                        <option value="{$level->id}">{$level->nome}</option>
                        {/if}
                    {/foreach}
                {/if}                
            </select>
        </div>
        <div class="profissao col">
            <label for="profissao">Profissão:</label> <input type="text" name="profissao" class="form-control" />
        </div>
        <div class="endereco col">
            <label for="endereco">Endereço:</label> <input type="text" name="endereco" class="form-control" required />
        </div>
        <div class="bairro col">
            <label for="bairro">Bairro:</label> <input type="text" name="bairro" class="form-control" required />
        </div>
        <div class="cep col">
            <label for="cep">CEP:</label> <input type="text" name="cep" class="form-control" required />
        </div>
        <div class="cidade col">
            <label for="cidade">Cidade:</label> <input type="text" name="cidade" class="form-control" required />
        </div>
        <div class="estado col">
            <label for="estado">Estado:</label>
            <select name="estado" class="form-control" required>
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
            </select>
        </div>
        <div class="telefone col">
            <label for="telefone">Telefone:</label> <input type="text" name="telefone" class="form-control" required />
        </div>
        <div class="email col">
            <label for="email">E-mail:</label> <input type="email" name="email" class="form-control" required />
        </div>
        <div class="convenio col">
            <label for="convenio">Convênio:</label> 
            <select name="convenio" class="form-control" id="convenio">
                <option value="">Selecione um convenio</option>
                {if isset($plans)}
                    {foreach from=$plans item=$plan}
                        <option value="{$plan->id}">{$plan->nome}</option>
                    {/foreach}
                {/if}
            </select>
            <input type="hidden" name="valor" id="valorPlano" />
        </div>
        <div class="categoria col text">
            <label for="categoria">Categoria:</label> <input type="text" name="categoria" class="form-control" />
        </div>
        <div class="categoria col select" style="display: none">
            <label for="categoria">Categoria:</label> 
            <select name="categoria" class="form-control">
                <option value="titular">Titular</option>
                <option value="dependente">Dependente</option>
            </select>            
            <div class="auto-search">
                <input class="form-control mt-2" style="display:none;" id="search-titular" placeholder="Busque aqui o titular do contrato"/>
                <input type="hidden" name="id-titular" id="id-titular" />
            </div>
        </div>
        <div class="data-cobranca col" style="display: none">
            <label for="data-cobranca">Melhor dia para vencimento: </label>
            <input type="text" class="form-control mt-2" id="data-cobranca" name="data_cobranca" />
        </div>
        <div class="desconto col" style="display: none">
            <label for="desconto">Desconto: %</label><input type="text" name="desconto" class="form-control" value="{$usuario->desconto}" />
        </div>
        <div class="forma_de_pagamento col" style="display: none">
            <label for="forma">Forma de Pagamento</label>
            <select name="forma" class="form-control" id="formPagamento">
                <option value="">Selecione uma forma de pagamento</option>
                <option value="boleto">Boleto</option>
                <option value="cartao">Cartão</option>
                <option value="folha">Desconto em Folha</option>
            </select>
        </div>
        <div class="ativo col row">
            <span>Usuário Ativo:</span> 
            <div class="col"><label>Sim: </label><input type="radio" name="ativo" class="form-control" value="1" /></div>
            <div class="col"><label>Não: </label><input type="radio" name="ativo" class="form-control" value="0" /></div>
        </div>       
        <div class="col">
            <button class="btn btn-success float-right" id="sendAdd">Enviar</button>
            <button class="btn btn-danger float-right" id="cancelEdit">Cancelar</button>
        </div>
    </form>
</div>
{else}
<div class="form row float-left col-12">
    <form class="form-control row" action="" method="post" enctype="multipart/form-data" id="addusers">
    <input type="hidden" name="vendedorLogado" value="{$userID}">
    <input type="hidden" name="send" value="add" />
    <input type="hidden" name="imagem" id="imagem" />
        <div class="imagem col">
            <div class="no-image col-3">
                <img class="img-fluid img-thumbnail" id="preview" src="assets/imgs/no-image.png" />
            </div>
            <div class="file">
                <input type="file" class="form-control" id="file" name="imagem" />
            </div>
        </div>
        <div class="nome col">
            <label for="nome">Nome:</label> <input type="text" name="nome" class="form-control" required/>
        </div>
        <div class="cpf_cnpj col">
            <label for="cpf_cnpj">CPF/CNPJ:</label> <input type="text" name="cpf_cnpj" class="form-control" required/>
        </div>
        <div class="estado_civil col">
            <label for="estado_civil">Estado Civil:</label> <input type="text" name="estado_civil" class="form-control" required/>
        </div>
        <div class="escolaridade col">
            <label for="escolaridade">Escolaridade:</label> <input type="text" name="escolaridade" class="form-control" required/>
        </div>
        <div class="senha col">
            <label for="senha">Senha:</label> <input type="password" name="senha" class="form-control" required/>
        </div>
        <div class="rg col">
            <label for="rg">RG:</label> <input type="text" name="rg" class="form-control" required/>
        </div>
        <div class="nascimento col">
            <label for="nascimento">Data de Nascimento:</label> <input type="date" name="data_nascimento" class="form-control" required/>
        </div>        
        <div class="nivel col">
            <label for="nivel">Nível de Usuário:</label>
            <select name="nivel" class="form-control" id="nivel" required>
                <option value="" selected>Selecione um nível</option>
                {if isset($levels)}
                    {foreach from=$levels item=$level}
                        <option value="{$level->id}">{$level->nome}</option>
                    {/foreach}
                {/if}
            </select> 
        </div>
        <div class="profissao col" style="display: none">
            <label for="profissao">Profissão:</label> <input type="text" name="profissao" class="form-control" />
        </div>
        <div class="endereco col">
            <label for="endereco">Endereço:</label> <input type="text" name="endereco" class="form-control" required />
        </div>
        <div class="bairro col">
            <label for="bairro">Bairro:</label> <input type="text" name="bairro" class="form-control" required />
        </div>
        <div class="cep col">
            <label for="cep">CEP:</label> <input type="text" name="cep" class="form-control" required />
        </div>
        <div class="cidade col">
            <label for="cidade">Cidade:</label> <input type="text" name="cidade" class="form-control" required />
        </div>
        <div class="estado col">
            <label for="estado">Estado:</label>
            <select name="estado" class="form-control" required>
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
            </select>
        </div>
        <div class="telefone col">
            <label for="telefone">Telefone:</label> <input type="text" name="telefone" class="form-control" required />
        </div>
        <div class="email col">
            <label for="email">E-mail:</label> <input type="email" name="email" class="form-control" required />
        </div>
        <div class="vendedor col" style="display: none">
            <label for="vendedor">Vendedor do Contrato:</label>
            <select name="vendedor" class="form-control">
                <option value="">Selecione o vendedor desse contrato</option>
                {if isset($sellers)}
                    {foreach from=$sellers item=$seller}
                        <option value="{$seller->id}">{$seller->nome}</option>
                    {/foreach}
                {/if}
            </select>
        </div>
        <div class="contrato col" style="display: none">
            <label for="contrato">Contrato Nº:</label>
            <select name="contrato" class="form-control">
                <option value="">Selecione o número desse contrato</option>
                {if isset($contracts)}
                    {foreach from=$contracts item=$contract}
                        <option value="{$contract->id}">{$contract->id}</option>
                    {/foreach}
                {/if}
            </select>
        </div>
        <div class="convenio col" style="display: none;">
            <label for="convenio">Convênio:</label>
            <select name="convenio" class="form-control" id="convenio">
                <option value="">Selecione um convenio</option>
                {if isset($plans)}
                    {foreach from=$plans item=$plan}
                        <option value="{$plan->id}">{$plan->nome}</option>
                    {/foreach}
                {/if}
            </select>
            <input type="hidden" name="valor" id="valorPlano" />
        </div>
        <div class="categoria col text">
            <label for="categoria">Categoria:</label> <input type="text" name="categoria" class="form-control" />
        </div>
        <div class="categoria col select" style="display: none">
            <label for="categoria">Categoria:</label> 
            <select name="categoria" class="form-control">
                <option value="titular">Titular</option>
                <option value="dependente">Dependente</option>
            </select>            
            <div class="auto-search">
                <input class="form-control mt-2" style="display:none;" id="search-titular" placeholder="Busque aqui o titular do contrato"/>
                <input type="hidden" name="id-titular" id="id-titular" />
            </div>
        </div>
        <div class="data-cobranca col" style="display: none">
            <label for="data-cobranca">Melhor dia para vencimento: </label>
            <input type="text" class="form-control mt-2" id="data-cobranca" name="data_cobranca"/>
        </div>
        <div class="desconto col" style="display: none">
            <label for="desconto">Desconto: %</label><input type="text" name="desconto" class="form-control"/>
        </div>
        <div class="forma_de_pagamento col" style="display: none">
            <label for="forma">Forma de Pagamento</label>
            <select name="forma" class="form-control" id="formaPagamento">
                <option value="">Selecione uma forma de pagamento</option>
                <option value="boleto">Boleto</option>
                <option value="cartao">Cartão</option>
                <option value="folha">Desconto em Folha</option>
            </select>
        </div>
        <div class="ativo col row">
            <span>Usuário Ativo:</span> 
            <div class="col"><label>Sim: </label><input type="radio" name="ativo" class="form-control" value="1" /></div>
            <div class="col"><label>Não: </label><input type="radio" name="ativo" class="form-control" value="0" /></div>
        </div>       
        <div class="col">
            <button class="btn btn-success float-right" id="sendAdd">Enviar</button>
            <button class="btn btn-danger float-right" id="cancelEdit">Cancelar</button>
        </div>
    </form>
</div>
{/if}