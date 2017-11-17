<?php $noticia = $noticia[0]; ?>
<div class="row-fluid">
    <!-- block -->
    <div class="bs-example" data-example-id="basic-forms">
        <div class="block-content collapse in">
            <div class="span12">
                <form method="post" action="/admin/noticias/atualizar/<?= $noticia->id; ?>" enctype="multipart/form-data">
                    <div class="form-group"><label for="exampleInputEmail1">Titulo</label>
                        <input value="<?= $noticia->titulo; ?>" type="text" name="titulo" class="form-control" id="exampleInputEmail1"  placeholder="Titulo">
                    </div>
                    <div class="form-group"><label for="exampleInputPassword1">Noticia</label>
                        <textarea name="noticia" class="form-control"><?= $noticia->noticia; ?></textarea>
                    </div>
                    <?php if($noticia->arquivo){ ?>
                        <div class="row" style="float: left !important;clear: both;">
                            <div class="col-xs-1 col-md-1">
                                <a href="#" class="thumbnail">
                                    <img src="<?php echo base_url('assets') ?>/img/noticia/<?= $noticia->arquivo; ?>" alt="...">
                                </a>
                            </div>
                        </div>
                        <div style="clear: both"></div>
                    <?php } ?>
                    <div class="form-group"><label for="exampleInputFile">File input</label>
                        <input type="file" name="arquivo" d="exampleInputFile">
                    </div>
                    <button type="submit" class="btn btn-default">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>