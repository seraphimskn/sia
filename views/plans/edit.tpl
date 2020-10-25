{foreach from=$plans item=$item}
<div class="form row float-left col-12">
    <form class="form-control row" action="" method="post" enctype="multipart/form-data" id="editplans">
    <input type="hidden" name="send" value="edit" />
    <input type="hidden" name="id" value="{$item->id}" />
        <div class="nome col">
            <label for="nome">Nome:</label> <input type="text" name="nome" class="form-control" value="{$item->nome}" />
        </div>
        <div class="valor col row">
            <label for="valor">Valor:</label> <input type="text" name="valor" class="form-control" value="{$item->valor}"/>
        </div>
        <div class="ativo col row">
            <p>Nível Ativo:</p> 
            <div class="col-12"><label>Sim: </label><input type="radio" name="ativo" class="form-control" value="1" {if $item->ativo eq 1}checked{/if} /></div>
            <div class="col-12"><label>Não: </label><input type="radio" name="ativo" class="form-control" value="0" {if $item->ativo eq 1}checked{/if} /></div>
        </div>       
        <div class="col">
            <button class="btn btn-success float-right" id="sendEdit">Enviar</button>
            <button class="btn btn-danger float-right" id="cancelEdit">Cancelar</button>
        </div>
    </form>
</div>
{/foreach}