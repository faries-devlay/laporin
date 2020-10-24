<div class="overlay">
    <div class="loader"></div>
</div>
<div class="content-wrapper barang_content" id="barang_content">
    <section class="content">
        <div class="box box-danger">
            <div class="box-header">
                <span class="text-shadow"> <span class="fa fa-2x fa-briefcase"></span>&nbsp;Barang</span>
            </div>
        </div>
        <div class="box box-solid">
            <div class="box-header with-border">
                <span class="title-normal">Input Data Barang</span>
                <button type="button" id="btn_tambah_barang" class="btn btn-danger pull-right"><span class="fa fa-plus"></span>&nbsp;Tambah</button>
            </div>
        </div>
        <div class="box box-solid">
            <div class="box-header with-border">
                <span class="box-title">Barang Table</span>
                <div class="box-tools">
                    <button class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="pilih_harga">
                    <select name="select_harga" class="form-control" id="select_harga">
                        <option value="">-- Pilih Harga -- </option>
                    </select>
                    <small class="text-danger">Tampilkan tabel berdasarkan harga</small>
                </div>
                <div class="setting_harga">
                    <a href="<?= base_url() ?>settingbarang" class="btn btn-success">Setting Harga</a>
                </div>
                <table id="barang" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Berat</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Kategori</th>
                        <th>Harga Beli</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($barang as $key => $value) :
                    ?>
                    <tr>
                        <td><?= $value->barang_kd ?></td>
                        <td><?= $value->barang_name ?></td>
                        <td><?= $value->berat ?></td>
                        <td><?= $value->stok?></td>
                        <td><?= $value->satuan ?></td>
                        <td><?= $value->category ?></td>
                        <td><?= "Rp ".number_format($value->harga_beli,2,',','.') ?></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-warning" id="btn_barang_update" data-id="<?= $value->barang_kd ?>"><i class="fa fa-edit"></i>&nbsp;Edit</button>
                            <button type="button" class="btn btn-sm btn-primary" id="btn_barang_delete" data-id="<?= $value->barang_kd ?>"><i class="fa fa-trash"></i>&nbsp;Hapus</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
            </div>
        </div>
    </section>
</div>


<div class="modal fade" id="modal_barang">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fa fa-edit"></span>&nbsp;Masukkan Data</h4>
            </div>
            <form action="#" method="post" id="form_barang" class="form-horizontal">
            <div class="modal-body">
                    <div class="form-group">
                        <label for="input_kd" id="lbl_kd" class="col-sm-3">Kd_barang</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="input_kd" id="input_kd" value="<?= $otomatis ?>" READONLY>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input_nama" class="col-sm-3">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="input_nama" id="input_nama">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input_berat" class="col-sm-3">Berat</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="input_berat" id="input_berat">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input_satuan" class="col-sm-3">Satuan</label>
                        <div class="col-sm-8">
                            <select name="input_satuan" class="form-control" id="input_satuan">
                                <option value="">-- Pilih Satuan --</option>
                                <?php foreach ($satuan as $key => $value) :
                                ?>
                                    <option value="<?= $value->satuan_id ?>"><?= $value->satuan ?></option>                               
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input_kategori" class="col-sm-3">Kategori</label>
                        <div class="col-sm-8">
                            <select name="input_kategori" class="form-control" id="input_kategori">
                                <option value="">-- Pilih Kategori --</option>
                                <?php foreach ($kategori as $key => $value) {
                                ?>
                                    <option value="<?= $value->category_id ?>"><?= $value->category ?></option>
                                <?php
                                }?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input_harga_beli" class="col-sm-3">Harga Beli</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="input_harga_beli" id="input_harga_beli">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input_jumlah" class="col-sm-3">Jumlah</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="input_jumlah" id="input_jumlah">
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>