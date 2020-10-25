<div class="form row float-left col-12">
    <form class="form-control row" action="" method="post" enctype="multipart/form-data" id="adduser">
    <input type="hidden" name="send" value="add" />
        <div class="col">
            <h5>Tipo de Mala-Direta</h5>
            <input type="radio" name="tipo" value="aniversario" id="aniversario" /> <label for="aniversario">Aniversariantes do Mês</label>
            <input type="radio" name="tipo" value="oferta" id="oferta" /> <label for="oferta">Ofertas</label>
            <input type="radio" name="tipo" value="informativo" id="informativo" /> <label for="informativo">Informativo</label>
            <input type="radio" name="tipo" value="vencimento_de_contrato" id="vencimento" /> <label for="vencimento">Vencimento de Contrato</label>
        </div>
        <div class="col">
            <label for="destinatarios">Destinatarios</label>
            <textarea class="form-control" id="destinatarios" name="id_usuario"></textarea>
        </div>
        <div class="col">
            <label for="conteudo">Conteúdo a ser enviado</label>
            <textarea class="form-control" id="conteudo" name="conteudo"></textarea>
        </div>
        <div class="col">
            <label for="observacoes">Observações</label>
            <textarea class="form-control" id="observacoes" name="observacoes"></textarea>
        </div>
        <div class="col">
            <button class="btn btn-success float-right" id="sendAdd">Enviar</button>
            <button class="btn btn-danger float-right" id="cancelEdit">Cancelar</button>
        </div>
    </form>
</div>
{include file=$tinyMCE}