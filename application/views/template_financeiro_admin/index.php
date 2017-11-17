<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Transações Bancárias e pagamentos</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">

                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                    <thead>
                    <tr>
                        <th>REFERENCIA</th>
                        <th>LOGIN</th>
                        <th>DATA DE CADASTRO</th>
                        <th>STATUS</th>
                        <th>AÇÕES</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($pagamentos as $pagamento): ?>
                    <tr class="odd gradeX">
                        <td><?php echo $pagamento->reference_transection; ?></td>
                        <td><?php echo $pagamento->nm_login; ?></td>
                        <td><?php echo $pagamento->dt_pagamento; ?></td>
                        <td class="center">
                            <?php
                            if ($pagamento->statusTransacao == ''){
                                echo "Cancelado";
                            } elseif ($pagamento->statusTransacao == 1) {
                                echo "autorizado";
                            } elseif ($pagamento->statusTransacao == 2) {
                                echo "iniciado";
                            } elseif ($pagamento->statusTransacao == 3) {
                                echo "boleto impresso";
                            } elseif ($pagamento->statusTransacao == 4) {
                                echo "concluido";
                            } elseif ($pagamento->statusTransacao == 5) {
                                echo "cancelado";
                            } elseif ($pagamento->statusTransacao == 6) {
                                echo "em análise";
                            } elseif ($pagamento->statusTransacao == 7) {
                                echo "estornado";
                            }
                            ?>
                        </td>
                        <td class="center">
                            <a href="/admin/transacoes/detalhe/<?php echo $pagamento->id_pagamento?>">
                                Visualizar
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /block -->
</div>