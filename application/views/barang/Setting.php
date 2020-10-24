<div class="overlay">
    <div class="loader"></div>
</div>
<div class="content-wrapper" id="setting_harga">
    <section class="content">
        <div class="box box-danger">
            <div class="box-header">
                <span class="text-shadow"> <span class="fa fa-2x fa-usd"></span>&nbsp;Harga</span>
            </div>
        </div>
        <div class="box box-solid">
            <div class="box-header with-border">
                <span class="title-normal">Setting Harga</span>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <div class="input-group col-sm-4">
                            <select name="cari_data" id="cari_data" class="form-control">
                            <option value="">Pilih Data</option>
                            <?php foreach ($get_barang as $key => $value) {
                            ?>
                                <option value="<?= $value->barang_kd ?>"><?= $value->barang_name ?></option>
                            <?php
                            } ?>
                            </select>
                            <span class="input-group-btn">
                                <button class="btn btn-success" id="set_barang">Pilih</button>
                            </span>
                        </div>
                            <small class="text-light-blue">pilih salah satu barang untuk menambahkan harga jual</small> 
                        <div class="box-tools">
                            <button class="btn btn-box-tool" data-widget="collapse"><span class="fa fa-minus"></span></button>
                        </div>
                    </div>
                    <form action="">
                    <div class="box-body">
                        <div class="content">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">Kode Barang</label>
                                        <input type="text" class="form-control" name="kd_view" id="kd_view"  Readonly>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">Nama Barang</label>
                                        <input type="text" class="form-control" name="nama_view" id="nama_view" Readonly>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">Jumlah Barang</label>
                                        <input type="text" class="form-control" name="jumlah_view" id="jumlah_view"  readonly>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">Harga Beli</label>
                                        <input type="text" class="form-control" name="harga_view" id="harga_view" data-harga readonly>
                                    </div>
                                </div>
                                </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-solid" id="tambah_harga">
                    <div class="box-header">
                            <button class="btn bg-purple">Tambah Harga</button>
                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool"><span class="fa fa-minus" data-widget="collapse"></span></button>
                        </div>
                    </div>
                    <form action="#" method="post" id="hargain">
                    <div class="box-body">
                        <div class="content">
                            <div class="row">
                                <div class="col-sm-3">
                                    <input type="hidden" id="kd_harga" name="kd_harga" data-id="">
                                    <div class="form-group">
                                        <label for="set_nama_harga">Nama</label>
                                        <input type="text" class="form-control" id="set_nama_harga" name="set_nama_harga">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="set_jumlah_harga">Jumlah</label>
                                        <input type="number" class="form-control" id="set_jumlah_harga" name="set_jumlah_harga">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="set_harga">Harga</label>
                                        <input type="number" class="form-control" id="set_harga" name="set_harga">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="set_laba_harga">Laba</label>
                                        <input type="text" class="form-control" id="set_laba_harga" name="set_laba_harga" Readonly>
                                        <small class="text-green">Pilih barang dan masukkan harga !</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn input-sm btn-danger pull-right">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <ul>
        </ul>
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-solid">
                    <div class="box-header">
                        <h4 class="box-title">Table Harga</h4>
                    </div>
                <div class="box-body">
                    <table id="barang" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Harga / Barang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list_harga as $key => $value) {
                            ?>
                                <tr>
                                    <td><?= $value->barang_kd ?></td>
                                    <td><?= $value->barang_name ?></td>
                                    <td><?= "Rp ".number_format($value->harga_jual,2,',','.')." / ".$value->jumlah ?></td>
                                    <td>
                                        <button type="button" data-id="<?= $value->harga_id ?>" id="update_harga" class="btn btn-sm btn-warning"><span class="fa fa-edit"></span>&nbsp;Edit</button>
                                    </td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="modal_harga">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fa fa-edit"></span>&nbsp;Masukkan Data</h4>
            </div>
            <form action="#" method="post" id="form_harga" class="form-horizontal">
            <div class="modal-body">
                <input type="hidden" name="harga_id" id="harga_id">
                    <div class="form-group">
                        <label for="nama_barang_harga" class="col-sm-3">Nama Barang</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama_barang_harga" id="nama_barang_harga" Readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_harga" id="lbl_kd" class="col-sm-3">Nama Harga</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama_harga" id="nama_harga">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_harga" class="col-sm-3">Jumlah</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="jumlah_harga" id="jumlah_harga">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="harga_jual" class="col-sm-3">Harga Jual</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="harga_jual" id="harga_jual">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="laba_harga" class="col-sm-3">Laba</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="laba_harga" id="laba_harga">
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