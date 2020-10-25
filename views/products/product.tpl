<div class="row">
    <div class="avatar col-5">
        <img src="{$produto->imagem}" class="img-fluid" />
    </div>
    <div class="col-7">
        <h3>{$produto->produto}</h3>
        <hr />
        <h4>Loja: {$produto->parceiro->nome}</h4>
        <div class="col-12 row">
            <h4 class="col-12">Descrição do Produto:</h4>
            <div class="col-12">{$produto->descricao}</div>
            <div class="col-12">Quantidade disponível: <strong>{$produto->quantidade}</strong> unidades</div>
            <div class="col-12">Valor em pontos: <strong>{$produto->pontos}</strong> pontos</div>
            {if $qtdPontos > 0}
                <div class="col-12 mt-4" ><span class="alert alert-warning">Você ainda precisa de <strong>{$qtdPontos}</strong> para resgatar este produto!</span></div>
            {elseif is_null($qtdPontos)}
                <div class="col-12 mt-4" ><span class="alert alert-warning">Você ainda não possui pontos de fidelidade. Use seu cartão e ganhe pontos!</span></div>
            {else}
                <div class="col-12 mt-4"><span class="alert alert-success">Você já pode resgatar este produto, vá até uma loja {$produto->parceiro->nome} e peça o resgate do produto!</span></div>
            {/if}
        </div>
    </div>    
</div>