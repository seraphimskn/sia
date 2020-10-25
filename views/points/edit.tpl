<div class="form row float-left col-12">
    <form class="form-control row" action="" method="post" enctype="multipart/form-data" id="editpoints">
        <input type="hidden" name="send" value="edit" />
        <input type="hidden" name="id" value="{$points->id}" />
        <div class="nome col">
            <label for="nome">Valor:</label> <input type="text" name="valor" class="form-control" {if isset($points->valor)}value="{number_format($points->valor, 2, ',', '.')}"{/if} required/>
        </div>
        <div class="cpf_cnpj col">
            <label for="cpf_cnpj">Pontos:</label> <input type="text" name="pontos" class="form-control" {if isset($points->pontos)}value="{$points->pontos}"{/if} required/>
        </div>        
        <div class="col">
            <button class="btn btn-success float-right" id="sendEdit">Enviar</button>
            <button class="btn btn-danger float-right" id="cancelEdit">Cancelar</button>
        </div>
    </form>
</div>