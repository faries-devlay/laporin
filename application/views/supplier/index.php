<div class="overlay">
    <div class="loader"></div>
</div>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Main content -->
        <section class="content">
                <div class="box box-primary">
                    <div class="box-header">
                        <span class="text-shadow"> <span class="fa fa-2x fa-user-plus"></span>&nbsp;Supplier</span>
                    </div>
                </div>
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <span class="title-normal">Input Data Supplier</span>
                        <button type="button" id="btn-tambah" class="btn btn-primary pull-right"><span class="fa fa-plus"></span>&nbsp;Tambah</button>
                    </div>
                </div>
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <span class="box-title">Supplier Table</span>
                        <div class="box-tools">
                            <button class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <table id="supplier" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>NIP</th>
                                <th>Nama Supplier</th>
                                <th>No Telp</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($supplier as $item) :
                            ?>
                            <tr>
                                <td><?= $item['NIP'] ?></td>
                                <td><?= $item['supplier_name'] ?></td>
                                <td><?= $item['telp'] ?></td>
                                <td><?= $item['address'] ?></td>
                                <td>
                                    <button type="button" data-id="<?= $item['supplier_id'] ?>" class="btn btn-sm btn-warning" id="btn-update"><span class="fa fa-edit"></span>&nbsp;Edit</button>
                                    <button type="button" class="btn btn-sm btn-danger" id="btn-delete" data-id="<?= $item['supplier_id'] ?>"><span class="fa fa-trash"></span>&nbsp;Hapus</span>
                                </td>
                            </tr>                        
                            <?php endforeach;?>
                        </tbody>
                        
                    </table>
                    </div>
                </div>
            </section>
                <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <div class="modal fade" id="modalin">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fa fa-edit"></span>&nbsp;Masukkan Data</h4>
                </div>
                <form action="#" method="post" id="form_modal" class="form-horizontal">
                <div class="modal-body">
                    <input type="hidden" id="supplier_id" name="supplier_id">
                        <!-- <div class="col-sm-12"> -->
                            <div class="form-group">
                                <label for="nip" class="control-label col-sm-3">NIP</label>
                                <div class="col-sm-9">
                                    <input type="text" id="nip" class="form-control form-control-sm" name="nip" placeholder="Nip">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="supplier_name" class="control-label col-sm-3 text">Nama Supplier</label>
                                <div class="col-sm-9">
                                    <input type="text" id="supplier_name" class="form-control form-control-sm" name="supplier_name" placeholder="Supplier">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="supplier_telp" class="control-label col-sm-3">No Telp</label>
                                <div class="col-sm-9">
                                    <input type="text" id="supplier_telp" class="form-control form-control-sm" name="supplier_telp" placeholder="Telp">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="supplier_alamat" class="control-label col-sm-3">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea rows="5" id="supplier_alamat" class="form-control form-control-sm" name="supplier_alamat" placeholder="Alamat"></textarea>
                                </div>
                            </div>
                        <!-- </div> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
            </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>