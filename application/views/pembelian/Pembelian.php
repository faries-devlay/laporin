<?php if ($this->session->has_userdata('pembelian')) {
    $disable = "disabled";
}
else{
    $disable ="";
}
?>
<div class="overlay">
    <div class="loader"></div>
</div>
<div class="content-wrapper pembelian" id="pembelian">
    <div class="content">
        <div class="box box-default">
            <div class="box-header">
                <h4 class="text-shadow"><span class="fa fa-undo"></span>&nbsp;Pembelian</h4>
            </div>
        </div>
        <form id="transaksi" action="" method="post">
        <div class="box box-solid">
            <div class="box-header with-border">
                <span class="title-normal">Data Pembelian</span>
                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <span class="fa fa-minus"></span>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="no_faktur">No Faktur</label>
                            <input type="text" class="form-control input-sm" name="no_faktur" id="no_faktur" value="<?= $this->session->userdata('no_faktur'); ?>" <?= $disable ?>>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="select_supplier">Supplier</label>
                            <select name="select_supplier" id="select_supplier" class="form-control input-sm" <?= $disable ?>>
                            <option value="">-- Pilih Supplier --</option>
                            <?php foreach ($supplier_data as $supplier) :
                            if ($this->session->userdata('supplier') == $supplier->supplier_id){
                                $select = 'selected';
                            }
                            else {
                                $select = '';
                            }
                            ?>
                                <option value="<?= $supplier->supplier_id ?>" <?= $select ?>><?= $supplier->supplier_name ?></option>
                            <?php 
                            endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="tgl_tsk">Tanggal Transaksi</label>
                            <input type="date" class="form-control input-sm" name="tgl_tsk" id='tgl_tsk' value="<?= $this->session->userdata('tgl_transaksi'); ?>" <?= $disable ?>>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <?php if ($this->session->userdata('pembelian') == true) {
                            $class = 'btn-warning';
                            $text = "Ubah";
                            $id = "edit_transaksiPembelian";
                        } 
                        else {
                            $class ='btn-danger';
                            $text = "Simpan";
                            $id = "simpan_transaksiPembelian";
                        }?>
                        <button type="button" id="<?= $id ?>" class="btn <?= $class ?> input-sm pull-right"><?= $text ?></button>
                        <button type="button" id="ubah_transaksiPembelian" class="btn btn-primary input-sm pull-right hidden">Simpan</button>
                        <button type="button" id="batal_transaksiPembelian" class="btn btn-default input-sm pull-right hidden">Batal</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <form id="detail_transaksi" action="<?= base_url() ?>pembelian/coba" method="post">
        <div class="box box-solid">
            <div class="box-header with-border">
                <span class="title-normal">Data Detail Barang</span>
                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <span class="fa fa-minus"></span>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="kd_barang">Kode Barang</label>
                            <input type="text" class="form-control" name="kd_barang" id="kd_barang" value="<?= $max ?>" READONLY>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="harga_barang">Harga Barang</label>
                            <input type="text" class="form-control" id="harga_barang" name="harga_barang">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="satuan_barang">Satuan</label>
                            <select name="satuan_barang" id="satuan_barang" class="form-control">
                                <option value="">-- Pilih Satuan --</option>
                                <?php foreach ($satuans as $satuan) :
                                ?>
                                    <option value="<?= $satuan->satuan_id ?>"><?= $satuan->satuan ?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="kategori_barang">Kategori</label>
                            <select name="kategori_barang" id="kategori_barang" class="form-control">
                                <option value="">-- Pilih Kategori --</option>
                                <?php foreach ($kategoris as $kategori) :
                                ?>
                                    <option value="<?= $kategori->category_id ?>"><?= $kategori->category ?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="berat_barang">Berat</label>
                            <input type="text" class="form-control" id="berat_barang" name="berat_barang">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="jumlah_barang">Jumlah</label>
                            <input type="text" class="form-control" name="jumlah_barang" id="jumlah_barang">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <button type="submit" id="simpan_detail" class="btn btn-success pull-right">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <div class="box box-solid">
            <div class="box-header">
                <span class="title-normal">Detail Table</span>
                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool"><span class=" fa fa-minus"></span></button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table  class="table table-bordered table-striped">
                            <thead>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                                <th>Aksi</th>
                            </thead>
                            <?php
                            $hasil = 0; 
                            if (isset($_SESSION['detail_beli'])) {
                            ?>        
                            <tbody>
                                <?php $No='1';
                                foreach ($_SESSION['detail_beli'] as $key => $detail) :
                                    var_dump($key);
                                ?>
                                    <tr>
                                        <td><?= $No ?></td>
                                        <td class=''><?= $detail['kd_barang'] ?></td>
                                        <td><?= $detail['nama_barang'] ?></td>
                                        <td><?= 'Rp '.number_format($detail['harga_barang'],2,',','.') ?></td>
                                        <td><?= $detail['jumlah_barang'] ?></td>
                                        <td><?php $total = $detail['harga_barang'] * $detail['jumlah_barang']; $hasil+=$total; echo 'Rp '.number_format($total,2,',','.') ?></td>
                                        <td>
                                            <a href="<?= base_url() ?>pembelian/unset/<?= $key ?>" id="unset_session" class="tn input-sm btn-danger"><span class="fa fa-trash"></span></button>
                                        </td>
                                    </tr>
                                <?php $No++; endforeach;?>
                            </tbody>
                            <?php
                            }
                            else{
                            ?>
                            <tbody>
                                <tr>
                                    <span>Tabel Kosong</span>
                                </tr>
                            </tbody>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
                <hr>
                <div class="row" id="pembayaran_beli">
                    <div class="col-sm-6">
                        <div class="callout" id="txt_pesan" style="display:none;">
                            <h4 class="notif_pesan">Lunas</h4>
                            <p class="desc_pesan">Pembelian sudah Lunas!!</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="cover_total">
                            <span class="total_pembelian col-sm-5">Total Pembelian</span>
                            <span class="hasil_total col-sm-6" id='total_bayar' data-id="<?php echo $hasil; ?>"><?= number_format($hasil,2,',','.'); ?></span>
                        </div>
                        <div class="cover_bayar">
                            <label for="bayar_id" class="bayar col-sm-5">Bayar</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" name="inpt_bayar" id="bayar_id">
                                <small class="form-text" id="txt_total"></small>
                            </div>
                        </div>
                        <div class="cover_kembali">
                            <span class="total_kembali col-sm-5">Kembali</span>
                            <span class="hasil_kembali col-sm-6"></span>
                        </div>
                        <div class="cover_button">
                            <button class="btn btn-primary col-sm-3 pull-right" id="pembelian_selesai">Selesai</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>