<div class="form row float-left col-12">
    <form class="form-control row" action="" method="post" enctype="multipart/form-data" id="addplans">
    <input type="hidden" name="send" value="add" />
        <div class="nome col">
            <label for="nome">Nome:</label> <input type="text" name="nome" class="form-control" required/>
        </div>
        <div class="valor col row">
            <label for="valor">Valor:</label> <input type="text" name="valor" class="form-control" required/>
        </div>
        <div class="seguro col row">
            <label for="seguro">Possui seguro de vida:</label> <input type="checkbox" name="seguro_vida" value="1" class="form-control" />
        </div>
        <div class="ativo col row">
            <p>Nível Ativo:</p> 
            <div class="col-12"><label>Sim: </label><input type="radio" name="ativo" class="form-control" value="1" /></div>
            <div class="col-12"><label>Não: </label><input type="radio" name="ativo" class="form-control" value="0" /></div>
        </div>       
        <div class="col">
            <button class="btn btn-success float-right" id="sendAdd">Enviar</button>
            <button class="btn btn-danger float-right" id="cancelEdit">Cancelar</button>
        </div>
    </form>
</div>