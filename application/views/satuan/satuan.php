<div class="overlay">
    <div class="loader"></div>
</div>
<div class="content-wrapper satuan" id="satuan_content">
    <div class="content">
        <div class="box box-info">
            <div class="box-header">
                <span class="text-shadow"><i class="fa fa-2x fa-file-archive-o"></i>&nbsp;Satuan</span>
            </div>
        </div>
        <div class="box box-solid">
            <div class="box-header with-border">
                <span class="title-normal">Input Data Satuan</span>
                <button type="button" id="btn-tambahSatuan" class="btn btn-info pull-right"><span class="fa fa-plus"></span>&nbsp;Tambah</button>
            </div>
        </div>
        <div class="box box-solid">
            <div class="box-header with-border">
                <span class="box-title">Tabel Satuan</span>
                <div class="box-tools">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <table id="satuan_table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Satuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=1;
                        foreach ($satuans as $satuan) {
                        ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $satuan->satuan ?></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-warning" id="sat-btnUpdate" data-id="<?= $satuan->satuan_id ?>"><span class="fa fa-edit"></span>&nbsp;Edit</button>
                                <button type="button" class="btn btn-sm btn-danger" id="sat-btnDelete" data-id="<?= $satuan->satuan_id ?>"><span class="fa fa-trash-o"></span>&nbsp;Hapus</button>
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

<div class="modal fade" id="satuan_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"></h4>
            </div>
            <form action="#" method="post" id="satuan_form" class="form-horizontal">
                <div class="modal-body padding">
                    <input type="hidden" id="satuan_id" name="satuan_id">
                    <div class="form-group">
                        <label for="satuan" class="control-label col-sm-3">Satuan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="satuan_name" id="satuan_name" placeholder="Satuan">  
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info pull-right">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>