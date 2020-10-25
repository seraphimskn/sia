<div class="form row float-left col-12">
    <form class="form-control row" action="" method="post" enctype="multipart/form-data" id="addlevels">
    <input type="hidden" name="send" value="add" />
        <div class="nome col">
            <label for="nome">Nome:</label> <input type="text" name="nome" class="form-control" required/>
        </div>
        <div class="permissoes col row">
            <div class="todos col-3 border rounded">
                <p class="title h4 border-bottom">Todas as Permissões <input type="checkbox" class="form-controll float-right" value="all" name="all" /></p>
            </div>
            <div class="usuarios col-3 border rounded">
                <p class="title h4 border-bottom">Usuários </p>
                <p class="h5">Adicionar <input type="checkbox" class="form-controll" value="adicionar" name="usuarios[]" /></p>
                <p class="h5">Ver <input type="checkbox" class="form-controll" value="visualizar" name="usuarios[]" /></p>
                <p class="h5">Editar <input type="checkbox" class="form-controll" value="editar" name="usuarios[]" /></p>
                <p class="h5">Excluir <input type="checkbox" class="form-controll" value="apagar" name="usuarios[]" /></p>
            </div>
            <div class="niveis col-3 border rounded">
                <p class="title h4 border-bottom">Níveis </p>
                <p class="h5">Adicionar <input type="checkbox" class="form-controll" value="adicionar" name="niveis[]" /></p>
                <p class="h5">Ver <input type="checkbox" class="form-controll" value="visualizar" name="niveis[]" /></p>
                <p class="h5">Editar <input type="checkbox" class="form-controll" value="editar" name="niveis[]" /></p>
                <p class="h5">Excluir <input type="checkbox" class="form-controll" value="apagar" name="niveis[]" /></p>
            </div>
            <div class="planos col-3 border rounded">
                <p class="title h4 border-bottom">Planos </p>
                <p class="h5">Adicionar <input type="checkbox" class="form-controll" value="adicionar" name="planos[]" /></p>
                <p class="h5">Ver <input type="checkbox" class="form-controll" value="visualizar" name="planos[]" /></p>
                <p class="h5">Editar <input type="checkbox" class="form-controll" value="editar" name="planos[]" /></p>
                <p class="h5">Excluir <input type="checkbox" class="form-controll" value="apagar" name="planos[]" /></p>
            </div>
            <div class="relatorios col-3 border rounded">
                <p class="title h4 border-bottom">Relatórios </p>
                <p class="h5">Adimplência <input type="checkbox" class="form-controll" value="adimplencia" name="relatorios[]" /></p>
                <p class="h5">Aniversariantes <input type="checkbox" class="form-controll" value="aniversariantes" name="relatorios[]" /></p>
                <p class="h5">Novos Beneficiários <input type="checkbox" class="form-controll" value="novos_beneficiarios" name="relatorios[]" /></p>
                <p class="h5">Medição <input type="checkbox" class="form-controll" value="medicao" name="relatorios[]" /></p>
                <p class="h5">Segurados <input type="checkbox" class="form-controll" value="segurados" name="relatorios[]" /></p>
                <p class="h5">Vendas por Vendedor <input type="checkbox" class="form-controll" value="vendas_por_vendedor" name="relatorios[]" /></p>
                <p class="h5">Compras <input type="checkbox" class="form-controll" value="compras" name="relatorios[]" /></p>
                <p class="h5">Vendas <input type="checkbox" class="form-controll" value="venda_individual" name="relatorios[]" /></p>
            </div>
            <div class="boletos col-3 border rounded">
                <p class="title h4 border-bottom">Boletos </p>
                <p class="h5">Ver <input type="checkbox" class="form-controll" value="visualizar" name="boletos[]" /></p>
            </div>
            <div class="contrato col-3 border rounded">
                <p class="title h4 border-bottom">Contrato </p>
                <p class="h5">Ver <input type="checkbox" class="form-controll" value="visualizar" name="contrato[]" /></p>
                <p class="h5">Adicionar <input type="checkbox" class="form-controll" value="adicionar" name="contrato[]" /></p>
            </div>
            <div class="mailing col-3 border rounded">
                <p class="title h4 border-bottom">Mailing  </p>
                <p class="h5">Adicionar <input type="checkbox" class="form-controll" value="adicionar" name="mailing[]" /></p>
                <p class="h5">Ver <input type="checkbox" class="form-controll" value="visualizar" name="mailing[]" /></p>
                <p class="h5">Editar <input type="checkbox" class="form-controll" value="editar" name="mailing[]" /></p>
                <p class="h5">Excluir <input type="checkbox" class="form-controll" value="apagar" name="mailing[]" /></p>
            </div>
            <div class="produtos col-3 border rounded">
                <p class="title h4 border-bottom">Produtos </p>
                <p class="h5">Adicionar <input type="checkbox" class="form-controll" value="adicionar" name="produtos[]" /></p>
                <p class="h5">Ver <input type="checkbox" class="form-controll" value="visualizar" name="produtos[]" /></p>
                <p class="h5">Editar <input type="checkbox" class="form-controll" value="editar" name="produtos[]" /></p>
                <p class="h5">Excluir <input type="checkbox" class="form-controll" value="apagar" name="produtos[]" /></p>
            </div>
            <div class="nfe col-3 border rounded">
                <p class="title h4 border-bottom">NFe </p>
                <p class="h5">Ver <input type="checkbox" class="form-controll" value="visualizar" name="nfe[]" /></p>
            </div>
            <div class="fidelidade col-3 border rounded">
                <p class="title h4 border-bottom">Fidelidade </p>
                <p class="h5">Adicionar <input type="checkbox" class="form-controll" value="adicionar" name="fidelidade[]" /></p>
                <p class="h5">Ver <input type="checkbox" class="form-controll" value="visualizar" name="fidelidade[]" /></p>
                <p class="h5">Editar <input type="checkbox" class="form-controll" value="editar" name="fidelidade[]" /></p>
                <p class="h5">Excluir <input type="checkbox" class="form-controll" value="apagar" name="fidelidade[]" /></p>
            </div>
            <div class="2-via col-3 border rounded">
                <p class="title h4 border-bottom">2ª Via de Carteirinha </p>
                <p class="h5">Solicitar <input type="checkbox" class="form-controll" value="adicionar" name="segunda_via[]" /></p>
                <p class="h5">Ver <input type="checkbox" class="form-controll" value="visualizar" name="segunda_via[]" /></p>
            </div>
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