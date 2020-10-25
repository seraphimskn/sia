<div class="row col-12">
    <h4 class="title">Solicitar 2ª Via do seu Cartão</h4>
    <div class="form col-12">
        <form enctype="multipart/form-data" method="post" action="">
            <input type="hidden" name="userId" id="userID" value="{$userID}" />
            <button class="btn btn-success" id="newCard">Nova Carteirinha</button>
        </form>
    </div>
</div>
<div class="row col-12">
    <h4 class="title">Visualização Virtual</h4>
    <div class="clearfix col-12"></div>
    <div class="cartao col-10 row">
        {include $qrCode}
    </div>
</div>