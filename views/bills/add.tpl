<form method="post" action="https://geraboleto.sicoobnet.com.br/geradorBoleto/GerarBoleto.do">
					  <table width="100%" border="0">
					    <tr bgcolor="#CCCCCC">
					      <td colspan="2">Cedente</td>
					    </tr>
					    <tr>
					      <td width="17%"><div align="right">N.° Cliente: </div></td>
					      <td><input name="numCliente" value="1871668" type="hidden"/>
					        Cooperativa:
					          <input name="coopCartao" value="3010" type="hidden"/></td>
					    </tr>
					    <tr>
					      <td><div align="right">Chave acesso web: </div></td>
					      <td><input name="chaveAcessoWeb" type="hidden" value="D9380049-646F-4A60-97DF-99533DE6F6D6" size="50"/></td>
					    </tr>
					    <tr>
					      <td><div align="right">Num. Conta Corrente:</div></td>
					      <td><input name="numContaCorrente" value="741280" type="hidden"/></td>
					    </tr>
					    <tr>
					      <td>&nbsp;</td>
					      <td>&nbsp;</td>
					    </tr>
					    <tr bgcolor="#CCCCCC">
					      <td colspan="2">Sacado</td>
					    </tr>
					    <tr>
					      <td><div align="right">Nome: </div></td>
					      <td><input size="50" maxlength="50" name="nomeSacado" type="text" value=""/>
					        CPF/CNPJ:
					        <input size="14" maxlength="14" name="cpfCGC" type="text" value=""/> 
					        Data nascimento: <input name="dataNascimento" type="text" value="" size="10"/>
					        <span class="style1">(aaaaMMdd)</span></td>
					    </tr>
					    <tr>
					      <td><div align="right">Endereço: </div></td>
					      <td><input size="40" maxlength="40" name="endereco" type="text" value=""/>
					        Bairro:
					        <input size="15" maxlength="30" name="bairro" type="text" value=""/></td>
					    </tr>
					    <tr>
					      <td><div align="right">Cidade:</div></td>
					      <td><input size="15" maxlength="15" name="cidade" type="text" value=""/>
					        CEP:
					        <input size="8" maxlength="8" name="cep" type="text" value=""/>
					        UF:
					        <input size="2" maxlength="2" name="uf" type="text" value=""/></td>
					    </tr>
						<tr>
					      <td><div align="right">Cód. Município: </div></td>
					      <td><input name="codMunicipio" type="text" value="44444" size="10"/>
					      <span class="style1">*</span></td>
					    </tr> 
					    <tr>
					      <td><div align="right">Telefone:</div></td>
					      <td><input name="telefone" type="text" value=""/> 
					      DDD: 
					      <input name="ddd" type="text" value="" size="5"/>
					      Ramal: 
					      <input name="ramal" type="text" value="" size="10"/></td>
					    </tr>
					    <tr>
					      <td><div align="right">Recebe boleto por email:</div></td>
					      <td><input name="bolRecebeBoletoEletronico" type="text" value="0" size="3"/>
					        <span class="style1">(0: Não / 1: Sim) </span></td>
					    </tr>
					    <tr>
					      <td><div align="right">Email:</div></td>
					      <td><input name="email" type="text" value="" size="50"/></td>
					      </tr> <tr>
					      <td>&nbsp;</td>
					      <td>&nbsp;</td>
					    </tr>
					    <tr bgcolor="#CCCCCC">
					      <td colspan="2">Título</td>
					    </tr>
					    <tr>
					      <td><div align="right">Numero do título:</div></td>
					      <td><input name="numTitulo" value="" type="text"/></td>
					    </tr>
					    <tr>
					      <td><div align="right">Cód. esp. documento:</div></td>
					      <td><input name="codEspDocumento" value="" type="text"/></td>
					    </tr>
					    
					    <tr>
					      <td><div align="right">Data emissão: </div></td>
					      <td><input name="dataEmissao" value="" type="text"/>
					      <span class="style1">(aaaaMMdd)</span></td>
					    </tr>
					    <tr>
					      <td><div align="right">Seu número: </div></td>
					      <td><input name="seuNumero" value="" type="text"/></td>
					    </tr>
					    <tr>
					      <td><div align="right">Valor título: </div></td>
					      <td><input name="valorTitulo" value="" type="text"/>
					      <span class="style1">*</span></td>
					    </tr>
					    <tr>
					      <td><div align="right">Cód. tipo vencimento:</div></td>
					      <td><input name="codTipoVencimento" value="1" type="text"/>
					      <span class="style1">(1: Normal / 2: À vista / 3: Contra apresentação )</span></td>
					    </tr>
					    <tr>
					      <td><div align="right">Data vencimento título:</div></td>
					      <td><input name="dataVencimentoTit" value="" type="text"/>
					        <span class="style1">(aaaaMMdd)</span></td>
					    </tr>
					    <tr>
					      <td><div align="right">Data limite pagamento:</div></td>
					      <td><input name="dataLimitePagamento" value="" type="text"/>
					        <span class="style1">(aaaaMMdd)</span></td>
					    </tr>        
					    <tr>
					      <td><div align="right">Valor abatimento:</div></td>
					      <td><input name="valorAbatimento" value="0.00" type="text"/>
					        <span class="style1">*</span> Valor IOF:
					        <input name="valorIOF" value="0.00" type="text"/>
					        <span class="style1">*</span></td>
					    </tr>
					    <tr>
					      <td><div align="right">Aceite:</div></td>
					      <td><input name="bolAceite" type="text" value="" size="3"/>
					      <span class="style1">(0: Não / 1: Sim) </span></td>
					    </tr>
					    <tr>
					      <td><div align="right">Percentual taxa multa: </div></td>
					      <td><input name="percTaxaMulta" type="text" value="0.00" />
					        <span class="style1">* </span>Percentual taxa mora: 
					        <input name="percTaxaMora" type="text" value="0.00" />
					      <span class="style1">*</span></td>
					    </tr>
						<tr>
							<td><div align="right">Data Multa: </div></td>
							<td><input name="dataMulta" type="text" value=""/>
							<span class="style1">(aaaaMMdd)</span></td>
						</tr>
						<tr>
							<td><div align="right">Data Juros: </div></td>
							<td><input name="dataJuros" type="text" value=""/>
							<span class="style1">(aaaaMMdd)</span></td>
						</tr>  
					    <tr>
					      <td><div align="right">Nome sacador: </div></td>
					      <td><input name="nomeSacador" type="text" value="" size="50"/>
					        CGC/CPF Sacador:
					        <input name="numCGCCPFSacador" value="" type="text"/></td>
					    </tr>    
					    <tr>
					      <td>&nbsp;</td>
					      <td>&nbsp;</td>
					    </tr>
					    <tr bgcolor="#CCCCCC">
					      <td colspan="2">Descontos</td>
					    </tr>    
					    <tr>
					      <td><div align="right">Data primeiro desconto: </div></td>
					      <td><input name="dataPrimDesconto" type="text" value=""/>
					        <span class="style1">(aaaaMMdd)</span> Valor primeiro desconto:
					          <input name="valorPrimDesconto" type="text" value="0.00"/>
					          <span class="style1">*</span></td>
					    </tr>
					    <tr>
					      <td><div align="right">Data segundo desconto: </div></td>
					      <td><input name="dataSegDesconto" type="text" value=""/>
					      <span class="style1">(aaaaMMdd)</span>  Valor segundo desconto:
					        <input name="valorSegDesconto" type="text" value="0.00"/>
					        <span class="style1">*</span></td>
					    </tr>
					    <tr>
					      <td><div align="right">Data terceiro desconto: </div></td>
					      <td><input name="dataTerDesconto" type="text" value=""/>
					       <span class="style1">(aaaaMMdd)</span> Valor terceiro desconto:
					        <input name="valorTerDesconto" type="text" value="0.00"/>
					        <span class="style1">*</span></td>
					    </tr>         
					    <tr>
					      <td>&nbsp;</td>
					      <td>&nbsp;</td>
					    </tr>
					    <tr bgcolor="#CCCCCC">
					      <td colspan="2">Instruções</td>
					    </tr>    
					    <tr>
					      <td><div align="right">Desc instrução 1: </div></td>
					      <td><input name="descInstrucao1" type="text" value="" size="50"/>
					        Desc. instrução 2:
					          <input name="descInstrucao2" type="text" value="" size="50"/></td>
					    </tr>
					    <tr>
					      <td><div align="right">Desc. instrução 3: </div></td>
					      <td><input name="descInstrucao3" type="text" value="" size="50"/>
					        Desc. instrução 4:
					          <input name="descInstrucao4" type="text" value="" size="50"/></td>
					    </tr>
					    <tr>
					      <td><div align="right">Desc. instrução 5: </div></td>
					      <td><input name="descInstrucao5" type="text" value="" size="50"/></td>
					    </tr>
					  
					    <tr>
					      <td></td>
					      <td>&nbsp;</td>
					    </tr>
					    <tr>
					      <td></td>
					      <td><input name="submit" type="submit" value="Gravar"/></td>
					    </tr>
					   
					    <tr>
					      <td><div align="right"><span class="style1">*</span></div></td>
					      <td><span class="style1"> As casas decimais devem ser separadas por ponto(.) Ex.: 1556.23 (Um mil e quinhentos e cinquenta e seis e vinte e três)</span></td>
					    </tr>
					    <tr>
					      <td><div align="right"><span class="style1">*</span></div></td>
					      <td><span class="style1">  Os campos de data devem ser preenchidos no padrão americano(aaaaMMdd) sem caractéres especiais. Ex.: 19840206 equivalente a (06/02/1984)</span></td>
					    </tr>	
					</table>
					</form>