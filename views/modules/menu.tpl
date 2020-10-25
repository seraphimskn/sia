<nav class="vertical-nav">
	<h2 class="site-title"></h2>
	<div class="col-12 bar"><img src="assets/imgs/LOGO-PNG-03.png" style="max-width:15rem"></div>
	<ul>
        {if isset($permissoes->scalar) && $permissoes->scalar eq 'all'}
	    <li><a href="home">PAINEL DE CONTROLE</a></li>
		<li class="dropdown">
			<a href="users/view">USUÁRIOS</a>
			{if isset($page)}
				{if ($page eq 'users') || ($page eq 'levels') }
					<ul>
						<li><a href="users/add">Adicionar</a></li>
					</ul>
					<ul>
						<li class="dropdown">
							<a href="levels/view">Níveis de Acesso</a></li>
							<ul>
								<li><a href="levels/add">Novo Nível</a></li>
							</ul>
						</li>
					</ul>
				{/if}
			{/if}
		</li>
		<li class="dropdown">
			<a href="reports/view">RELATÓRIOS</a>
			{if isset($page)}
				{if $page eq 'reports'}
				
					<ul>
						<li><a href="reports/payments">Adimplência</a></li>
						<li><a href="reports/births">Aniversariantes</a></li>
						<li><a href="reports/newcomers">Novos Beneficiários</a></li>
						<li><a href="reports/prospects">Medição</a></li>
						<li><a href="reports/assurances">Assegurados</a></li>
						<li><a href="reports/by-seller">Cadastros por Vendedor</a></li>
						<li><a href="reports/financials">Financeiros</a></li>
						<li><a href="reports/sells">Vendas</a></li>
					</ul>
				{/if}
			{/if}
		</li>
		<li class="dropdown">
			<a href="bills/view">BOLETOS</a>				
		</li>
		<li class="dropdown">
			<a href="contracts/view">CONTRATO</a>
			{if isset($page)}
				{if $page eq 'contracts'}
					<ul>
						<li><a href="contracts/add">Gerar um Novo Contrato</a></li>
					</ul>
				{/if}
			{/if}						
		</li>
		<li class="dropdown">
			<a href="mailing/view">MAILING</a>
			{if isset($page)}
				{if $page eq 'mailing'}
					<ul>
						<li><a href="mailing/add">Adicionar Modelo de Mala-Direta</a></li>
					</ul>
				{/if}
			{/if}				
		</li>
		<li class="dropdown">
			<a href="plans/view">PLANOS</a>
			{if isset($page)}
				{if $page eq 'plans'}
					<ul>
						<li><a href="plans/add">Adicionar Plano</a></li>
					</ul>
				{/if}
			{/if}				
		</li>
		<li class="dropdown">
			<a href="products/view">PRODUTOS</a>
			{if isset($page)}
				{if $page eq 'products'}
					<ul>
						<li><a href="products/add">Adicionar Produto</a></li>
					</ul>
				{/if}
			{/if}				
		</li>
		<li class="dropdown">
			<a href="payments/view">PAGAMENTOS</a>				
		</li>
		<li class="dropdown">
			<a href="points/view">FIDELIDADE</a>
			{if isset($page)}
				{if $page eq 'points'}
					<ul>
						<li><a href="points/add">Adicionar Pontuação</a></li>
					</ul>
				{/if}
			{/if}				
		</li>
		<li class="dropdown">
			<a href="newcard/view">2ª VIA DA CARTEIRINHA</a>					
		</li>
        {else}
        <li><a href="home">PAINEL DE CONTROLE</a></li>
        {if isset($permissoes->usuarios)}
		<li class="dropdown">
			<a href="users/view">USUÁRIOS</a>
			{if isset($page) && in_array('cadastrar', $permissoes->usuarios)}
				{if ($page eq 'users') || ($page eq 'levels')}
					<ul>
						<li><a href="users/add">Adicionar</a></li>
					</ul>
					{if in_array('cadastrar', $permissoes->niveis)}
					<ul>
						<li class="dropdown">
							<a href="levels/view">Níveis de Acesso</a></li>
							<ul>
								<li><a href="levels/add">Novo Nível</a></li>
							</ul>
						</li>
					</ul>
					{/if}
				{/if}
			{/if}
		</li>
        {/if}
        {if isset($permissoes->relatorios)}
		<li class="dropdown">
			<a href="reports/view">RELATÓRIOS</a>
			{if isset($page)}
				{if $page eq 'reports'}
					<ul>
                        {if in_array('adimplencia', $permissoes->relatorios)}<li><a href="reports/payments">Adimplência</a></li>{/if}
						{if in_array('aniversariantes', $permissoes->relatorios)}<li><a href="reports/births">Aniversariantes</a></li>{/if}
						{if in_array('novos_beneficiarios', $permissoes->relatorios)}<li><a href="reports/newcomers">Novos Beneficiários</a></li>{/if}
						{if in_array('medicao', $permissoes->relatorios)}<li><a href="reports/prospects">Medição</a></li>{/if}
						{if in_array('segurados', $permissoes->relatorios)}<li><a href="reports/assurances">Assegurados</a></li>{/if}
						{if in_array('vendas_por_vendedor', $permissoes->relatorios)}<li><a href="reports/by-seller">Cadastros por Vendedor</a></li>{/if}
						{if in_array('compras', $permissoes->relatorios)}<li><a href="reports/financials">Compras Efetuadas</a></li>{/if}
						{if in_array('venda_individual', $permissoes->relatorios)}<li><a href="reports/sells">Vendas</a></li>{/if}
					</ul>
				{/if}
			{/if}
		</li>
        {/if}
        {if isset($permissoes->boletos)}
		<li class="dropdown">
			<a href="payments/contract_payments">PAGAMENTOS</a>				
		</li>
        {/if}
        {if isset($permissoes->contrato)}
		<li class="dropdown">
			<a href="contracts/view">CONTRATO</a>
			{if isset($page) && in_array('adicionar', $permissoes->contrato)}
				{if $page eq 'contracts'}
					<ul>
						<li><a href="contracts/add">Gerar um Novo Contrato</a></li>
					</ul>
				{/if}
			{/if}						
		</li>
        {/if}
        {if isset($permissoes->mailing)}
		<li class="dropdown">
			<a href="mailing/view">MAILING</a>
			{if isset($page) && in_array('adicionar', $permissoes->mailing)}
				{if $page eq 'mailing'}
					<ul>
						<li><a href="mailing/add">Adicionar Modelo de Mala-Direta</a></li>
					</ul>
				{/if}
			{/if}				
		</li>
        {/if}
		{if isset($permissoes->planos)}
		<li class="dropdown">
			<a href="plans/view">PLANOS</a>
			{if isset($page)}
				{if $page eq 'plans'}
					<ul>
						<li><a href="plans/add">Adicionar Plano</a></li>
					</ul>
				{/if}
			{/if}				
		</li>
		{/if}
        {if isset($permissoes->produtos)}
		<li class="dropdown">
			<a href="products/view">PRODUTOS</a>
			{if isset($page) && in_array('adicionar', $permissoes->produtos)}
				{if $page eq 'products'}
					<ul>
						<li><a href="products/add">Adicionar Produto</a></li>
					</ul>
				{/if}
			{/if}				
		</li>
        {/if}
        {if isset($permissoes->nfe)}
		<li class="dropdown">
			<a href="nfe/view">NFe</a>				
		</li>
        {/if}
        {if isset($permissoes->fidelidade)}
		<li class="dropdown">
			<a href="points/view">FIDELIDADE</a>
			{if isset($page) && in_array('adicionar', $permissoes->fidelidade)}
				{if $page eq 'points'}
					<ul>
						<li><a href="points/add">Adicionar Pontuação</a></li>
					</ul>
				{/if}
			{/if}				
		</li>
        {/if}
        {if isset($permissoes->segunda_via)}
		<li class="dropdown">
			<a href="newcard/view">2ª VIA DA CARTEIRINHA</a>		
		</li>
        {/if}
        {/if}
	</ul>
</nav>
