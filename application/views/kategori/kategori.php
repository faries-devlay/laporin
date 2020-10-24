<div class="overlay">
    <div class="loader"></div>
</div>
<div class="content-wrapper kategori" id="kategori_content">
    <div class="content">
        <div class="box box-success">
            <div class="box-header">
                <span class="text-shadow"><i class="fa fa-2x fa-tags"></i>&nbsp;Kategori</span>
            </div>
        </div>
        <div class="box box-solid">
            <div class="box-header with-border">
                <span class="title-normal">Input Data Kategori</span>
                <button type="button" id="btn-tambahKategori" class="btn btn-success pull-right"><span class="fa fa-plus"></span>&nbsp;Tambah</button>
            </div>
        </div>
        <div class="box box-solid">
            <div class="box-header with-border">
                <span class="box-title">Tabel Kategori</span>
                <div class="box-tools">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <table id="kategori_table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=1;
                        foreach ($kategori as $cat) {
                        ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $cat->category ?></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-warning" id="cat-btnUpdate" data-id="<?= $cat->category_id ?>"><span class="fa fa-edit"></span>&nbsp;Edit</button>
                                <button type="button" class="btn btn-sm btn-danger" id="cat-btnDelete" data-id="<?= $cat->category_id ?>"><span class="fa fa-trash-o"></span>&nbsp;Hapus</button>
                            </td>
                        </tr>
                        <?php
                        $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->

<div class="modal fade" id="kategori_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modal-title"></h4>
            </div>
            <form action="#" method="post" id="kategori_form" class="form-horizontal">
                <div class="modal-body padding">
                    <input type="hidden" id="category_id" name="category_id">
                    <div class="form-group">
                        <label for="category" class="control-label col-sm-3">Kategori</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="kategori_name" id="kategori_name" placeholder="Kategori">
                            <small class="text-danger" id='error'></small>  
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success pull-right">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>