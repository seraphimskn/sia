<div class="form row float-left col-12">
    <form class="form-control row" action="" method="post" enctype="multipart/form-data" id="addpoints">
        <input type="hidden" name="send" value="add" />
        <input type="hidden" name="id_parceiro" value="{$parceiro}" />
        <div class="nome col">
            <label for="nome">Valor:</label> <input type="text" name="valor" class="form-control" required/>
        </div>
        <div class="cpf_cnpj col">
            <label for="cpf_cnpj">Pontos:</label> <input type="text" name="pontos" class="form-control" required/>
        </div>        
        <div class="col">
            <button class="btn btn-success float-right" id="sendAdd">Enviar</button>
            <button class="btn btn-danger float-right" id="cancelEdit">Cancelar</button>
        </div>
    </form>
</div>