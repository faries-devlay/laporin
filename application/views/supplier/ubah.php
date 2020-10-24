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
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <form action="<?= base_url() ?>supplier/ubah" method="post" class="form-horizontal">
                        <input type="hidden" id="supplier_id" name="supplier_id" value="<?= $supplier['supplier_id'] ?>">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="nama" class="control-label col-sm-3">NIP</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm" name="nip" placeholder="Nip" value="<?= $supplier['NIP'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama" class="control-label col-sm-3 text">Nama Supplier</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm" name="supplier_name" placeholder="Supplier" value="<?= $supplier['supplier_name'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama" class="control-label col-sm-3">No Telp</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm" name="supplier_telp" placeholder="Telp" value="<?= $supplier['telp'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama" class="control-label col-sm-3">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea rows="5" class="form-control form-control-sm" name="supplier_alamat" placeholder="Alamat"><?= $supplier['address'] ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-sm btn-danger px-2">Reset</button>
                                        <button type="submit" class="btn btn-sm btn-success pull-right">Kirim</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
                <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->