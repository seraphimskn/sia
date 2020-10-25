{foreach from=$levels item=$item}
<div class="form row float-left col-12">
    <form class="form-control row" action="" method="post" enctype="multipart/form-data" id="editlevels">
    <input type="hidden" name="send" value="edit" />
    <input type="hidden" name="id" value="{$the_id}" />
    <input type="hidden" name="userName" value="{$userName}">
        <div class="nome col">
            <label for="nome">Nome:</label> <input type="text" name="nome" class="form-control" value="{$item->nome}" required/>
        </div>
        <div class="permissoes col row">
            <div class="todos col-3 border rounded">
                <p class="title h4 border-bottom">Todas as Permissões <input type="checkbox" class="form-controll float-right" value="all" name="all" {if $item->permissoes eq 'all'}checked{/if} /></p>
            </div>
            <div class="usuarios col-3 border rounded">
                <p class="title h4 border-bottom">Usuários </p>
                <p class="h5">Adicionar <input type="checkbox" class="form-controll" value="adicionar" name="usuarios[]" {if isset($item->permissoes->usuarios) && is_array($item->permissoes->usuarios) && in_array('adicionar', $item->permissoes->usuarios)}checked{/if} /></p>
                <p class="h5">Ver <input type="checkbox" class="form-controll" value="visualizar" name="usuarios[]" {if isset($item->permissoes->usuarios) && is_array($item->permissoes->usuarios) && in_array('visualizar', $item->permissoes->usuarios)}checked{/if} /></p>
                <p class="h5">Editar <input type="checkbox" class="form-controll" value="editar" name="usuarios[]" {if isset($item->permissoes->usuarios) && is_array($item->permissoes->usuarios) && in_array('editar', $item->permissoes->usuarios)}checked{/if} /></p>
                <p class="h5">Excluir <input type="checkbox" class="form-controll" value="apagar" name="usuarios[]" {if isset($item->permissoes->usuarios) && is_array($item->permissoes->usuarios) && in_array('apagar', $item->permissoes->usuarios)}checked{/if} /></p>
            </div>
            <div class="niveis col-3 border rounded">
                <p class="title h4 border-bottom">Níveis </p>
                <p class="h5">Adicionar <input type="checkbox" class="form-controll" value="adicionar" name="niveis[]" {if isset($item->permissoes->niveis) && is_array($item->permissoes->niveis) && in_array('adicionar', $item->permissoes->niveis)}checked{/if} /></p>
                <p class="h5">Ver <input type="checkbox" class="form-controll" value="visualizar" name="niveis[]" {if isset($item->permissoes->niveis) && is_array($item->permissoes->niveis) && in_array('visualizar', $item->permissoes->niveis)}checked{/if} /></p>
                <p class="h5">Editar <input type="checkbox" class="form-controll" value="editar" name="niveis[]" {if isset($item->permissoes->niveis) && is_array($item->permissoes->niveis) && in_array('editar', $item->permissoes->niveis)}checked{/if} /></p>
                <p class="h5">Excluir <input type="checkbox" class="form-controll" value="apagar" name="niveis[]" {if isset($item->permissoes->niveis) && is_array($item->permissoes->niveis) && in_array('apagar', $item->permissoes->niveis)}checked{/if} /></p>
            </div>
             <div class="planos col-3 border rounded">
                <p class="title h4 border-bottom">Planos </p>
                <p class="h5">Adicionar <input type="checkbox" class="form-controll" value="adicionar" name="planos[]" {if isset($item->permissoes->planos) && is_array($item->permissoes->planos) && in_array('adicionar', $item->permissoes->planos)}checked{/if} /></p>
                <p class="h5">Ver <input type="checkbox" class="form-controll" value="visualizar" name="planos[]" {if isset($item->permissoes->planos) && is_array($item->permissoes->planos) && in_array('visualizar', $item->permissoes->planos)}checked{/if} /></p>
                <p class="h5">Editar <input type="checkbox" class="form-controll" value="editar" name="planos[]" {if isset($item->permissoes->planos) && is_array($item->permissoes->planos) && in_array('editar', $item->permissoes->planos)}checked{/if} /></p>
                <p class="h5">Excluir <input type="checkbox" class="form-controll" value="apagar" name="planos[]" {if isset($item->permissoes->planos) && is_array($item->permissoes->planos) && in_array('apagar', $item->permissoes->planos)}checked{/if} /></p>
            </div>
            <div class="relatorios col-3 border rounded">
                <p class="title h4 border-bottom">Relatórios </p>
                <p class="h5">Adimplência <input type="checkbox" class="form-controll" value="adimplencia" name="relatorios[]" {if isset($item->permissoes->relatorios) && is_array($item->permissoes->relatorios) && in_array('adimplencia', $item->permissoes->relatorios)}checked{/if}/></p>
                <p class="h5">Aniversariantes <input type="checkbox" class="form-controll" value="aniversariantes" name="relatorios[]" {if isset($item->permissoes->relatorios) && is_array($item->permissoes->relatorios) && in_array('aniversariantes', $item->permissoes->relatorios)}checked{/if}/></p>
                <p class="h5">Novos Beneficiários <input type="checkbox" class="form-controll" value="novos_beneficiarios" name="relatorios[]" {if isset($item->permissoes->relatorios) && is_array($item->permissoes->relatorios) && in_array('novos_beneficiarios', $item->permissoes->relatorios)}checked{/if} /></p>
                <p class="h5">Medição <input type="checkbox" class="form-controll" value="medicao" name="relatorios[]" {if isset($item->permissoes->relatorios) && is_array($item->permissoes->relatorios) && in_array('medicao', $item->permissoes->relatorios)}checked{/if}/></p>
                <p class="h5">Segurados <input type="checkbox" class="form-controll" value="segurados" name="relatorios[]" {if isset($item->permissoes->relatorios) && is_array($item->permissoes->relatorios) && in_array('segurados', $item->permissoes->relatorios)}checked{/if}/></p>
                <p class="h5">Vendas por Vendedor <input type="checkbox" class="form-controll" value="vendas_por_vendedor" name="relatorios[]" {if isset($item->permissoes->relatorios) && is_array($item->permissoes->relatorios) && in_array('vendas_por_vendedor', $item->permissoes->relatorios)}checked{/if}/></p>
                <p class="h5">Compras <input type="checkbox" class="form-controll" value="compras" name="relatorios[]" {if isset($item->permissoes->relatorios) && is_array($item->permissoes->relatorios) && in_array('compras', $item->permissoes->relatorios)}checked{/if}/></p>
                <p class="h5">Vendas <input type="checkbox" class="form-controll" value="venda_individual" name="relatorios[]" {if isset($item->permissoes->relatorios) && is_array($item->permissoes->relatorios) && in_array('venda_individual', $item->permissoes->relatorios)}checked{/if}/></p>
            </div>
            <div class="boletos col-3 border rounded">
                <p class="title h4 border-bottom">Boletos </p>
                <p class="h5">Ver <input type="checkbox" class="form-controll" value="visualizar" name="boletos[]" {if isset($item->permissoes->boletos)}checked{/if}/></p>
            </div>
            <div class="contrato col-3 border rounded">
                <p class="title h4 border-bottom">Contrato </p>
                <p class="h5">Ver <input type="checkbox" class="form-controll" value="visualizar" name="contrato[]" {if isset($item->permissoes->contrato) && is_array($item->permissoes->contrato) && in_array('visualizar', $item->permissoes->contrato)}checked{/if}/></p>
                <p class="h5">Ver <input type="checkbox" class="form-controll" value="adicionar" name="contrato[]" {if isset($item->permissoes->contrato) && is_array($item->permissoes->contrato) && in_array('adicionar', $item->permissoes->contrato)}checked{/if}/></p>
            </div>
            <div class="mailing col-3 border rounded">
                <p class="title h4 border-bottom">Mailing  </p>
                <p class="h5">Adicionar <input type="checkbox" class="form-controll" value="adicionar" name="mailing[]" {if isset($item->permissoes->mailing) && is_array($item->permissoes->mailing) && in_array('adicionar', $item->permissoes->mailing)}checked{/if}/></p>
                <p class="h5">Ver <input type="checkbox" class="form-controll" value="visualizar" name="mailing[]" {if isset($item->permissoes->mailing) && is_array($item->permissoes->mailing) && in_array('visualizar', $item->permissoes->mailing)}checked{/if}/></p>
                <p class="h5">Editar <input type="checkbox" class="form-controll" value="editar" name="mailing[]" {if isset($item->permissoes->mailing) && is_array($item->permissoes->mailing) && in_array('editar', $item->permissoes->mailing)}checked{/if}/></p>
                <p class="h5">Excluir <input type="checkbox" class="form-controll" value="apagar" name="mailing[]" {if isset($item->permissoes->mailing) && is_array($item->permissoes->mailing) && in_array('apagar', $item->permissoes->mailing)}checked{/if}/></p>
            </div>
            <div class="produtos col-3 border rounded">
                <p class="title h4 border-bottom">Produtos </p>
                <p class="h5">Adicionar <input type="checkbox" class="form-controll" value="adicionar" name="produtos[]" {if isset($item->permissoes->produtos) && is_array($item->permissoes->produtos) && in_array('adicionar', $item->permissoes->produtos)}checked{/if}/></p>
                <p class="h5">Ver <input type="checkbox" class="form-controll" value="visualizar" name="produtos[]" {if isset($item->permissoes->produtos) && is_array($item->permissoes->produtos) && in_array('visualizar', $item->permissoes->produtos)}checked{/if}/></p>
                <p class="h5">Editar <input type="checkbox" class="form-controll" value="editar" name="produtos[]" {if isset($item->permissoes->produtos) && is_array($item->permissoes->produtos) && in_array('editar', $item->permissoes->produtos)}checked{/if}/></p>
                <p class="h5">Excluir <input type="checkbox" class="form-controll" value="apagar" name="produtos[]" {if isset($item->permissoes->produtos) && is_array($item->permissoes->produtos) && in_array('apagar', $item->permissoes->produtos)}checked{/if}/></p>
            </div>
            <div class="nfe col-3 border rounded">
                <p class="title h4 border-bottom">NFe </p>
                <p class="h5">Ver <input type="checkbox" class="form-controll" value="visualizar" name="nfe[]" {if isset($item->permissoes->nfe)}checked{/if}/></p>
            </div>
            <div class="fidelidade col-3 border rounded">
                <p class="title h4 border-bottom">Fidelidade </p>
                <p class="h5">Adicionar <input type="checkbox" class="form-controll" value="adicionar" name="fidelidade[]" {if isset($item->permissoes->fidelidade) && is_array($item->permissoes->fidelidade) && in_array('adicionar', $item->permissoes->fidelidade)}checked{/if}/></p>
                <p class="h5">Ver <input type="checkbox" class="form-controll" value="visualizar" name="fidelidade[]" {if isset($item->permissoes->fidelidade) && is_array($item->permissoes->fidelidade) && in_array('visualizar', $item->permissoes->fidelidade)}checked{/if}/></p>
                <p class="h5">Editar <input type="checkbox" class="form-controll" value="editar" name="fidelidade[]" {if isset($item->permissoes->fidelidade) && is_array($item->permissoes->fidelidade) && in_array('editar', $item->permissoes->fidelidade)}checked{/if}/></p>
                <p class="h5">Excluir <input type="checkbox" class="form-controll" value="apagar" name="fidelidade[]" {if isset($item->permissoes->fidelidade) && is_array($item->permissoes->fidelidade) && in_array('apagar', $item->permissoes->fidelidade)}checked{/if}/></p>
            </div>
            <div class="2-via col-3 border rounded">
                <p class="title h4 border-bottom">2ª Via de Carteirinha </p>
                <p class="h5">Solicitar <input type="checkbox" class="form-controll" value="adicionar" name="segunda_via[]" {if isset($item->permissoes->segunda_via) && is_array($item->permissoes->segunda_via) && in_array('adicionar', $item->permissoes->segunda_via)}checked{/if}/></p>
                <p class="h5">Ver <input type="checkbox" class="form-controll" value="visualizar" name="segunda_via[]" {if isset($item->permissoes->segunda_via) && is_array($item->permissoes->segunda_via) && in_array('visualizar', $item->permissoes->segunda_via)}checked{/if}/></p>
            </div>
        </div>
        <div class="ativo col row">
            <p>Nível Ativo:</p> 
            <div class="col-12"><label>Sim: </label><input type="radio" name="ativo" class="form-control" value="1" {if isset($item->ativo) && $item->ativo eq 1}checked{/if}/></div>
            <div class="col-12"><label>Não: </label><input type="radio" name="ativo" class="form-control" value="0" {if isset($item->ativo) && $item->ativo eq 0}checked{/if}/></div>
        </div>       
        <div class="col">
            <button class="btn btn-success float-right" id="sendEdit">Enviar</button>
            <button class="btn btn-danger float-right" id="cancelEdit">Cancelar</button>
        </div>
    </form>
</div>
{/foreach}