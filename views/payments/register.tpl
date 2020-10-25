<div class="form row float-left col-12">
    <form class="form-control row" action="" method="post" enctype="multipart/form-data" id="editpayments">
    <input type="hidden" name="send" value="edit" />
    <input type="hidden" name="id" value="{$idPagamento}">
         <div class="nome col">
            <label for="nome">Forma de Pagamento:</label>
            <select name="tipo_pagamento" class="form-control">
                <option value="">Selecione uma forma de pagamento</option>
                <option value="dinheiro">Dinheiro</option>
                <option value="cheque">Cheque</option>
                <option value="cartao">Cartão de Crédito</option>
            </select>
        </div>
        <div class="valor col row">
            <label for="valor">Valor:</label> <input type="text" name="valor" class="form-control" value="R$ {number_format($dados->valor, 2, ',', '.')}" readonly/>
        </div>     
        <div class="col">
            <button class="btn btn-success float-right" id="sendRegister">Enviar</button>
            <button class="btn btn-danger float-right" id="cancelRegister">Cancelar</button>
        </div>
    </form>
</div>