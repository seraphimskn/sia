<div class="col-12 row mx-auto" id="cartao">
    <section class="col-5 row mx-auto" id="dados">
        <div class="col-12"><strong>{$user->nome}</strong></div>
        <div class="col-12"><strong>{$user->cpf_cnpj}</strong></div>
        <div class="col-12"><strong>{$user->data_nascimento}</strong></div>
        <div class="col-12"><strong>{$user->data_vencimento}</strong></div>
    </section>
    <section class="col-5 mx-auto" id="qrCode">
        {$qrcode}
    </section>
</div>
