<div class="row-fluid">
    <!-- block -->
    <div class="bs-example" data-example-id="basic-forms">
        <div class="block-content collapse in">
            <div class="span12">
                <form method="post" action="/admin/noticias/salvar" enctype="multipart/form-data">
                    <input type="hidden" name="data" value="<?= date('Y-m-d H:i:s'); ?>">
                    <input type="hidden" name="data_hora" value="<?= date('Y-m-d H:i:s'); ?>">
                    <div class="form-group"><label for="exampleInputEmail1">Titulo</label>
                        <input type="text" name="titulo" class="form-control" id="exampleInputEmail1"  placeholder="Titulo">
                    </div>
                    <div class="form-group"><label for="exampleInputPassword1">Noticia</label>
                        <textarea name="noticia" class="form-control"></textarea>
                    </div>
                    <div class="form-group"><label for="exampleInputFile">File input</label>
                        <input type="file" name="arquivo" d="exampleInputFile">
                    </div>
                    <button type="submit" class="btn btn-default">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>