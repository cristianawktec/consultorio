<div class="span4" id="content"></div>
<div class="span6" id="content">
    <!-- morris stacked chart -->
    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Detalhes de Transação Bancária</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <form class="form-horizontal">
                        <fieldset>
                            <legend>Detalhes de Transação</legend>
                            <div class="control-group">
                                <label class="control-label" for="focusedInput">Nome do Usuário</label>
                                <div class="controls">
                                    <?php echo $pagamento[0]->nm_medico; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">CPF</label>
                                <div class="controls">
                                    <?php echo $pagamento[0]->nr_cpf; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="disabledInput">Código de Transação</label>
                                <div class="controls">
                                    <?php echo $pagamento[0]->code; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="optionsCheckbox2">Referencia do Sistema</label>
                                <div class="controls">
                                    <?php echo $pagamento[0]->reference_transection; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputError">Status da Transação</label>
                                <div class="controls">
                                    <?php
                                    if ($pagamento[0]->statusTransacao == ''){
                                        echo "Cancelado";
                                    } elseif ($pagamento[0]->statusTransacao == 1) {
                                        echo "autorizado";
                                    } elseif ($pagamento[0]->statusTransacao == 2) {
                                        echo "iniciado";
                                    } elseif ($pagamento[0]->statusTransacao == 3) {
                                        echo "boleto impresso";
                                    } elseif ($pagamento[0]->statusTransacao == 4) {
                                        echo "concluido";
                                    } elseif ($pagamento[0]->statusTransacao == 5) {
                                        echo "cancelado";
                                    } elseif ($pagamento[0]->statusTransacao == 6) {
                                        echo "em análise";
                                    } elseif ($pagamento[0]->statusTransacao == 7) {
                                        echo "estornado";
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputError">Valor do Pagamentos</label>
                                <div class="controls">
                                    R$ <?php echo $pagamento[0]->vl_pagamento; ?>,00
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputError">Forma de Pagamento</label>
                                <div class="controls">
                                    <?php if ($pagamento[0]->paymentMethod == 73) { echo "Boleto Bancário"; } else { echo "Cartão de Crédito"; } ?>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button onclick="javascript:history.go(-1)" class="btn btn-primary">Voltar</button>
                            </div>
                        </fieldset>
                    </form>

                </div>
            </div>
        </div>
        <!-- /block -->
    </div>
</div>
<div class="span2" id="content"></div>