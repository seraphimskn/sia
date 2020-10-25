<div class="form row float-left col-12">
    <form class="form-control row" action="" method="post" enctype="multipart/form-data" id="editproducts">
    <input type="hidden" name="send" value="edit" />
    <input type="hidden" name="imagem" id="imagem" />
    <input type="hidden" name="id" value="{$produto->id}" id="id" />
    <input type="hidden" name="id_parceiro" id="id_parceiro" value="{$id_parceiro}"/>
        <div class="imagem col">
            <div class="no-image col-3">
                <img class="img-fluid img-thumbnail" id="preview" {if isset($produto->imagem)}src="{$produto->imagem}"{/if} />
            </div>
            <div class="file">
                <input type="file" class="form-control" id="file" name="imagem" {if isset($produto->imagem)}value="{$produto->imagem}"{/if} />
            </div>
        </div>
        <div class="produto col">
            <label for="produto">Produto:</label> <input type="text" name="produto" class="form-control" {if isset($produto->produto)}value="{$produto->produto}"{/if} required/>
        </div>
        <div class="pontos col">
            <label for="pontos">Pontos:</label> <input type="text" name="pontos" class="form-control" {if isset($produto->pontos)}value="{$produto->pontos}"{/if} required/>
        </div>
        <div class="descricao col">
            <label for="descricao">Descrição do Produto:</label> 
            <textarea name="descricao" id="descricao" class="form-control">{if isset($produto->descricao)}{$produto->descricao}{/if}</textarea>
        </div>
        <div class="quantidade col">
            <label for="quantidade">Quantidade Disponível:</label> <input type="text" name="quantidade" class="form-control" {if isset($produto->quantidade)}value="{$produto->quantidade}"{/if} required/>
        </div>       
        <div class="ativo col row">
            <span>Produto Ativo:</span> 
            <div class="col"><label>Sim: </label><input type="radio" name="ativo" class="form-control" value="1" {if $produto->ativo == 1}checked{/if} /></div>
            <div class="col"><label>Não: </label><input type="radio" name="ativo" class="form-control" value="0" {if $produto->ativo == 0}checked{/if}/></div>
        </div>       
        <div class="col">
            <button class="btn btn-success float-right" id="sendEdit">Enviar</button>
            <button class="btn btn-danger float-right" id="cancelEdit">Cancelar</button>
        </div>
    </form>
</div>
{include file=$tinyMCE}