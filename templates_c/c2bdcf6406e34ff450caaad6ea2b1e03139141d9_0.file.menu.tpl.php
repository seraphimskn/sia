<?php
/* Smarty version 3.1.30, created on 2020-03-23 15:23:22
  from "/var/www/html/sigms/views/modules/menu.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e78d46ad46ee5_90842271',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c2bdcf6406e34ff450caaad6ea2b1e03139141d9' => 
    array (
      0 => '/var/www/html/sigms/views/modules/menu.tpl',
      1 => 1584130661,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e78d46ad46ee5_90842271 (Smarty_Internal_Template $_smarty_tpl) {
?>
<nav class="vertical-nav">
	<h2 class="site-title"></h2>
	<div class="col-12 bar"><img src="assets/imgs/LOGO-PNG-03.png" style="max-width:15rem"></div>
	<ul>
        <?php if (isset($_smarty_tpl->tpl_vars['permissoes']->value->scalar) && $_smarty_tpl->tpl_vars['permissoes']->value->scalar == 'all') {?>
	    <li><a href="home">PAINEL DE CONTROLE</a></li>
		<li class="dropdown">
			<a href="users/view">USUÁRIOS</a>
			<?php if (isset($_smarty_tpl->tpl_vars['page']->value)) {?>
				<?php if (($_smarty_tpl->tpl_vars['page']->value == 'users') || ($_smarty_tpl->tpl_vars['page']->value == 'levels')) {?>
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
				<?php }?>
			<?php }?>
		</li>
		<li class="dropdown">
			<a href="reports/view">RELATÓRIOS</a>
			<?php if (isset($_smarty_tpl->tpl_vars['page']->value)) {?>
				<?php if ($_smarty_tpl->tpl_vars['page']->value == 'reports') {?>
				
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
				<?php }?>
			<?php }?>
		</li>
		<li class="dropdown">
			<a href="bills/view">BOLETOS</a>				
		</li>
		<li class="dropdown">
			<a href="contracts/view">CONTRATO</a>
			<?php if (isset($_smarty_tpl->tpl_vars['page']->value)) {?>
				<?php if ($_smarty_tpl->tpl_vars['page']->value == 'contracts') {?>
					<ul>
						<li><a href="contracts/add">Gerar um Novo Contrato</a></li>
					</ul>
				<?php }?>
			<?php }?>						
		</li>
		<li class="dropdown">
			<a href="mailing/view">MAILING</a>
			<?php if (isset($_smarty_tpl->tpl_vars['page']->value)) {?>
				<?php if ($_smarty_tpl->tpl_vars['page']->value == 'mailing') {?>
					<ul>
						<li><a href="mailing/add">Adicionar Modelo de Mala-Direta</a></li>
					</ul>
				<?php }?>
			<?php }?>				
		</li>
		<li class="dropdown">
			<a href="plans/view">PLANOS</a>
			<?php if (isset($_smarty_tpl->tpl_vars['page']->value)) {?>
				<?php if ($_smarty_tpl->tpl_vars['page']->value == 'plans') {?>
					<ul>
						<li><a href="plans/add">Adicionar Plano</a></li>
					</ul>
				<?php }?>
			<?php }?>				
		</li>
		<li class="dropdown">
			<a href="products/view">PRODUTOS</a>
			<?php if (isset($_smarty_tpl->tpl_vars['page']->value)) {?>
				<?php if ($_smarty_tpl->tpl_vars['page']->value == 'products') {?>
					<ul>
						<li><a href="products/add">Adicionar Produto</a></li>
					</ul>
				<?php }?>
			<?php }?>				
		</li>
		<li class="dropdown">
			<a href="payments/view">PAGAMENTOS</a>				
		</li>
		<li class="dropdown">
			<a href="points/view">FIDELIDADE</a>
			<?php if (isset($_smarty_tpl->tpl_vars['page']->value)) {?>
				<?php if ($_smarty_tpl->tpl_vars['page']->value == 'points') {?>
					<ul>
						<li><a href="points/add">Adicionar Pontuação</a></li>
					</ul>
				<?php }?>
			<?php }?>				
		</li>
		<li class="dropdown">
			<a href="newcard/view">2ª VIA DA CARTEIRINHA</a>					
		</li>
        <?php } else { ?>
        <li><a href="home">PAINEL DE CONTROLE</a></li>
        <?php if (isset($_smarty_tpl->tpl_vars['permissoes']->value->usuarios)) {?>
		<li class="dropdown">
			<a href="users/view">USUÁRIOS</a>
			<?php if (isset($_smarty_tpl->tpl_vars['page']->value) && in_array('cadastrar',$_smarty_tpl->tpl_vars['permissoes']->value->usuarios)) {?>
				<?php if (($_smarty_tpl->tpl_vars['page']->value == 'users') || ($_smarty_tpl->tpl_vars['page']->value == 'levels')) {?>
					<ul>
						<li><a href="users/add">Adicionar</a></li>
					</ul>
					<?php if (in_array('cadastrar',$_smarty_tpl->tpl_vars['permissoes']->value->niveis)) {?>
					<ul>
						<li class="dropdown">
							<a href="levels/view">Níveis de Acesso</a></li>
							<ul>
								<li><a href="levels/add">Novo Nível</a></li>
							</ul>
						</li>
					</ul>
					<?php }?>
				<?php }?>
			<?php }?>
		</li>
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['permissoes']->value->relatorios)) {?>
		<li class="dropdown">
			<a href="reports/view">RELATÓRIOS</a>
			<?php if (isset($_smarty_tpl->tpl_vars['page']->value)) {?>
				<?php if ($_smarty_tpl->tpl_vars['page']->value == 'reports') {?>
					<ul>
                        <?php if (in_array('adimplencia',$_smarty_tpl->tpl_vars['permissoes']->value->relatorios)) {?><li><a href="reports/payments">Adimplência</a></li><?php }?>
						<?php if (in_array('aniversariantes',$_smarty_tpl->tpl_vars['permissoes']->value->relatorios)) {?><li><a href="reports/births">Aniversariantes</a></li><?php }?>
						<?php if (in_array('novos_beneficiarios',$_smarty_tpl->tpl_vars['permissoes']->value->relatorios)) {?><li><a href="reports/newcomers">Novos Beneficiários</a></li><?php }?>
						<?php if (in_array('medicao',$_smarty_tpl->tpl_vars['permissoes']->value->relatorios)) {?><li><a href="reports/prospects">Medição</a></li><?php }?>
						<?php if (in_array('segurados',$_smarty_tpl->tpl_vars['permissoes']->value->relatorios)) {?><li><a href="reports/assurances">Assegurados</a></li><?php }?>
						<?php if (in_array('vendas_por_vendedor',$_smarty_tpl->tpl_vars['permissoes']->value->relatorios)) {?><li><a href="reports/by-seller">Cadastros por Vendedor</a></li><?php }?>
						<?php if (in_array('compras',$_smarty_tpl->tpl_vars['permissoes']->value->relatorios)) {?><li><a href="reports/financials">Compras Efetuadas</a></li><?php }?>
						<?php if (in_array('venda_individual',$_smarty_tpl->tpl_vars['permissoes']->value->relatorios)) {?><li><a href="reports/sells">Vendas</a></li><?php }?>
					</ul>
				<?php }?>
			<?php }?>
		</li>
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['permissoes']->value->boletos)) {?>
		<li class="dropdown">
			<a href="payments/contract_payments">PAGAMENTOS</a>				
		</li>
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['permissoes']->value->contrato)) {?>
		<li class="dropdown">
			<a href="contracts/view">CONTRATO</a>
			<?php if (isset($_smarty_tpl->tpl_vars['page']->value) && in_array('adicionar',$_smarty_tpl->tpl_vars['permissoes']->value->contrato)) {?>
				<?php if ($_smarty_tpl->tpl_vars['page']->value == 'contracts') {?>
					<ul>
						<li><a href="contracts/add">Gerar um Novo Contrato</a></li>
					</ul>
				<?php }?>
			<?php }?>						
		</li>
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['permissoes']->value->mailing)) {?>
		<li class="dropdown">
			<a href="mailing/view">MAILING</a>
			<?php if (isset($_smarty_tpl->tpl_vars['page']->value) && in_array('adicionar',$_smarty_tpl->tpl_vars['permissoes']->value->mailing)) {?>
				<?php if ($_smarty_tpl->tpl_vars['page']->value == 'mailing') {?>
					<ul>
						<li><a href="mailing/add">Adicionar Modelo de Mala-Direta</a></li>
					</ul>
				<?php }?>
			<?php }?>				
		</li>
        <?php }?>
		<?php if (isset($_smarty_tpl->tpl_vars['permissoes']->value->planos)) {?>
		<li class="dropdown">
			<a href="plans/view">PLANOS</a>
			<?php if (isset($_smarty_tpl->tpl_vars['page']->value)) {?>
				<?php if ($_smarty_tpl->tpl_vars['page']->value == 'plans') {?>
					<ul>
						<li><a href="plans/add">Adicionar Plano</a></li>
					</ul>
				<?php }?>
			<?php }?>				
		</li>
		<?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['permissoes']->value->produtos)) {?>
		<li class="dropdown">
			<a href="products/view">PRODUTOS</a>
			<?php if (isset($_smarty_tpl->tpl_vars['page']->value) && in_array('adicionar',$_smarty_tpl->tpl_vars['permissoes']->value->produtos)) {?>
				<?php if ($_smarty_tpl->tpl_vars['page']->value == 'products') {?>
					<ul>
						<li><a href="products/add">Adicionar Produto</a></li>
					</ul>
				<?php }?>
			<?php }?>				
		</li>
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['permissoes']->value->nfe)) {?>
		<li class="dropdown">
			<a href="nfe/view">NFe</a>				
		</li>
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['permissoes']->value->fidelidade)) {?>
		<li class="dropdown">
			<a href="points/view">FIDELIDADE</a>
			<?php if (isset($_smarty_tpl->tpl_vars['page']->value) && in_array('adicionar',$_smarty_tpl->tpl_vars['permissoes']->value->fidelidade)) {?>
				<?php if ($_smarty_tpl->tpl_vars['page']->value == 'points') {?>
					<ul>
						<li><a href="points/add">Adicionar Pontuação</a></li>
					</ul>
				<?php }?>
			<?php }?>				
		</li>
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['permissoes']->value->segunda_via)) {?>
		<li class="dropdown">
			<a href="newcard/view">2ª VIA DA CARTEIRINHA</a>		
		</li>
        <?php }?>
        <?php }?>
	</ul>
</nav>
<?php }
}
