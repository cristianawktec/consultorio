<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <a href="/admin/noticias/adicionar">
            +Adicionar
        </a>
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Noticias do sistema</div>
        </div>
        <div class="block-content collapse in">

            <div class="span12">

                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                    <thead>
                    <tr>
                        <th>TITULO</th>
                        <th>DATA DE CADASTRO</th>
                        <th>AÇÕES</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($noticias as $noticia) { ?>
                        <tr>
                            <td><?= $noticia->titulo; ?></td>
                            <td><?= date('d/m/Y H:i:s', strtotime($noticia->data)); ?></td>
                            <td>
                                <a href="/admin/noticias/editar/<?= $noticia->id; ?>">
                                    Editar
                                </a>
                                |
                                <a href="/admin/noticias/remover/<?= $noticia->id; ?>">
                                    Remover
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /block -->
</div>